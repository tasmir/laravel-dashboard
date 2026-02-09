<?php

namespace App\Services\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function getAll(Request $request)
    {
        // return User::orderBy('name', 'asc')->paginate(20);
        $query = User::query();
        if ($search = $request->string('q')->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (!auth()->user()->hasRole('Creator')) {
            $roleId = auth()->user()->roles->first()?->id;
            $query->whereHas('roles', function ($q) use ($roleId) {
                $q->where('id', '>=', $roleId);
            });
        }

        if ($request->filled('role')) {
            $query->whereHas('roles', function ($q) use ($request) {
                if($request->role == 'Admin') {
                    $q->whereIn('name', ['Admin', 'Editor']);
                } else {
                    $q->where('name', $request->role);
                }
            });
        }
        return $query->orderByDesc('id')->paginate(20);
    }

    public function getAllTrashed() {
        return User::onlyTrashed()->orderBy('name', 'asc')->paginate(20);
    }

    public function index($isTrash = false, Request $request)
    {
        $role = $request->role ?? 'User';
        return [
            'model_data' => $isTrash ? $this->getAllTrashed() : $this->getAll($request),
            'empty_message' => "No {$role}s found.",
            'page_title' => $isTrash ? "Trashed {$role}s" : "{$role}s",
            'loop' => (object)[
                'edit' => 'admin.users.edit',
                'view' => 'admin.users.show',
                'delete' => 'admin.users.destroy',
            ],
            'create_button' => !$isTrash && !in_array($request->role, ['Tutor', 'Admin']) ? route('admin.users.create').'?role='.$request->role : 'User',
        ];
    }

    public function formData(User $user, string $title = 'Create User'): array
    {
        $data = [
            'page_title' => $title,
            'form' => (object)[
                'type' => $user->exists ? 'PUT' : 'POST',
                'action' => $user->exists
                    ? route('admin.users.update', $user)
                    : route('admin.users.store'),
            ],
            'status' => ['active', 'inactive'],
            'model_data' => $user,
            'modelName' => "User",
            'back_button' => route('admin.users.index').'?role='.\request()->role ?? '',
        ];

        if (!auth()->user()->hasRole('Creator')) {
            $roleId = auth()->user()->roles->first()?->id;
            $data['roles'] = \Spatie\Permission\Models\Role::where('id', '>=', $roleId)->orderBy('id', 'asc')->pluck('name', 'id');
        } else {
            $data['roles'] = \Spatie\Permission\Models\Role::orderBy('id', 'asc')->pluck('name', 'id');
        }
        return $data;
    }

    public function save(User $user, Request $request, string $message, $image_id = null)
    {
        try {
            DB::transaction(function () use ($user, $request, $image_id) {
                $data = $request->safe()->only([
                    'name', 'email', 'password', 'status', 'image_id',
                ]);
                if($image_id) {
                    $data['image_id'] = $image_id;
                }
                $user->fill($data)->save();
                if($user->wasRecentlyCreated) {
                    $user->syncRoles($request->get('role'));
                }
            });
            return redirect()->to(route('admin.users.index').'?role='.$request->role)->with('success', $message);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function delete(User $user)
    {
        try {
            DB::transaction(function () use ($user) {
                $user->delete();
            });
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function profileData(User $user, string $title = 'Update Profile'): array
    {
        return [
            'page_title' => $title,
            'form' => (object)[
                'type' => 'POST',
                'action' => route('admin.users.profile.update'),
            ],

            'model_data' => $user,
            'modelName' => "User",

        ];
    }

    public function profileUpdate(User $user, Request $request, string $message)
    {
        try {
            $user->update($request->safe()->only(['name', 'email', 'password']));
            return redirect()->route('admin.users.profile')->with('success', $message);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(User $user): array
    {
        return [
            'page_title' => 'User Details',
            'model_data' => $user,
            'modelName' => "User",
            'back_button' => route('admin.users.index'),
        ];
    }
}

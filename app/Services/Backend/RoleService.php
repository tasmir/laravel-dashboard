<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService {
    public function getAll(Request $request)
    {
        $query = Role::query();
        if (!auth()->user()->hasRole('Creator')) {
            $roleId = auth()->user()->roles->first()?->id;
            $query->where('id', '>=', $roleId);
        }

        if ($search = $request->string('q')->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhereHas('permissions', function ($qu) use ($search) {
//                    $qu->where('id', '>=', $roleId);
                    $qu->where('name', 'LIKE', '%' . trim($search) . '%');
                });
            });
        }
        return $query->orderByDesc('id')->paginate(20);
    }

    public function index(Request $request)
    {
        return [
            'model_data' => $this->getAll($request),
            'empty_message' => 'No roles found.',
            'page_title' => 'Roles',
            'loop' => (object)[
                'edit' => 'admin.roles.edit',
                'view' => 'admin.roles.show',
                'delete' => 'admin.roles.destroy',
            ],
            'create_button' => route('admin.roles.create'),
        ];
    }

    public function formData(Role $role, string $title = 'Create Role'): array
    {
        $data = [
            'page_title' => $title,
            'form' => (object)[
                'type' => $role->exists ? 'PUT' : 'POST',
                'action' => $role->exists
                    ? route('admin.roles.update', $role)
                    : route('admin.roles.store'),
            ],
            'model_data' => $role,
            'back_button' => route('admin.roles.index'),
            'permissions' => Permission::pluck('name', 'id')->toArray(),
            'role_has_permission' => $role->permissions->pluck('name')->toArray()
        ];
        return $data;
    }

    public function save(Role $role, Request $request, string $message)
    {
        try {
            DB::transaction(function () use ($role, $request) {
                $data = $request->safe()->only([
                    'name'
                ]);
                $role->fill($data)->save();
                $role->syncPermissions($request->get('permissions'));
            });
            return redirect()->route('admin.roles.index')->with('success', $message);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function delete(Role $role)
    {
        try {
            DB::transaction(function () use ($role) {
                $role->delete();
            });
            return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}

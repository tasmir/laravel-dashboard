<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;


class PermissionService {
    public function getAll(Request $request)
    {
        $query = Permission::query();
        if ($search = $request->string('q')->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        return $query->orderBy('id')->paginate(20);
    }

    public function index(Request $request)
    {
        return [
            'model_data' => $this->getAll($request),
            'empty_message' => 'No permissions found.',
            'page_title' => 'Permissions',
            'loop' => (object)[
                'edit' => 'admin.permissions.edit',
                'delete' => 'admin.permissions.destroy',
            ],
            'create_button' => route('admin.permissions.create'),
        ];
    }

    public function formData(Permission $permission, string $title = 'Create Permission'): array
    {
        $data = [
            'page_title' => $title,
            'form' => (object)[
                'type' => $permission->exists ? 'PUT' : 'POST',
                'action' => $permission->exists
                    ? route('admin.permissions.update', $permission)
                    : route('admin.permissions.store'),
            ],
            'model_data' => $permission,
            'back_button' => route('admin.permissions.index'),
        ];
        return $data;
    }

    public function save(Permission $permission, Request $request, string $message)
    {
        try {
            DB::transaction(function () use ($permission, $request) {
                $data = $request->safe()->only([
                    'name'
                ]);
                $permission->fill($data)->save();
            });
            return redirect()->route('admin.permissions.index')->with('success', $message);
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }
    
    public function delete(Permission $permission)
    {
        try {
            DB::transaction(function () use ($permission) {
                $permission->delete();
            });
            return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
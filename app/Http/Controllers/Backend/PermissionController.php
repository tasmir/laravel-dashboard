<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Permission\CreateRequest;
use App\Services\Backend\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    protected PermissionService $service;

    public function __construct(PermissionService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        abort_unless(Gate::allows('permissions_list'), 403);
        return view('backend.pages.permissions.index', [
            'page_date' => $this->service->index($request)
        ]);
    }

    public function create()
    {
        abort_unless(Gate::allows('permissions_create'), 403);
        return view('backend.pages.permissions.create', [
            'page_date' => $this->service->formData(new Permission(), 'Create Permission')
        ]);
    }

    public function store(CreateRequest $request)
    {
        abort_unless(Gate::allows('permissions_create'), 403);
        return $this->service->save(new Permission(), $request, 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        abort_unless(Gate::allows('permissions_edit'), 403);
        return view('backend.pages.permissions.create', [
            'page_date' => $this->service->formData($permission, 'Edit Permission')
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        abort_unless(Gate::allows('permissions_edit'), 403);
        return $this->service->save($permission, $request, 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        abort_unless(Gate::allows('permissions_delete'), 403);
        return $this->service->delete($permission);
    }
}



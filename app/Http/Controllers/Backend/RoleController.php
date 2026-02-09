<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Role\CreateRequest;
use App\Http\Requests\Backend\Role\UpdateRequest;
use App\Services\Backend\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected RoleService $service;
    public function __construct(RoleService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        abort_unless(Gate::allows('roles_list'), 403);
        return view('backend.pages.roles.index', [
            'page_date' => $this->service->index($request)
        ]);
    }

    public function create()
    {
        abort_unless(Gate::allows('roles_create'), 403);
        return view('backend.pages.roles.create', [
            'page_date' => $this->service->formData(new Role(), 'Create Role')
        ]);
    }

    public function store(CreateRequest $request)
    {
        abort_unless(Gate::allows('roles_create'), 403);
        return $this->service->save(new Role(), $request, 'Role updated successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        abort_unless(Gate::allows('roles_edit'), 403);
        return view('backend.pages.roles.create', [
            'page_date' => $this->service->formData($role, 'Edit Role')
        ]);
    }

    public function update(UpdateRequest $request, Role $role) {
        abort_unless(Gate::allows('roles_edit'), 403);
        return $this->service->save($role, $request, 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        abort_unless(Gate::allows('roles_delete'), 403);
        return $this->service->delete($role);
    }
}



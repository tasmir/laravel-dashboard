<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\CreateRequest;
use App\Http\Requests\Backend\User\UpdateRequest;
use App\Models\User;
use App\Services\Backend\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected UserService $service;
    public function __construct(UserService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
//        $this->middleware("permission:list_pages", ['only' => ['index']]);
//        $this->middleware("permission:create_pages", ['only' => ['create', 'store']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->role ?? 'User';
        abort_unless(Gate::allows(strtolower("{$role}s_list")), 403);
        // \Spatie\Permission\Models\Role::create(['name' => 'Super Admin']);
        // $user = User::find(1);
        // $user->assignRole('Super Admin');
        $page_date = $this->service->index(\request()->exists('trashed'), $request);

        return view('backend.pages.users.index', compact('page_date'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('users_create'), 403);
        return view('backend.pages.users.create', [
            'page_date' => $this->service->formData(new User())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        abort_unless(Gate::allows('users_create'), 403);
        return $this->service->save(new User(), $request, 'User created successfully', $request->get('image_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        abort_unless(Gate::allows('users_show'), 403);
        $page_date = $this->service->show($user);
        return view('backend.pages.users.show', compact('user', 'page_date'));
        return view('backend.pages.users.tutorShow', compact('user', 'page_date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        abort_unless(Gate::allows('users_edit'), 403);
        return view('backend.pages.users.create', [
            'page_date' => $this->service->formData($user, 'Edit User')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        abort_unless(Gate::allows('users_edit'), 403);
        return $this->service->save($user, $request, 'User updated successfully', $request->get('image_id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort_unless(Gate::allows('users_delete'), 403);
        return $this->service->delete($user);
    }
}



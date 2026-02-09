<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Backend\ContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    public function __construct(protected ContactService $service)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_unless(Gate::allows('contacts_list'), 403);
        $page_date = $this->service->index(\request()->exists('trashed'));
        return view('backend.pages.contacts.index', compact('page_date'));
    }
}

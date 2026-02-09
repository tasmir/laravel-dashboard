<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserActivity;
use App\Services\Backend\UserActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct(private UserActivityService $service)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_date = [
            'page_title' => 'User Activities',
            'model_data' => $this->service->getAll(),
            'create_button' => null,
            'empty_message' => 'No activities found',
            'loop' => null
        ];

        return view('backend.pages.activity.index', compact('page_date'));
    }
}

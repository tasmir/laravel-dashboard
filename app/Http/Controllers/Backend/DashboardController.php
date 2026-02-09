<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Backend\UserActivityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function __construct(private UserActivityService $service)
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $contactCount = \App\Models\Contact::count();
        $contactCount = 0;
        $cvCount = 0;
//        $couponCount = \App\Models\Coupon::where('is_active', true)->count();
        $couponCount = 0;
        $tutorCount = 0;
        $userCount = User::role(['User'])->count();

        return view('backend.pages.index', compact(
            'contactCount',
            'cvCount',
            'couponCount',
            'tutorCount',
            'userCount'
        ));
    }

    public function cacheClear()
    {
        $user = auth()->user();
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        $this->service->store($user, 'User', 'cache.clear', 'Cache cleared');

        return redirect()->back()->with('success', 'Cache cleared successfully');
    }
}

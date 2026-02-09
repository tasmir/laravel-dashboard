<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Coupon\CouponRequest;
use App\Models\Coupon;
use App\Services\Backend\CouponService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CouponController extends Controller
{
    protected CouponService $service;
    public function __construct(CouponService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
//        $this->middleware("permission:list_pages", ['only' => ['index']]);
//        $this->middleware("permission:create_pages", ['only' => ['create', 'store']]);
    }
    public function index(Request $request)
    {
        abort_unless(Gate::allows('coupons_list'), 403);
        return view('backend.pages.coupons.index', [
            'page_date' => $this->service->index($request)
        ]);
    }

    public function create()
    {
        abort_unless(Gate::allows('coupons_create'), 403);
        return view('backend.pages.coupons.create', [
            'page_date' => $this->service->formData(new Coupon(), 'Create Coupon')
        ]);
    }

    public function store(CouponRequest $request)
    {
        abort_unless(Gate::allows('coupons_create'), 403);
        return $this->service->save(new Coupon(), $request, 'Coupon created successfully.');
    }

    public function edit(Coupon $coupon)
    {
        abort_unless(Gate::allows('coupons_edit'), 403);
        return view('backend.pages.coupons.create', [
            'page_date' => $this->service->formData($coupon, 'Edit Coupon')
        ]);
    }

    public function update(CouponRequest $request, Coupon $coupon)
    {
        abort_unless(Gate::allows('coupons_edit'), 403);
        return $this->service->save($coupon, $request, 'Coupon updated successfully.');
    }

    public function destroy(Request $request,Coupon $coupon)
    {
        abort_unless(Gate::allows('coupons_delete'), 403);
        return $this->service->delete($coupon);
    }


}



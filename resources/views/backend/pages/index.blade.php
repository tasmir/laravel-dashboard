@extends('backend.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    <!-- Welcome Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Overview</h1>
            <p class="mt-1 text-sm text-slate-500">Welcome back! Here's your system at a glance.</p>
        </div>
        <div class="flex items-center gap-3">
             <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-slate-200 rounded-lg text-sm font-medium text-slate-600 shadow-sm">
                <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ \Carbon\Carbon::now()->format('M d, Y') }}
             </span>
        </div>
    </div>

    <!-- Stats Grid (6 Items) -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @can('users_list')
{{--        <!-- 1. Registered Tutors -->--}}
{{--        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-slate-200 group hover:shadow-md transition-shadow">--}}
{{--            <dt class="truncate text-sm font-medium text-slate-500">Registered Tutors</dt>--}}
{{--            <dd class="mt-2 flex items-baseline gap-2">--}}
{{--                <span class="text-3xl font-semibold text-slate-900">{{ number_format($tutorCount) }}</span>--}}
{{--            </dd>--}}
{{--            <div class="absolute right-4 top-4 rounded-lg bg-emerald-50 p-2 group-hover:bg-emerald-100 transition-colors">--}}
{{--                 <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />--}}
{{--                </svg>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- 2. General Users -->
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-slate-200 group hover:shadow-md transition-shadow">
            <dt class="truncate text-sm font-medium text-slate-500">General Users</dt>
            <dd class="mt-2 flex items-baseline gap-2">
                <span class="text-3xl font-semibold text-slate-900">{{ number_format($userCount) }}</span>
            </dd>
            <div class="absolute right-4 top-4 rounded-lg bg-blue-50 p-2 group-hover:bg-blue-100 transition-colors">
                <svg class="h-6 w-6 text-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>
        @endcan

        @can('coupons_list')
        <!-- 3. Active Coupons -->
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-slate-200 group hover:shadow-md transition-shadow">
            <dt class="truncate text-sm font-medium text-slate-500">Active Coupons</dt>
            <dd class="mt-2 flex items-baseline gap-2">
                <span class="text-3xl font-semibold text-slate-900">{{ number_format($couponCount) }}</span>
            </dd>
            <div class="absolute right-4 top-4 rounded-lg bg-blue/10 p-2 group-hover:bg-blue/20 transition-colors">
                <svg class="h-6 w-6 text-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                </svg>
            </div>
        </div>
        @endcan

{{--        @can('blogs_list')--}}
{{--        <!-- 4. Published Blogs -->--}}
{{--        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-slate-200 group hover:shadow-md transition-shadow">--}}
{{--            <dt class="truncate text-sm font-medium text-slate-500">Published Blogs</dt>--}}
{{--            <dd class="mt-2 flex items-baseline gap-2">--}}
{{--                <span class="text-3xl font-semibold text-slate-900">{{ number_format($blogCount) }}</span>--}}
{{--            </dd>--}}
{{--            <div class="absolute right-4 top-4 rounded-lg bg-amber-50 p-2 group-hover:bg-amber-100 transition-colors">--}}
{{--                <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />--}}
{{--                </svg>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endcan--}}

{{--        @can('careers_list')--}}
{{--        <!-- 5. CV Submissions -->--}}
{{--        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-slate-200 group hover:shadow-md transition-shadow">--}}
{{--            <dt class="truncate text-sm font-medium text-slate-500">CV Submissions</dt>--}}
{{--            <dd class="mt-2 flex items-baseline gap-2">--}}
{{--                <span class="text-3xl font-semibold text-slate-900">{{ number_format($cvCount) }}</span>--}}
{{--            </dd>--}}
{{--            <div class="absolute right-4 top-4 rounded-lg bg-purple-50 p-2 group-hover:bg-purple-100 transition-colors">--}}
{{--               <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />--}}
{{--                </svg>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endcan--}}
{{--
        @can('contacts_list')
        <!-- 6. Contact Messages -->
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-sm border border-slate-200 group hover:shadow-md transition-shadow">
            <dt class="truncate text-sm font-medium text-slate-500">Contact Messages</dt>
            <dd class="mt-2 flex items-baseline gap-2">
                <span class="text-3xl font-semibold text-slate-900">{{ number_format($contactCount) }}</span>
            </dd>
            <div class="absolute right-4 top-4 rounded-lg bg-rose-50 p-2 group-hover:bg-rose-100 transition-colors">
                <svg class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
        @endcan
        --}}
    </div>

    @canany(['cache_clear', 'coupons_create', 'blogs_create'])
    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="text-base font-semibold text-slate-900">Quick Actions</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
                {{--
                @can('coupons_create')
                <a href="{{ route('admin.coupons.create') }}" class="flex flex-col items-center justify-center p-4 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white hover:border-blue/40 hover:shadow-md transition-all group">
                     <div class="h-10 w-10 text-blue bg-blue/10 rounded-lg flex items-center justify-center mb-2 group-hover:bg-blue group-hover:text-white transition-colors">
                        <svg class="h-5 w-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900">Add Coupon</span>
                </a>
                 @endcan
                --}}

{{--                @can('blogs_create')--}}
{{--                <a href="{{ route('admin.blogs.create') }}" class="flex flex-col items-center justify-center p-4 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white hover:border-amber-300 hover:shadow-md transition-all group">--}}
{{--                    <div class="h-10 w-10 text-amber-600 bg-amber-50 rounded-lg flex items-center justify-center mb-2 group-hover:bg-amber-600 group-hover:text-white transition-colors">--}}
{{--                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900">Add Blog</span>--}}
{{--                </a>--}}
{{--                @endcan--}}

                    @can('cache_clear')
                <a href="{{ route('admin.cache.clear') }}" class="flex flex-col items-center justify-center p-4 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white hover:border-rose-300 hover:shadow-md transition-all group">
                    <div class="h-10 w-10 text-rose-500 bg-rose-50 rounded-lg flex items-center justify-center mb-2 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900">Clear Cache</span>
                </a>
                    @endcan
            </div>
        </div>
    </div>
    @endcanany
</div>
</div>
@endsection

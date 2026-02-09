@extends('backend.layouts.app')
@section('title', $page_date['page_title'])
@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">{{ $page_date['page_title'] ?? 'Create User' }}</h1>
            <p class="mt-1 text-sm text-slate-500">Configure the user details below.</p>
        </div>
        @if(!empty($page_date['back_button']))
            <a href="{{ $page_date['back_button'] }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 hover:text-blue transition-all shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to List
            </a>
        @endif
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
{{--    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">--}}
        <form action="{{ $page_date['form']->action ?? '' }}" method="POST" class="">

            @csrf
            @if(strtoupper($page_date['form']->type ?? 'POST') !== 'POST')
                @method($page_date['form']->type)
            @endif

            @if ($errors->any())
                <div class="rounded-md border border-red-200 bg-red-50 p-3 text-sm text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

{{--            <div class="p-6 md:p-8 space-y-8">--}}
            <div class="p-6 md:p-8 space-y-8">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $page_date['model_data']?->name ?? '' }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue" required>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') ?? $page_date['model_data']?->email ?? '' }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue" required>
                </div>
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password"
                           class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue" {{ strtoupper($page_date['form']->type ?? 'POST') === 'POST' ? 'required' : '' }}>
                </div>
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                           class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue" {{ strtoupper($page_date['form']->type ?? 'POST') === 'POST' ? 'required' : '' }}>
                </div>
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue">
                        @foreach(($page_date['roles'] ?? []) as $role)
                            <option value="{{ is_string($role) ? $role : ($role['name'] ?? '') }}"
                                @selected(old('role')===(is_string($role) ? $role : ($role['name'] ?? '')) || $page_date['model_data']->hasRole($role))>
                                {{ ucfirst(is_string($role) ? $role : ($role['name'] ?? '')) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue">
                        @foreach(($page_date['status'] ?? ['active','inactive']) as $status)
                            <option value="{{ $status }}" @selected((old('status') ?? $page_date['model_data']?->status) === $status )>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </div>
            <!-- Footer Actions -->
            <div class="bg-slate-50 px-6 py-4 md:px-8 flex items-center justify-end gap-x-4 border-t border-slate-200">
                @if(!empty($page_date['back_button']))
                    <a href="{{ $page_date['back_button'] }}"
                       class="inline-flex justify-center rounded-lg text-slate-900 px-6 py-2.5 text-sm font-semibold shadow-sm hover:text-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue transition-all">
                        Cancel
                    </a>
                @endif

                <button type="submit"
                        class="inline-flex justify-center rounded-lg bg-blue px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue transition-all">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


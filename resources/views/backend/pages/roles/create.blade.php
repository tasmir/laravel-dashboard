@extends('backend.layouts.app')
@section('title', $page_date['page_title'])

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">{{ $page_date['page_title'] ?? 'Create Role' }}</h1>
            <p class="mt-1 text-sm text-slate-500">Configure a new role and assign permissions.</p>
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
        <form action="{{ $page_date['form']->action ?? '' }}" method="POST">
            @csrf
            @if(strtoupper($page_date['form']->type ?? 'POST') !== 'POST')
                @method($page_date['form']->type)
            @endif

            <div class="p-6 md:p-8 space-y-8">
                <!-- Errors -->
                @if ($errors->any())
                <div class="rounded-lg bg-red-50 p-4 border border-red-100">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- Main Fields -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-slate-900 mb-4 pb-2 border-b border-slate-100">Role Details</h3>
                        <label for="name" class="block text-sm font-medium leading-6 text-slate-900">Role Name <span class="text-red-500">*</span></label>
                        <div class="mt-2 text-sm">
                            <input type="text" name="name" id="name" value="{{ old('name') ?? $page_date['model_data']?->name ?? '' }}"
                                   class="block w-full text-sm rounded-lg border-0 py-2.5 px-2.5 text-slate-900 ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue sm:text-sm sm:leading-6" 
                                   placeholder="e.g. Editor" required>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-base font-semibold leading-6 text-slate-900 mb-4 pb-2 border-b border-slate-100 flex items-center justify-between">
                            <span>Assign Permissions</span>
                            <span class="text-xs font-normal text-slate-500 bg-slate-100 px-2 py-1 rounded-full">{{ count($page_date['permissions'] ?? []) }} available</span>
                        </h3>
                        
                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                @forelse(($page_date['permissions'] ?? []) as $perm)
                                    <label class="relative flex items-start p-3 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 hover:border-blue/40 cursor-pointer transition-all shadow-sm group">
                                        <div class="flex h-6 items-center">
                                            <input type="checkbox" name="permissions[]" value="{{ $perm }}" 
                                                   class="h-4 w-4 rounded border-slate-300 text-blue focus:ring-blue group-hover:border-blue/50 transition-colors"
                                                   @checked(in_array($perm, old('permissions') ?? $page_date['role_has_permission'] ?? []))>
                                        </div>
                                        <div class="ml-3 text-sm leading-6">
                                            <span class="font-medium text-slate-700 group-hover:text-blue transition-colors">{{ $perm }}</span>
                                        </div>
                                    </label>
                                @empty
                                    <div class="col-span-full py-8 text-center text-slate-500">
                                        <div class="mx-auto h-12 w-12 text-slate-300 mb-3">
                                             <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                            </svg>
                                        </div>
                                        <p>No permissions found in the system.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-slate-500">Select the permissions this role should have access to.</p>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="bg-slate-50 px-6 py-4 md:px-8 flex items-center justify-end gap-x-4 border-t border-slate-200">
                @if(!empty($page_date['back_button']))
                <a href="{{ $page_date['back_button'] }}" class="inline-flex justify-center rounded-lg text-slate-900 px-6 py-2.5 text-sm font-semibold shadow-sm hover:text-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue transition-all">
                    Cancel
                </a>
                @endif
                <button type="submit" class="inline-flex justify-center rounded-lg bg-blue px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue transition-all">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection



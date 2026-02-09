@extends('backend.layouts.app')
@section('title', $page_date['page_title'])

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">{{ $page_date['page_title'] ?? 'Roles' }}</h1>
            <p class="mt-1 text-sm text-slate-500">Define user roles and assign system capabilities.</p>
        </div>
        <div class="flex items-center gap-3">
            <form method="GET" class="relative group">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search roles..."
                       class="block w-full sm:w-64 pl-10 pr-3 py-2 rounded-lg border-slate-200 bg-white text-sm text-slate-700 placeholder-slate-400 focus:border-blue focus:ring-blue shadow-sm transition-all">
            </form>
            @if(!empty($page_date['create_button']))
                @can('roles_create')
                <a href="{{ $page_date['create_button'] }}"
                   class="inline-flex items-center gap-2 rounded-lg bg-blue px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue transition-all">
                   <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Role
                </a>
                @endcan
            @endif
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 w-16">#</th>
                        <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 w-48">Name</th>
                        <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 w-48">Count</th>
                        <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Permissions</th>
                        <th scope="col" class="px-6 py-3.5 text-right text-xs font-semibold uppercase tracking-wider text-slate-500 w-32">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse(($page_date['model_data'] ?? collect()) as $index => $role)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                {{ ($page_date['model_data']->currentPage() - 1) * $page_date['model_data']->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-slate-100 text-slate-800 border border-slate-200 shadow-sm">
                                    {{ $role->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $roleCount = $role->permissions->count();
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm   text-slate-400  italic">
                                    {{ $roleCount }} Permission{{ $roleCount > 1 ? 's' : '' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1.5">
                                    @forelse($role->permissions as $permission)
                                        <span class="inline-flex items-center rounded-full bg-blue/10 px-2 py-1 text-xs font-medium text-blue ring-1 ring-inset ring-blue/10">
                                            {{ $permission->name }}
                                        </span>
                                    @empty
                                        <span class="text-sm text-slate-400 italic">No permissions assigned</span>
                                    @endforelse
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                <div class="flex items-center justify-end gap-2">
                                    @if(!empty($page_date['loop']->edit))
                                        @can('roles_edit')
                                        <a href="{{ route($page_date['loop']->edit, $role) }}" class="p-1.5 text-slate-500 hover:text-blue hover:bg-slate-100 rounded-lg transition-colors" title="Edit">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        @endcan
                                    @endif
                                    @if(!empty($page_date['loop']->delete))
                                        @can('roles_delete')
                                        <form action="{{ route($page_date['loop']->delete, $role) }}" method="POST" onsubmit="return confirm('Delete this role?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endcan
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="h-12 w-12 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                                        <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-medium text-slate-900">No roles found</h3>
                                    <p class="mt-1 text-sm text-slate-500">{{ $page_date['empty_message'] ?? 'Start by creating a new role for your users.' }}</p>
                                    @if(!empty($page_date['create_button']))
                                        <div class="mt-4">
                                            <a href="{{ $page_date['create_button'] }}" class="text-blue hover:text-blue font-medium text-sm">
                                                Create New Role &rarr;
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(!empty($page_date['model_data']) && method_exists($page_date['model_data'], 'links'))
            <div class="border-t border-slate-200 bg-slate-50 px-6 py-4">
                {{ $page_date['model_data']->withQueryString()->links() }}
            </div>
        @endif
    </div>
</div>
@endsection



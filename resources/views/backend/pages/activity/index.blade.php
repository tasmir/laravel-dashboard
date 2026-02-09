@extends('backend.layouts.app')
@section('title', $page_date['page_title'])
@section('content')
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h3 class="text-2xl font-bold text-gray-800">{{$page_date['page_title']}}</h3>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                            @can('users_activity_list')
                            <th class="px-6 py-4">User</th>
                            @endcan
                            <th class="px-6 py-4">Action</th>
                            <th class="px-6 py-4">Description</th>
                            <th class="px-6 py-4">Subject</th>
                            <th class="px-6 py-4">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse($page_date['model_data'] as $activity)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            @can('users_activity_list')
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900 text-sm">
                                    {{ $activity->user->name ?? 'Unknown User' }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $activity->user->email ?? '' }}
                                </div>
                            </td>
                            @endcan
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <span class="px-2 py-1 bg-blue-50 text-blue rounded-md text-xs font-medium">
                                    {{ $activity->action ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $activity->description ?? $activity->title ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                @if($activity->model)
                                    <div class="flex items-center gap-1">
                                        <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-600">
                                            {{ class_basename($activity->model) }}
                                        </span>
                                        <span class="text-gray-400">#{{ $activity->model_id }}</span>
                                    </div>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span>{{ $activity->created_at->format('M d, Y') }}</span>
                                    <span class="text-xs text-gray-400">{{ $activity->created_at->format('h:i A') }}</span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500 bg-gray-50">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-base font-medium">{{$page_date['empty_message'] ?? 'No activities found'}}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if($page_date['model_data']->count() > 0)
            <div class="mt-6">
                {!! $page_date['model_data']->links('pagination::tailwind') !!}
            </div>
        @endif
    </div>
@endsection

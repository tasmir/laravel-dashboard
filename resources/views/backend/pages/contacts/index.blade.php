@extends('backend.layouts.app')
@section('title', $page_date['page_title'] ?? 'Contact Messages')
@section('content')
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">{{ $page_date['page_title'] ?? 'Contact Messages' }}</h3>
                <p class="mt-1 text-sm text-gray-500">Manage inquiries and support messages.</p>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                            <th class="px-6 py-4 w-1/4">Sender Details</th>
                            <th class="px-6 py-4 w-1/2">Message</th>
                            <th class="px-6 py-4 text-right w-1/4">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse($page_date['model_data'] as $contact)
                        <tr class="hover:bg-gray-50/50 transition-colors group relative">
                            <td class="px-6 py-4 align-top">
                                <div class="font-medium text-gray-900 text-base mb-1">{{ $contact->name }}</div>
                                <div class="text-sm text-gray-500 flex flex-col gap-1">
                                    <a href="mailto:{{ $contact->email }}" class="flex items-center gap-1.5 hover:text-blue transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        {{ $contact->email }}
                                    </a>
                                    @if($contact->phone)
                                        <span class="flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            {{ $contact->phone }}
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 align-top">
                                <div class="font-medium text-gray-900 mb-1"><span class="text-xs text-gray-400">Subject:</span> {{ $contact->subject ?? 'No Subject' }}</div>
                                <div class="text-sm text-gray-600 line-clamp-2">
                                    <span class="text-xs text-gray-400 w-full">Message:</span>
                                    <p>{{ $contact->message }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap text-right align-top relative">
                                <div>
                                    {{ $contact->created_at->format('M d, Y') }}
                                    <div class="text-xs text-gray-400">{{ $contact->created_at->format('h:i A') }}</div>
                                </div>

                                {{-- Action Buttons on Hover --}}
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-200 bg-white shadow-lg border border-gray-100 rounded-lg p-1 flex items-center gap-1 z-10">
                                    {{-- Delete Action --}}
                                    @if(isset($page_date['loop']?->delete))
                                        <form action="{{ route($page_date['loop']->delete, $contact->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-md transition-colors"
                                                    onclick="return confirm('Are you sure you want to delete this message?')" title="Delete Message">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif

                                     {{-- View Action (if available, mostly just a modal or expanded view, or just viewing row is enough) --}}
                                     {{-- For now, assuming no separate show page for contacts unless requested, but if needed we can add it --}}
                                     {{-- If no view route, user can just read from table or we can expand row. Given request just says "list page", concise table is good. --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-16 text-center text-gray-500 bg-gray-50">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="h-16 w-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900">No messages found</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ $page_date['empty_message'] ?? 'Inbox is clear.' }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if($page_date['model_data']->hasPages())
            <div class="mt-6">
                <!-- Using the new Tailwind pagination view -->
                {{ $page_date['model_data']->links('pagination.tailwind') }}
            </div>
        @endif
    </div>
@endsection

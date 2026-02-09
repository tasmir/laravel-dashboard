@extends('backend.layouts.app')
@section('title', $page_date['page_title'] ?? 'User Details')

@section('content')
    <div class="max-w-7xl mx-auto space-y-6">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l7 7a1 1 0 001.414-1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('admin.users.index') }}" class="ml-1 text-sm font-medium text-slate-500 hover:text-slate-700 md:ml-2">Users</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-sm font-medium text-slate-800 md:ml-2">Details</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                    {{ $page_date['page_title'] ?? 'User Profile' }}
                </h1>
            </div>

            <div class="flex items-center gap-2">
                @can('users_edit')
                <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center justify-center px-4 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-lg text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue transition-all duration-200">
                    <svg class="w-4 h-4 mr-2 -ml-1 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Profile
                </a>
                @endcan
                @can('users_update')
                <form action="{{ route('admin.users.update', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to change the status of this user?')">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{ $user->status === 'active' ? 'inactive' : 'active' }}">
                    <input type="hidden" name="status_change" value="true">
                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white {{ $user->status === 'active' ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue transition-all duration-200">
                        {{ $user->status === 'active' ? 'Suspend User' : 'Activate User' }}
                    </button>
                </form>
                @endcan
            </div>
        </div>


        {{-- Main Profile Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="h-32 bg-gradient-to-r from-blue to-purple-600"></div>
            <div class="px-6 pb-6">
                <div class="relative flex items-end -mt-12 mb-4">
                    <div class="relative rounded-xl border-4 border-white shadow-md bg-white p-1">
                        <img class="h-24 w-24 rounded-lg object-cover"
                             src="{{ $user?->media?->image_slug ? asset($user?->media?->image_slug) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF' }}"
                             alt="{{ $user->name }}">
                        @if($user->email_verified_at)
                            <div class="absolute -bottom-2 -right-2 bg-green-500 text-white rounded-full p-1 border-2 border-white" title="Verified Type">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        @else
                            <div class="absolute -bottom-2 -right-2 bg-yellow-500 text-white rounded-full p-1 border-2 border-white" title="Unverified">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            </div>
                        @endif
                    </div>
                    <div class="ml-4 mb-1">
                        <div class="flex items-center gap-2">
                            <h2 class="text-2xl font-bold text-slate-900">{{ $user->name }}</h2>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $user->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->status === 'active' ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        <div class="flex flex-wrap items-center text-sm text-slate-500 mt-1 gap-x-4 gap-y-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                {{ $user->email }}
                            </span>
                            @if($user->phone)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    {{ $user->phone }}
                                </span>
                            @endif
                            <span class="flex items-center capitalize">
                                <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                {{ $user->roles->pluck('name')->join(', ') ?: 'User' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Quick Stats Row --}}
                <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mt-6 pt-6 border-t border-slate-100">
                    <div class="px-4 py-2 text-center border-r border-slate-100 last:border-0">
                        <dt class="text-sm font-medium text-slate-500">User ID</dt>
                        <dd class="mt-1 text-lg font-semibold text-slate-900">#{{ $user?->id}}</dd>
                    </div>
                    <div class="px-4 py-2 text-center border-r border-slate-100 last:border-0">
                        <dt class="text-sm font-medium text-slate-500">Joined Date</dt>
                        <dd class="mt-1 text-lg font-semibold text-slate-900">{{ $user->created_at->format('M d, Y') }}</dd>
                    </div>
                    <div class="px-4 py-2 text-center border-r border-slate-100 last:border-0">
                        <dt class="text-sm font-medium text-slate-500">Tutor Status</dt>
                        <dd class="mt-1 flex justify-center">
                            @if($user->tutorProfile && $user->tutorProfile->approved_at)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue/20 text-blue">
                                    Approved
                                </span>
                            @elseif($user->tutorProfile)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @else
                                <span class="text-slate-400 font-normal">Not a Tutor</span>
                            @endif
                        </dd>
                    </div>
                    <div class="px-4 py-2 text-center border-r border-slate-100 last:border-0">
                        <dt class="text-sm font-medium text-slate-500">Rating</dt>
                        <dd class="mt-1 text-lg font-semibold text-slate-900 flex justify-center items-center gap-1">
                            @if($user->tutorProfile && $user->tutorProfile->averageRating())
                                <span>{{ number_format($user->tutorProfile->averageRating(), 1) }}</span>
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @else
                                <span class="text-slate-400 text-base font-normal">N/A</span>
                            @endif
                        </dd>
                    </div>
                    <div class="px-4 py-2 text-center border-r border-slate-100 last:border-0">
                        <dt class="text-sm font-medium text-slate-500">Reviews</dt>
                        <dd class="mt-1 text-lg font-semibold text-slate-900">{{ $user->tutorProfile ? $user->tutorProfile->totalReviews() : 0 }}</dd>
                    </div>

                    <div class="px-4 py-2 text-center border-r border-slate-100 last:border-0">
                        <dt class="text-sm font-medium text-slate-500">Last Login</dt>
                        <dd class="mt-1 text-xs text-slate-900">{{ $user->lastLogin ? $user?->lastLogin?->created_at->format('M d, Y H:i') : 'Never' }}</dd>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left Column: Sidebar Info --}}
            <div class="space-y-6">
                {{-- Address Card --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-base font-semibold leading-7 text-slate-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Location Details
                    </h3>

                    @if($user->address_line)
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Registered Address</p>
                            <p class="mt-1 text-sm text-slate-900 leading-relaxed">{{ $user->address_line }}</p>
                        </div>

                        @if($user->tutorProfile && $user->tutorProfile->locationsInfo->count() > 0)
                        <div>
                            <p class="text-sm font-medium text-slate-500">Preferred Tutoring Areas</p>
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach($user->tutorProfile->locationsInfo as $locInfo)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue/10 text-blue">
                                        {{ $locInfo->upazila?->name ?? 'Unknown' }}, {{ $locInfo->district?->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @else
                        <div class="text-center py-4">
                            <svg class="mx-auto h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p class="mt-2 text-sm text-slate-400 italic">No address information provided.</p>
                        </div>
                    @endif
                </div>

                {{-- Status & Verifications --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                     <h3 class="text-base font-semibold leading-7 text-slate-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Security & Status
                    </h3>
                    <dl class="space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                            <dt class="text-sm text-slate-500">Email Verified</dt>
                             <dd class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->email_verified_at ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                            </dd>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                            <dt class="text-sm text-slate-500">Mobile Verified</dt>
                             <dd class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->mobile_verified_at ?? false ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ $user->mobile_verified_at ?? false ? 'Verified' : 'Pending' }}
                            </dd>
                        </div>
                        @if($user->tutorProfile)
                         <div class="flex justify-between items-center pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                            <dt class="text-sm text-slate-500">Tutor Identity</dt>
                             <dd class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->tutorProfile->approved_at ? 'bg-blue/20 text-blue' : 'bg-slate-100 text-slate-800' }}">
                                {{ $user->tutorProfile->approved_at ? 'Approved' : 'Unapproved' }}
                            </dd>
                        </div>
                        @endif
                         <div class="flex justify-between items-center pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                            <dt class="text-sm text-slate-500">Account Access</dt>
                             <dd class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->status === 'active' ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->status === 'active' ? 'Active' : 'Suspended' }}
                            </dd>
                        </div>
                    </dl>
                </div>

                {{-- System Meta --}}
                {{--
                <div class="bg-slate-50 rounded-xl border border-slate-200 p-4">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-3">System Metadata</h4>
                    <div class="space-y-2 text-xs text-slate-500">
                        <div class="flex justify-between">
                            <span>User ID:</span>
                            <span class="font-mono text-slate-700">#{{ $user->id }}</span>
                        </div>
                        <div class="flex justify-between">
                             <span>Created IP:</span>
                             <span class="font-mono text-slate-700">{{ $user->ip_address ?? 'N/A' }}</span>
                        </div>
                         <div class="flex justify-between">
                             <span>Last Login:</span>
                             <span class="font-mono text-slate-700">{{ $user->lastLogin ? $user?->lastLogin?->created_at->format('M d, Y H:i') : 'Never' }}</span>
                        </div>
                    </div>
                </div>
                --}}
            </div>

            {{-- Right Column: Main Details --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Bio & About (If Tutor) --}}
                @if($user->tutorProfile && $user->tutorProfile->bio)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4">About Candidate</h3>
                    <div class="prose prose-sm prose-slate max-w-none text-slate-600">
                         {!! nl2br(e($user->tutorProfile->bio)) !!}
                    </div>
                </div>
                @endif

                {{-- Academic Background (If Tutor) --}}
                @if($user->tutorProfile && $user->tutorProfile->academic_items)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 flex items-center justify-between">
                        <span>Academic Qualifications</span>
                    </h3>
                    <div class="space-y-4">
                         @foreach($user->tutorProfile->academic_items as $item)
                            <div class="flex items-start p-4 bg-slate-50 rounded-xl border border-slate-100">
                                <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-blue/20 flex items-center justify-center text-blue">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h4 class="text-base font-medium text-slate-900">{{ $item['degree'] ?? 'Degree' }} <span class="text-slate-500 font-normal">in {{ $item['discipline'] ?? 'General' }}</span></h4>
                                    <p class="text-sm text-slate-600 mt-0.5">{{ $item['institute'] ?? 'Unknown Institute' }}</p>
                                    <div class="mt-2 flex items-center gap-4 text-xs text-slate-500">
                                        <span class="bg-white px-2 py-1 rounded border border-slate-200 shadow-sm">Year: {{ $item['year'] ?? 'N/A' }}</span>
                                        <span class="bg-white px-2 py-1 rounded border border-slate-200 shadow-sm">Result: {{ $item['result'] ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                </div>
                @endif

                {{-- Tutoring Preferences (If Tutor) --}}
                @if($user->tutorProfile && ($user->tutorProfile->preferencesSubject->count() > 0 || $user->tutorProfile->preferencesMedium->count() > 0))
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-slate-900 mb-6">Tutoring Preferences</h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                             <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-3">Preferred Subjects</h4>
                             <div class="flex flex-wrap gap-2">
                                @forelse($user->tutorProfile->preferencesSubject as $pref)
                                     <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue/10 text-blue border border-blue/20">
                                        {{ $pref->taxonomy->name ?? 'Subject' }}
                                    </span>
                                @empty
                                     <span class="text-sm text-slate-400 italic">No subjects set</span>
                                @endforelse
                             </div>
                        </div>
                        <div>
                             <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-3">Target Mediums</h4>
                             <div class="flex flex-wrap gap-2">
                                @forelse($user->tutorProfile->preferencesMedium as $pref)
                                     <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        {{ $pref->taxonomy->name ?? 'Medium' }}
                                    </span>
                                @empty
                                     <span class="text-sm text-slate-400 italic">No mediums set</span>
                                @endforelse
                             </div>
                        </div>
                         <div class="md:col-span-2">
                             <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-3">Preferred Levels</h4>
                             <div class="flex flex-wrap gap-2">
                                @forelse($user->tutorProfile->preferencesLevel as $pref)
                                     <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-orange-50 text-orange-700 border border-orange-100">
                                        {{ $pref->taxonomy->name ?? 'Level' }}
                                    </span>
                                @empty
                                     <span class="text-sm text-slate-400 italic">No levels set</span>
                                @endforelse
                             </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Subscriptions History (General) --}}
                @if($user->subscriptions->count() > 0)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 flex items-center justify-between">
                        <span>Subscription History</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue/20 text-blue">
                            {{ $user->subscriptions->count() }} Records
                        </span>
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Plan</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Dates</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-200">
                                @foreach($user->subscriptions->take(5) as $sub)
                                <tr>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ $sub->package->title ?? 'Unknown Plan' }}
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap text-xs text-slate-500">
                                        <div class="font-medium text-slate-700">{{ $sub->started_at ? $sub->started_at->format('M d, Y') : 'N/A' }}</div>
                                        <div class="text-[10px] text-slate-400">Expires: {{ $sub->expires_at ? $sub->expires_at->format('M d, Y') : 'N/A' }}</div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        @if($sub->status == 'active' && $sub->expires_at > now())
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                        @elseif($sub->status == 'active')
                                             <span class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-800 bg-gray-100 rounded-full">Expired</span>
                                        @else
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full capitalize">{{ $sub->status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-slate-500">
                                        {{ number_format($sub->price, 2) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                {{-- Career Application (General) --}}
                 @if($user->application)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4">Career Application</h3>
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div>
                            <h4 class="text-base font-medium text-slate-900">Applied for {{ $user->application->job_title ?? 'Position' }}</h4>
                            <p class="text-sm text-slate-500 mt-1">Submitted on {{ $user->application->created_at->format('M d, Y') }}</p>
                        </div>
                        <a href="{{ route('admin.careers.show', $user->application->id) }}" class="text-blue hover:text-blue text-sm font-medium">
                            View Application &rarr;
                        </a>
                    </div>
                </div>
                @endif

                {{-- If no detailed data is available --}}
                @if(!$user->tutorProfile && !$user->application && $user->subscriptions->count() == 0)
                     <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l5.414 5.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-slate-900">No additional records</h3>
                        <p class="mt-1 text-sm text-slate-500">This user has minimal associated data (No subscriptions, applications, or tutor profile).</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

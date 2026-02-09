<div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto bg-slate-900 border-r border-slate-800 h-full">
    <!-- Brand -->
    <div class="flex items-center px-6 mb-8">
        <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-3 group">
{{--            <div class="bg-blue rounded-lg p-1.5 shadow-lg shadow-blue/30 group-hover:bg-blue transition-all">--}}

{{--                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                    preserveAspectRatio="xMidYMid meet">--}}
{{--                    <image href="{{ asset('img/outline.png') }}" width="24" height="24" x="0" y="0" />--}}
{{--                </svg>--}}

{{--            </div>--}}
            <span class="text-xl font-bold text-white tracking-tight">{{config('app.name')}}</span>
        </a>
    </div>

    <nav class="flex-1 px-4 space-y-8">
        <!-- Dashboard -->
        <div>
            <a href="{{ url('/home') }}"
                class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->is('home*') || request()->is('admin') || request()->is('admin/dashboard*') ? 'bg-blue text-white shadow-md shadow-blue/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="mr-3 flex-shrink-0 h-5 w-5 {{ request()->is('home*') || request()->is('admin') || request()->is('admin/dashboard*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
        </div>

        {{--
        <!-- Content Management -->
        @canany(['careers_list', 'blogs_list', 'contacts_list', 'mediums_list', 'levels_list', 'subjects_list',
        'coupons_list'])
        <div>
            <h3 class="px-3 text-xs font-semibold text-gray-300/90 uppercase tracking-wider mb-2">Academics</h3>
            <div class="space-y-1">
                @can('mediums_list')
                <a href="{{ route('admin.taxonomies.index') }}?type=medium"
                    class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                       {{ request()->is('admin/taxonomies*') && request()->query('type') == 'medium' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/taxonomies*') && request()->query('type') == 'medium' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Mediums
                </a>
                @endcan
                @can('levels_list')
                <a href="{{ route('admin.taxonomies.index') }}?type=level"
                    class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                       {{ request()->is('admin/taxonomies*') && request()->query('type') == 'level' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/taxonomies*') && request()->query('type') == 'level' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Classes / Levels
                </a>
                @endcan
                @can('subjects_list')
                <a href="{{ route('admin.taxonomies.index') }}?type=subject"
                    class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                       {{ request()->is('admin/taxonomies*') && request()->query('type') == 'subject' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/taxonomies*') && request()->query('type') == 'subject' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Subjects
                </a>
                @endcan


            </div>
        </div>

        @endcanany
        --}}

        {{-- Content--}}
        @canany(['contacts_list', 'blogs_list'])
            <div>
{{--                <h3 class="px-3 text-xs font-semibold text-gray-300/90 uppercase tracking-wider mb-2">Content</h3>--}}
                <div class="space-y-1">
{{--
                    @can('contacts_list')
                        <a href="{{ route('admin.contacts.index') }}"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                       {{ request()->is('admin/contacts*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/contacts*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Form Submission
                        </a>
                    @endcan
--}}
                    {{-- @can('blogs_list')--}}
                    {{-- <a href="{{ route('admin.blogs.index') }}" --}} {{--
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200--}}
                        {{--                       {{ request()->is('admin/blogs*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">--}}
                        {{-- <svg--}} {{--
                            class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/blogs*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                            --}} {{-- fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                            {{--
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" --}} {{--
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            --}}
                            {{-- </svg>--}}
                            {{-- Blog--}}
                            {{-- </a>--}}
                    {{-- @endcan--}}


                </div>
            </div>
        @endcanany


        <!-- Hall Booking -->
        @canany(['venues_list', 'halls_list', 'time_slots_list', 'bookings_list', 'coupons_list'])
            <div>
                <h3 class="px-3 text-xs font-semibold text-gray-300/90 uppercase tracking-wider mb-2">Hall Booking</h3>
                <div class="space-y-1">
                    {{--
                    @can('venues_list')
                    <a href="{{ route('admin.venues.index') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/venues*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Venues
                    </a>
                    @endcan
                    @can('halls_list')
                    <a href="{{ route('admin.halls.index') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/halls*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Halls
                    </a>
                    @endcan
                    @can('time_slots_list')
                    <a href="{{ route('admin.time-slots.index') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/time-slots*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Time Slots
                    </a>
                    @endcan
                    @can('amenities_list')
                    <a href="{{ route('admin.amenities.index') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/amenities*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        Amenities
                    </a>
                    @endcan
                    @can('bookings_list')
                    <a href="{{ route('admin.bookings.index') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/bookings*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Bookings
                    </a>
                    @endcan

                    @can('bookings_edit')
                    <a href="{{ route('admin.reschedule-requests.index') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/reschedule-requests*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Reschedule Requests
                        @php
                        $pendingCount = \App\Models\BookingRescheduleRequest::where('status', 'pending')->count();
                        @endphp
                        @if($pendingCount > 0)
                        <span
                            class="ml-auto inline-block py-0.5 px-2 text-xs font-bold rounded-full bg-red-500 text-white">{{
                            $pendingCount }}</span>
                        @endif
                    </a>
                    @endcan
                    --}}
                    {{--
                    @can('coupons_list')
                        <a href="{{ route('admin.coupons.index') }}"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                       {{ request()->is('admin/coupons*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/coupons*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                            Coupons
                        </a>
                    @endcan
                    --}}
                </div>
            </div>
        @endcanany


        <!-- Management -->
        @canany(['careers_list', 'blogs_list', 'contacts_list', 'mediums_list', 'levels_list', 'subjects_list', 'coupons_list'])
            <div>
                <h3 class="px-3 text-xs font-semibold text-gray-300/90 uppercase tracking-wider mb-2">Management</h3>
                <div class="space-y-1">
                    {{--
                    <!--Orders Menu -->
                    @can('orders_list')
                    <a href="{{ route('admin.orders.index') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                   {{ request()->is('admin/orders*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/orders*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Orders
                    </a>
                    @endcan
                    <!--Transactions Menu -->
                    @can('transactions_list')
                    <a href="{{ route('admin.transactions.index') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                   {{ request()->is('admin/transactions*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/transactions*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Transactions
                    </a>
                    @endcan
                    --}}
                    {{--
                    @can('mediums_list')
                    <a href="{{ route('admin.taxonomies.index') }}?type=medium"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/taxonomies*') && request()->query('type') == 'medium' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/taxonomies*') && request()->query('type') == 'medium' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Mediums
                    </a>
                    @endcan
                    @can('levels_list')
                    <a href="{{ route('admin.taxonomies.index') }}?type=level"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/taxonomies*') && request()->query('type') == 'level' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/taxonomies*') && request()->query('type') == 'level' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        Classes / Levels
                    </a>
                    @endcan
                    @can('subjects_list')
                    <a href="{{ route('admin.taxonomies.index') }}?type=subject"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                               {{ request()->is('admin/taxonomies*') && request()->query('type') == 'subject' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/taxonomies*') && request()->query('type') == 'subject' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Subjects
                    </a>
                    @endcan
                    --}}

                </div>
            </div>

        @endcanany


        <!-- System -->
        @canany(['files_list', 'users_list', 'roles_list', 'permissions_list', 'clear_cache', 'users_activity_list', 'own_activity_list'])
            <div>
                <h3 class="px-3 text-xs font-semibold text-gray-300/90 uppercase tracking-wider mb-2">System</h3>
                <div class="space-y-1">
                    @if (Route::has('admin.files.index'))
                        @can('files_list')
                            <a href="{{ route('admin.files.index') }}"
                                class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                           {{ request()->is('admin/files*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/files*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Media Files
                            </a>
                        @endcan
                    @endif

                    @can('users_list')
                        <a href="{{ route('admin.users.index') }}?role=User"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                       {{ request()->is('admin/users*') && request()->query('role') == 'User' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/users*') && request()->query('role') == 'User' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Users
                        </a>
                    @endcan
                    {{--
                    @can('tutors_list')
                    <a href="{{ route('admin.users.index') }}?role=Tutor"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                           {{ request()->is('admin/users*') && request()->query('role') == 'Tutor' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                        <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/users*') && request()->query('role') == 'Tutor' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                        Tutor
                    </a>
                    @endcan
                    --}}
                    @can('admins_list')
                        <a href="{{ route('admin.users.index') }}?role=Admin"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                       {{ request()->is('admin/users*') && request()->query('role') == 'Admin' ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/users*') && request()->query('role') == 'Admin' ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Admin
                        </a>
                    @endcan

                    @can('roles_list')
                        <a href="{{ route('admin.roles.index') }}"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                       {{ request()->is('admin/roles*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/roles*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Roles
                        </a>
                    @endcan
                    @can('permissions_list')
                        <a href="{{ route('admin.permissions.index') }}"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                       {{ request()->is('admin/permissions*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/permissions*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            Permissions
                        </a>
                    @endcan

                        @if (Route::has('admin.activities.index'))
                    @canany(['users_activity_list', 'own_activity_list'])
                        <a href="{{ route('admin.activities.index') }}"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                       {{ request()->is('admin/activities*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/activities*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            User Activity
                        </a>
                    @endcanany
                        @endif
                    @can('clear_cache')
                        <a href="{{ route('admin.cache.clear') }}"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200
                                   {{ request()->is('admin/cache*') ? 'bg-blue text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <svg class="mr-3 flex-shrink-0 h-5 w-5 transition-colors {{ request()->is('admin/cache*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Clear Cache
                        </a>
                    @endcan
                </div>
            </div>
        @endcanany

    </nav>
</div>

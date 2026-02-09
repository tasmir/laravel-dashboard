{{--<div class="hidden sm:flex items-center gap-4">--}}
    @guest
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}"
               class=" items-center px-5 py-2.5  border-transparent text-sm font-bold rounded-full text-white bg-gradient-to-r from-primary to-primary shadow-md hover:shadow-lg hover:shadow-blue/30 transition-all duration-300 transform hover:-translate-y-0.5">
                Login
            </a>
{{--            <a href="{{ route('login') }}"--}}
{{--               class="text-sm font-semibold text-gray-600 hover:text-primary px-4 py-2 rounded-full hover:bg-gray-50 transition-all duration-300">--}}
{{--                Login--}}
{{--            </a>--}}

        </div>
    @else
        <div class="flex items-center gap-4">
            <!-- Notification Dropdown -->
            <div class="relative group/notification">
                <button type="button"
                        class="relative p-2 text-gray-400 hover:text-primary hover:bg-blue/10 rounded-full transition-all duration-300 focus:outline-none"
                        onclick="toggleNotification(this)"
                        id="notificationBtn">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>

                    @if(auth()->user()?->unreadNotifications->count() > 0)
                        <span class="absolute top-2 right-2 h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white animate-pulse"></span>
                    @endif
                </button>

                <div class="absolute right-0 mt-4 w-80 bg-white border border-gray-100/50 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] hidden z-50 overflow-hidden transform origin-top-right transition-all duration-200 backdrop-blur-xl" id="notificationCenter">
                    <div class="px-5 py-4 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                        <h3 class="text-sm font-bold text-gray-900">Notifications</h3>
                        @if(auth()->user()?->unreadNotifications->count() > 0)
                            <span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary text-[10px] font-bold">{{ auth()->user()->unreadNotifications->count() }} New</span>
                        @endif
                    </div>
                    <div class="max-h-[24rem] overflow-y-auto custom-scrollbar">
                        @forelse(auth()->user()?->unreadNotifications as $notification)
                            <a href="{{$notification->data['url']}}" class="block px-5 py-4 hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-0 relative group">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 mt-1.5">
                                        <div class="h-2 w-2 rounded-full bg-primary ring-4 ring-blue/10"></div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900 group-hover:text-primary transition-colors leading-snug">{{$notification->data['title']}}</p>
                                        <p class="text-xs text-gray-400 mt-1 font-medium">{{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="px-5 py-10 text-center flex flex-col items-center">
                                <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 mb-3">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-900">All caught up!</p>
                                <p class="text-xs text-gray-500 mt-1">No new notifications at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                    @if(auth()->user()?->unreadNotifications->count() > 0)
                        <a href="{{ route('chat.mark-all-as-read') }}" class="block px-5 py-3 text-xs font-bold text-center text-primary bg-gray-50/50 hover:bg-gray-100 transition-colors border-t border-gray-50">
                            Mark all as read
                        </a>
                    @endif
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="relative group/user">
                <button type="button" class="flex items-center gap-2 pl-1 pr-3 py-1 rounded-full border border-gray-200 hover:border-primary hover:bg-white/80 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary/20 bg-white" onclick="toggleNotification(this)">
                    <div class="h-8 w-8 rounded-full bg-gradient-to-br from-primary to-blue text-white flex items-center justify-center font-bold text-sm shadow-sm">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <span class="text-sm font-semibold text-gray-700 max-w-[100px] truncate hidden md:block">{{ auth()->user()->name }}</span>
                    <svg class="h-4 w-4 text-gray-400 group-hover/user:text-primary transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div class="absolute right-0 mt-4 w-64 bg-white border border-gray-100/50 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] hidden group-hover/user:block1 z-50 overflow-hidden transform origin-top-right transition-all duration-200 backdrop-blur-xl">
                    <div class="px-5 py-4 border-b border-gray-50 bg-gray-50/50">
                        <p class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-1">Signed in as</p>
                        <p class="text-sm font-bold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 rounded-lg hover:bg-blue/10 hover:text-primary transition-colors group">
                                            <span class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-white flex items-center justify-center text-gray-500 group-hover:text-primary transition-colors shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                            </span>
                            Dashboard
                        </a>
                        <div class="h-px bg-gray-100 my-1 mx-2"></div>
                        <a href="{{ route('logout') }}"
                           class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 transition-colors group"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="w-8 h-8 rounded-lg bg-red-50 group-hover:bg-white flex items-center justify-center text-red-500 transition-colors shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            </span>
                            Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                    </div>
                </div>
            </div>
        </div>
    @endguest
{{--</div>--}}

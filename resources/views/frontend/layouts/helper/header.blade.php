@php
    $route_name = \Illuminate\Support\Facades\Route::currentRouteName();
    $main_menu = [
//        [
//            'title' => 'About',
//            'url' => route('about'),
//            'route_name' => 'about',
//        ],
//        [
//            'title' => 'Calendar',
//            'url' => route('calendar.global'),
//            'route_name' => 'calendar.global',
//        ],[
//            'title' => 'Venues',
//            'url' => route('venues.index'),
//            'route_name' => 'venues.index',
//        ],[
//            'title' => 'Halls',
//            'url' => route('halls.index'),
//            'route_name' => 'halls.index',
////        ],[
////            'title' => 'Events',
////            'url' => route('calendar.global'),
////            'route_name' => 'calendar.global',
//        ],[
//            'title' => 'Contact',
//            'url' => route('contact'),
//            'route_name' => 'contact',
//        ],
    ];
@endphp

<header
    class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-blue/10 transition-all duration-300 transform"
    id="main-header">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex justify-between w-full items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="group flex items-center gap-2">
                        <img src="{{asset('img/logo-new.png')}}" title="{{config('app.name')}} Logo" alt="{{config('app.name')}}"
                             class="w-70 transition-transform duration-300 group-hover:scale-105">
                        {{--                        <h2 class="text-2xl font-bold text-primary">HallBooking</h2>--}}
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden sm:ml-8 sm:flex sm:space-x-1">
                    @foreach($main_menu as $item)
                        <a href="{{$item['url']}}"
                           class="relative inline-flex items-center px-4 py-2 text-sm font-semibold rounded-full transition-all duration-300
                           {{ $route_name == $item['route_name']
                               ? 'text-primary bg-white/80 shadow-sm ring-1 ring-primary/10'
                               : 'text-secondary hover:text-primary hover:bg-white/50 hover:shadow-sm'
                           }}">
                            {{$item['title']}}
                        </a>
                    @endforeach
                </div>

                <div class="hidden sm:flex items-center gap-4" id="header-dynamic"></div>


                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button"
                            class="inline-flex items-center justify-center p-2 rounded-xl text-secondary hover:text-primary hover:bg-primary/5 focus:outline-none transition-colors border border-transparent hover:border-primary/20"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div class="hidden sm:hidden border-t border-gray-100 bg-white" id="mobile-menu">
        <div class="pt-2 pb-4 space-y-1 px-3">
            @foreach($main_menu as $item)
                <a href="{{$item['url']}}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-base font-semibold transition-all duration-200
                   {{ $route_name == $item['route_name']
                       ? 'bg-primary/5 text-primary shadow-sm'
                       : 'text-secondary hover:bg-gray-50 hover:text-primary'
                   }}">
                    {{$item['title']}}
                </a>
            @endforeach

            <div class="border-t border-dashed border-gray-200 my-3 pt-3">
                @guest
                    <a href="{{ route('login') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-base font-medium text-secondary hover:bg-gray-50 hover:text-primary transition-colors">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Login
                    </a>
                @else
                    <div class="px-4 py-2">
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="h-10 w-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-lg shadow-sm">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-secondary">{{auth()->user()->name}}</p>
                                <p class="text-xs text-gray-500">Logged in</p>
                            </div>
                        </div>

                        <a href="{{ route('home') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-secondary hover:bg-primary/5 hover:text-primary transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{ route('logout') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-red-600 hover:bg-red-50 transition-colors"
                           onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Logout
                        </a>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST"
                              class="hidden">@csrf</form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</header>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('/header/dynamic')
                .then(res => res.text())
                .then(html => {
                    document.getElementById('header-dynamic').innerHTML = html;
                });

            const button = document.querySelector('button[aria-controls="mobile-menu"]');
            const menu = document.getElementById('mobile-menu');

            if (button && menu) {
                button.addEventListener('click', () => {
                    const isExpanded = button.getAttribute('aria-expanded') === 'true';
                    button.setAttribute('aria-expanded', !isExpanded);
                    menu.classList.toggle('hidden');
                });
            }

            // Add scroll effect for sticky header
            const header = document.getElementById('main-header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 10) {
                    header.classList.add('shadow-md', 'bg-white/95');
                    header.classList.remove('bg-white/80', 'border-b', 'border-blue/10');
                } else {
                    header.classList.remove('shadow-md', 'bg-white/95');
                    header.classList.add('bg-white/80', 'border-b', 'border-blue/10');
                }
            });
        });

        function toggleNotification(button) {
            const container = button.nextElementSibling;
            container.classList.toggle('hidden');
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function (e) {
            const notificationBtn = document.getElementById('notificationBtn');
            const notificationCenter = document.getElementById('notificationCenter');

            if (notificationBtn && notificationCenter) {
                if (!notificationBtn.contains(e.target) && !notificationCenter.contains(e.target)) {
                    notificationCenter.classList.add('hidden');
                }
            }
        });
    </script>
@endpush

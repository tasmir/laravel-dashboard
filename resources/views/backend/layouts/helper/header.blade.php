<div class="w-full px-4 sm:px-6 lg:px-8 bg-white/80 backdrop-blur-md border-b border-slate-200">
    <div class="flex items-center justify-between h-16">
        <div class="flex items-center gap-4">
            <button type="button" class="md:hidden inline-flex items-center justify-center rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue transition-colors" aria-label="Open sidebar">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h2 class="text-xl font-bold text-slate-800 tracking-tight">Control Panel</h2>
        </div>
        <div class="flex items-center gap-4">
            @auth
                <div class="flex items-center gap-3 pl-4 sm:border-l sm:border-slate-200">
                     <div class="hidden sm:flex flex-col items-end">
                        <span class="text-sm font-semibold text-slate-700 leading-tight">{{ Auth::user()->name }}</span>
                    </div>

                    <div class="h-8 w-8 rounded-full bg-blue flex items-center justify-center text-white font-bold text-sm ring-2 ring-white shadow-sm">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="ml-1">
                        @csrf
                        <button class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 shadow-sm hover:bg-red-50 hover:text-red-600 hover:border-red-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</div>


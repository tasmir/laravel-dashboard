<div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto bg-slate-900 border-r border-slate-800 h-full">
    <!-- Brand -->
    <div class="flex items-center px-6 mb-8">
        <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-3 group">
            <span class="text-xl font-bold text-white tracking-tight">{{config('app.name')}}</span>
        </a>
    </div>

    <x-sidebar-manager-nav />
</div>
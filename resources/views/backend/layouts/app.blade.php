<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Control Panel')</title>

{{--    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">--}}
{{--    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

    <!-- Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>
<body class="h-full antialiased text-slate-900">
    <div id="app" class="h-full flex overflow-hidden">
        <!-- Sidebar -->
        <aside class="hidden md:flex w-72 flex-col fixed md:relative z-20 h-full bg-slate-900 text-white border-r border-slate-800 shadow-xl transition-all duration-300">
            @includeIf('backend.layouts.helper.sidebar')
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-slate-50">
            <header class="sticky top-0 z-10 w-full">
                @includeIf('backend.layouts.helper.header')
            </header>

            <main class="flex-1 overflow-y-auto p-4 md:p-8 scroll-smooth">
                @yield('content')
            </main>
        </div>
    </div>
@includeIf('media-manager::partials.manager-scripts')
@stack('script')
</body>
</html>

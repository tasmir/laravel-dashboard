<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    @yield('seo')
{{--    <title>{{ config('app.name', 'TutorBD') }}</title>--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-roboto antialiased bg-gray-50">
{{--@includeIf('frontend.layouts.helper.header')--}}


<!-- Page Content -->
<main class="min-h-screen">
    @yield('content')
</main>

<!-- Footer -->
@includeIf('frontend.layouts.helper.footer')

@stack('scripts')
{{--
// Script
@if(auth()->check())
    <script type="module">
        const userId = {{ auth()->id() }};
        const notificationCallback = (notification) => {

            if (notification.type === 'App\\Notifications\\NewMessageNotification') {
                document.getElementById('notificationCenter').insertAdjacentHTML('afterbegin', `<a href="${notification.url}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex w-full justify-between content-center"><span class="truncate w-45">${notification.title}</span><span class="h-1 w-1 rounded-full bg-primary ring-2 ring-white"></span></a>`);

                const notiBtn = document.getElementById('notificationBtn');
                if (!notiBtn.querySelector('.notification-indicator')) {
                    const span = document.createElement('span');
                    span.className = 'absolute -top-0.5 -right-0.5 h-1.5 w-1.5 rounded-full bg-[#01cf01] ring-2 ring-white notification-indicator'
                    notiBtn.appendChild(span);
                }
            }
        }
        window.Echo.private(`App.Models.User.${userId}`).notification(notificationCallback);


    </script>
@endif
--}}
</body>
</html>

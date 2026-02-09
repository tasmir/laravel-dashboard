@extends('frontend.layouts.app')


@section('content')

<h1>Home Page</h1>

@endsection

@push('styles')
    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Optional: Smooth scrolling for the whole page */
        html {
            scroll-behavior: smooth;
        }
    </style>
@endpush


@push('scripts')
    <script>

    </script>

@endpush

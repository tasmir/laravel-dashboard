@extends('frontend.layouts.app')

@includeIf('frontend.layouts.partial.seo', [
        'title' => 'Contact HallBooking | Get Support & Enquiries',
        'description' => 'Contact HallBooking for support, enquiries, or partnership opportunities. We’re here to help customers and venue owners across Bangladesh.',
    ])

@section('content')
    {{-- Hero Section --}}
    @includeIf('frontend.layouts.partial.hero', [
        'hero_bg_image' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?q=80&w=2069&auto=format&fit=crop',
        'hero_before_title' => 'Get in Touch',
        'hero_title' => '<span class="text-transparent bg-clip-text bg-gradient-to-r from-golden to-amber-500 relative">Contact</span> The Pavilion London',
        'hero_subtitle' => 'We’re here to help you plan your perfect event.',
    ])
    {{--
    <section class="relative bg-slate-900 overflow-hidden py-32 lg:py-48">
        <div class="absolute inset-0 z-0">
             <img src="{{ asset('img/banner.webp') }}" alt="Contact Hero" class="w-full h-full object-cover opacity-100">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/50 to-slate-900/10"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent/90 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 border border-white/10 backdrop-blur-md text-xs font-bold uppercase tracking-widest text-golden mb-6 transition-all hover:bg-white/20">
                Get in Touch
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6 opacity-0 animate-[fadeInUp_0.8s_ease-out_forwards]">
                Contact <span class="text-transparent bg-clip-text bg-gradient-to-r from-golden to-amber-500">HallBooking</span>
            </h1>
            <p class="mt-6 text-xl text-white/80 max-w-2xl  font-light leading-relaxed opacity-0 animate-[fadeInUp_0.8s_ease-out_0.2s_forwards]">
                Have questions regarding finding a tutor, registering as a mentor, or using our platform?
                We are here to help.
            </p>
        </div>
    </section>
    --}}

    <div class="bg-gray-50 py-16 sm:py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                {{-- Contact Info Card --}}
                <div class="lg:col-span-1 space-y-8">
                    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-white/50 p-8 transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <h2 class="text-2xl font-bold text-primary mb-6">Get in touch</h2>
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            Reach out to us via email, phone or by filling in the form.
                            Our team usually responds within 1–2 business days.
                        </p>

                        <div class="space-y-6">
                            {{-- Email --}}
                            <div class="flex items-start gap-4 group">
                                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-secondary/5 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 5.75h16.5v12.5H3.75z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m4 6 8 6 8-6" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-secondary">Email</p>
                                    <a href="mailto:info@nextstageevents.co.uk" class="text-gray-500 hover:text-primary transition-colors">info@nextstageevents.co.uk</a>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="flex items-start gap-4 group">
                                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-secondary/5 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 4.5h3l2 4-2.25 1.5a11.25 11.25 0 005.5 5.5L15 17.25l4 2v3A2.25 2.25 0 0116.75 25 15.75 15.75 0 013.75 12.25 2.25 2.25 0 016 10h0" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-secondary">Phone</p>
{{--                                    <p class="text-slate-500">{{env('APP_SUPPORT_CALL')}}</p>--}}
                                    <a href="tel:+4402071012511" class="text-gray-500 hover:text-primary transition-colors">+44 020 7101 2511</a>
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="flex items-start gap-4 group">
                                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-secondary/5 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 12.75a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 9.75c0 5.25-7.5 10.5-7.5 10.5S4.5 15 4.5 9.75a7.5 7.5 0 1115 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-secondary">Address</p>
                                    <p class="text-gray-500">Unit F3, 88 MileEnd Road, E1 4UN</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-8 border-t border-gray-100">
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Business Hours</p>
                            <p class="mt-2 text-sm text-gray-600 font-medium">Monday - Friday, 09:00 AM – 05:00 PM</p>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-white/50 p-8 lg:p-10">
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-secondary mb-2">Send us a message</h2>
                            <p class="text-gray-600">Share a few details and we’ll respond by email.</p>
                        </div>

                        {{-- Alerts --}}
                        @if(session('success'))
                            <div class="mb-6 bg-green-50 border border-green-100 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3 animate-[fadeIn_0.5s_ease-out]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="text-sm font-medium">{{ session('success') }}</span>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="mb-6 bg-red-50 border border-red-100 text-red-700 px-4 py-3 rounded-xl flex items-center gap-3 animate-[fadeIn_0.5s_ease-out]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="text-sm font-medium">{{ session('error') }}</span>
                            </div>
                        @endif

                        <form method="POST" action="#" class="space-y-6">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Your Name</label>
                                    <input type="text" id="name" name="name" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-300 py-3 px-4 shadow-sm" placeholder="John Doe" required>
                                </div>
                                <div class="group">
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-300 py-3 px-4 shadow-sm" placeholder="john@example.com" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number <span class="text-gray-400 font-normal">(Optional)</span></label>
                                    <input type="tel" id="phone" name="phone" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-300 py-3 px-4 shadow-sm" placeholder="+44 XXX XXXX XXXX">
                                </div>
                                <div class="group">
                                    <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                                    <input type="text" id="subject" name="subject" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-300 py-3 px-4 shadow-sm" placeholder="How can we help?" required>
                                </div>
                            </div>

                            <div class="group">
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                                <textarea id="message" name="message" rows="5" class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-300 py-3 px-4 shadow-sm resize-none" placeholder="Write your message here..." required></textarea>
                            </div>

                            <div class="flex items-center justify-between pt-4">
                                <p class="text-xs text-gray-500 max-w-xs">
                                    By sending message, you agree to our <a href="{{route('terms-and-conditions')}}" class="underline hover:text-primary">Terms of Service</a> and <a href="{{route('privacy-policy')}}" class="underline hover:text-primary">Privacy Policy</a>.
                                </p>
                                <button type="submit" class="inline-flex items-center justify-center px-8 py-3.5 rounded-xl bg-primary text-white font-bold tracking-wide shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-0.5 hover:bg-primary/90 transition-all duration-300">
                                    Send Message
                                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



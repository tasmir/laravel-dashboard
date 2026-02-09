@php
//    $bg_image = $hero_bg_image ?? asset('img/banner.webp');
    $bg_image = $hero_bg_image ?? null;
    $hero_title = $hero_title ?? 'Contact TutorBD';
    $extra = $extra ?? '';
@endphp

<section class="relative bg-secondary overflow-hidden py-32 lg:py-48">
    {{-- Background Effects --}}
    <div class="absolute inset-0 z-0">
        @if($bg_image)
        <img src="{{ $bg_image }}" alt="Contact Hero" class="w-full h-full object-cover opacity-100">
        @endif
        {{--             <div class="absolute inset-0 bg-gradient-to-b from-slate-900/90 via-slate-900/80 to-slate-900/90"></div>--}}
        {{--             <div class="absolute inset-0 bg-gradient-to-b from-slate-900/90 via-slate-900/80 to-slate-900/90"></div>--}}
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/50 to-slate-900/10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent/90 to-transparent"></div>

        {{--            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue/20 rounded-full blur-3xl animate-pulse mix-blend-screen"></div>--}}
        {{--            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-blue/20 rounded-full blur-3xl mix-blend-screen"></div>--}}
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
        @if(isset($hero_before_title))
            {{--            <span class="tracking-[0.3em] inline-flex items-center px-3 py-1 rounded-full bg-white/10 border border-white/10 backdrop-blur-md text-xs font-bold uppercase  text-blue/40 mb-6 transition-all hover:bg-white/20 ">{{ $hero_before_title }}</span>--}}
            <span
                class="tracking-[0.3em] inline-flex items-center px-3 py-1 rounded-full bg-white/10 border border-white/10 backdrop-blur-md text-xs font-bold uppercase  text-white mb-6 transition-all hover:bg-white/20 ">{{ $hero_before_title }}</span>
        @endif

        @if(isset($hero_title))
            <h1 class="text-4xl md:text-5xl lg:text-6xl max-w-2xl font-extrabold text-white tracking-tight mb-6 opacity-0 animate-[fadeInUp_0.8s_ease-out_forwards]">{!! $hero_title !!}</h1>
        @endif

        @if(isset($hero_subtitle))
            {{--            <p class="mt-6 text-xl text-white/80 max-w-2xl  font-light leading-relaxed opacity-0 animate-[fadeInUp_0.8s_ease-out_0.2s_forwards]">--}}
            <p class="mt-6 text-xl text-white/80 max-w-2xl  font-light leading-relaxed opacity-0 animate-[fadeInUp_0.8s_ease-out_0.2s_forwards]">
                {!! $hero_subtitle !!}
            </p>
        @endif

        @if($extra == 'career')
            <div class="flex flex-wrap  gap-4  mt-4 opacity-0 animate-[fadeInUp_0.8s_ease-out_0.5s_forwards]">
                <div class="flex items-center gap-2 bg-white/80 backdrop-blur-sm rounded-full px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Remote & On-site</span>
                </div>
                <div class="flex items-center gap-2 bg-white/80 backdrop-blur-sm rounded-full px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Flexible Hours</span>
                </div>
                <div class="flex items-center gap-2 bg-white/80 backdrop-blur-sm rounded-full px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Competitive Remuneration</span>
                </div>
            </div>
        @elseif($extra == 'terms')
            <p class="mt-6 text-xl text-white/80 max-w-2xl  font-light leading-relaxed opacity-0 animate-[fadeInUp_0.8s_ease-out_0.2s_forwards]">
                Last Updated: {{ date('F d, Y', strtotime($last_updated)) }}
            </p>
        @elseif($extra == 'privacy')
{{--            <p class="mt-6 text-xl text-white/80 max-w-2xl  font-light leading-relaxed opacity-0 animate-[fadeInUp_0.8s_ease-out_0.2s_forwards]">--}}
{{--                By using HallBooking, you agree to the terms described in this Privacy Policy.--}}
{{--            </p>--}}
            <p class="mt-6 text-xl text-white/80 max-w-2xl  font-light leading-relaxed opacity-0 animate-[fadeInUp_0.8s_ease-out_0.2s_forwards]">
                Last Updated: {{ date('F d, Y', strtotime($last_updated)) }}
            </p>
        @elseif($extra == 'singleBlog')
                <div class="mt-4 flex flex-wrap items-center  gap-4 text-sm font-medium text-white/80">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-white">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        </div>
                        <span>{{ $blog->author ?? 'TutorBD Team' }}</span>
                    </div>
                    <span class="hidden sm:inline w-1 h-1 bg-white/40 rounded-full"></span>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        <span>{{ $blog->published_on ? date('F j, Y', strtotime($blog->published_on)) : 'Draft' }}</span>
                    </div>
                </div>
        @endif
    </div>
</section>

@push('styles')
    <style>
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
    </style>
@endpush

<!-- Footer -->
<!-- Footer -->
<footer class="bg-secondary text-blue-100 font-sans relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-blue-900/20 to-transparent"></div>
    {{-- Decorative Background Glow --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto pt-20 pb-10 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-16">
            <!-- Brand Column -->
            <div class="col-span-1 md:col-span-2 lg:col-span-5 space-y-8 pr-0 lg:pr-12">
                <div class="flex items-center">
                    <img src="{{asset('img/logo-new-white.png')}}" title="HallBooking Logo" alt="HallBooking Logo" class="w-75  opacity-90 hover:opacity-100 transition-opacity duration-300">
                </div>
                <p class="text-blue-200/80 text-base leading-relaxed">
{{--                    Empowering events across Bangladesh. We connect event planners with exceptional venues through a verified, secure, and data-driven platform. Success starts here.--}}
                    The Pavilion London is a premium event venue offering elegant spaces for weddings, corporate events, and private functions. Book securely online and plan your event with confidence.
                </p>

                <div class="flex flex-col gap-1">
                     <p class="text-xs font-bold text-primary uppercase tracking-widest mb-3">Follow our journey</p>
                     <div class="flex items-center gap-4">
                        <a href="https://www.facebook.com" aria-label="Facebook" class="w-11 h-11 rounded-full bg-blue-900/50 flex items-center justify-center text-white hover:bg-primary hover:text-white transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30 border border-white/5">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com" aria-label="LinkedIn" class="w-11 h-11 rounded-full bg-blue-900/50 flex items-center justify-center text-white hover:bg-[#0A66C2] hover:text-white transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30 border border-white/5">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="https://www.instagram.com" aria-label="Instagram" class="w-11 h-11 rounded-full bg-blue-900/50 flex items-center justify-center text-white hover:bg-gradient-to-tr hover:from-[#FD1D1D] hover:to-[#833AB4] hover:text-white transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-pink-500/30 border border-white/5">
{{--                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>--}}
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="3" width="18" height="18" rx="5" ry="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17" cy="7" r="1.3" fill="currentColor" stroke="none"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-span-1 md:col-span-1 lg:col-span-3 lg:col-start-7">
                <h3 class="text-sm font-bold text-primary uppercase tracking-widest mb-8 border-b-2 border-primary inline-block pb-1">Discover</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('home.index') }}" class="group flex items-center text-blue-200/70 hover:text-primary/80 transition-colors text-base font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary/80 mr-3 group-hover:scale-150  transition-transform"></span>Home
                    </a></li>
                    <li><a href="#" class="group flex items-center text-blue-200/70 hover:text-primary/80 transition-colors text-base font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary/80 mr-3 group-hover:scale-150  transition-transform"></span>Book Now
                    </a></li>
                    <li><a href="#" class="group flex items-center text-blue-200/70 hover:text-primary/80 transition-colors text-base font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary/80 mr-3 group-hover:scale-150  transition-transform"></span>Contact Us
                    </a></li>
{{--                    <li><a href="{{ route('about') }}" class="group flex items-center text-blue-200/70 hover:text-primary transition-colors text-base font-medium">--}}
{{--                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary mr-3 group-hover:scale-150 transition-transform"></span>About Us--}}
{{--                    </a></li>--}}
{{--                    <li><a href="{{ route('blog.index') }}" class="group flex items-center text-blue-200/70 hover:text-primary transition-colors text-base font-medium">--}}
{{--                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary mr-3 group-hover:scale-150 transition-transform"></span>Blog--}}
{{--                    </a></li>--}}
{{--                    <li><a href="{{ route('career') }}" class="group flex items-center text-blue-200/70 hover:text-primary transition-colors text-base font-medium">--}}
{{--                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary mr-3 group-hover:scale-150 transition-transform"></span>Careers--}}
{{--                    </a></li>--}}
                </ul>
            </div>

            <!-- Support -->
            <div class="col-span-1 md:col-span-1 lg:col-span-3">
                <h3 class="text-sm font-bold text-primary uppercase tracking-widest mb-8 border-b-2 border-primary inline-block pb-1">Support</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="group flex items-center text-blue-200/70 hover:text-primary transition-colors text-base font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary mr-3 group-hover:scale-150 transition-transform"></span>Terms & Conditions
                    </a></li>
                    <li><a href="#" class="group flex items-center text-blue-200/70 hover:text-primary transition-colors text-base font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary mr-3 group-hover:scale-150 transition-transform"></span>Privacy Policy
                    </a></li>
                    <li><a href="#" class="group flex items-center text-blue-200/70 hover:text-primary transition-colors text-base font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary group-hover:bg-primary mr-3 group-hover:scale-150 transition-transform"></span>Cookie Policy
                    </a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <p class="text-sm text-blue-200/60 text-center md:text-left">
                &copy; {{ date('Y') }} <span class="text-blue-100 font-semibold">{{ config('app.name') }}</span>. All rights reserved.
            </p>
            <p class="text-sm text-blue-200/60 flex items-center gap-1.5">
                <span class="opacity-70">Crafted by</span>
                <a href="https://asoftica.com" target="_blank" class="text-blue-100 hover:text-primary font-bold tracking-wide transition-colors relative group">
                    ASOFTICA
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                </a>
            </p>
        </div>
    </div>
</footer>

<!-- Sticky Quick Contact (WhatsApp) -->
{{--
<a href="https://wa.me/+8801323273444" target="_blank"
   class="fixed bottom-8 right-8 z-[60] flex items-center justify-center w-16 h-16 bg-[#25D366] text-white rounded-full shadow-[0_8px_20px_rgba(37,211,102,0.3)] hover:shadow-[0_12px_28px_rgba(37,211,102,0.5)] hover:bg-[#20bd5a] transition-all duration-300 transform hover:scale-110 hover:-rotate-12 group"
   title="Chat on WhatsApp">
    <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
</a>
--}}

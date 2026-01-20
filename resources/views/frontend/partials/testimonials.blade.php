{{--
    TESTIMONIALS SECTION - CAROUSEL WITH NAVIGATION
    Features: Responsive Slider, Snap Scroll, Glassmorphic Navigation
--}}

<section class="py-20 md:py-32 bg-[#0a0c10] relative overflow-hidden" id="testimonials">
    {{-- Background Atmosphere --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-primary/5 via-[#0a0c10] to-[#0a0c10] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary/5 blur-[120px] rounded-full pointer-events-none opacity-50"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row items-end justify-between gap-8 mb-12 px-2">
            <div data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/10 bg-white/5 backdrop-blur-sm mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    <span class="text-[10px] uppercase tracking-[0.2em] text-gray-300 font-bold">Suara Klien</span>
                </div>
                <h2 class="text-3xl md:text-5xl lg:text-5xl text-white font-serif leading-tight">
                    Kepercayaan <span class="text-transparent bg-clip-text bg-linear-to-r from-[#FFD700] to-[#B8860B] italic">Anda</span>
                </h2>
            </div>

            {{-- Navigation Buttons --}}
            <div class="flex gap-3" data-aos="fade-left">
                <button onclick="scrollTestimonials('left')" class="w-12 h-12 rounded-full border border-white/10 bg-white/5 hover:bg-white/10 flex items-center justify-center text-white transition-all hover:scale-110 active:scale-95 group" aria-label="Previous">
                    <span class="material-symbols-outlined group-hover:-translate-x-0.5 transition-transform">arrow_back</span>
                </button>
                <button onclick="scrollTestimonials('right')" class="w-12 h-12 rounded-full border border-white/10 bg-primary/10 hover:bg-primary flex items-center justify-center text-primary hover:text-black transition-all hover:scale-110 active:scale-95 group" aria-label="Next">
                    <span class="material-symbols-outlined group-hover:translate-x-0.5 transition-transform">arrow_forward</span>
                </button>
            </div>
        </div>

        {{-- Carousel Container --}}
        <div class="relative -mx-4 px-4 sm:mx-0 sm:px-0">
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-5 pb-8 pt-8 scrollbar-hide" id="testimonials-container" style="scroll-behavior: smooth;">

                @php
                // Demo testimonials data (fallback)
                $demoTestimonials = collect([
                (object)['testimonial_text' => "Home Putra mampu menerjemahkan visi abstrak saya menjadi realita yang menakjubkan. Apartemen studio saya kini terasa 2x lebih luas dan sangat mewah.", 'client_name' => "Clarissa S.", 'client_location' => "Jakarta Selatan"],
                (object)['testimonial_text' => "Saya ragu memesan kitchen set custom online, tapi hasilnya di luar dugaan. Finishing aluminiumnya sangat halus, presisi, dan kokoh. Pelayanan bintang 5.", 'client_name' => "Hendra Gunawan", 'client_location' => "Surabaya"],
                (object)['testimonial_text' => "Tim desain sangat komunikatif dan sabar merevisi detail. Ruang kerja kantor kami sekarang jadi spot favorit karyawan. Produktivitas meningkat!", 'client_name' => "Robert Tan", 'client_location' => "Tangerang"],
                (object)['testimonial_text' => "Sangat puas dengan renovasi kamar tidur utama. Nuansanya tenang, pencahayaannya hangat, persis seperti hotel bintang lima.", 'client_name' => "Dr. Sarah Wijaya", 'client_location' => "Bandung"],
                (object)['testimonial_text' => "Pengerjaan backdrop TV sangat cepat dan rapi. Tidak ada debu tersisa. Tim instalasi sangat profesional dan sopan.", 'client_name' => "Budi Santoso", 'client_location' => "Bekasi"],
                (object)['testimonial_text' => "Investasi terbaik untuk rumah pertama kami. Interior yang timeless membuat kami betah di rumah. Terima kasih Home Putra!", 'client_name' => "Putri & Dimas", 'client_location' => "Jakarta Barat"]
                ]);

                // Use database testimonials if available, otherwise use demo data
                $displayTestimonials = (isset($testimonials) && $testimonials instanceof \Illuminate\Support\Collection && $testimonials->count() > 0)
                ? $testimonials
                : $demoTestimonials;
                @endphp

                @foreach($displayTestimonials as $key => $t)
                <div class="snap-center shrink-0 w-[85vw] sm:w-[350px] md:w-[400px] h-full group" data-aos="fade-up" data-aos-delay="{{ $key * 50 }}">
                    <div class="h-full bg-white/[0.03] backdrop-blur-sm border border-white/[0.08] p-8 rounded-2xl relative transition-all duration-500 hover:-translate-y-2 hover:bg-white/[0.06] hover:border-primary/30 flex flex-col min-h-[300px]">

                        {{-- Quote Icon --}}
                        <div class="absolute -top-3 -right-3 w-10 h-10 bg-[#0a0c10] border border-white/10 rounded-full flex items-center justify-center group-hover:border-primary/50 group-hover:text-primary transition-colors z-10">
                            <span class="material-symbols-outlined text-lg">format_quote</span>
                        </div>

                        {{-- Stars --}}
                        <div class="flex gap-1 mb-6">
                            @for($i = 0; $i < 5; $i++)
                                <span class="material-symbols-outlined text-sm text-primary fill-current drop-shadow-[0_0_8px_rgba(255,178,4,0.3)]">star</span>
                                @endfor
                        </div>

                        {{-- Testimonial Text --}}
                        <p class="text-gray-300 font-light leading-relaxed mb-8 flex-grow">
                            "{{ $t->testimonial_text ?? '' }}"
                        </p>

                        {{-- Client Info --}}
                        <div class="flex items-center gap-4 pt-6 border-t border-white/5 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-[#1a1c22] border border-white/10 flex items-center justify-center text-primary font-bold font-serif shrink-0">
                                {{ substr($t->client_name ?? 'A', 0, 1) }}
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-sm group-hover:text-primary transition-colors">{{ $t->client_name ?? 'Anonim' }}</h4>
                                <p class="text-[10px] uppercase tracking-wider text-gray-500">{{ $t->client_location ?? 'Indonesia' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Metrics --}}
        <div class="mt-16 md:mt-24 border-t border-white/5 pt-12">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div class="flex flex-col items-center gap-2 group cursor-default" data-aos="fade-up">
                    <span class="text-2xl md:text-3xl text-white font-bold">4.9/5</span>
                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Google Reviews</span>
                </div>
                <div class="flex flex-col items-center gap-2 group cursor-default" data-aos="fade-up" data-aos-delay="50">
                    <span class="text-2xl md:text-3xl text-white font-bold">100%</span>
                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Penyelesaian</span>
                </div>
                <div class="flex flex-col items-center gap-2 group cursor-default" data-aos="fade-up" data-aos-delay="100">
                    <span class="text-2xl md:text-3xl text-white font-bold">500+</span>
                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Klien Puas</span>
                </div>
                <div class="flex flex-col items-center gap-2 group cursor-default" data-aos="fade-up" data-aos-delay="150">
                    <span class="text-2xl md:text-3xl text-white font-bold">Top 10</span>
                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Interior Firm</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function scrollTestimonials(direction) {
        const container = document.getElementById('testimonials-container');
        if (!container) return;

        const cardWidth = container.querySelector('.snap-center')?.offsetWidth || 400;
        const scrollAmount = direction === 'left' ? -cardWidth - 20 : cardWidth + 20;

        container.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }
</script>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
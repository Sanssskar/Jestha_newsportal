<footer class="bg-ink text-white mt-16">
    <div class="container py-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
        <div>
            <div class="flex items-center gap-2.5 mb-3">
                <svg class="bud-mark w-7 h-7" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 29V15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    <path d="M16 15C16 8.373 21.373 3 28 3c0 6.627-5.373 12-12 12Z" fill="currentColor" opacity="0.9"/>
                    <path d="M16 15C16 8.373 10.627 3 4 3c0 6.627 5.373 12 12 12Z" fill="currentColor" opacity="0.55"/>
                </svg>
                <span class="font-headline text-xl font-bold">कोपिला मिडिया हाउस</span>
            </div>
            <p class="text-base text-white/70 leading-relaxed">
                विश्वसनीय, ताजा र निष्पक्ष समाचार तपाईंसम्म पुर्‍याउने हाम्रो प्रतिबद्धता।
            </p>
            <div class="flex items-center gap-3 mt-4">
                <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-marigold hover:text-ink transition-colors" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-marigold hover:text-ink transition-colors" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-marigold hover:text-ink transition-colors" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
        </div>

        <div>
            <h3 class="eyebrow text-marigold mb-4 text-base">छिटो लिंकहरू</h3>
            <ul class="space-y-3 text-base text-white/80">
                <li><a class="hover:text-white transition-colors" href="{{ route('home') }}">गृहपृष्ठ</a></li>
                <li><a class="hover:text-white transition-colors" href="{{ route('contact') }}">विज्ञापनको लागि सम्पर्क</a></li>
            </ul>
        </div>

        <div>
            <h3 class="eyebrow text-marigold mb-4 text-base">श्रेणीहरू</h3>
            <ul class="space-y-3 text-base text-white/80">
                @foreach ($categories as $category)
                    <li><a class="hover:text-white transition-colors" href="{{ route('category', $category->slug) }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="eyebrow text-marigold mb-4 text-base">सम्पर्क</h3>
            <ul class="space-y-3 text-base text-white/80">
                <li class="flex items-center gap-2"><i class="fa-regular fa-envelope text-marigold"></i> info@kopilamedia.com</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-phone text-marigold"></i> +977-1-XXXXXXX</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-marigold"></i> नेपाल</li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <p class="container py-4 text-center text-sm text-white/60">
            Copyright © {{ now()->year }} कोपिला मिडिया हाउस प्रा. लि.. All Rights Reserved.
        </p>
    </div>
</footer>

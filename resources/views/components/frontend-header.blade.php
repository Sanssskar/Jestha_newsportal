<header class="sticky top-0 z-50 bg-paper/95 backdrop-blur border-b border-line">
    <div class="container flex items-center justify-between gap-4 py-3">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
            <svg class="bud-mark w-7 h-7" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path d="M16 29V15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                <path d="M16 15C16 8.373 21.373 3 28 3c0 6.627-5.373 12-12 12Z" fill="currentColor" opacity="0.9" />
                <path d="M16 15C16 8.373 10.627 3 4 3c0 6.627 5.373 12 12 12Z" fill="currentColor" opacity="0.55" />
            </svg>
            <span class="font-headline text-2xl sm:text-3xl font-bold leading-none text-ink">कोपिला मिडिया हाउस</span>
        </a>

        <div class="flex items-center gap-4">
            <form action="{{ route('search') }}" method="GET" class="max-w-md">
                <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="q" id="search"
                        class="block w-full p-3 ps-9 bg-sand border border-line text-ink text-sm rounded-base focus:ring-2 focus:ring-forest focus:border-forest shadow-sm placeholder:text-black"
                        placeholder="Search" required />
                    <button type="submit"
                        class="absolute end-1.5 bottom-1.5 text-paper bg-forest hover:bg-forest-dark focus:ring-4 focus:ring-forest-light border border-transparent shadow-sm font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none transition-colors duration-200">Search</button>
                </div>
            </form>

            <div class="hidden sm:flex items-center gap-2 text-base text-ink shrink-0">
                <i class="fa-regular fa-calendar text-forest"></i>
                <span>{{ toNepaliDate(now()->format('Y-m-d')) }}</span>
            </div>
        </div>

        <button data-collapse-toggle="mobile-menu" type="button"
            class="sm:hidden inline-flex items-center justify-center p-2 text-ink rounded-md hover:bg-sand"
            aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <i class="fa-solid fa-bars text-lg"></i>
        </button>
    </div>

    <nav class="hidden sm:block bg-forest">
        <div
            class="container flex items-center gap-6 py-2.5 overflow-x-auto text-paper text-base font-semibold whitespace-nowrap">
            <a class="hover:text-marigold transition-colors" href="{{ route('home') }}">गृहपृष्ठ</a>
            @foreach ($categories as $category)
                <a class="hover:text-marigold transition-colors"
                    href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
            @endforeach
            <a class="hover:text-marigold transition-colors ms-auto" href="{{ route('contact') }}">
                <i class="fa-solid fa-rectangle-ad me-1"></i>सम्पर्क
            </a>
        </div>
    </nav>

    <div id="mobile-menu" class="sm:hidden hidden border-t border-line bg-paper">
        <div class="container py-3 flex flex-col gap-1 text-ink font-semibold">
            <a class="py-2.5 border-b border-line text-lg" href="{{ route('home') }}">गृहपृष्ठ</a>
            @foreach ($categories as $category)
                <a class="py-2.5 border-b border-line text-lg"
                    href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
            @endforeach
            <a class="py-2.5 border-b border-line text-lg" href="{{ route('contact') }}">सम्पर्क</a>
            <form class="pt-3" action="{{ route('search') }}" method="GET">
                <div class="relative">
                    <input type="search" name="q"
                        class="block w-full py-2.5 ps-4 pe-10 bg-sand border border-line text-ink text-base rounded-full focus:outline-none focus:border-forest placeholder:text-black"
                        placeholder="खोज्नुहोस्..." required />
                    <button type="submit" class="absolute inset-y-0 end-0 flex items-center pe-3.5 text-black hover:text-forest-dark transition-colors duration-200">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</header>

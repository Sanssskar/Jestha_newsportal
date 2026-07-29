<x-frontend-layout>
    <section class="py-8">
        <div class="container">
            @php
                $heroArticle = $latest_articles->first();
                $secondaryArticles = $latest_articles->skip(1)->take(4);
            @endphp

            @if ($heroArticle)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <a href="{{ route('article', $heroArticle->slug) }}" class="lg:col-span-2 group block">
                        <div class="overflow-hidden rounded-2xl border border-line">
                            <img class="w-full aspect-[16/9] object-cover group-hover:scale-[1.03] transition-transform duration-500"
                                src="{{ asset(Storage::url($heroArticle->image)) }}" alt="{{ $heroArticle->title }}">
                        </div>
                        <h1 class="font-headline text-4xl sm:text-5xl font-bold leading-tight mt-5 group-hover:text-forest transition-colors">
                            {{ $heroArticle->title }}
                        </h1>
                        <p class="text-base text-ink mt-3 flex items-center gap-2">
                            <i class="fa-regular fa-calendar-days text-forest"></i>
                            <span class="text-ink">{{ toNepaliDate($heroArticle->created_at->format('Y-m-d')) }}</span>
                        </p>
                    </a>

                    <div class="flex flex-col gap-5 lg:border-l lg:border-line lg:pl-6">
                        @foreach ($secondaryArticles as $article)
                            <a href="{{ route('article', $article->slug) }}" class="group flex gap-4 pb-5 {{ !$loop->last ? 'border-b border-line' : '' }}">
                                <img class="w-24 h-20 rounded-lg object-cover shrink-0"
                                    src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}">
                                <div>
                                    <h3 class="font-headline text-lg font-semibold leading-snug group-hover:text-forest transition-colors line-clamp-3">
                                        {{ $article->title }}
                                    </h3>
                                    <p class="text-sm text-ink mt-2 flex items-center gap-1.5">
                                        <i class="fa-regular fa-calendar-days text-forest"></i>
                                        <span>{{ toNepaliDate($article->created_at->format('Y-m-d')) }}</span>
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- Category sections --}}
    @foreach ($categories as $category)
        @php
            $latest_cat_art = $category->articles()->where('status', true)->latest()->first();
            $other_articles = $category->articles()->where('status', true)->latest()->skip(1)->take(4)->get();
        @endphp
        @if ($latest_cat_art)
            <section class="py-10 {{ $loop->index % 2 == 0 ? 'bg-sand' : '' }}">
                <div class="container">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="eyebrow text-2xl sm:text-3xl font-headline font-bold text-ink">
                            <svg class="bud-mark w-5 h-5" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M16 29V15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                <path d="M16 15C16 8.373 21.373 3 28 3c0 6.627-5.373 12-12 12Z" fill="currentColor" opacity="0.9"/>
                                <path d="M16 15C16 8.373 10.627 3 4 3c0 6.627 5.373 12 12 12Z" fill="currentColor" opacity="0.55"/>
                            </svg>
                            {{ $category->title }}
                        </h2>
                        <a href="{{ route('category', $category->slug) }}" class="text-base font-semibold text-forest hover:text-forest-dark whitespace-nowrap">
                            सबै हेर्नुहोस् <i class="fa-solid fa-arrow-left text-xs"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <a href="{{ route('article', $latest_cat_art->slug) }}" class="lg:col-span-2 group card-article block bg-paper border border-line rounded-2xl overflow-hidden">
                            <img src="{{ asset(Storage::url($latest_cat_art->image)) }}" alt="{{ $latest_cat_art->title }}"
                                class="w-full aspect-[16/9] object-cover">
                            <div class="p-5">
                                <h3 class="font-headline text-2xl font-semibold text-ink group-hover:text-forest transition-colors">
                                    {{ $latest_cat_art->title }}
                                </h3>
                                <p class="text-sm text-ink mt-2 flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar-days text-forest"></i>
                                    <span class="text-ink">{{ toNepaliDate($latest_cat_art->created_at->format('Y-m-d')) }}</span>
                                </p>
                            </div>
                        </a>

                        <div class="flex flex-col gap-4">
                            @foreach ($other_articles as $article)
                                <a href="{{ route('article', $article->slug) }}" class="group flex gap-3 items-start">
                                    <img class="h-[72px] w-[86px] rounded-lg object-cover shrink-0"
                                        src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }} Image">
                                    <div class="min-w-0">
                                        <h3 class="text-base font-semibold leading-snug group-hover:text-forest transition-colors line-clamp-2">
                                            {{ $article->title }}
                                        </h3>
                                        <small class="text-sm text-ink mt-1.5 inline-flex items-center gap-1">
                                            <i class="fa-regular fa-calendar-days text-forest"></i>
                                            <span class="text-ink">{{ toNepaliDate($article->created_at->format('Y-m-d')) }}</span>
                                        </small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
</x-frontend-layout>

<x-frontend-layout>
    <section class="py-5">
        <div class="container">
            @foreach ($latest_articles as $latest_article)
                <a href="{{ route('article', $latest_article->slug) }}">
                    <div>
                        <h1 class="text-5xl font-semibold py-5">{{ $latest_article->title ?? '' }}</h1>
                    </div>

                    <div>
                        <img class="w-full" src=" {{ asset(Storage::url($latest_article->image)) }}"
                            alt="{{ $latest_article->title }} Image">
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <section>
        <div class="container">
            @foreach ($categories as $category)
                <div>
                    <h2 class="text-3xl font-semibold border-l-[5px] border-l-(--primary) text-(--primary) pl-2 my-3">
                        {{ $category->title }}
                    </h2>

                    @php
                        $latest_cat_art = $category->articles()->where('status', true)->latest()->first();
                        $other_articles = $category
                            ->articles()
                            ->where('status', true)
                            ->latest()
                            ->skip(1)
                            ->take(4)
                            ->get();
                    @endphp


                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-2">

                            <a href="{{ route('article', $latest_cat_art->slug) }}">
                                <img src="{{ asset(Storage::url($latest_cat_art->image)) }}"
                                    alt="{{ $latest_cat_art->title }}" class="w-full">

                                <h3 class="text-xl font-semibold text-(--text) mt-3">
                                    {{ $latest_cat_art->title }}
                                </h3>
                            </a>
                        </div>

                        <div>
                            @foreach ($other_articles as $article)
                                <div class="mb-3">
                                    <a class="" href="{{ route('article', $article->slug) }}">
                                        <div class="grid grid-cols-3 gap-2 shadow-md">
                                            <img class="h-[86px] w-full object-cover"
                                                src="{{ asset(Storage::url($article->image)) }}"
                                                alt="{{ $article->title }} Image">
                                            <div class="col-span-2">
                                                <h3 class="font-semibold">{{ $article->title }}</h3>
                                                <small><i
                                                        class="fa-solid fa-calendar-days"></i>{{ toNepaliDate($article->created_at->format('Y-m-d')) }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </section>


</x-frontend-layout>

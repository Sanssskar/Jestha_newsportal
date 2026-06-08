<x-frontend-layout>
    <section class="py-5">
        <div class="container">
            @foreach ($latest_articles as $latest_article)
                <div>
<<<<<<< HEAD
                    <h1 class="text-5xl font-semibold py-5">{{ $latest_article->title ?? '' }}</h1>
                </div>

                <div>
                    <img src=" {{ asset(Storage::url($latest_article->image)) }}" alt="helo">
=======
                    <h1 class="text-5xl py-5 font-semibold">{{ $latest_article->title ?? '' }}</h1>
                </div>

                <div>
                    <img class="w-full h-full" src="{{ asset(Storage::url($latest_article->image ?? '')) }}"
                        alt="helo">
>>>>>>> 7a4e38b0929d0efb47732e3e849a30c056c60208
                </div>
            @endforeach
        </div>
    </section>
<<<<<<< HEAD
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

                            <img src="{{ asset(Storage::url($latest_cat_art->image)) }}"
                                alt="{{ $latest_cat_art->title }}" class="w-full">

                            <h3 class="text-lg text-(--text) mt-3">
                                {{ $latest_cat_art->title }}
                            </h3>
                        </div>

                        <div>
                            @foreach ($other_articles as $article)
                                <div class="grid grid-cols-3 gap-2 shadow-md">
                                    <img src="{{asset(Storage::url($article->image))}}" alt="{{$article->title}} Image">
                                    <div class="col-span-2">
                                        <h3>{{$article->title}}</h3>
                                        <small><i class="fa-solid fa-calendar-days"></i>{{$article->created_at}}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </section>
=======
>>>>>>> 7a4e38b0929d0efb47732e3e849a30c056c60208

    <section>
        <div class="container">
            @foreach ($categories as $category)
                <div>
                    <div class="my-3">
                        <h2 class=" border-l-[4px] text-xl text-(--primary) pl-2 font-semibold">{{ $category->title }}
                        </h2>
                    </div>

                    @php
                        $lat_art_cat = $category->articles()->where('status', true)->latest()->first();
                        $other_articles = $category
                            ->articles()
                            ->where('status', true)
                            ->latest()
                            ->skip(1)
                            ->take(5)
                            ->get();
                    @endphp
                    <div class="grid grid-cols-3 shdaow-md gap-4">
                        <div class="col-span-2">
                            <img class="h-[600px] object-cover w-full"
                                src="{{ asset(Storage::url($lat_art_cat->image)) }}"
                                alt="{{ $lat_art_cat->title }} Image">
                            <h3 class="text-2xl font-semibold my-2">{{ $lat_art_cat->title }}
                            </h3>
                        </div>
                        <div>
                            @foreach ($other_articles as $article)
                                <div class="grid grid-cols-3 shadow-md gap-4 mb-3">
                                    <img class="h-[86px] w-full object-cover"
                                        src="{{asset(Storage::url($article->image))}}" alt="">
                                    <div class="col-span-2">
                                        <h3 class="font-semibold">{{$article->title}}</h3>
                                        <small><i class="fa-solid fa-calendar-days"></i> {{$article->created_at}}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-frontend-layout>

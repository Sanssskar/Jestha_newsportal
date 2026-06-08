<x-frontend-layout>
    <section>
        <div class="container">
            <div class="grid grid-cols-3 space-y-3 space-x-2">
                <div class="col-span-2">
                    @foreach ($category->articles()->latest()->get() as $article)
                        <div class=" flex items-center shadow-md">
                            <img class="w-[40%] h-[200px] object-cover" src="{{ asset(Storage::url($article->image)) }}"
                                alt="">
                            <div class="w-[60%] p-5">
                                <h2 class="font-bold text-lg">{{ $article->title }}</h2>
                                <div class="text-(--text)/70 line-clamp-2 my-3">
                                    {!! $article->description !!}
                                </div>
                                <small class="mb-3"><i class="fa-solid fa-calendar-days"></i> प्रकाशित मितिः
                                    {{ $article->created_at }}</small>
                                <a class="block text-(--primary) font-semibold text-sm" href=""> <i
                                        class="fa-solid fa-arrow-right"></i> पुरा पढ्नुहोस्</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($advertises as $advertise)
                        <a class="overflow-hidden" href="{{$advertise->redirect_link}}">
                            <img class="shadow-md hover:shadow-xl duration-300 hover:scale-101 transition-all" src="{{asset(Storage::url($advertise->banner))}}" alt="">

                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
</x-frontend-layout>

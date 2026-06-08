<x-frontend-layout>
    <section>
        <div class="container">
            <div class="grid grid-cols-3">
                <div class="col-span-2">
                    @foreach ($category->articles()->latest()->get() as $article)
                        <div class="grid grid-cols-3 gap-2 shadow-lg mt-3">
                            <img class="h-[220px] object-cover w-full"
                                src="{{asset(Storage::url($article->image))}}" alt="{{$article->title}} Image">
                            <div class="col-span-2 p-5 space-y-2">
                                <h2 class="text-2xl font-semibold">{{$article->title}}</h2>
                                <p class="text-(--text)/70 line-clamp-2">{!!Str::limit($article->description,120,'...')!!}</p>
                                <div class="flex flex-col gap-y-3">
                                    <small class="font-semibold"><i class="fa-solid fa-calendar-days"></i> प्रकाशित
                                        मितिः
                                        सोमबार, २५ जेठ २०८३</small>
                                    <a href=""><i class="fa-regular fa-hand-pointer"></i> पुरा पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($advertises as $advertise)
                        <a class="overflow-hidden" href="{{$advertise->redirect_link}}">
                            <img class="shadow-md hover:shadow-xl duration-300 hover:scale-101 transition-all" src="{{asset(Storage::url($advertise->banner))}}" alt="{{$advertise->company_name}} Image">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>

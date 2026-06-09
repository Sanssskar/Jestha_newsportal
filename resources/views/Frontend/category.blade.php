<x-frontend-layout>
    <section>
        <div class="container">
            <div class="grid grid-cols-3 gap-3">
                <div class="col-span-2">
                    @foreach ($category->articles()->latest()->get() as $article)
                        <div class="grid grid-cols-3 gap-2 shadow-lg mt-3">
                            <img class="h-[220px] object-cover w-full" src="{{ asset(Storage::url($article->image)) }}"
                                alt="{{ $article->title }} Image">
                            <div class="col-span-2 p-5 space-y-2">
                                <h2 class="text-2xl font-semibold">{{ $article->title }}</h2>
                                <p class="text-(--text)/70 line-clamp-2">{!! Str::limit($article->description, 120, '...') !!}</p>
                                <div class="flex flex-col gap-y-3">
                                    <small class="font-semibold"><i class="fa-solid fa-calendar-days"></i> प्रकाशित
                                        मितिः
                                        {{ toNepaliDate($article->created_at->format('Y-m-d')) }}</small>
                                    <a href=""><i class="fa-regular fa-hand-pointer"></i> पुरा पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    @foreach ($advertises as $advertise)
                        <div class="mb-2">
                            <a href="{{ $advertise->redirect_link }}" target="_blank">
                                <img class="hover:scale-101 shadow-md hover:shadow-xl duration-300 transition-all" src="{{ asset(Storage::url($advertise->banner)) }}"
                                    alt="{{ $advertise->company_name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>

<x-frontend-layout>
    <section>
        <div class="container">
            <div class="grid grid-cols-3 gap-x-3">
                <div class="col-span-2">
                    <div class="flex items-center justify-between my-2">
                        <p class="font-semibold text-lg"><i class="fa-solid fa-user text-(--primary)"></i>{{$article->author_name}}</p>
                        <p class=""><i class="fa-solid fa-calendar-days text-(--primary)"></i> प्रकाशित मितिः {{toNepaliDate($article->created_at->format('Y-m-d'))}}</p>
                    </div>
                    <h1 class="text-3xl my-2 font-bold">{{$article->title}}</h1>
                    <img src="{{asset(Storage::url($article->image))}}" alt="{{$article->title}} Image">
                    <div class="text-(--text) text-lg tracking-wide">
                    {!!$article->description!!}
                    </div>
                </div>
                <div>
                    @foreach ($advertises as $advertise)
                        <div class="mb-2">
                            <a href="{{ $advertise->redirect_link }}" target="_blank">
                                <img class="hover:scale-101 shadow-md hover:shadow-xl duration-300 transition-all"
                                    src="{{ asset(Storage::url($advertise->banner)) }}"
                                    alt="{{ $advertise->company_name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>

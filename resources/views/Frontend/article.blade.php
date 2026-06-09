<x-frontend-layout>
    <section>
        <div class="container">
            <div class="grid grid-cols-3 gap-x-3">
                <div class="col-span-2">
                    <div class="flex items-center justify-between my-2">
                        <small class="text-lg font-bold"><i class="fa-solid fa-user text-(--primary) fa-lg mr-1"></i>{{$article->author_name}}</small>
                        <small class="text-sm font-semibold"><i
                                class="fa-solid fa-calendar-days text-(--primary) fa-lg mr-1"></i>{{ toNepaliDate($article->created_at->format('Y-m-d')) }}</small>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold tracking-wide">{{ $article->title }}</h1>
                        <img class="w-full" src="{{ asset(Storage::url($article->image)) }}"
                            alt="{{ $article->title }} Image">
                        <div class="text-xl  text-(--text)/90 tracking-wide my-2">
                            {!! $article->description !!}
                        </div>
                    </div>
                </div>
                <div>
                    @foreach ($advertises as $advertise)
                        <div class="overflow-hidden mb-3">
                            <a href="{{ $advertise->redirect_link }}" target="_blank">
                                <img class="shadow-md hover:shadow-xl duration-300 hover:scale-101 transition-all"
                                    src="{{ asset(Storage::url($advertise->banner)) }}"
                                    alt="{{ $advertise->company_name }} Image">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>

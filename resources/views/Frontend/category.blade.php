<x-frontend-layout>
    <section class="py-8">
        <div class="container">
            <div class="flex items-center gap-3 mb-8 pb-5 border-b border-line">
                <svg class="bud-mark w-7 h-7" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 29V15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    <path d="M16 15C16 8.373 21.373 3 28 3c0 6.627-5.373 12-12 12Z" fill="currentColor" opacity="0.9"/>
                    <path d="M16 15C16 8.373 10.627 3 4 3c0 6.627 5.373 12 12 12Z" fill="currentColor" opacity="0.55"/>
                </svg>
                <h1 class="font-headline text-4xl font-bold text-ink">{{ $category->title }}</h1>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 flex flex-col gap-5">
                    @forelse ($category->articles()->latest()->get() as $article)
                        <a href="{{ route('article', $article->slug) }}"
                            class="group card-article grid grid-cols-1 sm:grid-cols-3 gap-4 bg-paper border border-line rounded-2xl overflow-hidden p-3">
                            <img class="h-[200px] sm:h-full object-cover w-full rounded-xl"
                                src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }} Image">
                            <div class="sm:col-span-2 py-1 pr-2 space-y-2.5">
                                <span class="tag-chip">{{ $category->title }}</span>
                                <h2 class="font-headline text-2xl font-semibold text-ink group-hover:text-forest transition-colors">
                                    {{ $article->title }}
                                </h2>
                                <p class="text-base text-muted line-clamp-2">{!! Str::limit(strip_tags($article->description), 120, '...') !!}</p>
                                <div class="flex items-center justify-between pt-1">
                                    <small class="text-sm text-muted flex items-center gap-1.5">
                                        <i class="fa-solid fa-calendar-days text-forest"></i>
                                        {{ toNepaliDate($article->created_at->format('Y-m-d')) }}
                                    </small>
                                    <span class="text-sm font-semibold text-forest">
                                        पुरा पढ्नुहोस् <i class="fa-solid fa-arrow-left text-[10px]"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-muted">यस श्रेणीमा हाल कुनै समाचार छैन।</p>
                    @endforelse
                </div>

                <div class="flex flex-col gap-4">
                    @foreach ($advertises as $advertise)
                        <a href="{{ $advertise->redirect_link }}" target="_blank" class="block rounded-xl overflow-hidden border border-line hover:shadow-lg transition-shadow">
                            <img class="w-full hover:scale-[1.02] transition-transform duration-300"
                                src="{{ asset(Storage::url($advertise->banner)) }}" alt="{{ $advertise->company_name }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>

<x-frontend-layout :title="$article->title">
    <article class="py-8">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-10">
                <div class="lg:col-span-2">
                    <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-base text-muted mb-4">
                        <span class="flex items-center gap-1.5 font-semibold text-ink">
                            <i class="fa-solid fa-user text-forest"></i>{{ $article->author_name }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <i class="fa-solid fa-calendar-days text-forest"></i>
                            प्रकाशित मितिः {{ toNepaliDate($article->created_at->format('Y-m-d')) }}
                        </span>
                    </div>

                    <h1 class="font-headline text-3xl sm:text-5xl font-bold leading-tight text-ink mb-6">
                        {{ $article->title }}
                    </h1>

                    <img class="w-full rounded-2xl border border-line mb-8"
                        src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }} Image">

                    <div class="prose-article text-ink text-xl leading-loose tracking-wide max-w-none [&_p]:mb-5 [&_img]:rounded-xl [&_img]:my-6 [&_a]:text-forest [&_a]:underline [&_h2]:font-headline [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:mt-8 [&_h2]:mb-3">
                        {!! $article->description !!}
                    </div>
                </div>

                <aside class="mt-10 lg:mt-0">
                    <div class="sticky top-24 flex flex-col gap-4">
                        <span class="eyebrow"><i class="fa-regular fa-rectangle-ad"></i> प्रायोजित</span>
                        @foreach ($advertises as $advertise)
                            <a href="{{ $advertise->redirect_link }}" target="_blank" class="block rounded-xl overflow-hidden border border-line hover:shadow-lg transition-shadow">
                                <img class="w-full hover:scale-[1.02] transition-transform duration-300"
                                    src="{{ asset(Storage::url($advertise->banner)) }}" alt="{{ $advertise->company_name }}">
                            </a>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </article>
</x-frontend-layout>

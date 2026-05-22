<x-frontend-layout>
  <section class="py-5">
    <div class="container">
        <div>
            <h1 class="text-5xl font-semibold">{{$latest_article->title}}</h1>
        </div>

        <div>
            <img src=" {{asset(Storage::url($latest_article->image))}}" alt="helo">
        </div>
    </div>
  </section>

</x-frontend-layout>

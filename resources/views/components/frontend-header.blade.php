<header class="py-5 sticky z-50 top-0 bg-white">
    <div class="container flex items-center justify-between">
        <div>
            <img class="w-[250px]" src="https://sudamhub.com/images/logo1.png" alt="sudamhub">
        </div>
        <div class="text-lg text-(--text)">
            शुक्रबार, ०८ जेठ २०८३
            <div class="h-[4px] bg-(--primary) -skew-y-3">

            </div>
        </div>
    </div>
    <div class="bg-(--primary) p-4 mt-2">
        <div class="flex items-center justify-between container">
            <nav class="text-white font-semibold text-lg flex items-center gap-5 ">
                <a class="hover:text-(--dark-primary) duration-300 transition-all" href="{{route('home')}}">गृहपृष्ठ</a>
                @foreach ($categories as $category)
<<<<<<< HEAD
                    <a class="hover:text-(--dark-primary) duration-300 transition-all" href="{{route('category',$category->slug)}}">{{$category->title}}</a>
=======
                    <a class="hover:text-(--dark-primary) duration-300 transition-all" href="{{route('category',$category->slug)}}">{{$category->title ?? '' }}</a>
>>>>>>> 7a4e38b0929d0efb47732e3e849a30c056c60208
                @endforeach
            </nav>

            <form class="">
                <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full p-3 ps-9 bg-white border border-(--primary) text-heading text-sm rounded-base focus:outline-none focus:border-(--dark-primary) shadow-xs placeholder:text-(--primary)"
                        placeholder="Search" required />
                    <button type="button"
                        class="absolute end-1.5 bottom-1.5 text-white bg-(--primary) hover:bg-(--dark-primary) box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">Search</button>
                </div>
            </form>
        </div>
    </div>

</header>

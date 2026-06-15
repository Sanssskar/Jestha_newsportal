<x-frontend-layout>
    <section class="my-20">
        <div class="container">
         <div class="text-center ">
               <h1 class="my-4 text-5xl font-bold text-(--primary)">Request for Design</h1>
            <span class="inline-block my-4 text-(--text)/90  ">Grab your placement of company's banner at appropriate prices</span>
         </div>
            <form class="grid grid-cols-2 gap-x-2" action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input class="w-full" type="text" name="name" id="name">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input class="w-full" type="email" name="email" id="email">
                </div>
                <div>
                    <label for="phone">phone</label>
                    <input class="w-full" type="number" name="phone" id="phone">
                </div>
                <div>
                    <label for="company_name">Company Name</label>
                    <input class="w-full" type="text" name="company_name" id="company_name">
                </div>
                <div>
                    <label for="banner">Banner</label>
                    <input class="w-full" type="file" name="banner" id="banner">
                </div>
                <div class="">
                    <label for="service_type">Service Type</label>
                    <select class="w-full" name="service_type" id="service_type">
                        <option selected disabled value="">Select an option</option>
                        <option value="one_day">1 Day / Rs 500</option>
                        <option value="one_month">1 Month / Rs 9500</option>
                        <option value="one_year">1 Year / Rs 30000</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="message">Message</label>
                    <textarea class="w-full" name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <button class="col-span-2 py-3 duration-100 transition bg-(--primary) text-white font-semibold hover:bg-(--dark-primary)" type="submit">Submit Form</button>
            </form>
        </div>
    </section>
</x-frontend-layout>

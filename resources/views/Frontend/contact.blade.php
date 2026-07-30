<x-frontend-layout title="विज्ञापन सम्पर्क - कोपिला मिडिया हाउस">
    <section class="py-14">
        <div class="container">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="eyebrow justify-center"><i class="fa-solid fa-rectangle-ad"></i> विज्ञापन</span>
                <h1 class="font-headline text-4xl sm:text-5xl font-bold text-ink mt-3">आफ्नो व्यवसायको विज्ञापन राख्नुहोस्</h1>
                <p class="text-ink mt-3 text-lg">उचित मूल्यमा आफ्नो कम्पनीको ब्यानर हाम्रो पाठकसामु पुर्‍याउनुहोस्।</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 max-w-3xl mx-auto mb-14">
                <div class="rounded-2xl border border-line p-6 text-center hover:border-forest transition-colors">
                    <p class="text-ink mb-1">१ हप्ता</p>
                    <p class="font-headline text-4xl font-bold text-ink">रु १,५००</p>
                    <p class="text-ink mt-2 text-sm">परीक्षणका लागि उपयुक्त</p>
                </div>
                <div class="rounded-2xl border-2 border-marigold bg-marigold-soft p-6 text-center relative">
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 tag-chip bg-marigold text-ink">लोकप्रिय</span>
                    <p class="text-ink mb-1">१ महिना</p>
                    <p class="font-headline text-4xl font-bold text-ink">रु ५,०००</p>
                    <p class="text-ink mt-2 text-sm">सबैभन्दा बढी रुचाइएको</p>
                </div>
                <div class="rounded-2xl border border-line p-6 text-center hover:border-forest transition-colors">
                    <p class="text-ink mb-1">१ वर्ष</p>
                    <p class="font-headline text-4xl font-bold text-ink">रु ५०,०००</p>
                    <p class="text-ink mt-2 text-sm">लामो अवधिको छुट</p>
                </div>
            </div>

            <form class="max-w-3xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-5 bg-sand border border-line rounded-2xl p-6 sm:p-8"
                style="color-scheme: light;"
                action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-base font-semibold mb-1.5 text-ink" for="name">नाम</label>
                    <input class="w-full rounded-lg border @error('name') border-red-500 @else border-line @enderror bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest text-ink placeholder:text-gray-500" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="तपाईंको पूरा नाम">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5 text-ink" for="email">इमेल</label>
                    <input class="w-full rounded-lg border @error('email') border-red-500 @else border-line @enderror bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest text-ink placeholder:text-gray-500" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="you@example.com">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5 text-ink" for="phone">फोन</label>
                    <input class="w-full rounded-lg border @error('phone') border-red-500 @else border-line @enderror bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest text-ink placeholder:text-gray-500" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="९८XXXXXXXX">
                    @error('phone')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5 text-ink" for="company_name">कम्पनीको नाम</label>
                    <input class="w-full rounded-lg border @error('company_name') border-red-500 @else border-line @enderror bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest text-ink placeholder:text-gray-500" type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" placeholder="तपाईंको कम्पनी/व्यवसायको नाम">
                    @error('company_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5 text-ink" for="banner">ब्यानर</label>
                    <input class="w-full rounded-lg border @error('banner') border-red-500 @else border-line @enderror bg-paper px-3.5 py-2 text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-forest file:text-white file:text-xs file:font-semibold text-ink" type="file" name="banner" id="banner">
                    @error('banner')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5 text-ink" for="service_type">सेवा प्रकार</label>
                    <select class="w-full rounded-lg border @error('service_type') border-red-500 @else border-line @enderror bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest text-ink" name="service_type" id="service_type">
                        <option value="" disabled {{ old('service_type') ? '' : 'selected' }}>एउटा विकल्प छान्नुहोस्</option>
                        <option value="one_week" {{ old('service_type') == 'one_week' ? 'selected' : '' }}>१ हप्ता / रु १,५००</option>
                        <option value="one_month" {{ old('service_type') == 'one_month' ? 'selected' : '' }}>१ महिना / रु ५,०००</option>
                        <option value="one_year" {{ old('service_type') == 'one_year' ? 'selected' : '' }}>१ वर्ष / रु ५०,०००</option>
                    </select>
                    @error('service_type')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-base font-semibold mb-1.5 text-ink" for="message">सन्देश</label>
                    <textarea class="w-full rounded-lg border @error('message') border-red-500 @else border-line @enderror bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest text-ink placeholder:text-gray-500" name="message" id="message" cols="30" rows="6" placeholder="आफ्नो विज्ञापन वा सन्देश यहाँ लेख्नुहोस्...">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button class="sm:col-span-2 py-3.5 rounded-lg font-semibold text-lg bg-forest text-white hover:bg-forest-dark transition-colors" type="submit">
                    फारम पेश गर्नुहोस्
                </button>
            </form>
        </div>
    </section>
</x-frontend-layout>

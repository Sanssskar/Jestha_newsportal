<x-frontend-layout title="विज्ञापन सम्पर्क - कोपिला मिडिया हाउस">
    <section class="py-14">
        <div class="container">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="eyebrow justify-center"><i class="fa-solid fa-rectangle-ad"></i> विज्ञापन</span>
                <h1 class="font-headline text-4xl sm:text-5xl font-bold" style="color: #1A2E22 !important; margin-top: 0.75rem;">आफ्नो व्यवसायको विज्ञापन राख्नुहोस्</h1>
                <p style="color: #57534E !important; margin-top: 0.75rem; font-size: 1.125rem;">उचित मूल्यमा आफ्नो कम्पनीको ब्यानर हाम्रो पाठकसामु पुर्‍याउनुहोस्।</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 max-w-3xl mx-auto mb-14">
                <div class="rounded-2xl border border-line p-6 text-center hover:border-forest transition-colors">
                    <p style="color: #57534E !important; margin-bottom: 0.25rem;">१ हप्ता</p>
                    <p class="font-headline text-4xl font-bold" style="color: #1A2E22 !important;">रु १,५००</p>
                    <p style="color: #57534E !important; margin-top: 0.5rem; font-size: 0.875rem;">परीक्षणका लागि उपयुक्त</p>
                </div>
                <div class="rounded-2xl border-2 border-marigold bg-marigold-soft p-6 text-center relative">
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 tag-chip bg-marigold" style="color: #1A2E22 !important;">लोकप्रिय</span>
                    <p style="color: #57534E !important; margin-bottom: 0.25rem;">१ महिना</p>
                    <p class="font-headline text-4xl font-bold" style="color: #1A2E22 !important;">रु ५,०००</p>
                    <p style="color: #57534E !important; margin-top: 0.5rem; font-size: 0.875rem;">सबैभन्दा बढी रुचाइएको</p>
                </div>
                <div class="rounded-2xl border border-line p-6 text-center hover:border-forest transition-colors">
                    <p style="color: #57534E !important; margin-bottom: 0.25rem;">१ वर्ष</p>
                    <p class="font-headline text-4xl font-bold" style="color: #1A2E22 !important;">रु ५०,०००</p>
                    <p style="color: #57534E !important; margin-top: 0.5rem; font-size: 0.875rem;">लामो अवधिको छुट</p>
                </div>
            </div>

            <form class="max-w-3xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-5 bg-sand border border-line rounded-2xl p-6 sm:p-8"
                action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-base font-semibold mb-1.5" for="name" style="color: #1A2E22 !important;">नाम</label>
                    <input class="w-full rounded-lg border border-line bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest" style="color: #1A2E22 !important;" type="text" name="name" id="name">
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5" for="email" style="color: #1A2E22 !important;">इमेल</label>
                    <input class="w-full rounded-lg border border-line bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest" style="color: #1A2E22 !important;" type="email" name="email" id="email">
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5" for="phone" style="color: #1A2E22 !important;">फोन</label>
                    <input class="w-full rounded-lg border border-line bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest" style="color: #1A2E22 !important;" type="number" name="phone" id="phone">
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5" for="company_name" style="color: #1A2E22 !important;">कम्पनीको नाम</label>
                    <input class="w-full rounded-lg border border-line bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest" style="color: #1A2E22 !important;" type="text" name="company_name" id="company_name">
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5" for="banner" style="color: #1A2E22 !important;">ब्यानर</label>
                    <input class="w-full rounded-lg border border-line bg-paper px-3.5 py-2 text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-forest file:text-white file:text-xs file:font-semibold" style="color: #1A2E22 !important;" type="file" name="banner" id="banner">
                </div>
                <div>
                    <label class="block text-base font-semibold mb-1.5" for="service_type" style="color: #1A2E22 !important;">सेवा प्रकार</label>
                    <select class="w-full rounded-lg border border-line bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest" style="color: #1A2E22 !important;" name="service_type" id="service_type">
                        <option selected disabled value="" style="color: #1A2E22 !important;">एउटा विकल्प छान्नुहोस्</option>
                        <option value="one_week" style="color: #1A2E22 !important;">१ हप्ता / रु १,५००</option>
                        <option value="one_month" style="color: #1A2E22 !important;">१ महिना / रु ५,०००</option>
                        <option value="one_year" style="color: #1A2E22 !important;">१ वर्ष / रु ५०,०००</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-base font-semibold mb-1.5" for="message" style="color: #1A2E22 !important;">सन्देश</label>
                    <textarea class="w-full rounded-lg border border-line bg-paper px-3.5 py-2.5 text-base focus:outline-none focus:border-forest focus:ring-1 focus:ring-forest" style="color: #1A2E22 !important;" name="message" id="message" cols="30" rows="6"></textarea>
                </div>
                <button class="sm:col-span-2 py-3.5 rounded-lg font-semibold text-lg bg-forest text-white hover:bg-forest-dark transition-colors" type="submit">
                    फारम पेश गर्नुहोस्
                </button>
            </form>
        </div>
    </section>
</x-frontend-layout>

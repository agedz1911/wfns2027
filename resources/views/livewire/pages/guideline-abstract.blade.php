<div>

    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Abstract Submission</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <section class="py-12 max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 ">
        @foreach ($guidelineAbstracts as $abstract)
        <div class="card bg-white border border-[#0c7fdd]/25 shadow-xs rounded-xl mb-5">
            <div class="card-body p-5 space-y-3">
                <h4 class="card-title text-lg font-bold text-[#1B1464] border-l-4 border-[#0c7fdd] pl-3">{{
                    $abstract->title }}</h4>
                {!! str($abstract->description)->markdown()->sanitizeHtml() !!}
            </div>
        </div>
        @endforeach
    </section>

    <section class="border-t border-[#0c7fdd]/25">
        <div class="py-12  px-5 sm:px-8 lg:px-12 max-w-7xl mx-auto">
            <div class="card bg-white border border-[#0c7fdd]/25 shadow-xs rounded-xl mb-5 ">
                <div class="card-body p-5 space-y-3">
                    <h4 class="card-title text-lg font-bold text-[#1B1464] border-l-4 border-[#0c7fdd] pl-3">Frequently
                        asked questions</h4>
                    @foreach ($faqs as $faq)
                    <div class="collapse collapse-arrow bg-base-100 border border-base-300 rounded-lg">
                        <input type="radio" name="my-accordion-2" />
                        <div class="collapse-title font-semibold">{{ $faq->title }}</div>
                        <div class="collapse-content text-sm text-gray-500">
                            {!! str($faq->description)->markdown()->sanitizeHtml() !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </section>

</div>
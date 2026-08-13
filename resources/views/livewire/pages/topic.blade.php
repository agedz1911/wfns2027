<div>
    
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Topics</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <section class="mx-auto w-full px-5 lg:px-10 pt-16 pb-28 pattern relative" >
        <div class="bg-competition w-full h-full absolute"></div>
        <div class="relative z-10">
            @foreach ($uniqueCategories as $category)
            <p class="font-semibold my-3">{{$category}}</p>

            @php
            $categoryTopics = $topics->where('category', $category);
            $mainTopics = $categoryTopics
            ->whereNotNull('name')
            ->unique('name')
            ->values();
            @endphp

            <ol class="list-decimal list-inside space-y-2">
                @foreach ($mainTopics as $main)
                <li class="text-gray-800">
                    @if (in_array($main->name, ['Thursday, October 8, 2026', 'Friday, October 9, 2026']))
                    {{ $main->name }}

                    @php
                    // Ambil sub_name KHUSUS untuk tanggal ini saja
                    $dateSpecificSubs = $categoryTopics
                    ->where('name', $main->name) // Filter berdasarkan tanggal spesifik
                    ->pluck('sub_name')
                    ->filter() // buang null/empty
                    ->unique() // hindari duplikasi
                    ->values();
                    @endphp

                    @if ($dateSpecificSubs->isNotEmpty())
                    <ul class="list-disc list-inside ml-6 mt-1 space-y-1">
                        @foreach ($dateSpecificSubs as $sub)
                        <li>{{ $sub }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @else
                    {{ $main->name }}
                    @endif
                </li>
                @endforeach
            </ol>
            @endforeach
        </div>
    </section>
</div>
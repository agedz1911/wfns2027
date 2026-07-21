<div>
    <section class=" relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#018284] to-[#79d4d6]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Topics</h2>
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
<div>
    
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Local Organizing Committee</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <section class="mx-auto w-full pattern px-5 md:px-10 pt-0 pb-10 md:py-20">
        <div class="bg-competition w-full h-full absolute"></div>
        {{-- @foreach ($uniqueCategories as $category)
        <h2 class="text-center text-xl lg:text-2xl font-bold mb-5 uppercase text-primary">{{$category}}</h2>
        <div class="flex flex-wrap gap-4 justify-center mb-12">
            @foreach ($committees as $committee)
            @if ($committee->category == $category)
            <div class="card w-full max-w-xs bg-base-100 card-md shadow-sm">
                <figure>
                    <img src="{{$committee->image ? asset('storage/' . $committee->image) : "
                        assets/images/speaker.png"}}" alt="{{$committee->name}}" alt="{{$committee->name}}" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $committee->name }}</h2>
                    <p>@if ($committee->title != null)
                        <br>
                        <span class="font-semibold ml-3">({{ $committee->title }})</span>
                        @endif
                    </p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endforeach --}}
        <div class="grid grid-cols-1 gap-3 relative ">
            @if (count($committees) > 0)
            @foreach ($uniqueCategories as $category)
            <div class="flex flex-col">
                <h1 class="font-semibold text-primary text-xl mt-5 md:mt-0">{{ $category }}</h1>
                <div class="flex flex-col">
                    @foreach ($committees as $committee)
                    @if ($committee->category == $category)
                    <ul class="list-disc list-inside">
                        <li class="mb-2 text-slate-600">{{ $committee->name }}
                            @if ($committee->title != null)
                            <br>
                            <span class="font-semibold ml-3">({{ $committee->title }})</span>
                            @endif
                        </li>
                    </ul>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
            @else
            <div class="w-full border">
                <p class="text-gray-500 text-2xl text-center font-semibold">No Data</p>
            </div>
            @endif
    </section>
</div>
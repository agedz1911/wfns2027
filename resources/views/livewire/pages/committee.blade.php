<div>
    <section class=" relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#018284] to-[#79d4d6]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Organizing Committee</h2>
        </div>
    </section>

    <section class="mx-auto w-full pattern px-5 md:px-10 pt-0 pb-10 md:py-20">
        <div class="bg-competition w-full h-full absolute"></div>
        {{-- @foreach ($uniqueCategories as $category)
        <h2 class="text-center text-xl lg:text-2xl font-bold mb-5 uppercase text-[#9E1F63]">{{$category}}</h2>
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
        <div class="grid grid-cols-1 gap-3 relative">
            @if (count($committees) > 0)
            @foreach ($uniqueCategories as $category)
            <div class="flex flex-col">
                <h1 class="font-semibold text-[#9E1F63] text-xl">{{ $category }}</h1>
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
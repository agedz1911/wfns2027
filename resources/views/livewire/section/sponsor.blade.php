<div>
    
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Sponsorship</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <section class="px-5 md:px-10 pt-0 pb-10 md:py-20">
        @foreach ($sortedGroupedSponsors as $category => $sponsors)
        <div class="border-b-2 border-dashed py-8 border-gray-300">
            <div class="">
                <div class="m-auto p-4">
                    <h2 class="mb-1 mt-3 text-2xl font-semibold text-center text-primary uppercase">{{ $category }}</h2>
                </div>
                <div class="flex flex-wrap justify-center items-center mx-5">
                    @foreach ($sponsors as $sponsor)
                    @if ($sponsor->category == 'Gold Sponsor')
                    <div class="p-0 border-x border-gray-300 w-full md:w-1/2 lg:w-1/3">
                        <div class="tooltip tooltip-primary tooltip-bottom" data-tip="{{$sponsor->company}}">
                            <div class="p-2 opacity-75 hover:opacity-100 text-center">
                                <a href="{{$sponsor->website ? $sponsor->website : 'javascript:void(0)'}}"
                                    target="_blank">
                                    {!! $sponsor->logo ? '<img src="' . asset('storage/' . $sponsor->logo) . '"
                                        class="img-fluid" alt="' . $sponsor->company . '" />' : '<small
                                        class="text-center text-primary">' . $sponsor->company . '</small>' !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    @elseif ($sponsor->category == 'Silver Sponsor')
                    <div class="p-0 border-x border-gray-300 w-full md:w-1/3 lg:w-1/4">
                        <div class="tooltip tooltip-primary tooltip-bottom" data-tip="{{$sponsor->company}}">
                            <div class="p-2 opacity-75 hover:opacity-100 text-center">
                                <a href="{{$sponsor->website ? $sponsor->website : 'javascript:void(0)'}}"
                                    target="_blank">
                                    {!! $sponsor->logo ? '<img src="' . asset('storage/' . $sponsor->logo) . '"
                                        class="img-fluid" alt="' . $sponsor->company . '" />' : '<small
                                        class="text-center text-primary">' . $sponsor->company . '</small>' !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="p-0 border-x border-gray-300 w-full md:w-1/4 lg:w-1/5">
                        <div class="tooltip tooltip-primary tooltip-bottom" data-tip="{{$sponsor->company}}">
                            <div class="p-2 opacity-75 hover:opacity-100 text-center">
                                <a href="{{$sponsor->website ? $sponsor->website : 'javascript:void(0)'}}"
                                    target="_blank">
                                    {!! $sponsor->logo ? '<img src="' . asset('storage/' . $sponsor->logo) . '"
                                        class="img-fluid" alt="' . $sponsor->company . '" />' : '<small
                                        class="text-center text-primary">' . $sponsor->company . '</small>' !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </section>
</div>
<div>
    <section class="breadcrumbs relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#14599D] to-[#0CA6DD]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Sponsors</h2>
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
<div>
    
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Scientific Schedule</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <div class="px-5 md:px-10 pt-0 mt-10 flex flex-wrap gap-2 justify-end md:justify-center items-center">
        <label class="input input-lg input-primary rounded-lg w-full max-w-6xl">
            <i class="fa fa-search opacity-45 text-sm"></i>
            <input wire:model.live='search' type="text" class="grow" placeholder="Search Topic, Speaker, Room" />
        </label>
        <button class="btn btn-primary rounded-lg"><i
                class="fa fa-download"></i> Download PDF Schedule</button>
    </div>

    <section class="pt-10 pb-24 px-2 lg:px-5">
        <div class="flex flex-col lg:flex-row justify-between gap-4">
            <div class="drawer drawer-end block lg:hidden z-30">
                <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    <!-- Page content here -->
                    <label for="my-drawer-4"
                        class="drawer-button btn rounded-lg px-3"><i
                            class="fa-solid fa-filter"></i> Filter</label>
                </div>
                <div class="drawer-side">
                    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
                    <div class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                        <!-- Sidebar content here -->
                        <div class="my-auto">
                            <h2 class="card-title">Filter</h2>
                            <fieldset class="fieldset p-4 bg-base-100 border border-base-300 rounded-box w-64">
                                <legend class="fieldset-legend">Date</legend>
                                <div class="flex items-center">
                                    <select wire:model.live='date' class="select flex-grow">
                                        <option value="0">Choose a date</option>
                                        @foreach ($uniqDates as $date)
                                        <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->format('d F Y') }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if($date)
                                    <button wire:click="resetDate" class="btn btn-xs btn-error ml-2">X</button>
                                    @endif
                                </div>
                            </fieldset>
                            <fieldset class="fieldset p-4 bg-base-100 border border-base-300 rounded-box w-64">
                                <legend class="fieldset-legend">Session</legend>
                                <div class="flex items-center">
                                    <select wire:model.live='category' class="select flex-grow">
                                        <option value="0">Choose a Session</option>
                                        @foreach ($uniqCategories as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @if($category)
                                    <button wire:click="resetCategory" class="btn btn-xs btn-error ml-2">X</button>
                                    @endif
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card hidden lg:block lg:w-1/4 bg-base-100 order-1 lg:order-2 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">Filter</h2>
                    <fieldset class="fieldset p-4 bg-base-100 border border-base-300 rounded-box w-64">
                        <legend class="fieldset-legend">Date</legend>
                        <div class="flex items-center">
                            <select wire:model.live='date' class="select flex-grow">
                                <option value="0">Choose a date</option>
                                @foreach ($uniqDates as $date)
                                <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->format('d F Y') }}</option>
                                @endforeach
                            </select>
                            @if($date)
                            <button wire:click="resetDate" class="btn btn-xs btn-error ml-2">X</button>
                            @endif
                        </div>
                    </fieldset>
                    <fieldset class="fieldset p-4 bg-base-100 border border-base-300 rounded-box w-64">
                        <legend class="fieldset-legend">Session</legend>
                        <div class="flex items-center">
                            <select wire:model.live='category' class="select flex-grow">
                                <option value="0">Choose a Session</option>
                                @foreach ($uniqCategories as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            @if($category)
                            <button wire:click="resetCategory" class="btn btn-xs btn-error ml-2">X</button>
                            @endif
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="w-full lg:w-3/4 order-2 lg:order-1">
                @foreach ($uniqDates as $date)
                <div class="text-center lg:text-start border-t border-dashed pt-2">
                    <h2 class="text-lg font-semibold uppercase text-primary tracking-wider">
                        {{\Carbon\Carbon::parse($date)->format('l, d F')}}
                    </h2>
                </div>
                @foreach ($uniqCategories as $item)
                @if (
                !($date == '2026-10-08' && ($item == 'Symposium' || $item == 'Master Class' || $item == 'Scientific Competition')) &&
                !($date == '2026-10-09' && ($item == 'Symposium' || $item == 'Master Class' || $item == 'Scientific Competition')) &&
                !($date == '2026-10-10' && ($item == 'Workshop' || $item == 'Master Class')) &&
                !($date == '2026-10-11' && ($item == 'Workshop' ))
                )
                <p class="font-semibold tracking-wider my-5"><i
                        class="fa fa-angle-right text-sm font-semibold"></i> {{$item}}</p>
                @endif
                @foreach ($atglances as $atglance)
                @if ($atglance->category_sesi == $item && $atglance->date == $date)

                <div class="collapse bg-base-100 border border-base-300 my-2">
                    <input type="radio" name="my-accordion-1" />
                    <div class="collapse-title font-semibold">{{$atglance->title_ses}} - <span class="text-xs"><i
                                class="fa fa-map-marker text-primary"></i> {{$atglance->room}} </span></div>
                    <div class="collapse-content text-sm">
                        <div class="flex flex-wrap justify-between gap-4 items-start">
                            <div>
                                <p class="mb-1">
                                    <span class="font-semibold">Session:</span> {{$atglance->title_ses}}
                                </p>
                                <p class="mb-2"><i class="fa fa-clock text-primary"></i> {{$atglance->time}} | <i
                                        class="fa fa-map-marker text-primary"></i> {{$atglance->room}}</p>
                            </div>
                            <div>
                                {{-- {{$atglance->category_sesi}} --}}
                                <p class="font-semibold">Moderator: <span class="font-normal">
                                        {{$atglance->moderator}}</span></p>
                                <p class="font-semibold">Panelists: <br> <span class="font-normal">
                                        {{$atglance->panelist}}</span></p>
                            </div>
                        </div>
                        <div class="overflow-x-auto sm:rounded-lg mt-4 border-t border-dashed border-purple-200">
                            <table class="table table-md">
                                <tbody>
                                    @foreach ($atglance->schedules as $schedule)
                                    <tr class="border-b border-gray-200 hover:bg-purple-50">
                                        <td>
                                            <p>{{$schedule->time_speaker}}</p>
                                        </td>
                                        <td class="font-semibold">
                                            {{$schedule->topic_title}}
                                            <br><span class="font-normal text-gray-500">Speaker:
                                                {{$schedule->speaker}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endforeach
                @endforeach
            </div>
        </div>
        <div class=" mt-10">
            <p class="text-sm text-error italic">
                Note: <br>
                The scientific schedule is provisional and may be adjusted as required.
            </p>
        </div>
    </section>

    {{-- <section class="faq-general-ques pb-10">
        <div class="container">
            <div class="general-ques">
                <div class="row">
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-2">
                        <button class="btn "><i class="fa fa-download"></i> Download Day 1</button>
                        <button class="btn "><i class="fa fa-download"></i> Download Day 2</button>
                        <button class="btn "><i class="fa fa-download"></i> Download Day 3</button>
                    </div>


                    <div class="col-lg-12 order-2 order-lg-1 p-2">
                        <div class="general-ques-right mx-5">
                            <div class="row gy-3">
                                <div class="px-3 pb-5">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa-solid fa-search"></i>
                                        </span>
                                        <input type="text" class="form-control border" placeholder="Search Schedule"
                                            aria-label="Search Schedule" aria-describedby="basic-addon1"
                                            wire:model.live.debounce.500ms="search">
                                    </div>
                                </div>
                            </div>

                            @foreach ($uniqDates as $date)
                            <div class="section-title py-2 text-center text-lg-start">
                                <h4 class="mb-1">{{\Carbon\Carbon::parse($date)->format('l, d F')}}</h4>
</div>
@foreach ($uniqCategories as $item)
@if (
!($date == '2025-09-25' && ($item == 'Workshop' ))
)
<p class="mb-0 mt-5">{{$item}}</p>

<div class="faq-accordion p-4 bg-lightgrey rounded border-2 border-light-subtle ">
    <div class="accordion accordion-faq " id="accordionFlushExample">
        @foreach ($atglances as $atglance)
        @if ($atglance->category_sesi == $item && $atglance->date == $date)
        <div class="accordion-item border mb-1 rounded">
            <p class="accordion-header p-4">
                <button class="accordion-button collapsed fw-semibold p-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$loop->index}}"
                    aria-expanded="false" aria-controls="tes">
                    {{$atglance->title_ses}} - <small class="fst-italic"> {{$atglance->room}}</small>

                </button>
            </p>
            <div id="{{$loop->index}}" class="accordion-collapse collapse"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-lightgrey">
                    <div class="px-0">
                        <h4>{{$atglance->title_ses}}</h4>
                        <p class="black mb-2">{{$atglance->time}} | {{$atglance->room}}</p>
                        <p class="black mb-2"></p>
                        <p class="mb-0">Moderator : <span
                                class="black fw-semibold">{{$atglance->moderator}}
                            </span></p>
                        <p class="">Panelist : <span
                                class="black fw-semibold">{{$atglance->panelist}}
                            </span></p>
                    </div>
                    <div class="table-responsive">
                        <table class="table rounded table-hover">
                            <tbody>
                                @foreach ($atglance->schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->time_speaker}}</td>
                                    <td><span
                                            class="black fw-bold">{{$schedule->topic_title}}</span>
                                        <br><small>Speaker: {{$schedule->speaker}}</small>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @endif
        @endforeach
    </div>
</div>
@endif
@endforeach
@endforeach
</div>
</div>
</div>
</div>
</div>
</section> --}}
</div>
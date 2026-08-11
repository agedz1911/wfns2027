<div wire:init="loadFaculties">
    <section class=" relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#14599D] to-[#0CA6DD]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">faculties</h2>
        </div>
    </section>

    <section class="mx-auto w-full px-5 md:px-10 pt-0 pb-10 md:py-20">
        <div class="">
            <div class="w-full px-3">
                <label class="input input-primary rounded-xl input-lg w-full">
                    <i class="fa-solid fa-search h-[1em] opacity-50"></i>
                    <input wire:model.live.debounce.500ms="searchTerm" type="text" class="w-full" required
                        placeholder="Search Faculties.." />
                </label>
            </div>
            <div class="mt-10">
                <!-- name of each tab group should be unique -->
                <div class="tabs tabs-border justify-evenly mb-5">
                    <input type="radio" name="my_tabs_2"
                        class="tab uppercase tracking-wider text-lg hover:text-sky-500 text-primary"
                        aria-label="Indonesian Faculties" checked="checked" />
                    <div class="tab-content  p-5 rounded-lg">
                        @if (!$readyToLoad)
                        <div class="flex w-full flex-col gap-4">
                            <div class="skeleton h-40 w-full"></div>
                            <div class="skeleton h-4 w-28"></div>
                            <div class="skeleton h-4 w-full"></div>
                        </div>
                        @else
                        <div wire:loading.flex wire:target="searchTerm" class="flex w-full flex-col gap-4">
                            <div class="skeleton h-40 w-full"></div>
                            <div class="skeleton h-4 w-28"></div>
                            <div class="skeleton h-4 w-full"></div>
                        </div>
                        <div wire:loading.remove wire:target="searchTerm" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5">

                            @foreach ($indofaculties as $indo)
                            <div
                                class="card bg-sky-50 shadow-sm p-0 hover:shadow-md hover:scale-105 transition-all duration-200">
                                
                                <figure onclick="my_modal_{{$loop->index}}.showModal()"
                                    class="relative hover:cursor-pointer ">
                                    <img src="{{$indo->image ? asset('storage/' . $indo->image) : "
                                        assets/images/speaker.png"}}" alt="{{$indo->name}}"
                                        class="w-full h-full  object-cover rounded-xl  lg:px-2">
                                </figure>
                                <div class="card-body text-center">
                                    <h2 onclick="my_modal_{{$loop->index}}.showModal()"
                                        class="text-xl font-semibold text-primary hover:text-sky-700 hover:cursor-pointer">
                                        {{$indo->name}}
                                    </h2>
                                    <p>{{$indo->description}}</p>
                                </div>
                            </div>


                            <dialog id="my_modal_{{$loop->index}}" class="modal">
                                <div class="modal-box w-10/12 max-w-5xl">
                                    <form method="dialog">
                                        <button
                                            class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex items-center gap-3 pb-3">
                                        <img class="rounded-full bg-sky-500/20 shadow w-20 h-20 object-cover"
                                            src="{{$indo->image ? asset('storage/' . $indo->image) : "
                                            assets/images/speaker.png"}}" alt="Photo">
                                        <div>
                                            <p class="mb-0"><span
                                                    class="text-primary text-lg font-semibold">{{$indo->name}}</span>
                                                <br>
                                                {{$indo->country}}
                                            </p>
                                            <p class="text-sm text-gray-500">{{$indo->description}}</p>
                                        </div>
                                    </div>
                                    <p class="font-medium text-lg text-gray-700">Session</p>
                                    <div class="border-t pt-5">
                                        @foreach ($indo->schedules as $schedule)
                                        <div class="flex flex-wrap gap-5 text-sky-600">
                                            <p>{{\Carbon\Carbon::parse($schedule->sesi->date)->format('d
                                                F Y')}}</p>
                                            <p>{{$schedule->time_speaker}}</p>
                                            <p>{{$schedule->sesi->room}}</p>
                                        </div>
                                        <p class="mb-1">{{$schedule->sesi->title_ses}}
                                        </p>
                                        <p class="text-gray-500 mb-5 border-b border-dashed border-gray-800 pb-3">
                                            {{$schedule->topic_title}}
                                        </p>
                                        @endforeach
                                    </div>
                                    <div class="modal-action">
                                        <form method="dialog">
                                            <!-- if there is a button, it will close the modal -->
                                            <button class="btn">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </dialog>
                            @endforeach
                        </div>
                        @endif
                        {{-- <div class="mt-5 border-t border-dashed pt-3">
                            {{ $indofaculties->links() }}
                        </div> --}}
                        <p class="text-xs italic mt-5">*within confirmation</p>
                    </div>

                    <input type="radio" name="my_tabs_2"
                        class="tab uppercase tracking-wider  text-lg hover:text-sky-500 text-primary"
                        aria-label="International faculties"  />
                    <div class="tab-content  p-5 rounded-lg">
                        
                        @if (!$readyToLoad)
                        <div class="flex w-full flex-col gap-4">
                            <div class="skeleton h-40 w-full"></div>
                            <div class="skeleton h-4 w-28"></div>
                            <div class="skeleton h-4 w-full"></div>
                        </div>
                        @else
                        <div wire:loading.flex wire:target="searchTerm" class="flex w-full flex-col gap-4">
                            <div class="skeleton h-40 w-full"></div>
                            <div class="skeleton h-4 w-28"></div>
                            <div class="skeleton h-4 w-full"></div>
                        </div>
                        <div wire:loading.remove wire:target="searchTerm" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                            @foreach ($foreignfaculties as $foreign)
                            <div
                                class="card bg-sky-50 shadow-sm p-0 hover:shadow-md hover:scale-105 transition-all duration-200">
                                <figure onclick="my_modal_f{{$loop->index}}.showModal()"
                                    class="relative hover:cursor-pointer ">
                                    <img src="{{$foreign->image ? asset('storage/' . $foreign->image) : "
                                        assets/images/speaker.png"}}" alt="{{$foreign->name}}"
                                        class="w-full h-full  object-cover rounded-xl  lg:px-2">

                                </figure>
                                <div class="card-body text-center">
                                    <h2 onclick="my_modal_f{{$loop->index}}.showModal()"
                                        class="text-xl font-semibold text-primary hover:cursor-pointer hover:text-sky-700">
                                        {{$foreign->name}}
                                    </h2>
                                    <div class="flex justify-center">
                                        <div class="badge badge-primary badge-outline badge-sm">
                                            <p class="text-sm">{{$foreign->country == 'South Korea' ? 'Republic of
                                                Korea' : $foreign->country}}</p>
                                        </div>
                                    </div>
                                    @if ($foreign->description != null)
                                    <p class="text-xs italic text-end text-gray-500">{{$foreign->description}}</p>
                                    @endif
                                </div>
                            </div>

                            <dialog id="my_modal_f{{$loop->index}}" class="modal">
                                <div class="modal-box w-10/12 max-w-5xl">
                                    <form method="dialog">
                                        <button
                                            class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex items-center gap-3 pb-3">
                                        <img class="rounded-full bg-sky-500/20 shadow w-20 h-20 object-cover"
                                            src="{{$foreign->image ? asset('storage/' . $foreign->image) : "
                                            assets/images/speaker.png"}}" alt="{{$foreign->name}}">
                                        <div>
                                            <p class="mb-0"><span
                                                    class="text-primary text-lg font-semibold">{{$foreign->name}}</span>
                                                <br>
                                                {{$foreign->country}}
                                            </p>
                                            <p class="text-sm text-gray-500">{{$foreign->description}}</p>
                                        </div>
                                    </div>
                                    <p class="font-medium text-lg text-gray-700">Session</p>
                                    <div class="border-t pt-5">
                                        @foreach ($foreign->schedules as $schedule)
                                        <div class="flex flex-wrap gap-5 text-sky-600">
                                            <p>{{\Carbon\Carbon::parse($schedule->sesi->date)->format('d
                                                F Y')}}</p>
                                            <p>{{$schedule->time_speaker}}</p>
                                            <p>{{$schedule->sesi->room}}</p>
                                        </div>
                                        <p class="mb-1">{{$schedule->sesi->title_ses}}
                                        </p>
                                        <p class="text-gray-500 mb-5 border-b border-dashed border-gray-800 pb-3">
                                            {{$schedule->topic_title}}
                                        </p>
                                        @endforeach
                                    </div>
                                    <div class="modal-action">
                                        <form method="dialog">
                                            <!-- if there is a button, it will close the modal -->
                                            <button class="btn">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </dialog>
                            @endforeach
                        </div>
                        @endif
                        {{-- <div class="mt-5 border-t border-dashed pt-3">
                            {{ $foreignfaculties->links() }}
                        </div> --}}
                        <p class="text-xs italic mt-5">*within confirmation</p>
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>
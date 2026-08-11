<div>
    <section class="relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#14599D] to-[#0CA6DD]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Welcome Message</h2>
        </div>
    </section>

    <section class="relative z-0 py-28 pattern">
        <div class="mb-5 px-4 md:px-24 flex flex-col gap-10 md:gap-20">
            @foreach ($messages as $welcomeMessage)
            @if ($loop->even)
            <div id="welcome-message-{{ $welcomeMessage->id }}" class="card shadow-lg bg-transparent border border-primary rounded-xl border-opacity-25 w-full mb-5">
                <div class="card-body">
                    <div class="grid grid-cols-1 lg:grid-cols-2 justify-items-stretch">
                        <div class="order-2 lg:order-1 p-2">
                            <div
                                class="w-full justify-center lg:flex-row flex flex-col items-center lg:items-end gap-2">
                                <div class="avatar">
                                    <img src="{{$welcomeMessage->image ? asset('storage/' . $welcomeMessage->image) : "
                                        assets/images/speaker.png"}}" alt="{{$welcomeMessage->name}}"
                                        class="w-full max-w-52 shadow-md rounded-lg ">
                                </div>
                                <div class="p-4 rounded-lg bg-gradient-to-tr from-[#1B1464] to-[#0CA6DD] w-full max-w-sm">
                                    <div class="ps-4 border-s border-[#fff] border-spacing-7">
                                        <p class="text-white text-xs italic">" {{$welcomeMessage->title}}
                                            "</p>
                                        <h6 class="font-semibold text-white">{{$welcomeMessage->name}}</h6>
                                    </div>
                                </div>
                            </div>
                            @if ($welcomeMessage->name2 && $welcomeMessage->title2 !== null)
                            <div
                                class="w-full justify-center lg:flex-row flex flex-col items-center lg:items-end gap-2 mt-3">
                                <div class="avatar">
                                    <img src="{{$welcomeMessage->image2 ? asset('storage/' . $welcomeMessage->image2) : "
                                        assets/images/speaker.png"}}" alt="{{$welcomeMessage->name2}}"
                                        class="w-full max-w-52 shadow-md rounded-lg ">
                                </div>
                                <div class="p-4 rounded-lg bg-gradient-to-tr from-[#1B1464] to-[#0CA6DD] w-full max-w-sm">
                                    <div class="ps-4 border-s border-[#fff] border-spacing-7">
                                        <p class="text-white text-xs italic">" {{$welcomeMessage->title2}}
                                            "</p>
                                        <h6 class="font-semibold text-white">{{$welcomeMessage->name2}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="order-1 lg:order-2 p-2 ">
                            <div class="flex flex-col ">
                                <div class="pr-2">
                                    <div class="pb-4  text-justify flex flex-col gap-2">
                                        {!! str($welcomeMessage->description)->markdown()->sanitizeHtml() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div id="welcome-message-{{ $welcomeMessage->id }}" class="card shadow-lg bg-transparent border border-primary border-opacity-25 w-full mb-5 rounded-xl">
                <div class="card-body">
                    <div class="grid grid-cols-1 lg:grid-cols-2 justify-items-stretch">
                        <div class="order-2 lg:order-2 p-2">
                            <div
                                class="w-full justify-center lg:flex-row flex flex-col items-center lg:items-end gap-2">
                                <div class="avatar">
                                    <img src="{{$welcomeMessage->image ? asset('storage/' . $welcomeMessage->image) : "
                                        assets/images/speaker.png"}}" alt="{{$welcomeMessage->name}}"
                                        class="w-full max-w-52 shadow-md rounded-lg ">
                                </div>
                                <div class="p-4 rounded-lg bg-gradient-to-tr from-[#1B1464] to-[#0CA6DD] w-full max-w-sm">
                                    <div class="ps-4 border-s border-[#fff] border-spacing-7">
                                        <p class="text-white text-xs italic">" {{$welcomeMessage->title}}
                                            "</p>
                                        <h6 class="font-semibold text-white">{{$welcomeMessage->name}}</h6>
                                    </div>
                                </div>
                            </div>
                            @if ($welcomeMessage->name2 && $welcomeMessage->title2 !== null)
                            <div
                                class="w-full justify-center lg:flex-row flex flex-col items-center lg:items-end gap-2 mt-3">
                                <div class="avatar">
                                    <img src="{{$welcomeMessage->image2 ? asset('storage/' . $welcomeMessage->image2) : "
                                        assets/images/speaker.png"}}" alt="{{$welcomeMessage->name2}}"
                                        class="w-full max-w-52 shadow-md rounded-lg ">
                                </div>
                                <div class="p-4 rounded-lg bg-gradient-to-tr from-[#1B1464] to-[#0CA6DD] w-full max-w-sm">
                                    <div class="ps-4 border-s border-[#fff] border-spacing-7">
                                        <p class="text-white text-xs italic">" {{$welcomeMessage->title2}}
                                            "</p>
                                        <h6 class="font-semibold text-white">{{$welcomeMessage->name2}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="order-1 lg:order-1 p-2 ">
                            <div class="flex flex-col ">
                                <div class="pr-2">
                                    <div class="pb-4  text-justify flex flex-col gap-2">
                                        {!! str($welcomeMessage->description)->markdown()->sanitizeHtml() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </section>


</div>
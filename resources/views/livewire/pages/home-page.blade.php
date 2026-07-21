<div class="relative">
    <section class="lg:min-h-screen banner relative pb-16 lg:pb-28">
        <div class="absolute inset-0 bg-gradient-to-t from-[#024C4B]/50 from-10% to-[#2E989A]/80"></div>
        <div
            class="z-10 relative pt-10 md:pt-14 lg:pt-32 flex flex-col md:flex-row items-start justify-start md:items-start md:justify-evenly gap-4">

            <div class="px-5 md:px-20 order-1 lg:order-1 w-full max-w-4xl flex flex-col items-center md:items-start">
                {{-- <img src="{{asset('assets/images/logo/logo-all.png')}}" class="w-40 rounded-xl" alt="Banner"> --}}
                <div class="flex gap-1 items-center justify-center">
                    <div>
                        <img src="{{asset('assets/images/logo/icon.png')}}" class="md:w-40 w-20" alt="">
                    </div>
                    <div class="">
                        <h1
                            class="font-bold uppercase text-3xl lg:text-5xl text-white mt-0 mb-0 lg:tracking-widest tracking-wide">
                            wssfn 2027</h1>
                        <h1 class="text-white text-2xl lg:text-4xl font-light tracking-wider">INTERIM MEETING
                        </h1>
                    </div>
                    <div>
                        <img src="{{asset('assets/images/logo/icon-2.png')}}" class="md:w-40 w-20" alt="">
                    </div>
                </div>
                <div class="w-full max-w-3xl mt-1">
                    <p class="text-white"><span class="text-xl font-bold">World Society for Stereotactic and Functional
                            Neurosurgery</span> <br>
                        in conjuction with <br>
                        1<sup>st</sup> Congress of Indonesian Society for Stereotactic and Functional Neurosurgery
                        (INASSFN) and <br>
                        7<sup>th</sup> Congress of Indonesian Neurosurgical Pain Society (INPS)</p>
                    <p class="italic mt-3 text-red-600 font-bold text-xl md:text-2xl">"Global Functional Neurosurgery:
                        Bridging Networks Across Islands"</p>
                </div>
                <p class="text-white mt-1">
                    September 29<sup>th</sup> - October 2<sup>nd</sup>, 2027 <br> Bumi Surabaya City Resort, Surabaya,
                    Indonesia
                </p>
                <div class="mt-7 w-full gap-1 flex flex-wrap">
                    <a
                        class="text-white hover:cursor-pointer hover:bg-red-700  bg-red-600 hover:border-red-600 focus:ring-4 focus:outline-none focus:ring-red-600 font-medium rounded-lg text-sm px-5 md:px-10 py-3 text-center  dark:border-red-600 dark:text-red-600 dark:hover:text-white dark:hover:bg-red-800 dark:focus:ring-white"><i
                            class="fa-solid fa-file-download mr-1 text-xs"></i>Download Announcement </a>
                    <a href="/registration" wire:navigate
                        class="btn text-sm px-5 md:px-10 py-3 text-center rounded-lg btn-lg "><i
                            class="fa-solid fa-pen-to-square"></i> Register Now </a>
                </div>
            </div>
            <div class="px-1 order-2 lg:order-2">
                <livewire:section.flyer />
            </div>
        </div>
        <div
            class="absolute wave block md:hidden lg:block overflow-hidden w-full z-0 left-0 leading-none bottom-[-1px]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path class="fill-white translate-middle-y" fill-opacity="1"
                    d="M0,64L80,96C160,128,320,192,480,234.7C640,277,800,299,960,288C1120,277,1280,235,1360,213.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                </path>
            </svg>

        </div>
    </section>

    <section class="px-2 -mt-10 lg:-mt-30 lg:px-7 pb-24 ">
        <div id="countdown" class="flex flex-wrap justify-center lg:justify-start md:flex-row w-full mx-auto gap-4">
            <div class="card bg-[#044b4a] rounded-2xl w-full max-w-2xl">
                <div class="card-body">
                    <div class="flex justify-evenly gap-4 items-center">
                        <div class="text-center">
                            <span id="days" class="font-bold text-white mb-0 text-2xl lg:text-4xl"></span><br>
                            <small class="text-white mt-0 text-xs">Days</small>
                        </div>
                        <div class="text-center">
                            <span id="hours" class="font-bold text-white mb-0 text-2xl lg:text-4xl"></span><br>
                            <small class="text-white mt-0 text-xs">Hours</small>
                        </div>
                        <div class="text-center">
                            <span id="minutes" class="font-bold text-white mb-0 text-2xl lg:text-4xl"></span><br>
                            <small class="text-white mt-0 text-xs">Minutes</small>
                        </div>
                        <div class="text-center">
                            <span id="seconds" class="font-bold text-white mb-0 text-2xl lg:text-4xl"></span><br>
                            <small class="text-white mt-0 text-xs">Seconds</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lg:pb-16 pb-20 mt-10 grid grid-cols-1 lg:grid-cols-2 px-3 lg:px-8 gap-3">
        <div class=" px-3 lg:px-8">
            {{-- <img src="assets/images/logo/logo-all.png" alt="Icon" class="w-60 mb-5" class=""> --}}
            <div class="flex gap-1 items-center justify-center">
                <div>
                    <img src="{{asset('assets/images/logo/icon.png')}}" class="md:w-40 w-20" alt="">
                </div>
                <div class="">
                    <h1
                        class="font-bold uppercase text-3xl lg:text-5xl text-[#044b4a] mt-0 mb-0 lg:tracking-widest tracking-wide">
                        wssfn 2027</h1>
                    <h1 class="text-[#044b4a] text-2xl lg:text-4xl font-light tracking-wider">INTERIM MEETING
                    </h1>
                </div>
                <div>
                    <img src="{{asset('assets/images/logo/icon-2.png')}}" class="md:w-40 w-20" alt="">
                </div>
            </div>
            <div class="w-full max-w-3xl mt-1">
                <p class="text-[#044b4a]"><span class="text-xl font-bold">World Society for Stereotactic and Functional
                        Neurosurgery</span> <br>
                    in conjuction with <br>
                    1<sup>st</sup> Congress of Indonesian Society for Stereotactic and Functional Neurosurgery
                    (INASSFN) and <br>
                    7<sup>th</sup> Congress of Indonesian Neurosurgical Pain Society (INPS)</p>
            </div>
            <div class="flex flex-col md:flex-row lg:justify-start justify-center items-center gap-3 mt-8">
                <div
                    class="z-10 hover:cursor-pointer max-w-sm p-6 bg-white border border-sky-50 rounded-lg shadow-md hover:bg-[#f4f4fc]">
                    <div class="flex items-center">
                        <div class="shrink-0 bg-red-600 p-4 rounded-full">
                            <i class="fa fa-calendar-o text-xl text-white"></i>
                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium  truncate">
                                Wednesday to Saturday
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                                September 29<sup>th</sup> - October 2<sup>nd</sup>, 2027
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="z-10 hover:cursor-pointer max-w-sm p-6 bg-white border border-sky-50 rounded-lg shadow-md hover:bg-[#f4f4fc]">
                    <div class="flex items-center px-5">
                        <div class="shrink-0 bg-red-600 p-4 rounded-full">
                            <i class="fa fa-map-marker text-xl text-white"></i>
                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium  truncate ">
                                Bumi Surabaya City Resort
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                                Surabaya, Indonesia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 align-items-center">
                <div class="flex flex-col gap-4">
                    <div class="rounded-xl bg-white shadow-lg">
                        <img src="assets/images/surabaya/5.jpg" class="w-full rounded-xl sepia-25" alt="surabaya 1">
                    </div>
                    <div class="rounded-xl bg-white shadow-lg">
                        <img src="assets/images/surabaya/6.jpg" class="w-full rounded-xl sepia-50" alt="surabaya 2">
                    </div>
                </div>
                <div class="rounded-xl bg-white shadow-lg">
                    <img src="assets/images/surabaya/4.jpg" class="w-full rounded-xl object-cover h-full sepia-25"
                        alt="surabaya 3">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-b from-[#044b4a] to-[#018284] relative z-0 py-28">
        {{-- <div class="absolute inset-0 feature start-0"></div> --}}
        <div class="relative">

            <div class="">
                <h2 class="text-4xl text-white font-semibold uppercase text-center mb-10">Welcome <span
                        class="text-white">message
                    </span></h2>
                <div class="flex flex-col md:flex-row justify-center">
                    @foreach ($welcomeMessages as $welcomeMessage)
                    <div class="mb-5 w-full max-w-3xl items-start px-2 lg:px-8">
                        <div class="pb-4 text-justify text-white">
                            {!! Str::limit(str($welcomeMessage->description)->markdown()->sanitizeHtml(), 450) !!} <br>
                            <a class="text-pink-200 hover:text-white hover:underline" href="/welcome-message">Read
                                More...</a>
                        </div>
                        <div class="mt-3 flex flex-col md:flex-row justify-between">
                            <div>
                                <div class="avatar">
                                    <img src="{{$welcomeMessage->image ? asset('storage/' . $welcomeMessage->image) : "
                                        assets/images/speaker.png"}}" alt="{{$welcomeMessage->name}}"
                                        class="w-full max-w-52 shadow-md rounded-lg ">
                                </div>
                                <div class="p-4 rounded-xl bg-[#044b4a] w-full max-w-sm mt-3 mb-5">
                                    <div class="p-2 border-s border-white border-spacing-7">
                                        <p class="text-white text-xs italic"> {{$welcomeMessage->title}}
                                        </p>
                                        <h6 class="font-semibold text-white">{{$welcomeMessage->name}}</h6>
                                    </div>
                                </div>
                            </div>
                            @if ($welcomeMessage->name2 && $welcomeMessage->title2 !== null)
                            <div>
                                <div class="avatar">
                                    <img src="{{$welcomeMessage->image2 ? asset('storage/' . $welcomeMessage->image2) : "
                                        assets/images/speaker.png"}}" alt="{{$welcomeMessage->name2}}"
                                        class="w-full max-w-52 shadow-md rounded-lg ">
                                </div>
                                <div class="p-4 rounded-xl bg-[#044b4a] w-full max-w-sm mt-3 mb-5">
                                    <div class="p-2 border-s border-white border-spacing-7">
                                        <p class="text-white text-xs italic"> {{$welcomeMessage->title2}}
                                        </p>
                                        <h6 class="font-semibold text-white">{{$welcomeMessage->name2}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full max-w-6xl mx-auto border-t mt-10 pt-10 border-white border-opacity-35">
                <div class="mb-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="w-full border-e border-opacity-35 border-white ">
                            <div class="border-b border-opacity-25 border-white md:border-b-0 text-center py-5 px-2">
                                <h1 class="text-white m-0 text-4xl md:text-5xl font-semibold"><span class="num"
                                        data-val="100"></span><span>+</span>
                                </h1>
                                <p class="text-xs text-white">Speakers</p>
                            </div>
                        </div>
                        <div class="w-full border-e border-opacity-35 border-white">
                            <div class="border-b border-opacity-25 border-white md:border-b-0 text-center py-5 px-2">
                                <h1 class="text-white m-0 text-4xl md:text-5xl font-semibold"><span class="num"
                                        data-val="40"></span><span>+</span>
                                </h1>
                                <p class="text-xs text-white">Symposium</p>
                            </div>
                        </div>
                        <div class="w-full border-e border-opacity-35 border-white">
                            <div class="border-b border-opacity-25 border-white md:border-b-0 text-center py-5 px-2">
                                <h1 class="text-white m-0 text-4xl md:text-5xl font-semibold"><span class="num"
                                        data-val="10"></span><span>+</span>
                                </h1>
                                <p class="text-xs text-white">Workshops </p>
                            </div>
                        </div>
                        <div class="w-full border-e border-opacity-35 border-white">
                            <div class="border-b border-opacity-25 border-white md:border-b-0 text-center py-5 px-2">
                                <h1 class="text-white m-0 text-4xl md:text-5xl font-semibold"><span class="num"
                                        data-val="50"></span><span>+</span>
                                </h1>
                                <p class="text-xs text-white">Topics</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lg:py-16 py-20  relative z-0 bg-competition">
        <div class="w-full pt-5">
            <div class="text-center pb-6 m-auto">
                <h2 class="mb-5 md:mb-8 text-3xl font-bold uppercase text-[#044b4a]">important <span
                        class="">Dates</span></h2>
            </div>
            <livewire:section.important-date />
        </div>
    </section>

    <section class="w-full pt-24 pb-3 px-2 lg:px-4 ">
        <div class="border-b-2 border-dashed border-[#302b88]/50 pb-10">
            <div class="">
                <div class="text-center pb-6 w-60 m-auto">
                    <h2 class="mb-1 text-[#044b4a] text-xl md:text-3xl font-bold uppercase">SPONSors</h2>
                </div>
                <div class="mt-10">
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 items-center justify-center">
                        @foreach ($sponsors as $sponsor)
                        <div class="p-0 border-r border-gray-300 last:border-0">
                            <div class="p-2 opacity-75 hover:opacity-100 text-center">
                                <a href="{{$sponsor->website ? $sponsor->website : 'javascript:void(0)'}}"
                                    target="_blank">
                                    {!! $sponsor->logo ? '<img src="' . asset('storage/' . $sponsor->logo) . '"
                                        class="img-fluid" alt="' . $sponsor->company . '" />' : '<small
                                        class="text-center text-accent">' . $sponsor->company . '</small>' !!}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center my-10">
                    <a class="btn bg-red-600 hover:bg-red-800 text-white border-none rounded-xl uppercase"
                        href="/sponsors">VIEW
                        MORE Sponsors</a>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full pt-24 pb-3 px-2 lg:px-4">
        <div class="text-center mb-5 pb-10">
            <h2 class="md:text-3xl text-xl font-semibold uppercase mb-1">GET DIRECTION TO THE <span
                    class="text-[#044b4a]">Venue</span></h2>
        </div>
        <div class="">
            <div class="flex flex-col lg:flex-row gap-5">
                <div class="lg:w-1/3 w-fit">
                    <div class="py-10  px-4 text-white rounded-lg shadow-md bg-[#044b4a]">
                        <div class="">
                            <h5 class="pb-2 tracking-wide font-semibold">EVENT VENUE :
                            </h5>
                            <p class="pb-5 m-0 text-sm"> Bumi Surabaya City Resort </p>
                            <h5 class="pb-2 tracking-wide font-semibold">ADDRESS :
                            </h5>
                            <p class="pb-5 m-0 text-sm"> Jl. Jenderal Basuki Rachmat No.106 - 128, Surabaya, East Java, Indonesia
                            </p>

                            <!-- <h5 class="text-white pb-2">RECEPTION INFO:</h5>
                                    <p class="pb-5 m-0">Booking: (+62) 1919-2020</p> -->
                            <a href="https://www.google.com/maps/dir//Bumi+Surabaya+City+Resort,+Jl.+Jenderal+Basuki+Rachmat+No.106+-+128,+Embong+Kaliasin,+Genteng,+Surabaya,+East+Java+60271/@-7.2715158,112.7383965,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2dd7fbdf9a148d5b:0xcc90538be2b721c!2m2!1d112.7409714!2d-7.2715211?entry=ttu&g_ep=EgoyMDI2MDcxNS4wIKXMDSoASAFQAw%3D%3D"
                                target="_blank" class="hover:text-red-500">Get Directions</a>
                        </div>
                    </div>
                </div>
                <div class="lg:w-2/3 w-full px-1 flex flex-col md:flex-row gap-2">
                    <iframe class="rounded-lg w-full "
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.730164077011!2d112.73839647606316!3d-7.271515771454071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbdf9a148d5b%3A0xcc90538be2b721c!2sBumi%20Surabaya%20City%20Resort!5e0!3m2!1sen!2sid!4v1784643428439!5m2!1sen!2sid"
                        width="600" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-5 justify-items-center">

                <div class="w-full ">
                    <a><img src="{{asset('assets/images/surabaya/1.jpg')}}"
                            class="w-full max-h-96 object-cover rounded-xl shadow-md saturate-150"
                            alt="venue surabaya "></a>
                </div>
                <div class="w-full ">
                    <a><img src="{{asset('assets/images/surabaya/2.jpg')}}"
                            class="w-full max-h-96 object-cover rounded-xl shadow-md saturate-150"
                            alt="venue surabaya "></a>
                </div>
                <div class="w-full ">
                    <a><img src="{{asset('assets/images/surabaya/3.jpg')}}"
                            class="w-full max-h-96 object-cover object-top rounded-xl shadow-md sepia-50"
                            alt="venue surabaya "></a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('livewire:navigated', function() {
        const days = document.getElementById('days');
        const hours = document.getElementById('hours');
        const minutes = document.getElementById('minutes');
        const seconds = document.getElementById('seconds');

        // Check if all elements are found
        const elementsExist = days && hours && minutes && seconds;

        // If any element is missing, log a warning and return
        if (!elementsExist) {
            console.warn('One or more countdown elements not found.');
            return;
        }

        // Get current date and time
        const currentTime = new Date();

        const targetTime = new Date(2027, 8, 29, 8, 0, 0);

        // Update countdown time
        function updateCountdown() {
            const currentTime = new Date();
            const diff = targetTime - currentTime;

            const d = Math.floor(diff / 1000 / 60 / 60 / 24);
            const h = Math.floor((diff / 1000 / 60 / 60) % 24);
            const m = Math.floor((diff / 1000 / 60) % 60);
            const s = Math.floor((diff / 1000) % 60);

            // Update elements if they exist
            if (days) days.innerHTML = d;
            if (hours) hours.innerHTML = h < 10 ? '0' + h : h;
            if (minutes) minutes.innerHTML = m < 10 ? '0' + m : m;
            if (seconds) seconds.innerHTML = s < 10 ? '0' + s : s;
        }

        // Call updateCountdown initially and set it to run every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
        let valueDisplays = document.querySelectorAll(".num");
        let interval = 4000;

        valueDisplays.forEach((valueDisplay) => {
            let startValue = 0;
            let endValue = parseInt(valueDisplay.getAttribute("data-val"));
            let duration = Math.floor(interval / endValue);
            let counter = setInterval(function() {
                startValue += 1;
                valueDisplay.textContent = startValue;
                if (startValue == endValue) {
                    clearInterval(counter);
                }
            }, duration);
        });
    });
</script>
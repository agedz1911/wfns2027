<div>
    <section class=" relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#018284] to-[#79d4d6]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Visiting</h2>
        </div>
    </section>
    <section class="px-5 md:px-10 pt-0 pb-10 md:py-20" id="bali">
    </section>

    {{-- <section class="px-5 md:px-10 pt-0 pb-10 md:py-20" id="bali">
        <div class="px-2 lg:px-5 text-slate-700">
            <div class="flex gap-2 flex-wrap justify-between w-full items-end">
                <div class="w-full pb-2">
                    <p class="mb-1 text-[#39B54A]">Welcome to</p>
                    <h2 class="mb-1 text-3xl font-extrabold tracking-wide">Bandung, Indonesia</h2>
                    <p class="m-0 text-justify"><span class="text-[#39B54A]">Bandung</span> Bandung is a vibrant and
                        creative city in West Java known for its cool mountain climate, rich colonial architecture such
                        as the iconic Gedung Sate, and a dynamic culinary and cultural scene. Blending modern urban
                        energy with scenic natural surroundings like Lembang and Tangkuban Perahu, the city has become a
                        popular destination for education, tourism, fashion, and conferences. Its lively atmosphere and
                        diverse attractions make Bandung an inspiring and welcoming host city for national and
                        international events.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 mt-5">
                <div class="w-full p-1 flex justify-center">
                    <img src="{{asset('assets/images/bandung/g-sate.jpg')}}"
                        class="w-full max-w-xl rounded-lg shadow-lg" alt="VR Presentation and conference">
                </div>
                <div class="w-full pb-2">
                    <p class="mb-1 text-[#39B54A]">Welcome to</p>
                    <h2 class="mb-1 text-3xl font-extrabold tracking-wide">Bandung, indonesia</h2>
                    <p class="m-0 text-justify"><span class="text-[#39B54A]">Bandung</span> Bandung is a vibrant and
                        creative city in West Java known for its cool mountain climate, rich colonial architecture such
                        as the iconic Gedung Sate, and a dynamic culinary and cultural scene. Blending modern urban
                        energy with scenic natural surroundings like Lembang and Tangkuban Perahu, the city has become a
                        popular destination for education, tourism, fashion, and conferences. Its lively atmosphere and
                        diverse attractions make Bandung an inspiring and welcoming host city for national and
                        international events.</p>
                </div>
            </div>



            <div class="pt-10 lg:pt-20">
                <h4 class="text-xl font-semibold tracking-wide text-[#39B54A] mb-5">Top Reasons to Visit Bali</h4>
                
                <div class="tabs tabs-border justify-center gap-3 text-gray-500">
                    <input type="radio" name="my_tabs_2" class="tab hover:text-[#39B54A] text-[#78c9bb]"
                        aria-label="Transportation Information" checked="checked" />
                    <div class="tab-content border-base-300 bg-base-100 p-10 text-base">
                        <div class="flex flex-col lg:flex-row gap-5">
                            <div class="w-full lg:w-1/2 ">
                                <div class="carousel w-full shadow-md rounded-2xl relative" x-data="{ 
    currentSlide: @entangle('currentSlide'),
    autoplayInterval: {{ $autoplayInterval }},
    autoplayTimer: null,
    
    init() {
        this.startAutoplay();
        
        // Pause on hover
        this.$el.addEventListener('mouseenter', () => {
            this.stopAutoplay();
        });
        
        // Resume on mouse leave
        this.$el.addEventListener('mouseleave', () => {
            this.startAutoplay();
        });
    },
    
    startAutoplay() {
        this.autoplayTimer = setInterval(() => {
            @this.call('nextSlide');
        }, this.autoplayInterval);
    },
    
    stopAutoplay() {
        if (this.autoplayTimer) {
            clearInterval(this.autoplayTimer);
            this.autoplayTimer = null;
        }
    }
}">
                                    
                                    <div id="slide1"
                                        class="carousel-item relative w-full ease-in-out duration-300 h-full object-cover"
                                        x-show="currentSlide === 1"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform translate-x-full"
                                        x-transition:enter-end="opacity-100 transform translate-x-0"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform translate-x-0"
                                        x-transition:leave-end="opacity-0 transform -translate-x-full">
                                        <img src="{{asset('assets/images/bandung/whoos/Picture1.jpg')}}"
                                            class="w-full rounded-lg shadow-lg" alt="Kuliner Bali 1">
                                        <div
                                            class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                            <button wire:click="previousSlide"
                                                class="btn btn-circle btn-success btn-outline">❮</button>
                                            <button wire:click="nextSlide"
                                                class="btn btn-circle btn-success btn-outline">❯</button>
                                        </div>
                                    </div>

                                    
                                    <div id="slide2"
                                        class="carousel-item relative w-full ease-in-out duration-300 h-full object-cover"
                                        x-show="currentSlide === 2"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform translate-x-full"
                                        x-transition:enter-end="opacity-100 transform translate-x-0"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform translate-x-0"
                                        x-transition:leave-end="opacity-0 transform -translate-x-full">
                                        <img src="{{asset('assets/images/bandung/whoos/Picture2.jpg')}}"
                                            class="w-full rounded-lg shadow-lg" alt="Kuliner Bali 2">
                                        <div
                                            class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                            <button wire:click="previousSlide"
                                                class="btn btn-circle btn-success btn-outline">❮</button>
                                            <button wire:click="nextSlide"
                                                class="btn btn-circle btn-success btn-outline">❯</button>
                                        </div>
                                    </div>

                                    
                                    <div id="slide3"
                                        class="carousel-item relative w-full ease-in-out duration-300 h-full object-cover"
                                        x-show="currentSlide === 3"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform translate-x-full"
                                        x-transition:enter-end="opacity-100 transform translate-x-0"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform translate-x-0"
                                        x-transition:leave-end="opacity-0 transform -translate-x-full">
                                        <img src="{{asset('assets/images/bandung/whoos/Picture3.jpg')}}"
                                            class="w-full rounded-lg shadow-lg" alt="Kuliner Bali 3">
                                        <div
                                            class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                            <button wire:click="previousSlide"
                                                class="btn btn-circle btn-success btn-outline">❮</button>
                                            <button wire:click="nextSlide"
                                                class="btn btn-circle btn-success btn-outline">❯</button>
                                        </div>
                                    </div>

                                   
                                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
                                        @for($i = 1; $i <= $totalSlides; $i++) <button wire:click="goToSlide({{ $i }})"
                                            class="w-3 h-3 rounded-full transition-all duration-300 {{ $currentSlide === $i ? 'bg-success w-8' : 'bg-white/50' }}">
                                            </button>
                                            @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2">
                                <p class="text-justify">Bandung is well served by a variety of transportation options,
                                    including Whoosh High–Speed, Train Services and Kertajati International Airport,
                                    which connects the city to numerous domestic and international destinations. Both
                                    international and domestic participants can reach Bandung easily, with multiple
                                    direct flight options available.
                                    Participants traveling from Jakarta may take:
                                </p>
                                <ul class="list-disc list-inside ml-2">
                                    <li>A regular train from Gambir Station to Bandung Station, with an approximate
                                        travel time of 3 hours, or</li>
                                    <li>The Whoosh high-speed train from Halim Station, which takes approximately 45–54
                                        minutes.</li>
                                </ul>
                                <p class="text-justify mt-3">Upon arrival at Padalarang Station, travelers can continue
                                    their journey by taking
                                    the feeder train to Bandung Station, which takes approximately 15 minutes. From
                                    Bandung Station, the event venue hotel is approximately 15 minutes away and can be
                                    conveniently reached by taxi or online ride–hailing services, ensuring a smooth and
                                    hassle–free journey</p>

                                <p class="text-black mb-2 mt-3 font-semibold">How to Ride the Whoosh from Soekarno–Hatta
                                    Airport</p>

                                <p class="text-justify">Confused about how to take the Whoosh high–speed train from
                                    Soekarno–Hatta nternational Airport? Don’t worry—it’s easy and convenient. The
                                    official departure station for the Whoosh is Halim Station, so travelers from the
                                    airport will need to use another mode of transportation to get there.</p>
                                <p>Below are four practical ways to travel from Soekarno–Hatta Airport to Halim Station
                                </p>
                                <ul class="list-decimal list-inside mt-3">
                                    <li class="mb-3"><span class="font-semibold text-black"> Take the DAMRI Bus from
                                            Soekarno–Hatta
                                            Airport</span>
                                        <p>The DAMRI bus is a reliable and efficient public transportation option. It
                                            operates on a point–to–point route, meaning there are no intermediate stops,
                                            helping to reduce travel time.</p>
                                        <p>Details: <br>
                                            Departure Schedule: 7:30 AM – 7:30 PM WIB (every hour) <br>
                                            Estimated Travel Time: 40–50 minutes
                                        </p>
                                        <p>Route: <br>
                                            Exit the airport via the South or North Perimeter Road (depending on your
                                            terminal), enter the Sedyatmo Toll Road, continue to the Jakarta Inner City
                                            Toll Road, and exit at the Halim Toll Road.
                                        </p>
                                        <p>Drop–off Points: <br>
                                            Halim Station or KCIC Halim area <br>
                                            Bus Stops at Airport: Near terminal exits at Terminal 1A, 1B, 1C, Terminal
                                            2F, and Terminal 3
                                        </p>
                                    </li>
                                    <li class="mb-3"><span class="font-semibold text-black"> Take the Airport Train and
                                            LRT</span>
                                        <p class="text-justify">If you prefer rail transport, you can combine the
                                            Airport Train (Skytrain & Railink) with the Jabodebek LRT.</p>
                                        <p>Details: <br>
                                            Departure Schedule: 6:00 AM – 10:00 PM WIB (every 30 minutes) <br>
                                            Estimated Travel Time: 1–1.5 hours
                                        </p>
                                        <p>Route: <br>
                                            Take the Skytrain from your terminal
                                            Transfer to the Railink Airport Train
                                            Get off at BNI City Station
                                            Walk to Dukuh Atas LRT Station
                                            Take the Jabodebek LRT to Halim Station
                                        </p>
                                        <p>Tips: <br>
                                            Prepare electronic money in advance and avoid bringing excessive luggage, as
                                            this route involves transfers and walking.
                                        </p>
                                    </li>
                                    <li class="mb-3"><span class="font-semibold text-black"> Take an Online Taxi</span>
                                        <p class="text-justify">For a more direct and hassle–free option, you can use an
                                            online taxi. This is ideal if you’re traveling with large luggage or with
                                            family.</p>
                                        <p>You can also book a car rental through platforms like Traveloka or Bluebird
                                            for added comfort. Travel time may be shorter outside peak traffic hours
                                        </p>
                                    </li>
                                    <li class="mb-3"><span class="font-semibold text-black"> Airport Pickup and Drop–off
                                            Service</span>
                                        <p class="text-justify">For maximum convenience, consider using Traveloka and
                                            Bluebird airport pickup and drop–off service to Halim Station</p>
                                        <p>Benefits: <br>
                                            • Available 24/7 <br>
                                            • Multiple vehicle options (shuttle, bus, taxi) <br>
                                            • Drivers monitor flight delays and wait if necessary <br>
                                            • Easy booking anytime, anywhere <br>
                                            • This service eliminates the stress of finding transportation upon arrival
                                            and helps ensure you reach Halim Station on time.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <input type="radio" name="my_tabs_2" class="tab hover:text-[#39B54A] text-[#78c9bb]"
                        aria-label="Interesting tourist attractions" />
                    <div class="tab-content border-base-300 bg-base-100 p-10">
                        <div class="flex flex-wrap gap-3 justify-around">
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture4.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Ciwidey White Crater</h2>
                                    <p class="text-justify">Have you ever seen the White Crater of Ciwidey as the
                                        backdrop for stunning Instagram photos? This popular tourist destination in
                                        Bandung is truly mesmerizing. If you’ve never visited, this magical place is a
                                        must–see at least once in your lifetime</p>
                                    <p class="text-justify">
                                        The White Crater of Ciwidey is a crater lake formed by the eruption of Mount
                                        Patuha, an active volcano in West Java. The lake’s water contains a very high
                                        level of acidity, which gives it a unique whitish–green hue—sometimes appearing
                                        blue or even brown. These colors can change depending on sulfur levels and
                                        temperature
                                    </p>
                                    <p class="text-justify">
                                        If you’re lucky, you’ll catch the crater at its most beautiful whitish–green
                                        shade, creating a breathtaking backdrop for photos
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture5.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Lembang Bamboo Village</h2>
                                    <p class="text-justify">
                                        Natural beauty blended with a traditional Sundanese atmosphere makes Dusun Bambu
                                        a delightful tourist destination in Bandung. This perfect combination offers a
                                        serene escape from the bustle of city life
                                    </p>
                                    <p class="text-justify">It’s hard not to be captivated by the lakeside dining area,
                                        which has become Dusun Bambu’s iconic highlight and often appears in photos of
                                        this popular attraction. Visitors can also enjoy an overnight stay, choosing
                                        between comfortable villas or a unique glamping experience surrounded by nature
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture6.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">The Lodge Maribaya</h2>
                                    <p class="text-justify">
                                        Tourism in Lembang has been booming in recent years, and The Lodge Maribaya
                                        stands out as one of the area’s most popular and up–and–coming destinations.
                                        Reopening in 2016 with a fresh new look, The Lodge Maribaya has become an ideal
                                        getaway in Bandung, especially for families looking for a unique and memorable
                                        experience
                                    </p>
                                    <p class="text-justify">Beyond its distinctive camping area featuring uniquely
                                        designed tents, The Lodge Maribaya offers a variety of thrilling attractions,
                                        including the Sky Tree, Hang Gliding, Zip Bike, and Mountain Swing—perfect for
                                        visitors seeking both adventure and scenic views
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture7.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Saung Angklung Udjo</h2>
                                    <p class="text-justify">
                                        Saung Angklung Udjo is a popular cultural destination in Bandung that offers an
                                        immersive experience of Sundanese arts in one complete package. As its name
                                        suggests, the centerpiece here is the angklung—an iconic Indonesian bamboo
                                        instrument—along with its history and musical traditions
                                    </p>
                                    <p class="text-justify">Visitors can enjoy lively angklung performances that combine
                                        music, dance, and audience participation. Beyond watching shows, guests also
                                        have the opportunity to learn how angklungs are made and even join special
                                        training classes for those who want hands–on experience
                                    </p>
                                    <p class="text-justify">Before leaving, don’t miss the souvenir shop, where you can
                                        purchase an angklung to take home as a meaningful reminder of your cultural
                                        visit</p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture8.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Glamping Lakeside Rancabali</h2>
                                    <p class="text-justify">
                                        Located near the renowned White Crater of Ciwidey and the Water Village of Ranca
                                        Upas, Glamping Lakeside Rancabali offers a distinctive glamping experience on
                                        the shores of Situ Patenggang Lake. Surrounded by breathtaking lake views,
                                        refreshing mountain air, and tranquil mornings, this destination provides an
                                        unforgettable retreat in nature
                                    </p>
                                    <p class="text-justify">According to the official website, accommodation at Glamping
                                        Lakeside Rancabali is available starting from IDR 1.1 million per night, with
                                        various lodging options to suit different preferences. For visitors who prefer
                                        not to stay overnight, the iconic Pinisi Resto is open to the public and offers
                                        a unique dining experience with panoramic views of the lake
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture10.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Sanghyang Heuleut</h2>
                                    <p class="text-justify">
                                        Sanghyang Heuleut is believed to be a natural pool dating back to prehistoric
                                        times. Local legend even suggests that this enchanting lagoon once served as a
                                        bathing place for celestial maidens. Such tales seem fitting, as the site offers
                                        crystal–clear, cool water surrounded by striking white rock formations, creating
                                        a truly captivating natural setting
                                    </p>
                                    <p class="text-justify">Swimming in Sanghyang Heuleut is a refreshing and memorable
                                        experience. However, visitors should be aware that the location is relatively
                                        remote, situated nearly two hours by car from the city center. From the parking
                                        area, a short hike is also required to reach the lagoon, adding a sense of
                                        adventure to the journey
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture11.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Begonia Flower Garden Lembang</h2>
                                    <p class="text-justify">
                                        Begonia Flower Garden Lembang is a popular tourist destination located in the
                                        Maribaya area, featuring an expansive flower garden covering approximately two
                                        hectares. The garden showcases a wide variety of beautifully arranged flowers,
                                        including marigolds, tulips, geraniums, and celosia, creating numerous
                                        picturesque and Instagram–worthy photo spots
                                    </p>
                                    <p class="text-justify">This attraction can easily be combined with visits to other
                                        popular destinations in Lembang, such as The Lodge Maribaya and Fairy Garden. It
                                        is also conveniently accessible—simply search for “Begonia Garden” on Google
                                        Maps to find the location
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="radio" name="my_tabs_2" class="tab hover:text-[#39B54A] text-[#78c9bb]"
                        aria-label="Culinary" />
                    <div class="tab-content border-base-300 bg-base-100 p-10">
                        <div class="flex flex-wrap justify-around gap-5">
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture12.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Kopi Saring Sinar Pagi</h2>
                                    <p class="text-justify">
                                        Looking for a popular breakfast spot in Bandung? Kopi Saring Sinar Pagi, located
                                        in the Cihapit area, is a well–known morning destination open daily from 6:30
                                        a.m. to 12:00 p.m
                                    </p>
                                    <p class="text-justify">Operating as a tent–style eatery, Kopi Saring Sinar Pagi
                                        offers ample seating for guests. Visitors are advised to arrive early,
                                        especially on weekends, as the place can become quite busy and long queues are
                                        common
                                    </p>
                                    <p class="text-justify">
                                        The breakfast menu features a diverse selection of local favorites, including
                                        Bakmi Ayam (chicken noodles), Nasi Telur Pontianak (Pontianak–style egg rice),
                                        and Roti Srikaya (bread with srikaya spread). A variety of snacks is also
                                        available, such as Bakwan Pontianak (Pontianak–style fritters) and Kuo Tie.
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture13.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Mang H. Oyo's Chicken Porridge</h2>
                                    <p class="text-justify">
                                        Porridge has always been a popular choice for breakfast, and one of Bandung’s
                                        most iconic options is Mang H. Oyo’s Chicken Porridge. Renowned for its
                                        distinctive texture, the porridge is famously so thick that it is said not to
                                        spill even when the bowl is turned upside down
                                    </p>
                                    <p class="text-justify">What makes this porridge even more special is the quality of
                                        its ingredients. The rice used is harvested from H. Oyo’s own rice fields,
                                        ensuring freshness and consistency in every serving
                                    </p>
                                    <p class="text-justify">
                                        Mang H. Oyo’s Chicken Porridge is located at Jalan Sulanjana No. 30, Tamansari,
                                        Bandung, and is open daily from 6:00 a.m., making it an ideal spot for a
                                        satisfying morning meal
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture14.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Cibiuk Sundanese Restaurant</h2>
                                    <p class="text-justify">
                                        Cibiuk Sundanese Restaurant is located at Jalan Soekarno Hatta No. 508,
                                        Batununggal, South Bandung, Bandung City, West Java. The restaurant operates
                                        daily from 9:00 a.m. to 9:00 p.m
                                    </p>
                                    <p class="text-justify">One of its highlights is the pavilion–style dining area,
                                        where guests can enjoy meals with family or friends while surrounded by a
                                        tranquil riverside setting. Cibiuk Sundanese Restaurant offers nasi liwet set
                                        packages for two to five people
                                    </p>
                                    <p class="text-justify">
                                        The menu features traditional Sundanese dishes, including nasi liwet, fried
                                        free–range chicken, grilled gourami, and a variety of signature chili sauces,
                                        providing an authentic local dining experience
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture15.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Hong Sin Restaurant</h2>
                                    <p class="text-justify">
                                        Hong Sin Restaurant is a well–known Chinese restaurant located at Jalan Banceuy
                                        No. 110, Braga, Sumur Bandung District, Bandung City, West Java. The restaurant
                                        offers a wide selection of classic Chinese dishes, including Beef Ca with Oyster
                                        Sauce, Fried Vermicelli, Chicken Kuluyuk, Steamed Chicken Rice, Sweet and Sour
                                        Wonton Ca, Puyunghay, and Fish Ball Soup
                                    </p>
                                    <p class="text-justify">
                                        Please note that Hong Sin Restaurant also serves dishes containing pork. <br>
                                        Hong Sin Restaurant is open daily in two sessions: from 7:00 a.m. to 2:00 p.m.,
                                        and from 5:00 p.m. to 10:00 p.m.
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture16.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Linggarjati Restaurant</h2>
                                    <p class="text-justify">
                                        Established in the 1950s, this chicken noodle restaurant has earned a strong
                                        reputation for its distinctive and consistently rich noodle flavors. The
                                        restaurant offers a wide selection of noodle dishes, including chicken noodles,
                                        meatball noodles, wonton noodles, and tripe noodles, all prepared using their
                                        own signature homemade seasonings
                                    </p>
                                    <p class="text-justify">
                                        Each serving is priced at approximately IDR 50,000 per dish, offering good value
                                        for its quality and heritage. The restaurant is conveniently located at Jalan
                                        Balonggede No. 1, Bandung City, and operates daily from 8:30 a.m. to 7:00 p.m
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture17.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Mie Kocok Mang Dadeng</h2>
                                    <p class="text-justify">
                                        Noodle–based dishes have long been a favorite among many people, and Indonesia
                                        is home to a wide variety of noodle specialties that highlight this culinary
                                        tradition. One of the most iconic is Mie Kocok, a well–known dish originating
                                        from Bandung, West Java
                                    </p>
                                    <p class="text-justify">
                                        Mie Kocok is served with soft yellow noodles in a distinctive, savory beef broth
                                        that is rich in flavor and deeply satisfying. The name “kocok,” which means “to
                                        shake,” comes from its unique preparation process, in which the noodles and
                                        other ingredients are shaken together in a container before being served
                                    </p>
                                    <p class="text-justify">
                                        The dish features chewy wheat–based yellow noodles made with water and eggs,
                                        complemented by a fragrant beef broth simmered with a blend of traditional
                                        spices. It is typically topped with fresh bean sprouts, beef tendon, beef
                                        meatballs, and is often served with lime and chili sauce for those who enjoy a
                                        refreshing and spicy kick. The combination of broth, spices, and toppings
                                        creates a truly memorable culinary experience
                                    </p>
                                    <p class="text-justify">
                                        In Bandung, one of the most legendary places to enjoy this dish is Mie Kocok
                                        Mang Dadeng. Widely regarded as one of the city’s culinary icons, it is a
                                        must–visit destination for both local residents and international tourists
                                        seeking an authentic taste of Bandung
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture18.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Soto Bandung M.Tarya</h2>
                                    <p class="text-justify">
                                        One of the most renowned soto restaurants in Bandung is located at Jalan Sawah
                                        Kurung No. 16, Regol, Bandung City. The restaurant is open daily from 8:00 a.m.
                                        to 9:00 p.m., making it a convenient option for both lunch and dinner
                                    </p>
                                    <p class="text-justify">
                                        Its signature dish, Soto Bandung, is a clear and flavorful beef soup made with
                                        radish greens, tender beef and beef tenderloin, fried soybeans, sliced spring
                                        onions, celery, and a topping of crispy fried shallots. Known for its fresh and
                                        savory taste, this dish is a favorite among locals and visitors alike
                                    </p>

                                </div>
                            </div>
                            <div class="card bg-base-100 w-full md:w-96 shadow-sm">
                                <figure>
                                    <img src="{{asset('assets/images/bandung/Picture19.jpg')}}"
                                        class="w-full rounded-lg" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-warning">Sidodadi Bakery</h2>
                                    <p class="text-justify">
                                        Established in 1954, Sidodadi Bakery is a long–standing bakery renowned for its
                                        soft yet dense bread, offered with a wide variety of fillings at affordable
                                        prices. Despite its modest size, the bakery remains highly popular, often
                                        resulting in a bustling atmosphere as customers line up to select their
                                        preferred items
                                    </p>
                                    <p class="text-justify">
                                        Orders at Sidodadi Bakery are still handled manually, preserving a traditional
                                        touch. Customers write their selections on a piece of paper provided by the
                                        shop, adding to the bakery’s nostalgic charm
                                    </p>
                                    <p class="text-justify">
                                        Sidodadi Bakery is located at Jalan Otto Iskandar Dinata No. 255 and is open
                                        daily from 10:00 a.m. to 8:00 p.m
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="radio" name="my_tabs_2" class="tab hover:text-[#39B54A] text-[#78c9bb]"
                        aria-label="Transportation from Soekarno Hatta International Airport (CGK) to Bandung" />
                    <div class="tab-content border-base-300 bg-base-100 p-10">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div class="w-full px-5 border rounded-lg border-slate-300">
                                <p class="text-sm font-black my-2">Schedule & Bus Ticket from Soekarno Hatta
                                    International
                                    Airport (CGK) to Bandung</p>
                                <div class="overflow-x-auto">
                                    <table class="table">
                                        
                                        <thead>
                                            <tr>
                                                <th>Operator Bus</th>
                                                <th>The 1st Bus Schedule Time</th>
                                                <th>Minimum Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td>Cititrans</td>
                                                <td>12:15 AM</td>
                                                <td>Rp 157.500</td>
                                            </tr>
                                            <tr>
                                                <td>RedWhite Star Primajasa</td>
                                                <td>12:15 AM</td>
                                                <td>Rp 195.000</td>
                                            </tr>
                                            <tr>
                                                <td>DAMRI</td>
                                                <td>07:00 AM</td>
                                                <td>Rp 175.000</td>
                                            </tr>
                                            <tr>
                                                <td>Jackal holidays</td>
                                                <td>12:30 AM</td>
                                                <td>Rp 199.000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="w-full px-5 border rounded-lg border-slate-300">
                                <p class="text-sm font-black my-2">Schedule & Shuttle Price from Soekarno Hatta
                                    International Airport (CGK) to Bandung</p>
                                <div class="overflow-x-auto">
                                    <table class="table">
                                        
                                        <thead>
                                            <tr>
                                                <th>Operator Shuttle</th>
                                                <th>Time</th>
                                                <th>Rate</th>
                                                <th>Destination</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td>Cititrans</td>
                                                <td>Ready 24 hour (00.15-23.45)</td>
                                                <td>Rp 157.500-Rp 200.000</td>
                                                <td>Dipatiukur</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>DAMRI</td>
                                                <td>12:15 AM</td>
                                                <td>Around Rp 175.000</td>
                                                <td></td>
                                                <td>more convenient with USB port, price may vary</td>
                                            </tr>
                                            <tr>
                                                <td>Primajasa</td>
                                                <td>07:00 AM</td>
                                                <td>Rp 170.000-Rp 195.000</td>
                                                <td></td>
                                                <td>have many branch in Bandung</td>
                                            </tr>
                                            <tr>
                                                <td>Jackal holidays</td>
                                                <td>12:30 AM</td>
                                                <td>Around Rp 199.000</td>
                                                <td>Pasteur/Dipati Ukur/Buahbatu</td>
                                                <td>Regular shuttle and private </td>
                                            </tr>
                                            <tr>
                                                <td>Sinar Jaya</td>
                                                <td></td>
                                                <td>Around Rp 185.000</td>
                                                <td>Pasteur/Surapaticore</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Lintas Shuttle</td>
                                                <td></td>
                                                <td>Rp 105.000-Rp 130.000</td>
                                                <td></td>
                                                <td>More economical choice</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="w-full px-5 border rounded-lg border-slate-300">
                                <p class="text-sm font-black my-2">Jackal Holidays Shuttle</p>
                                <ul class="list-disc ml-3">
                                    <li> Terminal 1A <br>
                                        Arrival Gate 1A, located on the left side behind the Information Center.</li>
                                    <li> Terminal 1B <br>
                                        Located inside the Kalayang Skytrain shelter, with the entrance on the right
                                        side.</li>
                                    <li> Terminal 2F <br>
                                        Gate 6, located inside the bus shelter, near the DAMRI bus shelter.</li>
                                    <li> Terminal 3 <br>
                                        Gate 5, Domestic Arrivals area, located near BRI Bank and BRI Digital Bank.
                                    </li>
                                </ul>
                                <p class="my-2 font-semibold">BANDARA SOEKARNO HATTA -> PASTEUR (POOL TRANSIT)
                                    Rp.205.000,-</p>
                                <img src="{{asset('assets/images/bandung/shuttle/1.jpg')}}" class="w-full rounded-lg"
                                    alt="">
                                <a href="https://www.jackalholidays.com/tentang"
                                    class="btn btn-success mb-5 mt-2 text-xs"><i class="fa fa-info-circle"></i> More Information</a>
                            </div>
                            <div class="w-full px-5 border rounded-lg border-slate-300">
                                <p class="text-sm font-black my-2">Daytrans <br> Arrival Pasteur</p>

                                <img src="{{asset('assets/images/bandung/shuttle/2.jpg')}}" class="w-full rounded-lg"
                                    alt="">
                                <a href="https://www.daytrans.co.id/"
                                    class="btn btn-success mb-5 mt-2 text-xs"><i class="fa fa-info-circle"></i> More Information</a>
                            </div>
                            <div class="w-full px-5 border rounded-lg border-slate-300">
                                <p class="text-sm font-black my-2">DAMRI <br> Soekarno Hatta International Airport -> Kunafe Pasteur</p>

                                <img src="{{asset('assets/images/bandung/shuttle/2.jpg')}}" class="w-full rounded-lg"
                                    alt="">
                                <a href="https://damri.co.id/id"
                                    class="btn btn-success mb-5 mt-2 text-xs"><i class="fa fa-info-circle"></i> More Information</a>
                            </div>
                            <div class="w-full px-5 border rounded-lg border-slate-300">
                                <p class="text-sm font-black my-2">RedWhite Star Primajasa <br> Soekarno Hatta International Airport -> Pasteur; Price: Rp.195.000, -</p>
                                <p>Arrival Indomaret Djunjunan Pasteur or Vio Hotel Pasteur</p>
                                <img src="{{asset('assets/images/bandung/shuttle/3.jpg')}}" class="w-full rounded-lg"
                                    alt="">
                                <a href="https://www.redbus.id/search?fromCityName=Bandara%20Soekarno%20Hatta%20(All%20Locations)&fromCityId=203494&toCityName=Pasteur,%20Bandung&toCityId=193680&busType=Any&opId=20280&rDoj=&returnDoj=&isReturn=false&onward=27-Dec-2025"
                                    class="btn btn-success mb-5 mt-2 text-xs"><i class="fa fa-info-circle"></i> More Information</a>
                            </div>
                            <div class="w-full px-5 border rounded-lg border-slate-300">
                                <p class="text-sm font-black my-2">Lintas Shuttle <br> Soekarno Hatta International Airport -> Pasteur Drop Point; Price: Rp.190.000,-</p>
                                <img src="{{asset('assets/images/bandung/shuttle/4.jpg')}}" class="w-full rounded-lg"
                                    alt="">
                                <a href="https://www.mylintas.co.id/reservation/search"
                                    class="btn btn-success mb-5 mt-2 text-xs"><i class="fa fa-info-circle"></i> More Information</a>
                            </div>
                            <div class="w-full px-5 border rounded-lg border-slate-300">
                                <p class="text-sm font-black my-2">Bhinneka Sangkuriang Transport <br> Soekarno Hatta International Airport -> Pasteur; Price: Rp.190.000,-</p>
                                <img src="{{asset('assets/images/bandung/shuttle/5.jpg')}}" class="w-full rounded-lg"
                                    alt="">
                                <a href="https://bhisa.id/bandara"
                                    class="btn btn-success mb-5 mt-2 text-xs"><i class="fa fa-info-circle"></i> More Information</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </section>

    <section id="bndcc" class="px-5 md:px-10 py-10 md:py-20" id="venue">
        <div class="px-2 lg:px-5">
            <p class="mb-1 text-[#39B54A]">Conference Venue</p>
            <h2 class="mb-1 text-xl font-extrabold tracking-wide">Holiday Inn Bandung Pasteur, Bandung, West Java</h2>

            <div class="flex flex-col lg:flex-row gap-5 mt-8 text-gray-500">
                <div class="w-full lg:w-1/2 ">
                    <img src="{{asset('assets/images/bandung/1.jpg')}}" class="w-full rounded-lg shadow-lg "
                        alt="VR Presentation and conference">
                </div>
                <div class="w-full lg:w-1/2 ">
                    <p class="text-justify mb-2">Whether you’re on business travel or a leisurely holiday in Bandung,
                        Holiday Inn Bandung Pasteur provides everything you need to be at your best.</p>
                    <p class="text-justify">Our hotel offers spacious accommodation in Bandung built modernly from the
                        ground up, providing space to live your life while away from home</p>
                    <p class="text-justify">Our iconic rooms will be our Family Room which is perfect for your holiday
                        getaway in Bandung and
                        an Executive Room for a conference or meeting event in Bandung. Our Convention Centre is one of
                        the largest function rooms in Bandung, it is able to cater up to 2000 people. Perfect for a
                        grand luxury wedding, corporate gathering, or product launching</p>
                    <p class="text-justify">Stay well in our exclusive spa and fitness center or take a fresh dip in our
                        pools. Enjoy a great
                        meal in Bandung with delicate menus in The Ambassador Restaurant, and Magenta Coffee & Wine.
                        Feel free to enjoy our signature program every time you bring your family holiday to Bandung
                        with Kids Stay and Eat Free family-friendly perks.</p>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row gap-5 mt-8 text-gray-500">

                <div class="w-full lg:w-1/2 order-2 lg:order-1">

                    <h4 class="text-lg font-semibold mb-3">Meetings & Events</h4>
                    <p class="text-justify mb-2">Holiday Inn Bandung Pasteur is a one-stop destination for every event
                        in
                        Bandung. Our Bandung event venue is located strategically in Pasteur Bandung area with easy
                        access from Cipularang toll gate, makes an easy drive from Jakarta and 15 minutes away from
                        Husein Sastranegara Airport or Bandung Railway Station.</p>
                    <p class="text-justify mb-2">We are offering spacious rooms in Bandung built modernly from the
                        ground up, providing space to
                        live your life while away from home. With more than 100 twin-share beds and 24 function rooms
                        available, our room and venues are definitely a perfect place for MICE destination in Bandung
                    </p>
                    <p class="text-justify mb-2">Holiday Inn Bandung Pasteur's Convention Centre is one of the largest
                        function room in Bandung,
                        able to caters up to 2000 people. Excellent for a grand wedding, corporate gathering or product
                        launching event in Bandung</p>
                    <h4 class="text-lg font-semibold mb-3 mt-2">Convention Centre</h4>
                    <p class="text-justify">The Luxurious and Largest Convention Centre is exquisitely pillarless
                        suitable for your
                        prestigious event. Equipped with the latest technology features LED screen and digital sound
                        system. Feel the high-end conference and meeting in-style experience. This Luxury hotel offers
                        the Convention Centre with capacity of up to 2000 persons, suiting all needs for a professional
                        conference set up, corporate gatherings or elegance and wedding parties.</p>
                </div>
                <div class="w-full lg:w-1/2 order-1 lg:order-2">
                    <img src="{{asset('assets/images/bandung/3.webp')}}" class="w-full rounded-lg shadow-lg "
                        alt="VR Presentation and conference">
                </div>
            </div>
        </div>
    </section> --}}
</div>
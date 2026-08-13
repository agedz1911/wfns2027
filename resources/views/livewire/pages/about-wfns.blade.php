<div>
    
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">About WFNS</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <section class="mx-auto w-full pattern px-5 md:px-10 pt-0 pb-10 md:py-20">
        <div class="bg-competition w-full h-full absolute"></div>
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-center lg:text-start">
                <h2 class="mb-2 text-3xl font-semibold"><span class="text-primary border-b-2">About</span> The World
                    Federation Of
                    Neurosurgical Societies
                </h2>
            </div>
            <div class="">
                <img src="{{asset('assets/images/logo/logo-wfns.png')}}" class="w-32 object-contain" alt="WFNS Logo">
            </div>
        </div>
        <div class="flex flex-col lg:flex-row gap-10 mt-10 items-start justify-between">
            <div class="lg:w-1/2">
                <p class="text-justify text-gray-600 mb-5">Founded in 1955, the WFNS is a professional,
                    scientific, nongovernmental organisation comprising
                    130 member societies-5 Continental Associations
                    (AANS, AASNS, CAANS, EANS, FLANC), 6 Affiliate
                    Societies and 119 National Neurosurgical Societies-
                    representing more than 49,000 neurosurgeons
                    worldwide.</p>
                <p class="text-justify text-gray-600 mb-5">The mission of the WFNS is to work with its member
                    societies to improve neurosurgical care, training
                    and research worldwide, for the benefit of patients
                    everywhere.</p>
                <p class="text-justify text-gray-600 mb-5">The World Congress of Neurosurgery has been
                    held every second year since 1957. Recent host
                    cities include Bogotá (2022), Beijing (2019 Interim),
                    Istanbul (2017), Rome (2015 Interim) and Seoul
                    (2013). Following the historic congress in Cape Town
                    in 2023 and Dubai in 2025, the global neurosurgical
                    community now looks forward to convening in Bali.</p>
            </div>
            <div class="w-full lg:w-1/2 flex flex-wrap gap-4 items-center justify-between md:justify-evenly">
                <div class="card bg-white md:w-60 w-full shadow-lg rounded-xl border-l-4 border-primary">
                    <div class="card-body">
                        <h2 class="card-title text-primary text-2xl">
                            <span class="js-countup" data-target="49000">0</span>
                        </h2>
                        <p class="text-gray-600">Neurosurgeons
                            Represented</p>
                    </div>
                </div>
                <div class="card bg-white md:w-60 w-full shadow-lg rounded-xl border-l-4 border-primary">
                    <div class="card-body">
                        <h2 class="card-title text-primary text-2xl">
                            <span class="js-countup" data-target="130">0</span>
                        </h2>
                        <p class="text-gray-600">Members Societes</p>
                    </div>
                </div>
                <div class="card bg-white md:w-60 w-full shadow-lg rounded-xl border-l-4 border-primary">
                    <div class="card-body">
                        <h2 class="card-title text-primary text-2xl">
                            <span class="js-countup" data-target="119">0</span>
                        </h2>
                        <p class="text-gray-600">National Societes</p>
                    </div>
                </div>
                <div class="card bg-white md:w-60 w-full shadow-lg rounded-xl border-l-4 border-primary">
                    <div class="card-body">
                        <h2 class="card-title text-primary text-2xl">
                            <span class="js-countup" data-target="1955">0</span>
                        </h2>
                        <p class="text-gray-600">Founded</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="bg-white card shadow-md rounded-xl p-5 mt-5">
            <img src="{{asset('assets/images/wfns-map-01.png')}}" class="w-full rounded-xl" alt="">
        </div>

    </section>
</div>

@once
<script>
    function initializeCountUp(root = document) {
            const items = root.querySelectorAll('.js-countup[data-target]');

            if (!items.length) {
                return;
            }

            const animate = (element) => {
                if (element.dataset.counted === 'true') {
                    return;
                }

                element.dataset.counted = 'true';

                const target = Number(element.dataset.target || 0);
                const duration = 1800;
                const start = performance.now();

                const frame = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const current = Math.floor(target * eased);

                    element.textContent = current.toLocaleString('en-US');

                    if (progress < 1) {
                        requestAnimationFrame(frame);
                    } else {
                        element.textContent = target.toLocaleString('en-US');
                    }
                };

                requestAnimationFrame(frame);
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animate(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.35
            });

            items.forEach((item) => observer.observe(item));
        }

        document.addEventListener('DOMContentLoaded', () => initializeCountUp(document));
        document.addEventListener('livewire:navigated', () => initializeCountUp(document));
</script>
@endonce
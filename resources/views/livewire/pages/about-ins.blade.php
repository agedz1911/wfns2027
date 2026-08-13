<div>
    
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">About INS / PERSPEBSI</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <section class="mx-auto w-full pattern px-5 md:px-10 pt-0 pb-10 md:py-20">
        <div class="bg-competition w-full h-full absolute"></div>
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-center lg:text-start">
                <h2 class="mb-2 text-3xl font-semibold"><span class="text-primary border-b-2">About</span> the Indonesian
                    Neurosurgical Society (INS)
                    PERSPEBSI
                </h2>
            </div>
            <div class="">
                <img src="{{asset('assets/images/logo/logo-ins.png')}}" class="w-32 object-contain" alt="WFNS Logo">
            </div>
        </div>
        <div class="flex flex-col lg:flex-row gap-10 mt-10 items-start justify-between">
            <div class="lg:w-1/2">
                <p class="text-justify text-gray-600 mb-5">The Indonesian Neurosurgical Society (INS), or
                    Perhimpunan Spesialis Bedah Saraf Indonesia
                    (PERSPEBSI), is the sole professional organization
                    governing neurosurgeons nationwide, building upon
                    pioneer foundations in Indonesian neurosurgery
                    dating to 1948 (formally established as a national
                    society in 1969). The society serves as guardian of
                    scientific advancement, professional integrity, and
                    clinical excellence across the archipelago. Central
                    to its mission is improving and standardizing
                    neurosurgical services nationwide, so that advanced,
                    life-saving care reaches even the most remote areas
                    of Indonesia.</p>
                <p class="text-justify text-gray-600 mb-5">Driven by a commitment to clinical mastery and
                    academic development, the INS maintains a robust
                    network of subspecialty committees and multi-center training programs. Its standard of organizational
                    excellence has earned wide international recognition,
                    making it the trusted choice for global neurosurgical
                    bodies seeking to host major scientific meetings in
                    Indonesia</p>
                <p class="text-justify text-gray-600 mb-5">As host of the WFNS World Congress 2027, the
                    INS anchors a rapidly expanding regional market.
                    Situated within a five-hour flight radius of all 10
                    ASEAN capital cities, Bali provides direct access
                    to a region of over 680 million people, 10 national
                    neurosurgical societies, and more than 2,000 active
                    regional neurosurgeons. For corporate partners,
                    WFNS 2027 in Bali represents an unprecedented
                    commercial gateway to engage key opinion leaders
                    across the entire Southeast Asian healthcare network</p>
            </div>
            <div class="w-full lg:w-1/2 flex flex-wrap gap-4 items-center justify-between md:justify-evenly">
                <div class="card bg-sky-50 md:w-60 w-full shadow-lg rounded-xl border-l-4 border-primary">
                    <div class="card-body">
                        <h2 class="card-title text-primary text-2xl">
                            <span class="js-countup" data-target="680">0</span>+
                        </h2>
                        <p class="text-gray-600">Million People</p>
                    </div>
                </div>
                <div class="card bg-sky-50 md:w-60 w-full shadow-lg rounded-xl border-l-4 border-primary">
                    <div class="card-body">
                        <h2 class="card-title text-primary text-2xl">
                            <span class="js-countup" data-target="2000">0</span>+
                        </h2>
                        <p class="text-gray-600">Regional
                            Neurosurgeons</p>
                    </div>
                </div>
                <div class="card bg-sky-50 md:w-64 w-full shadow-lg rounded-xl border-l-4 border-primary">
                    <div class="card-body">
                        <h2 class="card-title text-primary text-2xl">
                            <span class="js-countup" data-target="10">0</span>
                        </h2>
                        <p class="text-gray-600">National Neurosurgcical
                            Societes</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="bg-white card shadow-md rounded-xl p-5 mt-5">
            <img src="{{asset('assets/images/ins-map-01.png')}}" class="w-full rounded-xl" alt="">
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
</div>
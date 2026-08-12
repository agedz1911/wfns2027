<div>
    <section class=" relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#14599D] to-[#0CA6DD]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">wfns congress asean region</h2>
        </div>
    </section>

    <section class="mx-auto w-full pattern px-5 md:px-10 pt-0 pb-10 md:py-20">
        <div class="bg-competition w-full h-full absolute"></div>
        <div class="text-center lg:text-start">
            <h2 class="mb-2 text-3xl font-semibold"><span class="text-primary border-b-2">The First </span> WFNS Congress in
                ASEAN Region
            </h2>
        </div>
        <div class="flex flex-col lg:flex-row gap-10 mt-10 items-start justify-between">
            <div class="lg:w-1/2">
                <p class="text-justify text-gray-600 mb-5">As the first-ever WFNS World Congress to be hosted in the ASEAN region, the 2027 Bali congress
                    represents an unprecedented milestone and a strategic gateway to one of the world’s most dynamic
                    healthcare markets. With a collective population exceeding 680 million and surging regional investments
                    in advanced medical infrastructure, Southeast Asia is a critical frontier for both neurosurgical innovation
                    and commercial expansion. Partnering with us for this historic inaugural event offers sponsors a
                    rare, first-mover advantage to engage with emerging key opinion leaders, help shape regional clinical
                    standards, and exponentially accelerate their business footprint across a rapidly growing economic
                    zone.</p>
            </div>
            <div class="w-full lg:w-1/2 flex flex-wrap gap-4 items-center justify-between md:justify-evenly">
                <div class="card bg-white w-full shadow-lg rounded-xl border-l-4 border-primary">
                    <div class="card-body">
                        <h2 class="card-title text-primary text-2xl mb-4">
                            CONGRESS PARTICIPANTS
                        </h2>
                        <div class="flex-col flex gap-4 js-progress-group">
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2005 Marrakech </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="2800" max="4500"></progress>
                                    <span class="text-gray-600">2,800</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2009 Boston </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="3480" max="4500"></progress>
                                    <span class="text-gray-600">3,480</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2013 Seoul </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="3690" max="4500"></progress>
                                    <span class="text-gray-600">3,690</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2015 Rome </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="3690" max="4500"></progress>
                                    <span class="text-gray-600">3,690</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2017 Istanbul </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="2250" max="4500"></progress>
                                    <span class="text-gray-600">2,250</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2019 Beijing </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="4000" max="4500"></progress>
                                    <span class="text-gray-600">4,000</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2022 Bogotá </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="2250" max="4500"></progress>
                                    <span class="text-gray-600">2,250</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2023 Capetown </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="3500" max="4500"></progress>
                                    <span class="text-gray-600">3,500</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2025 Dubai </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-primary w-5/6" value="2000" max="4500"></progress>
                                    <span class="text-gray-600">2,000</span>
                                </div>
                            </div>
                            <div class="flex gap-4 items-center justify-center w-full">
                                <div class="w-1/5">
                                    <p>2027 Bali </p>
                                </div>
                                <div class="w-4/5">
                                    <progress class="progress progress-success w-5/6" value="3000" max="4500"></progress>
                                    <span class="text-success">3,000</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@once
    <script>
        function initializeProgressCount(root = document) {
            const groups = root.querySelectorAll('.js-progress-group');

            if (!groups.length) {
                return;
            }

            groups.forEach((group) => {
                const progressBars = group.querySelectorAll('progress.progress[max][value]');

                if (!progressBars.length) {
                    return;
                }

                const animate = (bar) => {
                    if (bar.dataset.animated === 'true') {
                        return;
                    }

                    bar.dataset.animated = 'true';

                    const target = Number(bar.dataset.target || 0);
                    const duration = 1600;
                    const start = performance.now();
                    const numberEl = bar.parentElement.querySelector('span');

                    const frame = (now) => {
                        const progress = Math.min((now - start) / duration, 1);
                        const eased = 1 - Math.pow(1 - progress, 3);
                        const current = Math.floor(target * eased);

                        bar.value = current;
                        if (numberEl) {
                            numberEl.textContent = current.toLocaleString('en-US');
                        }

                        if (progress < 1) {
                            requestAnimationFrame(frame);
                        } else {
                            bar.value = target;
                            if (numberEl) {
                                numberEl.textContent = target.toLocaleString('en-US');
                            }
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

                progressBars.forEach((bar) => {
                    if (bar.dataset.prepared !== 'true') {
                        const target = Number(bar.getAttribute('value') || 0);
                        const max = Number(bar.getAttribute('max') || target);
                        const numberEl = bar.parentElement.querySelector('span');

                        bar.dataset.target = String(target);
                        bar.setAttribute('max', String(max));
                        bar.value = 0;

                        if (numberEl) {
                            numberEl.textContent = '0';
                        }

                        bar.dataset.prepared = 'true';
                    }

                    observer.observe(bar);
                });
            });
        }

        document.addEventListener('DOMContentLoaded', () => initializeProgressCount(document));
        document.addEventListener('livewire:navigated', () => initializeProgressCount(document));
    </script>
@endonce
<div>
 
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Welcome Message</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <section class="pattern relative overflow-hidden py-16 sm:py-20 lg:py-28">
        <div class="mx-auto flex max-w-7xl flex-col gap-12 px-5 sm:px-8 lg:gap-20 lg:px-12">
            @foreach ($messages as $welcomeMessage)
            <article id="welcome-message-{{ $welcomeMessage->id }}"
                class="grid overflow-hidden border border-[#0ca6dd]/20 bg-white shadow-[0_18px_45px_rgba(7,90,153,0.12)] lg:grid-cols-12">
                <div class="relative p-7 sm:p-10 lg:col-span-7 lg:p-14 {{ $loop->even ? 'lg:order-2' : '' }}">
                    <div class="absolute left-0 top-10 hidden h-20 w-1 bg-[#f6c945] lg:block"></div>
                    <p class="mb-5 text-xs font-bold uppercase tracking-[0.18em] text-[#0b7eb6]">A message from the {{ $welcomeMessage->title }}</p>
                    <div class="h-px w-14 bg-[#0ca6dd]"></div>
                    <div
                        class="welcome-message-copy mt-8 text-justify text-[15px] leading-8 text-slate-600 sm:text-base sm:leading-8">
                        {!! str($welcomeMessage->description)->markdown()->sanitizeHtml() !!}
                    </div>
                </div>

                <aside
                    class="relative overflow-hidden bg-[#075a99] p-7 text-white sm:p-10 lg:col-span-5 lg:p-12 {{ $loop->even ? 'lg:order-1' : '' }}">
                    <div class="absolute inset-0 bg-[linear-gradient(145deg,rgba(12,166,221,0.55),transparent_58%)]">
                    </div>
                    <div class="relative flex h-full flex-col justify-center gap-8">
                       

                        <div class="flex items-center gap-5">
                            <img src="{{ $welcomeMessage->image ? asset('storage/' . $welcomeMessage->image) : asset('assets/images/speaker.png') }}"
                                alt="{{ $welcomeMessage->name }}"
                                class="md:h-40 md:w-40 h-24 w-24 shrink-0  border-4 border-white/20 object-cover shadow-xl sm:h-40 sm:w-40">
                            <div class="min-w-0">
                                <p class="text-sm leading-6 text-cyan-50">{{ $welcomeMessage->title }}</p>
                                <h3 class="mt-2 text-xl font-bold leading-tight text-white sm:text-2xl">{{
                                    $welcomeMessage->name }}</h3>
                            </div>
                        </div>

                        @if ($welcomeMessage->name2 && $welcomeMessage->title2)
                        <div class="border-t border-white/20 pt-7">
                            <div class="flex items-center gap-5">
                                <img src="{{ $welcomeMessage->image2 ? asset('storage/' . $welcomeMessage->image2) : asset('assets/images/speaker.png') }}"
                                    alt="{{ $welcomeMessage->name2 }}"
                                    class="h-24 w-24 shrink-0 border-4 border-white/20 object-cover shadow-xl sm:h-28 sm:w-28">
                                <div class="min-w-0">
                                    <p class="text-sm leading-6 text-cyan-50">{{ $welcomeMessage->title2 }}</p>
                                    <h3 class="mt-1 text-lg font-bold leading-tight text-white sm:text-xl">{{
                                        $welcomeMessage->name2 }}</h3>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </aside>
            </article>
            @endforeach
        </div>
    </section>
</div>
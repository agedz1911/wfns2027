<div>
    @if ($submitted)
    <div class="mx-auto max-w-4xl px-4 py-16 text-center" x-data x-init="setTimeout(() => window.location.reload(), 10000)">
        <i class="text-6xl fa fa-check-circle text-success"></i>
        <h2 class="text-2xl font-bold">Thank you!</h2>
        <p class="mt-2 text-base-content/70">Your abstract files have been submitted successfully.</p>
        @if ($emailFailed)
            <p class="mt-3 text-warning" role="alert">Your abstract was saved, but we could not send the confirmation email.</p>
        @endif
    </div>
    @else
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="mx-auto max-w-4xl px-4 py-12 sm:px-6 relative text-white">
            <h2 class="uppercase text-2xl font-bold tracking-wide lg:text-4xl">WFNS 2027 Invited Speaker Abstract Form
            </h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>

            <p class="mt-3 text-sm opacity-90">20th World Congress of Neurosurgery · 16–20 November 2027 · Bali Nusa Dua Convention Center, Bali, Indonesia</p>
            <p class="mt-2 text-sm opacity-80">For invited speakers only. Free paper abstracts must be submitted through the online submission form.</p>
        </div>
    </section>

    <section class="mx-auto -mt-6 max-w-4xl px-4 pb-16 sm:px-6">
        <form wire:submit="save" class="space-y-6">

            {{-- Guidance --}}
            <section class="card bg-base-100 shadow-sm">
                <div class="card-body sm:p-8">
                    <h2 class="card-title">Writing guidance</h2>
                    <ul class="list-disc">
                        <li>Write in English. The abstract and biography are published exactly as submitted, so please proofread carefully.</span></li>
                        <li><strong>Lecture title:</strong> maximum 20 words, in title case, with no abbreviations, ALL CAPITAL LETTERS or full stop at the end.</span></li>
                        <li><strong>Abstract:</strong> maximum 300 words. Research lectures may use the headings Background, Objectives, Methods, Results and Conclusions; review or technique lectures may use free text.</span></li>
                        <li>Do not include tables, figures, images or references in the abstract.</span></li>
                        <li>Use generic names; if a trade name is essential, name products from more than one company. No promotional content.</span></li>
                    </ul>
                </div>
            </section>

            {{-- Biodata --}}
            <section class="card bg-base-100 shadow-sm">
                <div class="card-body gap-5 sm:p-8">
                    <div>
                        <h2 class="card-title">Biodata</h2>
                        <p class="text-sm opacity-70">Write your name exactly as it should appear in the programme.</p>
                    </div>

                    <div>
                        <span class="label-text mb-1 block font-medium">Title <span class="text-error">*</span></span>
                        <div class="flex flex-wrap items-center gap-3">
                            @foreach (['Prof.', 'Dr.', 'Mr.', 'Ms.', 'Other'] as $opt)
                            <label class="flex cursor-pointer items-center gap-2 rounded-lg border border-base-300 px-4 py-2 has-[:checked]:border-primary has-[:checked]:bg-primary/10">
                                <input type="radio" wire:model.live="title" value="{{ $opt }}" class="radio radio-primary radio-sm">
                                <span class="text-sm">{{ $opt }}</span>
                            </label>
                            @endforeach
                            @if ($title === 'Other')
                            <input type="text" wire:model.blur="title_other" placeholder="Specify title" class="input input-bordered input-sm @error('title_other') input-error @enderror">
                            @endif
                        </div>
                        @error('title') <span class="mt-1 block text-xs text-error">{{ $message }}</span> @enderror
                        @error('title_other') <span class="mt-1 block text-xs text-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <label class="form-control md:col-span-2">
                            <span class="label-text mb-1 font-medium">Full name <span class="text-error">*</span></span>
                            <input type="text" wire:model.blur="full_name" placeholder="First name and Last name" class="input input-bordered w-full @error('full_name') input-error @enderror">
                            @error('full_name') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                        <label class="form-control">
                            <span class="label-text mb-1 font-medium">Country <span class="text-error">*</span></span>
                            <select wire:model.blur="country" class="input input-bordered w-full @error('country') input-error @enderror">
                                <option value="">Select a country</option>
                                @foreach ($countries as $countryOption)
                                    <option value="{{ $countryOption }}">{{ $countryOption }}</option>
                                @endforeach
                            </select>
                            @error('country') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                        <label class="form-control">
                            <span class="label-text mb-1 font-medium">Institution <span class="text-error">*</span></span>
                            <input type="text" wire:model.blur="institution" class="input input-bordered w-full @error('institution') input-error @enderror">
                            @error('institution') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                        <label class="form-control md:col-span-2">
                            <span class="label-text mb-1 font-medium">Email address <span class="text-error">*</span></span>
                            <input type="email" wire:model.blur="email" placeholder="name@example.com" class="input input-bordered w-full @error('email') input-error @enderror">
                            @error('email') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                    </div>
                </div>
            </section>

            {{-- Abstract files --}}
            <section class="card bg-base-100 shadow-sm">
                <div class="card-body gap-4 sm:p-8">
                    <div>
                        <h2 class="card-title">Abstract files</h2>
                        <p class="text-sm opacity-70">Upload your abstract (DOC, DOCX or PDF, max. 5 MB each). File 1 is required.</p>
                    </div>

                    @foreach ($files as $i => $file)
                    <div wire:key="file-{{ $i }}" class="rounded-box border-2 border-dashed border-base-300 bg-base-200 p-4">
                        <span class="label-text mb-2 block font-medium">Abstract File {{ $i + 1 }} @if ($i === 0)<span class="text-error">*</span>@else<span class="opacity-50">(optional)</span>@endif</span>
                        @if (! empty($files[$i]) && ! $errors->has("files.$i"))
                        <div class="flex items-center justify-between gap-3 rounded-lg bg-base-100 px-4 py-2 text-sm">
                            <span class="truncate">📄 {{ $files[$i]->getClientOriginalName() }}</span>
                            <button type="button" wire:click="removeFile({{ $i }})" class="btn btn-ghost btn-xs text-error">Remove</button>
                        </div>
                        @else
                        <input type="file" wire:model="files.{{ $i }}" accept=".doc,.docx,.pdf" class="file-input file-input-bordered file-input-sm w-full max-w-md">
                        <div wire:loading wire:target="files.{{ $i }}" class="mt-1 text-xs opacity-60">Uploading…</div>
                        @endif
                        @error("files.$i") <p class="mt-1 text-xs text-error">{{ $message }}</p> @enderror
                    </div>
                    @endforeach
                    <button type="button" wire:click="addFile" class="btn btn-sm btn-outline btn-primary">Add more abstract files</button>
                </div>
            </section>

            {{-- Consent --}}
            <section class="card bg-base-100 shadow-sm">
                <div class="card-body sm:p-8">
                    <label class="flex cursor-pointer items-start gap-3 rounded-box bg-primary/10 p-4 text-sm">
                        <input type="checkbox" wire:model.live="consent" class="checkbox checkbox-primary mt-0.5">
                        <span>I agree that my abstract may be published in the Congress programme, abstract book, website and app.</span>
                    </label>
                    @error('consent') <span class="text-xs text-error">{{ $message }}</span> @enderror
                </div>
            </section>

            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary px-8" wire:loading.attr="disabled" wire:target="save,files">
                    <span wire:loading wire:target="save" class="loading loading-spinner loading-sm"></span>
                    Submit abstract
                </button>
            </div>
        </form>
    </section>
    @endif
</div>
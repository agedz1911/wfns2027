<div>
    @if ($submitted)
    <div class="mx-auto max-w-xl px-4 py-24 text-center" x-data x-init="setTimeout(() => window.location.reload(), 10000)">
        <i class="text-6xl fa fa-check-circle text-success"></i>
        <h2 class="mt-4 text-2xl font-bold">Thank you!</h2>
        <p class="mt-2 text-base-content/70">Your faculty information has been submitted successfully.</p>
        @if ($emailFailed)
            <p class="mt-3 text-warning" role="alert">Your information was saved, but we could not send the confirmation email.</p>
        @endif
    </div>
    @else
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="mx-auto max-w-4xl px-4 py-12 sm:px-6 relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Faculty Short Bio / CV Form
            </h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>

            <p class="mt-3 max-w-2xl text-sm leading-relaxed opacity-90 text-white">
                Please complete this form in English by <strong>January 30th, 2027</strong>.
                Your details are used for the congress programme and for CME accreditation with the Indonesian Ministry
                of Health.
                Write "N/A" where an item does not apply.
            </p>

        </div>
    </section>

    <main class="mx-auto -mt-6 max-w-4xl px-4 pb-16 sm:px-6">
        <form wire:submit="save" class="space-y-6">

            {{-- A --}}
            <section class="card bg-base-100 shadow-sm">
                <div class="card-body gap-5 sm:p-8">
                    <div class="flex items-center gap-3">
                        <span class="badge badge-primary badge-lg font-bold">A</span>
                        <h2 class="card-title">Personal data</h2>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <label class="form-control md:col-span-2">
                            <span class="label-text mb-1 font-medium">1. Full name with titles, as it should appear on
                                the certificate <span class="text-error">*</span></span>
                            <input type="text" wire:model.blur="full_name"
                                placeholder="e.g. Prof. Dr. Jane Doe, MD, PhD"
                                class="input input-bordered w-full @error('full_name') input-error @enderror">
                            @error('full_name') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                        <label class="form-control">
                            <span class="label-text mb-1 font-medium">2. NIK <span class="opacity-50">(Indonesian
                                    faculty only)</span></span>
                            <input type="text" inputmode="numeric" wire:model.blur="nik" placeholder="16-digit NIK"
                                class="input input-bordered w-full @error('nik') input-error @enderror">
                            @error('nik') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                        <label class="form-control">
                            <span class="label-text mb-1 font-medium">3. NIP, if any <span
                                    class="opacity-50">(Indonesian faculty only)</span></span>
                            <input type="text" wire:model.blur="nip"
                                class="input input-bordered w-full @error('nip') input-error @enderror">
                            @error('nip') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                        <label class="form-control md:col-span-2">
                            <span class="label-text mb-1 font-medium">4. Type of profession <span
                                    class="text-error">*</span></span>
                            <input type="text" wire:model.blur="profession" placeholder="e.g. Neurosurgeon"
                                class="input input-bordered w-full @error('profession') input-error @enderror">
                            @error('profession') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                        <div class="rounded-box bg-base-200 p-4 md:col-span-2">
                            <p class="mb-3 text-sm font-medium">5. Institution, city, country <span
                                    class="text-error">*</span></p>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                                <label class="form-control">
                                    <span class="label-text mb-1">Institution</span>
                                    <input type="text" wire:model.blur="institution"
                                        class="input input-bordered w-full @error('institution') input-error @enderror">
                                    @error('institution') <span class="mt-1 text-xs text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="form-control">
                                    <span class="label-text mb-1">City</span>
                                    <input type="text" wire:model.blur="city"
                                        class="input input-bordered w-full @error('city') input-error @enderror">
                                    @error('city') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                                </label>
                                <label class="form-control">
                                    <span class="label-text mb-1">Country</span>
                                    <select wire:model.blur="country"
                                        class="input input-bordered w-full @error('country') input-error @enderror">
                                        <option value="">Select a country</option>
                                        @foreach ($countries as $countryOption)
                                            <option value="{{ $countryOption }}">{{ $countryOption }}</option>
                                        @endforeach
                                    </select>
                                    @error('country') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                                </label>
                            </div>
                        </div>

                        <div>
                            <span class="label-text mb-1 block font-medium">6. Sex <span
                                    class="text-error">*</span></span>
                            <div class="join w-full">
                                <input type="radio" wire:model.live="sex" value="Male" aria-label="Male"
                                    class="btn join-item flex-1 checked:btn-primary">
                                <input type="radio" wire:model.live="sex" value="Female" aria-label="Female"
                                    class="btn join-item flex-1 checked:btn-primary">
                            </div>
                            @error('sex') <span class="mt-1 block text-xs text-error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <span class="label-text mb-1 block font-medium">7. Place and date of birth</span>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="text" wire:model.blur="birth_place" placeholder="Place"
                                    class="input input-bordered w-full">
                                <input type="date" wire:model.blur="birth_date"
                                    class="input input-bordered w-full @error('birth_date') input-error @enderror">
                            </div>
                            @error('birth_date') <span class="mt-1 block text-xs text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <label class="form-control md:col-span-2">
                            <span class="label-text mb-1 font-medium">8. Highest education <span
                                    class="opacity-50">(degree, institution, year)</span></span>
                            <input type="text" wire:model.blur="highest_education"
                                placeholder="e.g. PhD, University of Indonesia, 2015"
                                class="input input-bordered w-full">
                        </label>

                        <label class="form-control">
                            <span class="label-text mb-1 font-medium">9. Mobile number with country code <span
                                    class="text-error">*</span></span>
                            <input type="tel" wire:model.blur="phone" placeholder="+62 812 3456 7890"
                                class="input input-bordered w-full @error('phone') input-error @enderror">
                            @error('phone') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>

                        <label class="form-control">
                            <span class="label-text mb-1 font-medium">10. Email address <span
                                    class="text-error">*</span></span>
                            <input type="email" wire:model.blur="email" placeholder="name@example.com"
                                class="input input-bordered w-full @error('email') input-error @enderror">
                            @error('email') <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                        </label>
                    </div>
                </div>
            </section>

            {{-- B --}}
            <section class="card bg-base-100 shadow-sm">
                <div class="card-body gap-4 sm:p-8">
                    <div class="flex items-center gap-3">
                        <span class="badge badge-primary badge-lg font-bold">B</span>
                        <h2 class="card-title">Teaching and speaker experience <span
                                class="text-sm font-normal opacity-50">(item 11)</span></h2>
                    </div>
                    <p class="text-sm opacity-70">Up to three recent or relevant activities, newest first.</p>

                    @foreach ($teaching as $i => $row)
                    <div wire:key="teaching-{{ $i }}" class="rounded-box bg-base-200 p-4">
                        <div class="mb-3 flex items-center justify-between">
                            <span class="text-xs font-semibold uppercase tracking-wide text-primary">Entry {{ $i + 1
                                }}</span>
                            @if (count($teaching) > 1)
                            <button type="button" wire:click="removeTeaching({{ $i }})"
                                class="btn btn-ghost btn-xs text-error">Remove</button>
                            @endif
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-6">
                            <label class="form-control sm:col-span-2">
                                <span class="label-text mb-1">Year</span>
                                <input type="number" wire:model.blur="teaching.{{ $i }}.year" placeholder="2026"
                                    class="input input-bordered w-full @error(" teaching.$i.year") input-error
                                    @enderror">
                                @error("teaching.$i.year") <span class="mt-1 text-xs text-error">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="form-control sm:col-span-4">
                                <span class="label-text mb-1">Event or institution</span>
                                <input type="text" wire:model.blur="teaching.{{ $i }}.event"
                                    class="input input-bordered w-full @error(" teaching.$i.event") input-error
                                    @enderror">
                                @error("teaching.$i.event") <span class="mt-1 text-xs text-error">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="form-control sm:col-span-2">
                                <span class="label-text mb-1">Country</span>
                                <select wire:model.blur="teaching.{{ $i }}.country"
                                    class="input input-bordered w-full @error(" teaching.$i.country") input-error
                                    @enderror">
                                    <option value="">Select a country</option>
                                    @foreach ($countries as $countryOption)
                                        <option value="{{ $countryOption }}">{{ $countryOption }}</option>
                                    @endforeach
                                </select>
                                @error("teaching.$i.country") <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                            </label>
                            <label class="form-control sm:col-span-2">
                                <span class="label-text mb-1">Role</span>
                                <input type="text" wire:model.blur="teaching.{{ $i }}.role" placeholder="e.g. Speaker"
                                    class="input input-bordered w-full @error(" teaching.$i.role") input-error
                                    @enderror">
                                @error("teaching.$i.role") <span class="mt-1 text-xs text-error">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="form-control sm:col-span-2">
                                <span class="label-text mb-1">Topic</span>
                                <input type="text" wire:model.blur="teaching.{{ $i }}.topic"
                                    class="input input-bordered w-full @error(" teaching.$i.topic") input-error
                                    @enderror">
                                @error("teaching.$i.topic") <span class="mt-1 text-xs text-error">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    @endforeach

                    <div>
                        <button type="button" wire:click="addTeaching" @disabled(count($teaching)>= 5) class="btn
                            btn-outline btn-primary btn-sm border-dashed">
                            + Add more <span class="text-xs font-normal opacity-60">({{ count($teaching) }}/5)</span>
                        </button>
                    </div>
                </div>
            </section>

            {{-- C --}}
            <section class="card bg-base-100 shadow-sm">
                <div class="card-body gap-4 sm:p-8">
                    <div class="flex items-center gap-3">
                        <span class="badge badge-primary badge-lg font-bold">C</span>
                        <h2 class="card-title">Work experience related to your lecture topic <span
                                class="text-sm font-normal opacity-50">(item 12)</span></h2>
                    </div>
                    <p class="text-sm opacity-70">Up to three positions or assignments, newest first.</p>

                    @foreach ($work as $i => $row)
                    <div wire:key="work-{{ $i }}" class="rounded-box bg-base-200 p-4">
                        <div class="mb-3 flex items-center justify-between">
                            <span class="text-xs font-semibold uppercase tracking-wide text-primary">Entry {{ $i + 1
                                }}</span>
                            @if (count($work) > 1)
                            <button type="button" wire:click="removeWork({{ $i }})"
                                class="btn btn-ghost btn-xs text-error">Remove</button>
                            @endif
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-6">
                            <label class="form-control sm:col-span-2">
                                <span class="label-text mb-1">Period</span>
                                <input type="text" wire:model.blur="work.{{ $i }}.period" placeholder="2018 – 2024"
                                    class="input input-bordered w-full @error(" work.$i.period") input-error @enderror">
                                @error("work.$i.period") <span class="mt-1 text-xs text-error">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="form-control sm:col-span-4">
                                <span class="label-text mb-1">Position</span>
                                <input type="text" wire:model.blur="work.{{ $i }}.position"
                                    class="input input-bordered w-full @error(" work.$i.position") input-error
                                    @enderror">
                                @error("work.$i.position") <span class="mt-1 text-xs text-error">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="form-control sm:col-span-4">
                                <span class="label-text mb-1">Institution</span>
                                <input type="text" wire:model.blur="work.{{ $i }}.institution"
                                    class="input input-bordered w-full @error(" work.$i.institution") input-error
                                    @enderror">
                                @error("work.$i.institution") <span class="mt-1 text-xs text-error">{{ $message
                                    }}</span> @enderror
                            </label>
                            <label class="form-control sm:col-span-2">
                                <span class="label-text mb-1">Country</span>
                                <select wire:model.blur="work.{{ $i }}.country"
                                    class="input input-bordered w-full @error(" work.$i.country") input-error
                                    @enderror">
                                    <option value="">Select a country</option>
                                    @foreach ($countries as $countryOption)
                                        <option value="{{ $countryOption }}">{{ $countryOption }}</option>
                                    @endforeach
                                </select>
                                @error("work.$i.country") <span class="mt-1 text-xs text-error">{{ $message }}</span> @enderror
                            </label>
                            <label class="form-control sm:col-span-6">
                                <span class="label-text mb-1">Relevance to your topic</span>
                                <textarea rows="2" wire:model.blur="work.{{ $i }}.relevance"
                                    class="textarea textarea-bordered w-full @error(" work.$i.relevance") textarea-error
                                    @enderror"></textarea>
                                @error("work.$i.relevance") <span class="mt-1 text-xs text-error">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    @endforeach

                    <div>
                        <button type="button" wire:click="addWork" @disabled(count($work)>= 5) class="btn btn-outline
                            btn-primary btn-sm border-dashed">
                            + Add more <span class="text-xs font-normal opacity-60">({{ count($work) }}/5)</span>
                        </button>
                    </div>
                </div>
            </section>

            {{-- D --}}
            <section class="card bg-base-100 shadow-sm">
                <div class="card-body gap-5 sm:p-8">
                    <div class="flex items-center gap-3">
                        <span class="badge badge-primary badge-lg font-bold">D</span>
                        <h2 class="card-title">Short bio and consent</h2>
                    </div>

                    <label class="form-control">
                        <span class="label-text mb-1 font-medium">Short bio for the programme book and website <span
                                class="opacity-50">(100 to 150 words, third person)</span> <span
                                class="text-error">*</span></span>
                        <textarea rows="7" wire:model.live.debounce.300ms="bio" placeholder="Write your bio here"
                            class="textarea textarea-bordered w-full @error('bio') textarea-error @enderror"></textarea>
                        <span
                            class="mt-1 text-xs {{ $this->bioWordCount && ($this->bioWordCount < 100 || $this->bioWordCount > 150) ? 'text-error' : 'opacity-60' }}">{{
                            $this->bioWordCount }} / 150 words</span>
                        @error('bio') <span class="text-xs text-error">{{ $message }}</span> @enderror
                    </label>

                    <div>
                        <span class="label-text mb-1 block font-medium">Photo <span class="opacity-50">(recent colour
                                portrait, JPG or PNG)</span> <span class="text-error">*</span></span>
                        <div
                            class="flex items-center gap-4 rounded-box border-2 border-dashed border-base-300 bg-base-200 p-5">
                            <div class="avatar {{ $photo ? '' : 'placeholder' }}">
                                <div class="w-20 rounded-xl bg-base-300 text-neutral-content">
                                    @if ($photo && !$errors->has('photo'))
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Photo preview">
                                    @else
                                    <i class="fa fa-user text-3xl"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1">
                                <input type="file" wire:model="photo" accept=".jpg,.jpeg,.png"
                                    class="file-input file-input-bordered file-input-sm w-full max-w-xs">
                                    <span class="text-xs italic opacity-60">*Max size: 5MB</span>
                                <div wire:loading wire:target="photo" class="mt-1 text-xs opacity-60">Uploading…</div>
                                @error('photo') <p class="mt-1 text-xs text-error">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <label class="flex cursor-pointer items-start gap-3 rounded-box bg-primary/10 p-4 text-sm">
                        <input type="checkbox" wire:model.live="consent" class="checkbox checkbox-primary mt-0.5">
                        <span>I confirm this information is accurate and agree to its use for CME accreditation and
                            congress publications.</span>
                    </label>
                    @error('consent') <span class="-mt-3 text-xs text-error">{{ $message }}</span> @enderror
                </div>
            </section>

            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary px-8" wire:loading.attr="disabled"
                    wire:target="save,photo">
                    <span wire:loading wire:target="save" class="loading loading-spinner loading-sm"></span>
                    Submit form
                </button>
            </div>
        </form>
    </main>
    @endif
</div>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<div x-data="{
    searchTerm: '',
    matchesSearch(text) {
        return text.toLowerCase().includes(this.searchTerm.trim().toLowerCase());
    }
}">
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Program at a Glance</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <main class="mx-auto w-full max-w-8xl space-y-4 px-4 py-5 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between w-full items-start gap-2">
            <div class="flex flex-col gap-2 w-full">
                <label
                    class="flex flex-1 items-center gap-2 rounded-lg border border-slate-300 px-3 py-2 focus-within:ring-2 focus-within:ring-indigo-400">
                    <i class="fa fa-search text-sm text-slate-400" aria-hidden="true"></i>
                    <input x-model.debounce.300ms="searchTerm" type="search"
                        class="min-w-0 flex-1 border-0 bg-transparent text-sm outline-none focus:outline-none focus:ring-0"
                        placeholder="Search session, topic, Room, Speaker..." aria-label="Search sessions">
                    <button type="button" x-on:click="searchTerm = ''"
                        class="text-slate-400 transition hover:text-slate-700" aria-label="Reset search"
                        title="Reset search">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </label>
                <span x-show="searchTerm.trim()" x-cloak class="text-xs text-slate-500" aria-live="polite">
                    Matching sessions are highlighted; other sessions are dimmed.
                </span>
            </div>
            @if ($downloads->isNotEmpty())
            <div class="flex flex-col gap-2">
                <div class="flex flex-wrap items-center">
                    <a href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($downloads->first()->atglance) }}"
                        target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        Download PDF Schedule
                    </a>
                    <span class="text-xs italic text-slate-500">
                        Updated {{ \Carbon\Carbon::parse($downloads->first()->updated_at)->format('F jS, Y') }}
                    </span>
                </div>
                <span class="text-xs italic text-slate-500">
                    The PDF schedule always reflects the most up-to-date information.
                </span>
            </div>
            @endif
        </div>

        <div x-data="{ openTab: 1 }" class="space-y-4">
            <nav class="flex gap-2 overflow-x-auto pb-1" aria-label="Programme dates">
                @foreach ($days as $index => $day)
                <button type="button" x-on:click="openTab = {{ $index + 1 }}"
                    x-bind:class="openTab === {{ $index + 1 }} ? 'bg-indigo-600 text-white shadow' : 'bg-white text-slate-600 hover:bg-indigo-50'"
                    class="shrink-0 rounded-xl px-4 py-2 text-left transition">
                    {{-- <span class="block text-xs opacity-80">Programme</span> --}}
                    <span class="font-semibold">{{ $day['label'] }}</span>
                </button>
                @endforeach
            </nav>

            @foreach ($days as $index => $day)
            <section x-show="openTab === {{ $index + 1 }}" x-cloak class="overflow-hidden rounded-xl bg-white shadow-sm"
                aria-label="{{ $day['label'] }} schedule">
                @if ($day['sessions']->isEmpty())
                <p class="p-6 text-center text-sm text-slate-500">
                    No sessions found for {{ $day['label'] }}.
                </p>
                @else
                <div class="max-h-[75vh] overflow-auto">
                    <div class="grid min-w-max text-xs"
                        style="grid-template-columns: 96px repeat({{ $day['rooms']->count() }}, minmax(150px, 1fr));">
                        <div
                            class="sticky left-0 top-0 z-30 flex items-center bg-slate-800 p-3 font-semibold text-white">
                            TIME
                        </div>
                        @foreach ($day['rooms'] as $roomName)
                        <div
                            class="sticky top-0 z-20 border-l border-slate-700 bg-slate-800 p-3 text-center font-semibold text-white">
                            {{ $roomName }}
                        </div>
                        @endforeach

                        @foreach ($day['timeSlots'] as $slot)
                        <div
                            class="sticky left-0 z-10 flex items-center border-t border-slate-200 bg-slate-50 p-3 font-semibold text-slate-600">
                            {{ $slot['time'] ?: 'Time to be announced' }}
                        </div>

                        @foreach ($slot['rooms'] as $room)
                        <div class="min-h-[84px] border-l border-t border-slate-200 p-1">
                            @foreach ($room['sessions'] as $session)
                            <button type="button"
                                onclick="document.getElementById('session-{{ $session->id }}').showModal()"
                                data-search-text="{{ \Illuminate\Support\Str::lower(implode(' ', array_filter([
                                    $session->title_ses,
                                    $session->room,
                                    $session->category_sesi,
                                    $session->moderator,
                                    $session->panelist,
                                    $session->schedules->pluck('topic_title')->implode(' '),
                                    $session->schedules->pluck('speaker')->implode(' '),
                                    $session->schedules->pluck('time_speaker')->implode(' '),
                                ]))) }}" x-bind:class="searchTerm.trim()
                                    ? (matchesSearch($el.dataset.searchText) ? 'ring-2 ring-amber-400 shadow-lg' : 'opacity-25')
                                    : ''"
                                class="mb-1 block min-h-[76px] w-full rounded-lg border border-indigo-200 bg-indigo-50 p-2 text-left text-indigo-950 transition hover:ring-2 hover:ring-indigo-400">
                                <span
                                    class="mb-1 inline-block rounded-full bg-indigo-100 px-2 py-0.5 text-[10px] font-semibold uppercase text-indigo-700">
                                    {{ $session->category_sesi ?: 'Session' }}
                                </span>
                                <span class="block font-semibold leading-tight">
                                    {{ $session->title_ses ?: 'Untitled session' }}
                                </span>
                                @if ($session->moderator)
                                <span class="mt-1 block text-[11px] text-indigo-700/70">
                                    {{ $session->moderator }}
                                </span>
                                @endif
                            </button>

                            <dialog id="session-{{ $session->id }}" class="modal">
                                <div class="modal-box max-h-[85vh] w-11/12 max-w-5xl text-left">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <span class="badge badge-info badge-sm">
                                                {{ $session->category_sesi ?: 'Session' }}
                                            </span>
                                            <h2 class="mt-2 text-xl font-bold text-slate-800">
                                                {{ $session->title_ses ?: 'Untitled session' }}
                                            </h2>
                                        </div>
                                        <form method="dialog">
                                            <button class="btn btn-ghost btn-sm" aria-label="Close dialog">✕</button>
                                        </form>
                                    </div>

                                    <dl class="mt-5 grid grid-cols-[auto_1fr] gap-x-4 gap-y-2 text-sm">
                                        <dt class="text-slate-500">Date</dt>
                                        <dd>{{ \Carbon\Carbon::parse($session->date)->format('d F Y') }}</dd>
                                        <dt class="text-slate-500">Time</dt>
                                        <dd>{{ $session->time ?: 'To be announced' }}</dd>
                                        <dt class="text-slate-500">Room</dt>
                                        <dd>{{ $session->room ?: 'To be announced' }}</dd>
                                        <dt class="text-slate-500">Moderator</dt>
                                        <dd>{{ $session->moderator ?: 'To be announced' }}</dd>
                                        @if ($session->panelist)
                                        <dt class="text-slate-500">Panelist</dt>
                                        <dd>{{ $session->panelist }}</dd>
                                        @endif
                                    </dl>

                                    <div class="mt-6 overflow-x-auto">
                                        <table class="table table-zebra">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Topic</th>
                                                    <th>Speaker</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($session->schedules as $schedule)
                                                <tr>
                                                    <th>{{ $schedule->time_speaker }}</th>
                                                    <td>{{ $schedule->topic_title }}</td>
                                                    <td>{{ $schedule->speaker }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="3" class="text-center text-slate-500">
                                                        No session details available.
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <form method="dialog" class="modal-backdrop">
                                    <button aria-label="Close dialog">close</button>
                                </form>
                            </dialog>
                            @endforeach
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                @endif
            </section>
            @endforeach
        </div>

        <p class="px-1 text-sm italic text-slate-500">
            Note: The scientific schedule is provisional and may be adjusted as required.
        </p>
    </main>
</div>
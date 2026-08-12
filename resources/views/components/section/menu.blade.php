<ul class="flex gap-6 uppercase">
    <li>
        <a href="/" wire:navigate
            class="{{ request()->is('/') ? 'text-blue-700' : 'text-gray-800' }} hover:text-[#0CA6DD] hover:underline ">Home
        </a>
    </li>
    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{  request()->is('about-ins') || request()->is('about-wfns') || request()->is('wfns-congress-2027') ? 'text-blue-700' : 'text-gray-800' }} hover:cursor-pointer hover:text-[#0CA6DD]">
            About <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">
            <li>
                <a href="{{route('wfns-congress-2027')}}" wire:navigate
                    class="{{ request()->is('wfns-congress-2027') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD] "> WFNS Congress 2027 <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="{{route('about-wfns')}}" wire:navigate
                    class="{{ request()->is('about-wfns') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD] "> WFNS <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="{{route('about-ins')}}" wire:navigate
                    class="{{ request()->is('about-ins') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD] "> INS <i class="fa-solid fa-angle-right"></i></a>
            </li>

        </ul>
    </div>
    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{ request()->is('organizing-committee') || request()->is('faculties') || request()->is('welcome-message')  ? 'text-blue-700' : 'text-gray-800' }} hover:cursor-pointer hover:text-[#0CA6DD]">
            Congress Information <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">
            <li>
                <a href="/welcome-message" wire:navigate
                    class="{{ request()->is('welcome-message') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD] ">Welcome
                    Message <i class="fa-solid fa-angle-right"></i></a>
            </li>

            <li>
                <a href="/organizing-committee" wire:navigate
                    class="{{ request()->is('organizing-committee') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD] ">Local Organizing
                    Committee <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="/faculties" wire:navigate
                    class="{{ request()->is('faculties') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD] ">Faculties
                    <i class="fa-solid fa-angle-right"></i></a>
            </li>
        </ul>
    </div>

    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{ request()->is('program-at-glance') || request()->is('topics') || request()->is('scientific-schedule') ? 'text-blue-700' : 'text-gray-800' }} hover:cursor-pointer hover:text-[#0CA6DD]">
            Scientific Program <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">

            {{-- <li>
                <a href="/topics" wire:navigate
                    class="{{ request()->is('topics') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD]">
            Topics <i class="fa-solid fa-angle-right"></i></a>
            </li> --}}
            <li>
                <a href="/program-at-glance" wire:navigate
                    class="{{ request()->is('program-at-glance') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD]">Program
                    at Glance <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="/scientific-schedule" wire:navigate
                    class="{{ request()->is('scientific-schedule') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD]">Scientific
                    Schedule <i class="fa-solid fa-angle-right"></i></a>
            </li>
    </div>


    <li>
        <a href="/registration" wire:navigate
            class="{{ request()->is('registration') ? 'text-blue-700' : 'text-gray-800' }} hover:text-[#0CA6DD] hover:underline">Registration
        </a>
    </li>
    <li>
        <a href="/accommodation" wire:navigate
            class="{{ request()->is('accommodation') ? 'text-blue-700' : 'text-gray-800' }} hover:text-[#0CA6DD] hover:underline">Accommodation
        </a>
    </li>

    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{ request()->is('submission')  || request()->is('presentation-schedule')  ? 'text-blue-700' : 'text-gray-800' }} hover:cursor-pointer hover:text-[#0CA6DD]">
            Free Paper <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">
            {{-- <li>
                <a href="/presentation-schedule" wire:navigate
                    class="{{ request()->is('presentation-schedule') ? 'text-blue-700' : '' }} justify-between hover:text-[#0CA6DD]">
            Free Paper Schedule <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="#" class="justify-between hover:text-[#0CA6DD]">Free Paper Presentation Submission <i
                        class="fa-solid fa-angle-right"></i></a>
            </li> --}}
            <li>
                <a href="/submission" wire:navigate
                    class="{{ request()->is('submission') ? 'text-[#0CA6DD]' : '' }} justify-between hover:text-[#0CA6DD]">Abstract
                    Submission<i class="fa-solid fa-angle-right"></i></a>
            </li>
    </div>
    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{ request()->is('visiting')  || request()->is('social-program')  ? 'text-blue-700' : 'text-gray-800' }} hover:cursor-pointer hover:text-[#0CA6DD]">
            Visiting <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">
            <li>
                <a href="/visiting" wire:navigate
                    class="{{ request()->is('visiting') ? 'text-blue-700' : '' }} justify-between hover:text-[#0CA6DD]">
                    Bali <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="/visiting#venue"
                    class="{{ request()->is('visiting#venue') ? 'text-blue-700' : '' }} justify-between hover:text-[#0CA6DD]">Conference
                    Venue <i class="fa-solid fa-angle-right"></i></a>
            </li>
            {{-- <li>
                <a href="/social-program" wire:navigate
                    class="{{ request()->is('social-program') ? 'text-blue-700' : '' }} justify-between hover:text-[#0CA6DD]">Social
            Program <i class="fa-solid fa-angle-right"></i></a>
            </li> --}}
    </div>

</ul>
<ul class="flex gap-6 uppercase">
    <li>
        <a href="/" wire:navigate
            class="{{ request()->is('/') ? 'text-red-600' : 'text-[#044b4a]' }} hover:text-[#D82128] hover:underline ">Home
        </a>
    </li>
    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{ request()->is('organizing-committee') || request()->is('faculties') || request()->is('welcome-message') ? 'text-red-600' : 'text-[#044b4a]' }} hover:cursor-pointer hover:text-[#D82128]">
            Congress Information <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">
            <li>
                <a href="/welcome-message" wire:navigate
                    class="{{ request()->is('welcome-message') ? 'text-[#D82128]' : '' }} justify-between hover:text-[#D82128] ">Welcome
                    Message <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="/organizing-committee" wire:navigate
                    class="{{ request()->is('organizing-committee') ? 'text-[#D82128]' : '' }} justify-between hover:text-[#D82128] ">Organizing
                    Committee <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="/faculties" wire:navigate
                    class="{{ request()->is('faculties') ? 'text-[#D82128]' : '' }} justify-between hover:text-[#D82128] ">Faculties
                    <i class="fa-solid fa-angle-right"></i></a>
            </li>
        </ul>
    </div>

    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{ request()->is('program-at-glance') || request()->is('topics') || request()->is('scientific-schedule') ? 'text-red-600' : 'text-[#044b4a]' }} hover:cursor-pointer hover:text-[#D82128]">
            Scientific Program <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">

            {{-- <li>
                <a href="/topics" wire:navigate
                    class="{{ request()->is('topics') ? 'text-[#D82128]' : '' }} justify-between hover:text-[#D82128]">
                    Topics <i class="fa-solid fa-angle-right"></i></a>
            </li> --}}
            <li>
                <a href="/program-at-glance" wire:navigate
                    class="{{ request()->is('program-at-glance') ? 'text-[#D82128]' : '' }} justify-between hover:text-[#D82128]">Program
                    at Glance <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="/scientific-schedule" wire:navigate
                    class="{{ request()->is('scientific-schedule') ? 'text-[#D82128]' : '' }} justify-between hover:text-[#D82128]">Scientific
                    Schedule <i class="fa-solid fa-angle-right"></i></a>
            </li>
    </div>


    <li>
        <a href="/registration" wire:navigate
            class="{{ request()->is('registration') ? 'text-red-600' : 'text-[#044b4a]' }} hover:text-[#D82128] hover:underline">Registration
        </a>
    </li>
    <li>
        <a href="/accommodation" wire:navigate
            class="{{ request()->is('accommodation') ? 'text-red-600' : 'text-[#044b4a]' }} hover:text-[#D82128] hover:underline">Accommodation
        </a>
    </li>

    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{ request()->is('submission')  || request()->is('presentation-schedule')  ? 'text-red-600' : 'text-[#044b4a]' }} hover:cursor-pointer hover:text-[#D82128]">
            Free Paper <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">
            {{-- <li>
                <a href="/presentation-schedule" wire:navigate
                    class="{{ request()->is('presentation-schedule') ? 'text-red-600' : '' }} justify-between hover:text-[#D82128]">
                    Free Paper Schedule <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="#" class="justify-between hover:text-[#D82128]">Free Paper Presentation Submission <i
                        class="fa-solid fa-angle-right"></i></a>
            </li> --}}
            <li>
                <a href="/submission" wire:navigate
                    class="{{ request()->is('submission') ? 'text-[#D82128]' : '' }} justify-between hover:text-[#D82128]">Abstract
                    Submission<i class="fa-solid fa-angle-right"></i></a>
            </li>
    </div>
    <div class="dropdown dropdown-hover">
        <div tabindex="0"
            class="{{ request()->is('visiting')  || request()->is('social-program')  ? 'text-red-600' : 'text-[#044b4a]' }} hover:cursor-pointer hover:text-[#D82128]">
            Visiting <i class="fa-solid fa-angle-down"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box gap-2 w-60 p-2 shadow-sm">
            <li>
                <a href="/visiting" wire:navigate
                    class="{{ request()->is('visiting') ? 'text-red-600' : '' }} justify-between hover:text-[#D82128]">
                    Surabaya <i class="fa-solid fa-angle-right"></i></a>
            </li>
            {{-- <li>
                <a href="/visiting"
                    class="{{ request()->is('visiting#venue') ? 'text-red-600' : '' }} justify-between hover:text-[#D82128]">Conference
                    Venue <i class="fa-solid fa-angle-right"></i></a>
            </li>
            <li>
                <a href="/social-program" wire:navigate
                    class="{{ request()->is('social-program') ? 'text-red-600' : '' }} justify-between hover:text-[#D82128]">Social
                    Program <i class="fa-solid fa-angle-right"></i></a>
            </li> --}}
    </div>

</ul>
<!-- Header -->
<header class="bg-gradient-to-l from-[#1B1464] via-[#0c7fdd] to-[#0CA6DD] hidden lg:block text-white text-sm py-2">
    <div class="mx-auto flex justify-end items-center px-4 py-2">

        {{-- <div>
            <a class="btn btn-sm btn-outline text-sky-950 border-white rounded-full shadow-none w-8" href="mailto:tiolan@pharma-pro.com">
                <i class="fa fa-envelope">
                </i>
            </a>
            <a class="btn btn-sm btn-outline text-sky-950 border-white rounded-full shadow-none w-8" href="tel:+62816995230">
                <i class="fa fa-phone">
                </i>
            </a>

            <a class="btn btn-sm btn-outline text-sky-950 border-white rounded-full shadow-none w-8" href="https://wa.me/+6281317857586" target="_blank">
                <i class="fa fa-whatsapp">
                </i>
            </a>
            <a class="btn btn-sm btn-outline text-sky-950 border-white rounded-full shadow-none w-8" href="javascript:void(0)">
                <i class="fa fa-instagram">
                </i>
            </a>
        </div> --}}
        <div class="flex">
            <div class="border-r pr-3">
                <a href="https://wfns.org/" target="_blank" class="ml-4 text-sm hover:underline hover:text-primary">
                    World Federation of Neurosurgical Societies
                </a>
            </div>
            <div class="border-r pr-3">
                <a href="https://www.ins.or.id/" target="_blank" class="ml-4 text-sm hover:underline hover:text-primary">
                    Indonesian Neurosurgical Society
                </a>
            </div>
        </div>
    </div>
</header>
<!-- Navigation -->
<nav id="navbar"
    class="w-full py-2 bg-transparent z-20 shadow-lg sticky lg:shadow-none lg:fixed transition-colors duration-300">
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <div class="navbar">
                <div class="navbar-start">
                    <img src="assets/images/logo/logo-event-dark.png" class="w-full max-w-36 hidden md:block" alt="Logo" />
                    <img src="assets/images/logo/logo-event-dark.png" class="w-full max-w-36 md:hidden" alt="Logo" />
                </div>
                <div class="navbar-center hidden lg:flex py-2">
                    <x-section.menu />
                </div>
                <div class="navbar-end">
                    <div onclick="contact.showModal()"
                        class="btn btn-primary rounded-lg shadow-none mx-2 flex gap-2">
                        <i class="fa fa-image-portrait"></i>
                        Contact
                    </div>
                    <div class="flex-none lg:hidden">
                        <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                            <i class="fa fa-bars text-2xl"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="bg-base-100 min-h-full w-80 p-4">
                <!-- Sidebar content here -->
                <img src="assets/images/logo/logo-event-dark.png" class="w-full mb-5 max-w-sm" />
                <x-section.menu-mobile />
            </ul>
        </div>
    </div>
    <dialog id="contact" class="modal px-1">
        <div class="modal-box w-full max-w-5xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <x-section.contact-icon />

        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</nav>
<div>
    
    <section class="relative overflow-hidden bg-[#075a99]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(18,183,221,0.7),transparent_35%),radial-gradient(circle_at_90%_80%,rgba(20,89,157,0.95),transparent_45%)]">
        </div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Registration</h2>
            <div class="mt-7 h-1 w-20 bg-[#f6c945]"></div>
        </div>
    </section>

    <section class="px-5 md:px-10 pt-0 pb-10 md:py-20 bg-competition">

        <div class="tabs tabs-border justify-evenly">


            <input type="radio" name="my_tabs_2" class="tab uppercase text-lg text-primary "
                aria-label="Foreign Participant" checked="checked" />
            <div class="tab-content">
                <div class="pb-6 text-gray-500">
                    @foreach ($uniqueForeigns as $category)
                    @if ($category == 'symposium')
                    <h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
                    <div class="relative overflow-x-auto shadow sm:rounded-lg ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class=" text-white uppercase text-center bg-primary ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Early Bird Registration <br>
                                        up to 1 May (23:59 UTC+8)
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Regular Registration <br>
                                        2 May - 31 Oct (23:59 UTC+8)
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Late/Onsite Registration <br>
                                        31 Oct onwards (23:59 UTC+8)
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regForeigns as $regForeign)
                                @if ($regForeign->category_reg == $category)
                                <tr class="bg-white border-b  border-gray-200 hover:bg-sky-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$regForeign->title}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        USD {{$regForeign->early_bird_reg != 0 ?
                                        number_format($regForeign->early_bird_reg,
                                        0, ',', '.') : 'to be announce'}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        USD {{$regForeign->normal_reg != 0 ? number_format($regForeign->normal_reg, 0,
                                        ',',
                                        '.') : 'to be announce'}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        USD {{$regForeign->onsite_reg != 0 ? number_format($regForeign->onsite_reg, 0,
                                        ',',
                                        '.'): 'to be announce'}}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="relative mt-2">
                            <a href="https://expo.virconex-id.com/registration/wfns2027"
                                class="btn btn-primary btn-outline btn-lg rounded-xl mb-3 float-end text-sm"><i
                                    class="fa-solid fa-list mx-3"></i>Register Now!</a>
                        </div>
                    </div>

                    @elseif ($category == 'workshop')
                    <h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
                    <div class="relative overflow-x-auto shadow sm:rounded-lg ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class=" text-white uppercase text-center bg-primary ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        28, 29 & 30 July, 2026 <br>
                                        Fatmawati Hospital, Jakarta
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Regular Registration <br>
                                        2 May - 31 Oct (23:59 UTC+8)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regForeigns as $regForeign)
                                @if ($regForeign->category_reg == $category)
                                <tr class="bg-white border-b  border-gray-200 hover:bg-sky-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$regForeign->title}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{$regForeign->early_bird_reg != 0 ? 'USD ' .
                                        number_format($regForeign->early_bird_reg, 0, ',', '.') : 'to be announce'}}

                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$regForeign->early_bird_reg != 0 ? 'USD ' .
                                        number_format($regForeign->normal_reg, 0, ',', '.') : ''}}
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="relative mt-2">
                            <a href="https://expo.virconex-id.com/registration/wfns2027"
                                class="btn btn-primary btn-lg rounded-xl mb-3 float-end text-sm"><i
                                    class="fa-solid fa-list mx-3"></i>Register Now!</a>
                        </div>
                    </div>
                    @elseif ($category == 'workshop microsurgery')
                    <h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
                    <div class="relative overflow-x-auto shadow sm:rounded-lg ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class=" text-white uppercase text-center bg-primary ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        30 July, 2026 <br>
                                        Zeiss Office
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Regular Registration <br>
                                        2 May - 31 Oct (23:59 UTC+8)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regForeigns as $regForeign)
                                @if ($regForeign->category_reg == $category)
                                <tr class="bg-white border-b  border-gray-200 hover:bg-sky-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$regForeign->title}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{$regForeign->early_bird_reg != 0 ? 'USD ' .
                                        number_format($regForeign->early_bird_reg, 0, ',', '.') : 'to be announce'}}

                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$regForeign->early_bird_reg != 0 ? 'USD ' .
                                        number_format($regForeign->normal_reg, 0, ',', '.') : ''}}
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="relative mt-2">
                            <a href="https://expo.virconex-id.com/registration/wfns2027"
                                class="btn btn-primary btn-lg rounded-xl mb-3 float-end text-sm"><i
                                    class="fa-solid fa-list mx-3"></i>Register Now!</a>
                        </div>
                    </div>
                    @else
                    <h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
                    <div class="relative overflow-x-auto shadow sm:rounded-lg ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class=" text-white uppercase text-center bg-primary ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        for General Practitioner and Primary Care Providers <br>
                                        1 August 2026
                                        Swissôtel Jakarta PIK Avenue, Jakarta
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nurse / Medical Students
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regForeigns as $regForeign)
                                @if ($regForeign->category_reg == $category)
                                <tr class="bg-white border-b  border-gray-200 hover:bg-sky-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$regForeign->title}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{$regForeign->early_bird_reg != 0 ? 'USD ' .
                                        number_format($regForeign->early_bird_reg,
                                        0, ',', '.') : 'to be announce'}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$regForeign->normal_reg != 0 ? 'USD' . number_format($regForeign->normal_reg,
                                        0,
                                        ',',
                                        '.') : ''}}
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="relative mt-2">
                            <a href="https://expo.virconex-id.com/registration/wfns2027"
                                class="btn btn-primary btn-lg rounded-xl mb-3 float-end text-sm"><i
                                    class="fa-solid fa-list mx-3"></i>Register Now!</a>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>

            </div>
            <input type="radio" name="my_tabs_2" class="tab text-lg uppercase text-primary"
                aria-label="Indonesian Participant" />
            <div class="tab-content">
                <div class="pb-6 text-gray-500">
                    @foreach ($uniqueLocals as $category)
                    @if ($category == 'symposium')
                    <h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
                    <div class="relative overflow-x-auto shadow sm:rounded-lg ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class=" text-white uppercase text-center bg-primary ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Early Bird Registration <br>
                                        up to 1 May (23:59 UTC+8)
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Regular Registration <br>
                                        2 May - 31 Oct (23:59 UTC+8)
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Late/Onsite Registration <br>
                                        31 Oct onwards (23:59 UTC+8)
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regLocals as $regLocal)
                                @if ($regLocal->category_reg == $category)
                                <tr class="bg-white border-b  border-gray-200 hover:bg-sky-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$regLocal->title}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        IDR {{$regLocal->early_bird_reg != 0 ? number_format($regLocal->early_bird_reg,
                                        0, ',', '.') : 'to be announce'}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        IDR {{$regLocal->normal_reg != 0 ? number_format($regLocal->normal_reg, 0, ',',
                                        '.') : 'to be announce'}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        IDR {{$regLocal->onsite_reg != 0 ? number_format($regLocal->onsite_reg, 0, ',',
                                        '.'): 'to be announce'}}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="relative mt-2">
                            <a href="https://expo.virconex-id.com/registration/wfns2027"
                                class="btn btn-primary btn-outline btn-lg rounded-xl mb-3 float-end text-sm"><i
                                    class="fa-solid fa-list mx-3"></i>Register Now!</a>
                        </div>
                    </div>
                    @elseif ($category == 'workshop')
                    <h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                        @foreach ($regLocals as $regLocal)
                        @if ($regLocal->category_reg == $category)
                        <div class="card w-full lg:w-96 bg-base-100 shadow-sm">
                            <div class="card-body">
                                <span class="badge badge-xs badge-warning">{{$regLocal->title}}</span>
                                <div class="flex flex-wrap justify-between">
                                    <h2 class="text-xl font-bold">{{$regLocal->subtitle}}</h2>
                                    <span class="text-xl">IDR {{$regLocal->early_bird_reg != 0 ?
                                        number_format($regLocal->early_bird_reg,
                                        0, ',', '.') : 'to be announce'}}</span>
                                </div>
                                {!! str($regLocal->description)->markdown()->sanitizeHtml() !!}
                                <div class="mt-6">
                                    <a href="https://expo.virconex-id.com/registration/wfns2027"
                                        class="btn btn-primary  rounded-xl mb-3 btn-block"><i
                                            class="fa-solid fa-list mx-3"></i>Register Now!</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @else
                    <h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
                    <div class="relative overflow-x-auto shadow sm:rounded-lg ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class=" text-white uppercase text-center bg-primary ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        for General Practitioner and Primary Care Providers <br>
                                        1 August 2026
                                        Swissôtel Jakarta PIK Avenue, Jakarta
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nurse / Medical Students
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regLocals as $regLocal)
                                @if ($regLocal->category_reg == $category)
                                <tr class="bg-white border-b  border-gray-200 hover:bg-sky-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$regLocal->title}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{$regLocal->early_bird_reg != 0 ? 'IDR ' .
                                        number_format($regLocal->early_bird_reg,
                                        0, ',', '.') : 'to be announce'}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$regLocal->normal_reg != 0 ? 'IDR' . number_format($regLocal->normal_reg, 0,
                                        ',',
                                        '.') : ''}}
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="relative mt-2">
                            <a href="https://expo.virconex-id.com/registration/wfns2027"
                                class="btn btn-primary btn-lg rounded-xl mb-3 float-end text-sm"><i
                                    class="fa-solid fa-list mx-3"></i>Register Now!</a>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
        <button class="btn text-error btn-link hover:text-red-700 no-underline hover:underline"
            onclick="my_modal_1.showModal()">*DEVELOPING COUNTRIES are based on IMF List of Low Income Developing
            Countries</button>
        <dialog id="my_modal_1" class="modal">
            <div class="modal-box w-full max-w-7xl">
                <h3 class="text-xl font-bold text-primary">Developing Countries</h3>
                <p class="mt-1 text-sm text-gray-500">Based on IMF list of low income developing countries.</p>

                <div class="mt-4 rounded-xl border border-gray-200 bg-base-100 p-4">
                    <ol class="list-decimal pl-5 text-sm text-gray-700 columns-1 gap-8 md:columns-2 lg:columns-3">
                        @foreach ($developingCountries as $country)
                        <li class="mb-2 break-inside-avoid">{{ $country }}</li>
                        @endforeach
                    </ol>
                </div>

                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    </section>

    <section class="px-5 md:px-10 py-10 md:py-20 bg-competition border-t border-dashed border-gray-400">
        <div class=" mt-10">
            <div class="text-center lg:text-start">
                <h2 class="mb-2 uppercase text-3xl font-semibold">Registration
                    <span class="text-primary">information</span>
                </h2>
            </div>

            <div>
                @foreach ($regInfos as $regInfo)
                <div class="collapse collapse-arrow bg-base-100 border border-base-300">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title font-semibold">{{ $regInfo->title }}</div>
                    <div class="collapse-content text-sm text-gray-500">
                        {!!str($regInfo->description)->markdown()->sanitizeHtml() !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

{{-- <div class="pb-6 text-gray-500">
    @foreach ($uniqueLocals as $category)
    @if ($category == 'symposium')
    <h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
<div class="relative overflow-x-auto shadow sm:rounded-lg ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class=" text-white uppercase text-center bg-primary ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Early Bird Registration <br>
                    up to 31 August 2026
                </th>
                <th scope="col" class="px-6 py-3">
                    Regular Registration <br>
                    2 May - 31 Oct (23:59 UTC+8)
                </th>
                <th scope="col" class="px-6 py-3">
                    Late/Onsite Registration <br>
                    Start from 1 September 2026
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($regLocals as $regLocal)
            @if ($regLocal->category_reg == $category)
            <tr class="bg-white border-b  border-gray-200 hover:bg-sky-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$regLocal->title}}
                </th>
                <td class="px-6 py-4 text-center">
                    IDR {{$regLocal->early_bird_reg != 0 ? number_format($regLocal->early_bird_reg,
                        0, ',', '.') : 'to be announce'}}
                </td>
                <td class="px-6 py-4 text-center">
                    IDR {{$regLocal->normal_reg != 0 ? number_format($regLocal->normal_reg, 0, ',',
                        '.') : 'to be announce'}}
                </td>
                <td class="px-6 py-4 text-center">
                    IDR {{$regLocal->onsite_reg != 0 ? number_format($regLocal->onsite_reg, 0, ',',
                        '.'): 'to be announce'}}
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <div class="relative mt-2">
        <a href="https://expo.virconex-id.com/registration/wfns2027"
            class="btn btn-primary btn-outline btn-lg rounded-xl mb-3 float-end text-sm"><i
                class="fa-solid fa-list mx-3"></i>Register Now!</a>
    </div>
</div>
@elseif ($category == 'workshop')
<h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
    @foreach ($regLocals as $regLocal)
    @if ($regLocal->category_reg == $category)
    <div class="card w-full lg:w-96 bg-base-100 shadow-sm">
        <div class="card-body">
            <span class="badge badge-xs badge-warning">{{$regLocal->title}}</span>
            <div class="flex flex-wrap justify-between">
                <h2 class="text-xl font-bold">{{$regLocal->subtitle}}</h2>
                <span class="text-xl">IDR {{$regLocal->early_bird_reg != 0 ?
                        number_format($regLocal->early_bird_reg,
                        0, ',', '.') : 'to be announce'}}</span>
            </div>
            {!! str($regLocal->description)->markdown()->sanitizeHtml() !!}
            <div class="mt-6">
                <a href="https://expo.virconex-id.com/registration/wfns2027"
                    class="btn btn-primary  rounded-xl mb-3 btn-block"><i
                        class="fa-solid fa-list mx-3"></i>Register Now!</a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
@else
<h2 class="uppercase font-semibold text-primary mb-2 mt-5">{{$category}}</h2>
<div class="relative overflow-x-auto shadow sm:rounded-lg ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class=" text-white uppercase text-center bg-primary ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Early Bird Registration <br>
                    up to 31 August 2026
                </th>
                <th scope="col" class="px-6 py-3">
                    Late/Onsite Registration <br>
                    Start from 1 September 2026
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($regLocals as $regLocal)
            @if ($regLocal->category_reg == $category)
            <tr class="bg-white border-b  border-gray-200 hover:bg-sky-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$regLocal->title}}
                </th>
                <td class="px-6 py-4 text-center">
                    {{$regLocal->early_bird_reg != 0 ? 'IDR ' .
                        number_format($regLocal->early_bird_reg,
                        0, ',', '.') : 'to be announce'}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$regLocal->normal_reg != 0 ? 'IDR' . number_format($regLocal->normal_reg, 0,
                        ',',
                        '.') : ''}}
                </td>

            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <div class="relative mt-2">
        <a href="https://expo.virconex-id.com/registration/wfns2027"
            class="btn btn-primary btn-lg rounded-xl mb-3 float-end text-sm"><i
                class="fa-solid fa-list mx-3"></i>Register Now!</a>
    </div>
</div>
@endif
@endforeach

</div> --}}
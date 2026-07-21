<div>
    <section class=" relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#018284] to-[#79d4d6]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Abstract submission</h2>
        </div>
    </section>

    <section class="bg-base-100 px-5 md:px-10 pt-0 pb-10 md:py-20">
        <div class="text-center lg:text-start mb-5 md:mb-10">
            <p class="mb-1 text-[#018284]">Submission</p>
            <h2 class="mb-2 uppercase text-3xl font-semibold">Guideline for <span class="text-[#018284]">Abstract
                    Submission</span>
            </h2>
            {{-- <p>Abstract Free Paper</p> --}}
        </div>
        <div class="flex flex-col md:flex-row justify-between gap-5 md:gap-0">
            <div class="order-2 w-full max-w-md">
                <div class="card bg-base-200 w-full shadow-sm rounded-lg">
                    <div class="card-body">
                        <h2 class="card-title">Online <span class="text-[#018284]">Submission</span></h2>
                        <p class="text-gray-600 italic">*make sure the file complies with the guidelines.</p>
                        <div class="card-actions justify-end mt-5">
                            <a href="https://expo.virconex-id.com/registration/jinef2026/index.php/add_abstract/index" class="btn bg-red-600 hover:bg-red-800 text-white"><i class="fa-solid fa-upload me-1"></i> Submit Abstract</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-1 mt-5 md:mt-0 w-full max-w-4xl">
                @foreach ($guidelineAbstracts as $abstract)
                <div class="collapse collapse-arrow bg-base-200 border border-base-300">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title font-semibold">{{ $abstract->title }}</div>
                    <div class="collapse-content text-sm text-gray-600">
                        {!! str($abstract->description)->markdown()->sanitizeHtml() !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section class="bg-base-200 px-5 md:px-10 py-10 md:py-20">
        <div class="text-center lg:text-start mb-5 md:mb-10">
            <p class="mb-1 text-[#018284]">Submission</p>
            <h2 class="mb-2 uppercase text-3xl font-semibold">Guideline for <span class="text-[#018284]">Abstract
                    Submission</span>
            </h2>
            <p>Abstract Video</p>
        </div>
        <div class="flex flex-col md:flex-row justify-between gap-5 md:gap-0">
            <div class="order-2 md:order-1 w-full max-w-md">
                <div class="card bg-base-100 w-full shadow-sm rounded-lg">
                    <div class="card-body">
                        <h2 class="card-title">Online <span class="text-[#018284]">Submission</span></h2>
                        <p class="text-gray-600 italic">*make sure the file complies with the guidelines.</p>
                        <div class="card-actions justify-end mt-5">
                            <button class="btn btn-accent"><i class="fa-solid fa-upload me-1"></i> Submit Abstract</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-1 md:order-2 mt-5 md:mt-0 w-full max-w-4xl">
                @foreach ($guidelineVideos as $video)
                <div class="collapse collapse-arrow bg-base-100 border border-base-300">
                    <input type="radio" name="my-accordion-3" />
                    <div class="collapse-title font-semibold">{{ $video->title }}
</div>
<div class="collapse-content text-sm text-gray-600">
    {!! str($video->description)->markdown()->sanitizeHtml() !!}
</div>
</div>
@endforeach
</div>
</div>
</section>

<section class="bg-base-100 px-5 md:px-10 py-10 md:py-20">
    <div class="text-center lg:text-start mb-5 md:mb-10">
        <p class="mb-1 text-[#018284]">Submission</p>
        <h2 class="mb-2 uppercase text-3xl font-semibold">Educative flyer and educative video <span class="text-[#018284]">Competition</span>
        </h2>
    </div>
    <div class="flex flex-col md:flex-row justify-between gap-5 md:gap-0">
        <div class="order-2 w-full max-w-md">
            <div class="card bg-base-200 w-full shadow-sm rounded-lg">
                <div class="card-body">
                    <h2 class="card-title">Upload <span class="text-[#018284]">Video & Flyer</span></h2>
                    <p class="text-gray-600 italic">*Instruction video or flyer submission.</p>
                    <br>
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="text-start text-warning hover:text-[#018284] hover:underline hover:cursor-pointer" onclick="my_modal_1.showModal()">Read more...</button>

                    <div class="card-actions justify-end mt-5">
                        <button class="btn btn-accent"><i class="fa-solid fa-upload me-1"></i> Submit Abstract</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-1 mt-5 md:mt-0 w-full max-w-4xl">
            @foreach ($eduvideos as $eduvideo)
            <div class="collapse collapse-arrow bg-base-200 border border-base-300">
                <input type="radio" name="my-accordion-4" />
                <div class="collapse-title font-semibold">{{ $eduvideo->title }}</div>
                <div class="collapse-content text-sm text-gray-600">
                    {!! str($eduvideo->description)->markdown()->sanitizeHtml() !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}


<dialog id="my_modal_1" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <h3 class="text-lg font-bold mb-3">Instruction video or flyer submission</h3>
        <hr>
        <ul class="list-disc mt-5 ml-5 text-sm text-gray-600">
            <li>Save the video to be sent to online storage media or the Cloud (such as Google Drive, OneDrive, ICloud, etc.)</li>
            <li>Copy the video link that will be sent (provided access has a link to view the video)</li>
            <li>Select upload video on the asmiua2026.org website page => free paper => abstract submission => educative video & flyer competition</li>
            <li>Sign up by filling in the data on the page => "Go to Form Submit Educative Flyer & Video Competition ASMIUA 2026"</li>
            <li>Login using the email and password you created</li>
            <li> In the add video link menu, enter the title of the video that will be in the competition and paste the video link that was prepared earlier and select submit.</li>
            <li>The email and password that has been created can be used again by participants to send more than 1 video</li>
        </ul>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>
</div>
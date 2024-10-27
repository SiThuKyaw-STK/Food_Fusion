<?php

    // recipe details 
    $content = `
    <div class="max-w-7xl mx-auto my-10 py-10">
        <div class="grid grid-cols-3 gap-6">
            <div class="max-w-4xl">
                <img class="float-right w-full" src="/assets/img/demo_food1.jpg" alt="">
            </div>
    
            <div class="col-span-2">
                <h1 class="text-4xl">Banana bread</h1>
                <div class="my-4 flex justify-between">
                    <span class="font-bold text-blue-500">recipe by STK</span>

                    <!-- category -->
                    <div>
                        <a href="#" class="py-2 px-4 no-underline rounded-full bg-blue-500 text-white font-semibold text-sm mr-1">vegetable</a>
                        <a href="#" class="py-2 px-4 no-underline rounded-full bg-blue-500 text-white font-semibold text-sm mr-1">pasta</a>
                    </div>
                </div>

                <!-- recieve prep_time,cook_time,level -->
                <div class="flex items-baseline gap-6 my-5">
                    <div class="flex items-baseline	 gap-1">
                        <i class="fa-solid fa-clock text-blue-500"></i>
                        <div>
                            <p class="font-bold">Prep: <span class="font-normal">15 mins</span></p>
                            <p class="font-bold">Cook: <span class="font-normal">30 mins</span></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-layer-group text-blue-500"></i>
                        <p class="font-bold">Prep: <span class="font-normal">Easy</span></p>
                    </div>
                </div>

                <!-- instructions -->
                <div>
                    <p class="font-semibold">
                        A cross between banana bread and a drizzle cake, this easy banana loaf recipe is a quick bake that can be frozen. It's great for using up overripe bananas, too.
                    </p>
                </div>
            </div>
        </div>

        <!-- video -->
         <div class="max-w-4xl my-5">
            <video width="700" height="200" controls>
                <source src="/assets/video/example_video.mp4" type="video/mp4">
            </video>

            <!-- Ingredients & Method -->

            <div class="grid grid-cols-2 my-10 gap-6">
                <div>
                    <h1 class="text-2xl font-bold">Ingredients</h1>

                    <div class="my-5">
                        <P class="text-lg font-medium text-gray-700 border-b-2 p-2">140g butter, softened, plus extra for the tin</P>
                        <P class="text-lg font-medium text-gray-700 border-b-2 p-2">140g butter, softened, plus extra for the tin</P>
                        <P class="text-lg font-medium text-gray-700 border-b-2 p-2">140g butter, softened, plus extra for the tin</P>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">Method</h1>

                    <div class="my-5">
                        <div class="my-5 text-lg font-medium text-gray-700">
                            <h1>Step 1</h1>
                            <p>Heat oven to 180C/160C fan/gas 4.</p>
                        </div>

                        <div class="my-5 text-lg font-medium text-gray-700">
                            <h1>Step 2</h1>
                            <p>Butter a 2lb loaf tin and line the base and sides with baking parchment.</p>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>

    <!-- Cookie Consent Banner -->
    <div id="cookieConsent" class="fixed bottom-0 w-full bg-gray-800 text-white text-center p-4 z-50">
        <p class="inline-block mr-4">
            We use cookies to ensure you get the best experience on our website.
            <a href="privacy-policy.html" class="text-yellow-400 underline">Learn More</a>
        </p>
        <button id="acceptCookies" class="bg-yellow-400 text-gray-900 font-bold py-2 px-4 rounded">
            Accept
        </button>
    </div>
    `;

    include 'layout.php';

?>
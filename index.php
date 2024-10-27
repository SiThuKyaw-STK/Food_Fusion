<?php
// Start output buffering to capture dynamic content
ob_start();
?>

    <!-- Mission Section -->
    <div>
        <section class="container max-w-7xl mx-auto mx-auto my-10">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h2 class="text-3xl font-bold">
                        <p>Welcome to FoodFusion –</p> <small>Where Culinary Creativity Meets Community</small>
                    </h2>
                    <p class="mt-4 text-lg text-justify">At FoodFusion, we believe that cooking is an art and a passion
                        that brings people
                        together. Our mission is to inspire home cooks of all levels to create, share, and celebrate
                        delicious meals
                        while exploring culinary traditions from around the world.
                    </p>
                    <button type="button" id="joinUsBtn" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800
                                                            focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg
                                                            text-sm px-5 py-2.5 text-center me-2 my-4">
                        Join Us Now
                    </button>
                    <div class="w-9 flex justify-between items-center gap-2">
                        <img class="cursor-pointer transition-all duration-200 transform hover:scale-110"
                            src="./assets/svg/facebook.svg" alt="">
                        <img class="cursor-pointer transition-all duration-200 transform hover:scale-110"
                            src="./assets/svg/instagram.svg" alt="">
                        <img class="cursor-pointer transition-all duration-200 transform hover:scale-110"
                            src="./assets/svg/reddit.svg" alt="">
                        <img class="cursor-pointer transition-all duration-200 transform hover:scale-110"
                            src="./assets/svg/tiktok.svg" alt="">
                        <img class="cursor-pointer transition-all duration-200 transform hover:scale-110"
                            src="./assets/svg/youtube.svg" alt="">
                    </div>
                </div>
                <div>
                    <img class="rounded-md shadow-lg" src="./assets/img/home_page1.jpg" alt="">
                </div>
            </div>
        </section>
    </div>

    <!-- Our Recipes -->
    <div class="bg-gray-200">
        <section class="container max-w-7xl mx-auto my-10 py-10">
            <h1 class="text-3xl font-semibold text-center">Our <span class="text-blue-600">Recipes</span></h1>

            <div class="gap-6 grid my-10">
                <div>
                    <h1 class="text-2xl font-medium">Most Trending</h1>

                    <!-- card start -->
                    <div class="grid grid-cols-4 gap-6 p-4">
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg">
                            <a href="#">
                                <img class="rounded-t-lg" src="./assets/img/demo_food1.jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Noteworthy
                                        technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise technology
                                    acquisitions of 2021 so far, in reverse chronological order.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h1 class="text-2xl font-medium">Easy To Cook</h1>

                    <!-- card start -->
                    <div class="grid grid-cols-4 gap-6 px-3 py-4">
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg">
                            <a href="#">
                                <img class="rounded-t-lg" src="./assets/img/demo_food1.jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Noteworthy
                                        technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise technology
                                    acquisitions of 2021 so far, in reverse chronological order.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Our Event -->
    <div class="container max-w-7xl mx-auto my-10 py-10">
        <h1 class="text-3xl font-semibold text-center">Our <span class="text-blue-600">Event</span></h1>

        <div id="splide" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img class="rounded-lg " src="./assets/img/cooking_event1.jpg" alt="Slide 1">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-lg " src="./assets/img/cooking_event1.jpg" alt="Slide 2">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-lg " src="./assets/img/cooking_event1.jpg" alt="Slide 3">
                    </li>

                    <li class="splide__slide">
                        <img class="rounded-lg " src="./assets/img/cooking_event1.jpg" alt="Slide 4">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-lg " src="./assets/img/cooking_event1.jpg" alt="Slide 5">
                    </li>
                    <li class="splide__slide">
                        <img class="rounded-lg " src="./assets/img/cooking_event1.jpg" alt="Slide 6">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Cookie -->
    <div id="cookieConsent" class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white p-4 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <span>This website uses cookies to ensure you get the best experience on our website.</span>
            <button id="acceptCookies" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Accept!
            </button>
        </div>
    </div>



<?php
// Capture the output as $content
$content = ob_get_clean();

// Include the main layout, passing in the dynamic content
include 'layout.php';
?>

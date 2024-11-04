<?php
// Start output buffering to capture dynamic content
ob_start();

// Database connection details
include 'db.php';

// Fetch recipes easy
$query1 = "SELECT * FROM `recipes` WHERE level = 1 ORDER BY id DESC LIMIT 4";
$recipesEasy = $conn->query($query1);
if (!$recipesEasy) {
    die("Error fetching recipes: " . $conn->error);
}

// Fetch recipes most view
$query2 = "SELECT * from recipes ORDER BY view_count DESC LIMIT 4";
$recipesMostView = $conn->query($query2);
if (!$recipesMostView) {
    die("Error fetching recipes: " . $conn->error);
}


?>

<!-- Mission Section -->
<div>
    <section class="container max-w-7xl mx-auto my-10 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold">
                    <p>Welcome to FoodFusion –</p> 
                    <small class="text-base lg:text-lg">Where Culinary Creativity Meets Community</small>
                </h2>
                <p class="mt-4 text-base lg:text-lg text-justify">
                    At FoodFusion, we believe that cooking is an art and a passion
                    that brings people together. Our mission is to inspire home cooks of all levels to create, share, and celebrate
                    delicious meals while exploring culinary traditions from around the world.
                </p>
                <button type="button" id="joinUsBtn" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800
                                                        focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg
                                                        text-sm px-4 py-2 lg:px-5 lg:py-2.5 text-center me-2 my-4">
                    Join Us Now
                </button>
                <div class="w-9 flex justify-between items-center gap-2">
                    <img class="cursor-pointer transition-all duration-200 transform hover:scale-110 w-6 lg:w-8"
                        src="./assets/svg/facebook.svg" alt="">
                    <img class="cursor-pointer transition-all duration-200 transform hover:scale-110 w-6 lg:w-8"
                        src="./assets/svg/instagram.svg" alt="">
                    <img class="cursor-pointer transition-all duration-200 transform hover:scale-110 w-6 lg:w-8"
                        src="./assets/svg/reddit.svg" alt="">
                    <img class="cursor-pointer transition-all duration-200 transform hover:scale-110 w-6 lg:w-8"
                        src="./assets/svg/tiktok.svg" alt="">
                    <img class="cursor-pointer transition-all duration-200 transform hover:scale-110 w-6 lg:w-8"
                        src="./assets/svg/youtube.svg" alt="">
                </div>
            </div>
            <div>
                <img class="rounded-md shadow-lg w-full" src="./assets/img/home_page1.jpg" alt="">
            </div>
        </div>
    </section>
</div>

<!-- Our Recipes -->
<div class="bg-gray-200">
    <section class="container max-w-7xl mx-auto my-10 py-10 px-4">
        <h1 class="text-2xl lg:text-3xl font-semibold text-center">Our <span class="text-blue-600">Recipes</span></h1>

        <div class="grid gap-6 my-10">
            <div>
                <h1 class="text-xl lg:text-2xl font-medium">Most View</h1>

                <!-- card start -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
                    <?php while ($recipe = $recipesMostView->fetch_assoc()): ?>
                        <div class="bg-white border border-gray-200 rounded-lg shadow">
                            <div>
                                <a href="recipes-details.php?id=<?= $recipe['id']; ?>">
                                    <img style="height: 250px;" class="rounded-t-lg w-full object-cover" src="<?= $recipe['image']; ?>" alt="<?= $recipe['recipe_name']; ?>" />
                                </a>
                            </div>
                            <div class="p-5">
                                <a href="recipes-details.php?id=<?= $recipe['id']; ?>">
                                    <h5 class="font-bold tracking-tight text-gray-900"><?= $recipe['recipe_name']; ?></h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700"><?= $recipe['description']; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div>
                <h1 class="text-xl lg:text-2xl font-medium">Easy To Cook</h1>

                <!-- card start -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
                <?php while ($recipe = $recipesEasy->fetch_assoc()): ?>
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <div>
                            <a href="recipes-details.php?id=<?= $recipe['id']; ?>">
                                <img style="height: 250px;" class="rounded-t-lg w-full object-cover" src="<?= $recipe['image']; ?>" alt="<?= $recipe['recipe_name']; ?>" />
                            </a>
                        </div>
                        <div class="p-5">
                            <a href="recipes-details.php?id=<?= $recipe['id']; ?>">
                                <h5 class="font-bold tracking-tight text-gray-900"><?= $recipe['recipe_name']; ?></h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700"><?= $recipe['description']; ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Our Event -->
<div class="container max-w-7xl mx-auto my-10 py-10 px-4">
    <h1 class="text-2xl lg:text-3xl font-semibold text-center">Our <span class="text-blue-600">Event</span></h1>

    <div id="splide" class="splide mt-6">
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
                <!-- Add additional slides as needed -->
            </ul>
        </div>
    </div>
</div>

<!-- Cookie -->
<div id="cookieConsent" class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white p-4 z-50 text-sm lg:text-base">
    <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center">
        <span class="text-center lg:text-left mb-2 lg:mb-0">
            This website uses cookies to ensure you get the best experience on our website.
        </span>
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

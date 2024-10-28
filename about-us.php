<?php
// Start output buffering to capture dynamic content
ob_start();
?>

   <!-- About Us -->
   <section class="max-w-7xl mx-auto my-10 py-10">
        <h1 class="text-3xl font-semibold text-center">About <span class="text-blue-600">Us</span></h1>

        <div class="mt-5">
            <!-- Headline -->
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-800">Cooking from the Heart</h2>
                <p class="mt-4 text-lg text-gray-600">Where Culinary Passion Meets Creativity</p>
            </div>

            <!-- Introduction Section -->
            <div class="max-w-4xl mx-auto text-center mb-12">
                <p class="text-xl text-gray-700">
                    At FoodFusion, we believe in the magic of home cooking. Our platform brings together the flavors of
                    tradition and the excitement of innovation, inspiring you to create beautiful dishes in your own
                    kitchen.
                </p>
            </div>

            <!-- Culinary Philosophy -->
            <div class="bg-gray-300 py-8 rounded-xl shadow">
                <div class="max-w-5xl mx-auto text-center">
                    <h3 class="text-3xl font-semibold text-gray-800">Our Culinary Philosophy</h3>
                    <p class="mt-4 text-lg text-gray-600">
                        FoodFusion is grounded in the belief that food is more than just sustenance; it's a way to
                        connect with others and express creativity. We’re passionate about using fresh, local
                        ingredients and transforming them into unforgettable dishes.
                    </p>
                </div>
            </div>

            <!-- Team Section -->
            <div class="py-12">
                <h3 class="text-3xl font-semibold text-gray-800 text-center mb-8">Meet the Team</h3>

                <!-- Team Members Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Team Member 1 -->
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <img class="w-24 h-24 mx-auto rounded-full object-cover object-top" src="./assets/img/chef1.jpg" alt="Team Member 1">
                        <h4 class="text-xl font-semibold mt-4">John Doe</h4>
                        <p class="text-gray-600">Head Chef</p>
                        <p class="mt-4 text-gray-700">
                            John brings 20 years of culinary experience, with a passion for combining traditional
                            flavors with modern techniques.
                        </p>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <img class="w-24 h-24 mx-auto rounded-full object-cover object-top" src="./assets/img/chef2.jpg" alt="Team Member 2">
                        <h4 class="text-xl font-semibold mt-4">Jane Smith</h4>
                        <p class="text-gray-600">Recipe Developer</p>
                        <p class="mt-4 text-gray-700">
                            Jane is the creative mind behind many of FoodFusion’s unique recipes, focusing on seasonal
                            and local ingredients.
                        </p>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <img class="w-24 h-24 mx-auto rounded-full object-cover object-top" src="./assets/img/chef3.jpg" alt="Team Member 3">
                        <h4 class="text-xl font-semibold mt-4">Alex Johnson</h4>
                        <p class="text-gray-600">Food Blogger</p>
                        <p class="mt-4 text-gray-700">
                            Alex shares cooking tips, food stories, and behind-the-scenes glimpses of the FoodFusion
                            kitchen.
                        </p>
                    </div>

                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-blue-600 text-white py-8 text-center">
                <h3 class="text-2xl font-semibold">Join Our Culinary Journey</h3>
                <p class="mt-4">Discover the joys of home cooking with FoodFusion. Explore our recipes or share your
                    creations with us!</p>
                <a href="/recipes"
                    class="mt-6 inline-block bg-white text-blue-600 font-semibold px-6 py-2 rounded-lg">Explore
                    Recipes</a>
            </div>
        </div>
    </section>


<?php
// Capture the output as $content
$content = ob_get_clean();

// Include the main layout, passing in the dynamic content
include 'layout.php';
?>

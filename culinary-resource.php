<?php
// Start output buffering to capture dynamic content
ob_start();
?>

<!-- About Us -->
<section class="max-w-7xl mx-auto my-10 py-10">
  <div class="container mx-auto px-4 py-8">
    <!-- Recipe Cards Section -->
    <div class="mb-12">
      <h3 class="text-3xl font-semibold text-gray-800 mb-6">Downloadable Recipe Cards</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Recipe Card 1 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="./assets/img/culinary-recipe1.jpg" alt="Spaghetti Carbonara" class="w-full h-48 object-cover">
          <div class="p-6 text-center">
            <h4 class="text-xl font-semibold text-gray-800 mb-2">Spaghetti Carbonara</h4>
            <p class="text-gray-600 mb-4">Classic Italian pasta with a creamy sauce.</p>
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Download</button>
          </div>
        </div>
        <!-- Recipe Card 2 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="./assets/img/culinary-recipe2.jpg" alt="Chicken Tikka Masala" class="w-full h-48 object-cover">
          <div class="p-6 text-center">
            <h4 class="text-xl font-semibold text-gray-800 mb-2">Chicken Tikka Masala</h4>
            <p class="text-gray-600 mb-4">A spicy, flavorful Indian dish perfect with rice.</p>
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Download</button>
          </div>
        </div>
        <!-- Recipe Card 3 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="./assets/img/culinary-recipe3.jpg" alt="Vegetarian Stir-fry" class="w-full h-48 object-cover">
          <div class="p-6 text-center">
            <h4 class="text-xl font-semibold text-gray-800 mb-2">Vegetarian Stir-fry</h4>
            <p class="text-gray-600 mb-4">Quick, healthy, and packed with fresh veggies.</p>
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Download</button>
          </div>
        </div>
        <!-- Recipe Card 4 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="./assets/img/culinary-recipe4.jpg" alt="Beef Stroganoff" class="w-full h-48 object-cover">
          <div class="p-6 text-center">
            <h4 class="text-xl font-semibold text-gray-800 mb-2">Beef Stroganoff</h4>
            <p class="text-gray-600 mb-4">A hearty Russian dish with beef and mushrooms.</p>
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Download</button>
          </div>
        </div>
        <!-- Recipe Card 5 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="./assets/img/culinary-recipe5.jpg" alt="Chocolate Brownies" class="w-full h-48 object-cover">
          <div class="p-6 text-center">
            <h4 class="text-xl font-semibold text-gray-800 mb-2">Chocolate Brownies</h4>
            <p class="text-gray-600 mb-4">Rich, gooey brownies with a chocolatey flavor.</p>
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Download</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Cooking Tutorials Section -->
    <div class="mb-12">
      <h3 class="text-3xl font-semibold text-gray-800 mb-6">Cooking Tutorials</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Tutorial 1 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="./assets/img/cooking-tu1.jpg" alt="Knife Skills" class="w-full h-48 object-cover">
          <div class="p-6 text-center">
            <h4 class="text-xl font-semibold text-gray-800 mb-2">Knife Skills</h4>
            <p class="text-gray-600 mb-4">Learn essential knife skills to work faster and safer in the kitchen.</p>
            <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Watch Now</button>
          </div>
        </div>
        <!-- Tutorial 2 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="./assets/img/cooking-tu2.jpg" alt="Sautéing Basics" class="w-full h-48 object-cover">
          <div class="p-6 text-center">
            <h4 class="text-xl font-semibold text-gray-800 mb-2">Sautéing Basics</h4>
            <p class="text-gray-600 mb-4">Master the art of sautéing for perfect meals every time.</p>
            <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Watch Now</button>
          </div>
        </div>
        <!-- Tutorial 3 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <img src="./assets/img/cooking-tu3.jpg" alt="Making Stock" class="w-full h-48 object-cover">
          <div class="p-6 text-center">
            <h4 class="text-xl font-semibold text-gray-800 mb-2">Making Stock</h4>
            <p class="text-gray-600 mb-4">Learn to make a rich, flavorful stock from scratch.</p>
            <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Watch Now</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Instructional Videos Section -->
    <div>
      <h3 class="text-3xl font-semibold text-gray-800 mb-6">Instructional Videos</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Video 1 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <iframe class="w-full h-56" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="How to Dice an Onion" allowfullscreen></iframe>
          <div class="p-4 text-center">
            <h4 class="text-xl font-semibold text-gray-800">How to Dice an Onion</h4>
          </div>
        </div>
        <!-- Video 2 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <iframe class="w-full h-56" src="https://www.youtube.com/embed/YbJOTdZBX1g" title="Making the Perfect Omelette" allowfullscreen></iframe>
          <div class="p-4 text-center">
            <h4 class="text-xl font-semibold text-gray-800">Making the Perfect Omelette</h4>
          </div>
        </div>
        <!-- Video 3 -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <iframe class="w-full h-56" src="https://www.youtube.com/embed/3jZ5vnv-LZc" title="5 Essential Kitchen Hacks" allowfullscreen></iframe>
          <div class="p-4 text-center">
            <h4 class="text-xl font-semibold text-gray-800">5 Essential Kitchen Hacks</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
// Capture the output as $content
$content = ob_get_clean();

// Include the main layout, passing in the dynamic content
include 'layout.php';
?>

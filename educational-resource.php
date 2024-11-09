<?php
// Start output buffering to capture dynamic content
ob_start();
?>

<!-- About Us -->
<section class="max-w-7xl mx-auto my-10 py-10">
<div class="container mx-auto px-4 py-8">
  <!-- Section Header -->
  <div class="text-center mb-12">
    <h2 class="text-4xl font-bold text-gray-800">Educational Resources</h2>
    <p class="text-gray-600 mt-2">Downloadable recipes, cooking tutorials, and videos to enhance your culinary skills.</p>
  </div>

  <!-- Downloadable Recipe Resources Section -->
  <div class="mb-12">
    <h3 class="text-3xl font-semibold text-gray-800 mb-6">Downloadable Recipe Resources</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Recipe Resource 1 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="./assets/img/edu1.jpg" alt="Italian Pasta Recipe" class="w-full h-48 object-cover">
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Classic Italian Pasta</h4>
          <p class="text-gray-600 mb-4">A step-by-step guide to making the perfect Italian pasta from scratch.</p>
          <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Download Recipe</button>
        </div>
      </div>
      <!-- Recipe Resource 2 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="./assets/img/edu2.jpg" alt="Vegan Burger Recipe" class="w-full h-48 object-cover">
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Vegan Burger Recipe</h4>
          <p class="text-gray-600 mb-4">Learn how to make a delicious and healthy vegan burger at home.</p>
          <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Download Recipe</button>
        </div>
      </div>
      <!-- Recipe Resource 3 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="./assets/img/edu3.jpg" alt="Chocolate Cake Recipe" class="w-full h-48 object-cover">
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Decadent Chocolate Cake</h4>
          <p class="text-gray-600 mb-4">A rich and moist chocolate cake recipe perfect for any occasion.</p>
          <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Download Recipe</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Cooking Infographics Section -->
  <div class="mb-12">
    <h3 class="text-3xl font-semibold text-gray-800 mb-6">Cooking Infographics</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Infographic 1 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="./assets/img/inf1.jpg" alt="Kitchen Knife Guide" class="w-full h-48 object-cover">
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Kitchen Knife Guide</h4>
          <p class="text-gray-600 mb-4">An infographic showing the different types of kitchen knives and their uses.</p>
          <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Download Infographic</button>
        </div>
      </div>
      <!-- Infographic 2 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="./assets/img/inf2.jpg" alt="Cooking Oil Guide" class="w-full h-48 object-cover">
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Cooking Oil Guide</h4>
          <p class="text-gray-600 mb-4">Learn the best oils for different cooking methods with this detailed guide.</p>
          <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Download Infographic</button>
        </div>
      </div>
      <!-- Infographic 3 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="./assets/img/inf3.jpg" alt="Spices and Herbs Guide" class="w-full h-48 object-cover">
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Spices and Herbs Guide</h4>
          <p class="text-gray-600 mb-4">An infographic showing the essential spices and herbs every kitchen should have.</p>
          <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Download Infographic</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Cooking Video Tutorials Section -->
  <div class="mb-12">
    <h3 class="text-3xl font-semibold text-gray-800 mb-6">Cooking Video Tutorials</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Video 1 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <iframe class="w-full h-48" src="https://www.youtube.com/embed/ABC123" title="How to Make Pasta from Scratch" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">How to Make Pasta from Scratch</h4>
          <p class="text-gray-600 mb-4">Watch this tutorial to learn the art of making fresh pasta at home.</p>
        </div>
      </div>
      <!-- Video 2 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <iframe class="w-full h-48" src="https://www.youtube.com/embed/DEF456" title="Vegan Cooking Tips" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">Vegan Cooking Tips</h4>
          <p class="text-gray-600 mb-4">Learn how to prepare delicious and nutritious vegan meals in this tutorial.</p>
        </div>
      </div>
      <!-- Video 3 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <iframe class="w-full h-48" src="https://www.youtube.com/embed/GHI789" title="Perfect Chocolate Cake" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="p-6 text-center">
          <h4 class="text-xl font-semibold text-gray-800 mb-2">How to Make the Perfect Chocolate Cake</h4>
          <p class="text-gray-600 mb-4">Follow this tutorial to bake a rich and indulgent chocolate cake.</p>
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

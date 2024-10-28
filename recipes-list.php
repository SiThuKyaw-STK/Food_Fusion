<?php
// Start output buffering to capture dynamic content
ob_start();
?>
<!-- Recipes List -->
<div class="bg-gray-200">
        <section class="container max-w-7xl mx-auto py-10">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-medium">Recipes</h1>

                <form class="">
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">category</label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>All</option>
                        <option value="1">Pizza</option>
                        <option value="2">Pasta</option>
                        <option value="3">Parathas</option>
                        <option value="4">Burgers & Sandwiches</option>
                    </select>
                </form>
            </div>

            <!-- Lists -->
            <div class="grid grid-cols-4 gap-6">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="./assets/img/demo_food1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="font-bold tracking-tight text-gray-900">Fajita Chicken Mac & Cheese</h5>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
// Capture the output as $content
$content = ob_get_clean();

// Include the main layout, passing in the dynamic content
include 'layout.php';
?>

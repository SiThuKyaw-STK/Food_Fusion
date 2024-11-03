<?php
// Database connection details
include 'db.php';

// Fetch categories
$categories = $conn->query("SELECT id, name FROM category");
if (!$categories) {
    die("Error fetching categories: " . $conn->error);
}

// Fetch recipes
$recipesQuery = "SELECT id, recipe_name, image FROM recipes";
$recipes = $conn->query($recipesQuery);
if (!$recipes) {
    die("Error fetching recipes: " . $conn->error);
}

// Start output buffering to capture dynamic content
ob_start();
?>

<!-- Recipes List -->
<div class="bg-gray-200">
    <section class="container max-w-7xl mx-auto py-10">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-medium">Recipes</h1>

            <form>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>All</option>
                    <?php while ($row = $categories->fetch_assoc()): ?>
                        <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </form>
        </div>

        <!-- Recipe Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 my-5 px-3">
            <?php while ($recipe = $recipes->fetch_assoc()): ?>
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <div>
                        <img style="height: 250px;" class="rounded-t-lg w-full object-cover" src="<?= $recipe['image']; ?>" alt="<?= $recipe['recipe_name']; ?>" />
                    </div>
                    <div class="p-5">
                        <a href="recipes-details.php?id=<?= $recipe['id']; ?>">
                            <h5 class="font-bold tracking-tight text-gray-900"><?= $recipe['recipe_name']; ?></h5>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</div>

<?php
// Capture the output as $content
$content = ob_get_clean();

// Include the main layout, passing in the dynamic content
include 'layout.php';
?>

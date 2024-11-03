<?php
// Start output buffering to capture dynamic content
include 'db.php';

ob_start();
session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$isUserLoggedIn = $_SESSION['user'];
$userId = $isUserLoggedIn['id'];

if (!$userId) {
    echo "<script>
        location.href = 'please-login-first.php';
    </script>";
    exit; // Stop further execution if redirecting
}

// Fetch categories
$sql = "SELECT id, name FROM category WHERE deleted_at IS NULL";
$categories = $conn->query($sql);


$categoryOptions = '';
if ($categories->num_rows > 0) {
    while ($row = $categories->fetch_assoc()) {
        $categoryOptions .= "<option value='{$row['id']}'>{$row['name']}</option>";
    }
} else {
    $categoryOptions = "<option disabled>No categories available</option>";
}

// Fetch ingredients
$sqlIngredients = "SELECT id, name FROM ingredients WHERE deleted_at IS NULL";
$ingredients = $conn->query($sqlIngredients);

$ingredientOptions = '';
if ($ingredients->num_rows > 0) {
    while ($row = $ingredients->fetch_assoc()) {
        $ingredientOptions .= "<option value='{$row['id']}'>{$row['name']}</option>";
    }
} else {
    $ingredientOptions = "<option disabled>No ingredients available</option>";
}

// Fetch user's recipe
$sqlUserRecipe = "SELECT id, recipe_name, image FROM recipes WHERE user_id = $userId";
$recipes = $conn->query($sqlUserRecipe);

if (!$recipes) {
    die("Error fetching recipes: " . $conn->error);
}

?>

<!-- Community Page Content Here -->
<div class="mx-auto w-full max-w-7xl">
    <div>
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-6">Create a New Recipe</h2>
            <form id="recipeForm" enctype="multipart/form-data" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <!-- Ingredients -->
                        <div>
                            <label for="ingredients" class="block text-sm font-medium text-gray-700">Ingredients</label>
                            <select id="ingredients" name="ingredients[]" multiple required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <?= $ingredientOptions ?>
                            </select>
                        </div>

                        <!-- Recipe Name -->
                        <div>
                            <label for="recipe_name" class="block text-sm font-medium text-gray-700">Recipe Name</label>
                            <input type="text" id="recipe_name" name="recipe_name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Recipe Image</label>
                            <input type="file" id="image" name="image" accept="image/*" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="3" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                        </div>

                        <!-- Preparation Time -->
                        <div>
                            <label for="preparation_time" class="block text-sm font-medium text-gray-700">Preparation Time (mins)</label>
                            <input type="number" id="preparation_time" name="preparation_time" min="1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>

                        <!-- Cooking Time -->
                        <div>
                            <label for="cooking_time" class="block text-sm font-medium text-gray-700">Cooking Time (mins)</label>
                            <input type="number" id="cooking_time" name="cooking_time" min="1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>

                        <!-- Instructions -->
                        <div>
                            <label for="instructions" class="block text-sm font-medium text-gray-700">Instructions</label>
                            <textarea id="instructions" name="instructions" rows="5" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                        </div>

                        <!-- Tip -->
                        <div>
                            <label for="tip" class="block text-sm font-medium text-gray-700">Cooking Tip</label>
                            <input type="text" id="tip" name="tip" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>

                        <!-- Level -->
                        <div>
                            <label for="level" class="block text-sm font-medium text-gray-700">Difficulty Level</label>
                            <select id="level" name="level" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <option value="1">Easy</option>
                                <option value="2">Medium</option>
                                <option value="3">Hard</option>
                            </select>
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category" name="category" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <?= $categoryOptions ?>
                            </select>
                        </div>
                    </div>

                    <!-- Recipe Steps Section -->
                    <div >
                       <div id="recipe-steps">
                            <div class="recipe-step p-5 border rounded" data-index="0">
                                <div>
                                    <label for="recipe_step_name_0" class="block text-sm font-medium text-gray-700">Recipe Step Name</label>
                                    <input type="text" id="recipe_step_name_0" name="recipe_steps[0][step_name]" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="recipe_step_description_0" class="block text-sm font-medium text-gray-700">Recipe Step Description</label>
                                    <textarea id="recipe_step_description_0" name="recipe_steps[0][step_desc]" rows="3" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                                </div>
                                <input type="hidden" name="recipe_steps[0][sorting]" value="1">
                            </div>
                        </div>

                        <button type="button" id="add-step-btn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-3">Add More</button>

                    </div>

                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700">Submit Recipe</button>
                </div>
            </form>
            <div id="message" class="text-center mt-4"></div>
        </div>

        <div class="my-5">
            <h2 class="text-2xl font-bold text-center mb-6">Your Recipe Posts</h2>

             <!-- Recipe Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 my-5">
                <?php while ($recipe = $recipes->fetch_assoc()): ?>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="recipes-details.php?id=<?= $recipe['id']; ?>">
                            <img style="height: 250px;" class="rounded-t-lg w-full object-cover	" src="<?= $recipe['image']; ?>" alt="<?= $recipe['recipe_name']; ?>" />
                        </a>
                        <div class="p-5">
                            <a href="recipes-details.php?id=<?= $recipe['id']; ?>">
                                <h5 class="font-bold tracking-tight text-gray-900"><?= $recipe['recipe_name']; ?></h5>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php
// Capture the output as $content
$content = ob_get_clean();

// Include the main layout, passing in the dynamic content
include 'layout.php';
?>

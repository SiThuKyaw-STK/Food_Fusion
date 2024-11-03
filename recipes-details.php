<?php
// Database connection details
include 'db.php';

$recipeId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch categories and other details
$recipeDetailsQuery = <<<QUERY
        SELECT
            r.id AS recipe_id,
            r.recipe_name,
            r.description,
            r.preparation_time,
            r.cooking_time,
            r.instructions,
            r.tip,
            r.level,
            r.image,
            CONCAT('[',
                GROUP_CONCAT(DISTINCT 
                CONCAT('{\"id\":', c.id, ',\"name\":\"', c.name, '\"}')
            ), ']') AS categories,
            CONCAT('[', GROUP_CONCAT(
                DISTINCT CONCAT('{\"id\":', i.id, ',\"name\":\"', REPLACE(i.name, '\"', '\"'), '\",\"unit\":\"', i.unit, '\"}')
                ORDER BY i.id
            ), ']') AS ingredients,
            CONCAT('[', GROUP_CONCAT(
                DISTINCT CONCAT('{\"id\":', rs.id, ',\"step_name\":\"', REPLACE(rs.step_name, '\"', '\"'), '\",\"step_desc\":\"', REPLACE(rs.step_desc, '\"', '\"'), '\",\"sorting\":', rs.sorting, '}')
                ORDER BY rs.sorting
            ), ']') AS steps
        FROM
            recipes r
        LEFT JOIN recipes_category rc ON rc.recipe_id = r.id
        LEFT JOIN category c ON c.id = rc.category_id
        LEFT JOIN recipe_ingredients ri ON ri.recipe_id = r.id
        LEFT JOIN ingredients i ON i.id = ri.ingredients_id
        LEFT JOIN recipe_steps rs ON rs.recipe_id = r.id
        WHERE
            r.id = $recipeId
        GROUP BY
            r.id;
QUERY;

$recipeResult = $conn->query($recipeDetailsQuery);

// print_r($recipeResult->fetch_all());

if ($recipeResult && $recipeResult->num_rows > 0) {
    $recipe = $recipeResult->fetch_assoc();

    $categories = json_decode($recipe['categories'], true);
    $ingredients = json_decode(trim($recipe['ingredients'], ','), true) ?? []; // Remove trailing commas if any
    $steps = json_decode(trim($recipe['steps'], ','), true) ?? []; // Remove trailing commas if any

    // print_r($recipe);

} else {
    echo "Recipe not found.";
    exit; // Stop further execution if recipe is not found
}

// Start output buffering to capture dynamic content
ob_start();
?>

<div class="max-w-7xl mx-auto my-10 py-10">
    <div class="grid grid-cols-3 gap-6">
        <div class="max-w-4xl">
            <img class="float-right w-full" src="<?= $recipe['image']; ?>" alt="<?= htmlspecialchars($recipe['recipe_name']); ?>">
        </div>

        <div class="col-span-2">
            <h1 class="text-4xl"><?= htmlspecialchars($recipe['recipe_name']); ?></h1>
            <div class="my-4 flex justify-between">
                <span class="font-bold text-blue-500">Recipe by STK</span>

                <!--  -->
                <!-- Category display -->
                <div>
                    <?php foreach ($categories as $category): ?>
                        <a href="#" class="py-2 px-4 no-underline rounded-full bg-blue-500 text-white font-semibold text-sm mr-1"><?= htmlspecialchars($category['name']); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Preparation time, cooking time, and difficulty level -->
            <div class="flex items-baseline gap-6 my-5">
                <div class="flex items-baseline gap-1">
                    <i class="fa-solid fa-clock text-blue-500"></i>
                    <div>
                        <p class="font-bold">Prep: <span class="font-normal"><?= htmlspecialchars($recipe['preparation_time']); ?> mins</span></p>
                        <p class="font-bold">Cook: <span class="font-normal"><?= htmlspecialchars($recipe['cooking_time']); ?> mins</span></p>
                    </div>
                </div>
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-layer-group text-blue-500"></i>
                    <p class="font-bold">Level: <span class="font-normal"><?= htmlspecialchars($recipe['level']); ?></span></p>
                </div>
            </div>

            <!-- Recipe description -->
            <div>
                <p class="font-semibold"><?= htmlspecialchars($recipe['description']); ?></p>
            </div>
        </div>
    </div>

    <!-- Video -->
    <div class="max-w-4xl my-5">
        <video width="700" height="200" controls>
            <source src="/assets/video/example_video.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Ingredients and Method sections -->
    <div class="grid grid-cols-2 my-10 gap-6">
        <div>
            <h1 class="text-2xl font-bold">Ingredients</h1>
            <div class="my-5">
                <?php foreach ($ingredients as $ingredient): ?>
                    <p class="text-lg font-medium text-gray-700 border-b-2 p-2"><?= htmlspecialchars($ingredient['name']); ?> (<?= htmlspecialchars($ingredient['unit']); ?>)</p>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div>
            <h1 class="text-2xl font-bold">Method</h1>
            <div class="my-5">
                <?php foreach ($steps as $step): ?>
                    <div class="my-5 text-lg font-medium text-gray-700">
                        <h1>Step <?= htmlspecialchars($step['sorting']); ?></h1>
                        <p><?= htmlspecialchars($step['step_desc']); ?></p>
                    </div>
                <?php endforeach; ?>
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

<?php
// Capture the output as $content
$content = ob_get_clean();

// Include the main layout, passing in the dynamic content
include 'layout.php';
?>

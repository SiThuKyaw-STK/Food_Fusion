<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please login first.');</script>";
    exit;
}

// Fetch the logged-in user's ID
$userId = $_SESSION['user']['id'];

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $recipeName = $conn->real_escape_string($_POST['recipe_name']);
    $description = $conn->real_escape_string($_POST['description']);
    $preparationTime = (int)$_POST['preparation_time'];
    $cookingTime = (int)$_POST['cooking_time'];
    $instructions = $conn->real_escape_string($_POST['instructions']);
    $tip = $conn->real_escape_string($_POST['tip']);
    $level = (int)$_POST['level'];
    $categoryId = (int)$_POST['category'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = basename($_FILES['image']['name']);
        $imagePath = 'uploads/' . $imageName;

        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true); // Create directory if not exists
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            // Insert data into recipes table
            $sqlRecipe = "INSERT INTO recipes (user_id, image, recipe_name, description, preparation_time, cooking_time, instructions, tip, level, created_at)
                          VALUES ('$userId', '$imagePath', '$recipeName', '$description', $preparationTime, $cookingTime, '$instructions', '$tip', $level, NOW())";

            if ($conn->query($sqlRecipe) === TRUE) {
                // Get the last inserted recipe ID
                $recipeId = $conn->insert_id;

                // Insert data into recipes_category table
                $sqlCategory = "INSERT INTO recipes_category (recipe_id, category_id, created_at) VALUES ($recipeId, $categoryId, NOW())";
                
                if ($conn->query($sqlCategory) === TRUE) {
                    // Process recipe steps
                    if (isset($_POST['recipe_steps']) && is_array($_POST['recipe_steps'])) {
                        foreach ($_POST['recipe_steps'] as $step) {
                            $stepName = $conn->real_escape_string($step['step_name']);
                            $stepDesc = $conn->real_escape_string($step['step_desc']);
                            $sorting = (int)$step['sorting'];

                            // Insert each step into the recipe_steps table
                            $sqlStep = "INSERT INTO recipe_steps (recipe_id, step_name, step_desc, sorting) 
                                        VALUES ('$recipeId', '$stepName', '$stepDesc', '$sorting')";
                            

                            if (!$conn->query($sqlStep)) {
                                echo "<script>alert('Error adding recipe step: " . $conn->error . "');</script>";
                                break; // Exit the loop if there is an error
                            }
                        }
                    }

                    // Process ingredients
                    if (isset($_POST['ingredients']) && is_array($_POST['ingredients'])) {
                        foreach ($_POST['ingredients'] as $ingredientId) {
                            $ingredientId = (int)$ingredientId; // Cast to integer for safety
                            $sqlIngredient = "INSERT INTO recipe_ingredients (recipe_id, ingredients_id, created_at) VALUES ($recipeId, $ingredientId, NOW())";
                            $conn->query($sqlIngredient);
                        }
                    }

                    echo "<script>alert('Recipe added successfully!'); location.href = 'community.php';</script>";
                } else {
                    echo "<script>alert('Error adding recipe category: " . $conn->error . "');</script>";
                }
            } else {
                echo "<script>alert('Error adding recipe: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Error uploading image.');</script>";
        }
    } else {
        echo "<script>alert('Image upload failed or no image selected.');</script>";
    }
}
?>

<?php
// Check if a session is already active before starting a new one
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodFusion</title>
    <!-- Tail wind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Add Splide CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/themes/splide-sea-green.min.css" />

    <style>
        /* Custom styles for cookie consent banner */
        .cookie-consent {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #f8f8f8;
            padding: 1rem;
            z-index: 1000;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav>
        <div class="bg-blue-700 shadow">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center text-white">
                <a class="text-2xl font-bold" href="#">FoodFusion</a>
                <div class="flex items-center space-x-4">
                    <div>
                        <i class="fas fa-user text-xl"></i>
                    </div>
                    <div>
                        <?php if (isset($_SESSION['user'])): ?>
                            <span class="text-lg">Welcome, <?= htmlspecialchars($_SESSION['user']['first_name']); ?>!</span>
                            <span class="mx-2">|</span>
                            <a id="logoutBtn" class="text-lg" href="logout.php">LogOut</a>
                        <?php else: ?>
                            <button id="loginBtn" class="text-lg" href="#">LogIn</button>
                            <span class="mx-2">|</span>
                            <button id="joinUsBtn" class="text-lg" href="#">Register</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <div class="flex items-center gap-6 hidden lg:flex">
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="index.php"><i class="fa-solid fa-house"></i></a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="recipes-list.php">Recipe</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="about-us.php">About Us</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="community.php">Community</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="contact-us.php">Contact Us</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="educational-resource.php">Educational</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="culinary-resource.php">Culinary</a>
                </div>

                <div class="hidden lg:flex items-center">
                    <form class="mx-auto">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <input style="width: 20rem;" type="search" id="default-search"
                                class="block p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search Mockups, Logos..." required />
                            <button type="submit"
                                class="absolute inset-y-0 right-0 flex items-center px-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm">Search</button>
                        </div>
                    </form>
                </div>

                <!-- Mobile menu button-->
                <div class="lg:hidden">
                    <button id="mobile-menu-button" class="text-white focus:outline-none focus:ring-2 focus:ring-white">
                        <i class="fa-solid fa-bars text-black text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="grid gap-2">
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="index.php">Home</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="recipes-list.php">Recipe</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="about-us.php">About Us</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="community.php">Community</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="contact-us.php">Contact Us</a>
                    <a class="text-gray-700 hover:text-blue-500 text-lg font-semibold" href="#educational">Educational</a>
                </div>
            </div>
        </div>
    </nav>

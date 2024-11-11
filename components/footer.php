    <!-- Modal -->
    <div id="register_modal"
        class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center transition-all duration-200">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-4">Register</h2>
            <form id="register_form">
                <div class="mb-4">
                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="firstName" name="firstName"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="lastName" name="lastName"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModalRegister" class="mr-2 text-gray-500">Cancel</button>
                    <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div id="login_modal"
        class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center transition-all duration-200">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-4">Login</h2>
            <form id="login_form">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModalLogin" class="mr-2 text-gray-500">Cancel</button>
                    <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Footer -->
    <footer class="bg-white text-center py-4">
        <p>© 2024 FoodFusion | <a href="#" class="text-blue-500">Privacy Policy</a></p>
        <p>
            Follow us on:
            <a href="#" class="text-blue-500">Facebook</a> |
            <a href="#" class="text-blue-500">Instagram</a> |
            <a href="#" class="text-blue-500">Twitter</a>
        </p>
    </footer>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Add Splide JS -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

<script>
    // cookie accept
    $("#acceptCookies").click(function () {
        $("#cookieConsent").hide();
    })
    // Open modal when button is clicked
    $(document).on("click", "#joinUsBtn", function(e){
        $('#register_modal').removeClass('hidden');
    });

    $('#loginBtn').on('click', function () {
        $('#login_modal').removeClass('hidden');
    });

    // Close modal when cancel button is clicked
    $('#closeModalRegister').on('click', function () {
        $('#register_modal').addClass('hidden');
    });
    $('#closeModalLogin').on('click', function () {
        $('#login_modal').addClass('hidden');
    });

    // Close modal when clicking outside of the modal content
    $(window).on('click', function (e) {
        if ($(e.target).is('#register_modal')) {
            $('#register_modal').addClass('hidden');
        }
        if ($(e.target).is('#login_modal')) {
            $('#login_modal').addClass('hidden');
        }
    });

    $("#register_form").on("submit", function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "register.php",
            data: formData,
            success: function(response) {
                // Assuming response is a JSON object with a 'status' key
                var result = JSON.parse(response);
                console.log(result.success);
                            
                
                if (result.success === true) {
                    $("#register_modal").addClass("hidden");                    

                    $("#login_modal").removeClass("hidden");
                } else {
                    console.log("some error");
                }
            },
            error: function() {
                alert("There was an error with the registration. Please try again.");
            }
        });
    });

    $("#closeModalRegister").on("click", function() {
        $("#register_modal").addClass("hidden");
    });

    $("#login_form").on("submit", function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        console.log("test");
        

        $.ajax({
            type: "POST",
            url: "loginBackEnd.php",
            data: formData,
            success: function(response) {
                // Assuming response is a JSON object with a 'status' key
                var result = JSON.parse(response);                

                if (result.success === true) {
                    $("#login_modal").addClass("hidden");
                    alert("Login successful! Redirecting to your community...");
                    window.location.href = "community.php";
                } else {
                    alert(result.message);
                }
            },
            error: function() {
                alert("There was an error logging in. Please try again.");
            }
        });
    });

    // logout 
    $("#logoutBtn").click(function(event) {
        event.preventDefault(); // Prevent the default link behavior

        // Show confirmation box
        const confirmed = confirm("Are you sure you want to log out?");
        
        // If the user confirms, proceed to the logout page
        if (confirmed) {
            window.location.href = $(this).attr("href");
        }
    });

    // crate recipe
    $('#recipeForm').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Perform form validation
        const formData = new FormData(this); // Gather form data

        console.log(formData);
        

        // Submit form via AJAX
        $.ajax({
            url: 'createRecipeBackEnd.php',
            type: 'POST',
            data: formData,
            processData: false, // Required for file upload
            contentType: false, // Required for file upload
            success: function(response) {
                $('#message').html("<p class='text-green-500'>" + response + "</p>");
                $('#recipeForm')[0].reset(); // Reset form on success
            },
            error: function() {
                $('#message').html("<p class='text-red-500'>Error submitting recipe. Please try again.</p>");
            }
        });
    });


    // add more step
    let stepCount = 1; // Start from 1 since the first step is already in the DOM

    $("#add-step-btn").click(function() {
        
        const newStep = `
            <div class="recipe-step p-5 border rounded my-5" data-index="${stepCount}">
                <div>
                    <label for="recipe_step_name_${stepCount}" class="block text-sm font-medium text-gray-700">Recipe Step Name</label>
                    <input type="text" id="recipe_step_name_${stepCount}" name="recipe_steps[${stepCount}][step_name]" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="recipe_step_description_${stepCount}" class="block text-sm font-medium text-gray-700">Recipe Step Description</label>
                    <textarea id="recipe_step_description_${stepCount}" name="recipe_steps[${stepCount}][step_desc]" rows="3" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                </div>
                <input type="hidden" name="recipe_steps[${stepCount}][sorting]" value="${stepCount + 1}">
            </div>
        `;

        // Append the new step to the recipe steps section
        $("#recipe-steps").append(newStep);
        stepCount++;
    });

    // navbar toggle
    $('#mobile-menu-button').click(function() {
        $('#mobile-menu').toggleClass('hidden');
    });

    var splide = new Splide('#splide', {
        type: 'loop',        // Enables infinite loop
        perPage: 3,          // Default: Displays 3 slides at a time
        autoplay: true,      // Autoplay slides
        interval: 3000,      // 3 seconds per slide
        gap: '1rem',         // Gap between slides
        padding: '5rem',     // Default padding

        // Responsive breakpoints
        breakpoints: {
            1024: {
                perPage: 2,  // For screens ≤1024px, show 2 slides
                padding: '3rem',
            },
            768: {
                perPage: 1,  // For screens ≤768px, show 1 slide
                padding: '1.5rem',
            },
            480: {
                perPage: 1,  // For screens ≤480px, show 1 slide
                padding: '0.5rem',
                gap: '0.5rem',  // Smaller gap on very small screens
            }
        }
    });

// Mount the Splide carousel
splide.mount();

</script>

</html>
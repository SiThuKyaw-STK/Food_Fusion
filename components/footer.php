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
    $('#joinUsBtn').on('click', function () {
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

    var splide = new Splide('#splide', {
        type: 'loop',     // Enables infinite loop
        perPage: 3,          // Displays 1 slide at a time
        autoplay: true,      // Autoplay slides
        interval: 3000,      // 3 seconds per slide
        gap: '1rem',     // Gap between slides
        padding: '5rem',
    });

    // Mount the Splide carousel
    splide.mount();

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

</script>

</html>
    <!-- Modal -->
    <div id="joinUsModal"
        class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center transition-all duration-200">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-4">Register</h2>
            <form id="joinUsForm">
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
                    <button type="button" id="closeModal" class="mr-2 text-gray-500">Cancel</button>
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
        $('#joinUsModal').removeClass('hidden');
    });

    // Close modal when cancel button is clicked
    $('#closeModal').on('click', function () {
        $('#joinUsModal').addClass('hidden');
    });

    // Close modal when clicking outside of the modal content
    $(window).on('click', function (e) {
        if ($(e.target).is('#joinUsModal')) {
            $('#joinUsModal').addClass('hidden');
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
</script>

</html>
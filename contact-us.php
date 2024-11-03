<?php
// Start output buffering to capture dynamic content
ob_start();
?>

<!-- Contact Us Page Content -->
<section class="max-w-7xl mx-auto my-10 py-10">
    <div class="">
        <!-- Heading Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Get in Touch</h1>
            <p class="mt-3 text-lg">We'd love to hear from you! Reach out for any queries or feedback.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Contact Information</h2>
                <p class="text-lg mb-4">Feel free to reach us by email, phone, or by dropping by our office.</p>
                <ul class="space-y-4">
                    <li class="flex items-center">
                        <span class="w-8 h-8 inline-flex items-center justify-center bg-blue-500 text-white rounded-full mr-3">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="text-lg">+1 (123) 456-7890</span>
                    </li>
                    <li class="flex items-center">
                        <span class="w-8 h-8 inline-flex items-center justify-center bg-green-500 text-white rounded-full mr-3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="text-lg">contact@example.com</span>
                    </li>
                    <li class="flex items-center">
                        <span class="w-8 h-8 inline-flex items-center justify-center bg-red-500 text-white rounded-full mr-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <span class="text-lg">123 Example Street, City, Country</span>
                    </li>
                </ul>
            </div>

            <!-- Contact Form -->
            <div>
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Send Us a Message</h2>
                <form action="contact_process.php" method="POST" class="space-y-6">
                    <div>
                        <label for="name" class="block text-lg font-medium text-gray-700">Your Name</label>
                        <input type="text" name="name" id="name" required class="mt-1 p-3 block w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                    </div>
                    <div>
                        <label for="email" class="block text-lg font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" required class="mt-1 p-3 block w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                    </div>
                    <div>
                        <label for="message" class="block text-lg font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" required class="mt-1 p-3 block w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-md">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Google Maps Embed -->
        <div class="mt-16">
            <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800">Visit Our Location</h2>
            <div class="w-full h-80 rounded-md overflow-hidden shadow-lg">
                <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509014!2d144.95373631584466!3d-37.81627944202144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f1f6c3b1%3A0x2b2b4d5169d07a0b!2sGoogle!5e0!3m2!1sen!2sus!4v1600755206338!5m2!1sen!2sus" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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

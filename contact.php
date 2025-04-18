<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - RoadHealth AI</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins text-white bg-gray-800">

    <!-- Navbar -->
    <nav class="bg-gray-900 bg-opacity-70 backdrop-blur-md shadow-md p-4 w-full z-50">
    <div class="flex">
            <div class="container mx-auto flex justify-between items-center">
                <a href="index.php" class="flex items-center absolute top-4 left-4 text-2xl font-bold mb-8 space-x-3">
                <!-- Logo SVG -->
                    <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v10m4-10v10m-9 0h14" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                <!-- Logo Text -->
                        <span class="text-2xl font-bold text-blue-400">RoadHealth AI</span>
                
                 </a>
            </div>     
            <div class="relative">
                <button id="userMenuButton" class="text-white focus:outline-none px-3 py-2 rounded hover:bg-blue-400 transition duration-300">
                    <i class="fas fa-user text-2xl"></i>
                </button>
                <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg hidden z-50">
                    <a href="login.php" class="block px-4 py-2 text-white hover:bg-blue-600 transition duration-300 rounded-t-lg">Login</a>
                    <a href="signup.php" class="block px-4 py-2 text-white hover:bg-green-600 transition duration-300 rounded-b-lg">Signup</a>
                </div>
            </div>
    </div>
        
   
</nav>

    <!-- Contact Section -->
    <section id="contact" class="pt-24 pb-20 bg-gray-900">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-semibold text-blue-400 mb-6">Contact Us</h2>
            <p class="text-lg text-gray-300 mb-12">Have questions or need assistance? Feel free to reach out to us using the form below!</p>
            
            <!-- Contact Form -->
            <div class="max-w-xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
                <form action="response.php" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="text-lg text-gray-300">Full Name</label>
                        <input type="text" id="name" name="name" class="w-full p-3 bg-gray-700 text-white rounded-lg" required placeholder="Your Name">
                    </div>
                    <div>
                        <label for="email" class="text-lg text-gray-300">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full p-3 bg-gray-700 text-white rounded-lg" required placeholder="Your Email">
                    </div>
                    <div>
                        <label for="message" class="text-lg text-gray-300">Your Message</label>
                        <textarea id="message" name="message" class="w-full p-3 bg-gray-700 text-white rounded-lg" rows="6" required placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-700 text-white py-3 rounded-lg hover:from-green-600 hover:to-green-800 transition duration-300 transform hover:scale-105">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Location Map Section -->
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-semibold text-blue-400 mb-6">Our Location</h3>
            <p class="text-lg text-gray-300 mb-12">Find us on the map below or visit our office for further assistance.</p>
            <div class="w-full h-96">
                <iframe class="w-full h-full rounded-lg shadow-lg" src="https://www.google.com/maps/embed/v1/place?q=RoadHealth+AI&key=YOUR_GOOGLE_MAP_API_KEY" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 p-8 text-center text-gray-400">
        <div class="container mx-auto">
            <p class="text-lg border-t border-gray-700 pt-4">© 2025 RoadHealth AI. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Toggle Dropdown Menu
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');
        userMenuButton.addEventListener('click', function () {
            userMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

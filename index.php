<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoadHealth AI - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins text-white">
    
    <!-- Navigation -->
    <nav class="bg-gray-900 bg-opacity-70 backdrop-blur-md shadow-md p-4 w-full z-50">
    <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <!-- Logo SVG -->
                <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v10m4-10v10m-9 0h14" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <!-- Logo Text -->
                <span class="text-2xl font-bold text-blue-400">RoadHealth AI</span>
            </div>
        <div class="flex space-x-6">
            <a href="#hero" class="text-white hover:text-white hover:bg-blue-400 px-3 py-2 rounded transition duration-300">Home</a>
            <a href="dashboard.php" class="text-white hover:text-white hover:bg-blue-400 px-3 py-2 rounded transition duration-300">Upload Image</a>
            <a href="contact.php" class="text-white hover:text-white hover:bg-blue-400 px-3 py-2 rounded transition duration-300">Contact</a>
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
    </div>
</nav>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden pt-16" id="hero">
        <div class="parallax-bg" style="background-image: url('photos/road.jpeg');"></div>
        <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
        <div class="container mx-auto text-center px-4 relative z-20">
            <h2 class="text-5xl md:text-7xl font-bold mb-4 animate-fade-in text-white">Welcome to RoadHealth AI</h2>
            <p class="text-xl md:text-2xl text-gray-200 mb-4 animate-fade-in-delay">Smart Pavement Condition Assessment with AI Technology</p>
            <div class="flex justify-center space-x-4">
                <a href="signup.php" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-green-600 hover:to-green-800 transition duration-300 transform hover:scale-105">Get Started</a>
                <a href="aboutus.php" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-gray-900 transition duration-300 transform hover:scale-105">About Us</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-gray-800 py-20">
        <div class="container mx-auto text-center px-4">
            <h3 class="text-4xl font-semibold mb-8 text-blue-400">What We Do</h3>
            <p class="text-gray-300 max-w-3xl mx-auto mb-12 text-lg">RoadHealth AI leverages advanced technology to analyze road conditions. Upload a photo, and our system will detect cracks, potholes, and other issues—helping you maintain roads smarter and faster.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <a href="dashboard.php" class="block">
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Upload Photos" class="w-full h-40 object-cover rounded-t-lg mb-4">
                        <i class="fas fa-camera text-4xl text-blue-400 mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2  text-white p-2">Upload Photos</h4>
                        <p class="text-gray-300">Easily upload images of roads for analysis.</p>
                    </div>
                </a>

                <a href="process_upload.php" class="block">
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="AI Analysis" class="w-full h-40 object-cover rounded-t-lg mb-4">
                        <i class="fas fa-robot text-4xl text-blue-400 mb-4"></i>
                            <h4 class="text-xl font-semibold mb-2 text-white p-2 rounded">AI Analysis</h4>
                        <p class="text-gray-300">Our system detects pavement issues automatically.</p>
                    </div>
                </a>

                <!-- <a href="results.php" class="block"> -->
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Get Insights" class="w-full h-40 object-cover rounded-t-lg mb-4">
                        <i class="fas fa-chart-line text-4xl text-blue-400 mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">Get Insights</h4>
                        <p class="text-gray-300">Receive detailed reports and insights.</p>
                    </div>
                <!-- </a> -->
            </div>
            
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 p-8 text-center text-gray-400" id="footer-about">
        <div class="container mx-auto">
            <div class="mb-12 text-center">
                <h4 class="text-2xl font-semibold text-white mb-4">About Us</h4>
                <p class="text-gray-400 max-w-2xl mx-auto">RoadHealth AI is an innovative project aimed at revolutionizing road maintenance. Our AI-powered platform analyzes pavement conditions through uploaded images, detecting issues like cracks and potholes with high accuracy. Developed by a team of passionate students, our mission is to assist road authorities in making data-driven decisions for safer and more efficient infrastructure management.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                    <ul>
                        <li><a href="aboutus.php" class="text-gray-400 hover:text-blue-400 transition duration-300">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Follow Us</h4>
                    <div class="flex justify-center space-x-4">
                        <a href="https://x.com/hkakashi7520" class="text-blue-400 hover:text-white transform hover:scale-125 transition duration-300"><i class="fab fa-x text-2xl"></i></a>
                        <a href="https://www.linkedin.com/in/rishabh-yadav-a81492297/" class="text-blue-400 hover:text-white transform hover:scale-125 transition duration-300"><i class="fab fa-linkedin text-2xl"></i></a>
                        <a href="https://github.com/rishabh7520" class="text-blue-400 hover:text-white transform hover:scale-125 transition duration-300"><i class="fab fa-github text-2xl"></i></a>
                    </div>
                </div>
            </div>
            <p class="text-lg border-t border-gray-700 pt-4">© 2025 RoadHealth AI. All rights reserved.</p>
        </div>
    </footer>

    <!-- Custom CSS -->
    <style>
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        .animate-fade-in {
            animation: fadeIn 2s ease-in-out;
        }
        .animate-fade-in-delay {
            animation: fadeIn 2s ease-in-out 1s;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120%;
            z-index: 0;
            transform: translateY(0);
        }
    </style>

    <!-- JS Script to Handle User Menu Toggle -->
    <script>
        document.getElementById('userMenuButton').addEventListener('click', function() {
            var menu = document.getElementById('userMenu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
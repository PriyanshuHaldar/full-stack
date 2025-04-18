<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoadHealth AI - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins text-white bg-gray-900">

<!-- ✅ Hero Section with Navbar inside -->
<section class="relative h-64 flex items-center justify-center bg-cover bg-center overflow-hidden pt-24" id="hero">
    <div class="absolute inset-0 bg-black opacity-60 z-10"></div>
    <div class="parallax-bg absolute inset-0" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');"></div>

    <!-- Navbar inside Hero Section (Transparent) -->
    <nav class="fixed w-full top-0 z-50 p-4 bg-transparent">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4">
            <!-- Logo and Desktop Links -->
            <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-3">
                <!-- Logo SVG -->
                <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v10m4-10v10m-9 0h14" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <!-- Logo Text -->
                <span class="text-2xl font-bold text-blue-400">RoadHealth AI</span>
            </div>
                <div class="hidden md:flex space-x-6 ml-10">
                    <a href="dashboard.php" class="text-white hover:text-blue-400 transition duration-300">Dashboard</a>
                    <a href="index.php" class="text-white hover:text-blue-400 transition duration-300">Home</a>
                    <a href="#upload" class="text-white hover:text-blue-400 transition duration-300">Upload</a>
                    <a href="history.php" class="text-white hover:text-blue-400 transition duration-300">History</a>
                    <a href="contact.php" class="text-white hover:text-blue-400 transition duration-300">Contact-Us</a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobileMenuButton" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- User Dropdown -->
            <div class="relative ml-4">
                <button id="userMenuButton" class="text-white focus:outline-none">
                    <i class="fas fa-user text-2xl hover:text-blue-400 transition duration-300"></i>
                </button>
                <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg hidden">
                    <a href="#" class="block px-4 py-2 text-white hover:bg-blue-600 transition duration-300 rounded-t-lg">
                        <?php echo htmlspecialchars($_SESSION['full_name']); ?>
                    </a>
                    <a href="logout.php" class="block px-4 py-2 text-white hover:bg-red-600 transition duration-300 rounded-b-lg">
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Links -->
        <div id="mobileMenu" class="md:hidden hidden px-4 mt-2 space-y-2">
            <a href="dashboard.php" class="block text-white hover:text-blue-400">Dashboard</a>
            <a href="index.php" class="block text-white hover:text-blue-400">Home</a>
            <a href="contact.php" class="block text-white hover:text-blue-400">Contact</a>
        </div>
    </nav>

    <!-- Hero Content -->
    <div class="max-w-4xl mx-auto text-center px-4 relative z-20">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in text-white">
            Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!
        </h2>
        <p class="text-lg md:text-xl text-gray-200 animate-fade-in-delay">
            Analyze road conditions with ease using RoadHealth AI
        </p>
    </div>
</section>

<!-- ✅ Upload Section -->
<section class="bg-gray-800 py-16 px-4" id="upload">
    <div class="max-w-lg mx-auto bg-gray-700 p-8 rounded-lg shadow-lg">
        <h3 class="text-2xl font-semibold text-blue-400 mb-6 text-center">Upload Road Photo</h3>
        <form action="process_upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-6">
                <label class="block text-lg mb-2 text-gray-300">Select Road Photo:</label>
                <div class="relative">
                    <input type="file" name="road_photo" accept="image/*"
                           class="w-full p-3 border border-gray-500 rounded-md bg-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-blue-400"
                           required />
                    <i class="fas fa-camera absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <button type="submit"
                    class="w-full bg-gradient-to-r from-green-500 to-green-700 text-white font-semibold py-3 rounded-md hover:from-green-600 hover:to-green-800 transition duration-300 transform hover:scale-105">
                Analyze Now
            </button>
        </form>

        <!-- ✅ Result Messages -->
        <?php
        if (isset($_SESSION['result'])) {
            echo "<p class='text-green-400 mt-6 text-center'>" . $_SESSION['result'] . "</p>";
            unset($_SESSION['result']);
        }
        if (isset($_SESSION['error'])) {
            echo "<p class='text-red-400 mt-6 text-center'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        ?>
    </div>
</section>

<!-- ✅ Footer -->
<footer class="bg-gray-900 p-8 text-center text-gray-400" id="contact">
    <div class="max-w-7xl mx-auto">
        <p class="text-lg border-t border-gray-700 pt-4">© 2025 RoadHealth AI. All rights reserved.</p>
    </div>
</footer>

<!-- ✅ Custom CSS -->
<style>
    .font-poppins {
        font-family: 'Poppins', sans-serif;
    }

    .animate-fade-in {
        animation: fadeIn 1.5s ease-in-out;
    }

    .animate-fade-in-delay {
        animation: fadeIn 2s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
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
        height: 100%;
        transform: translateY(0);
        z-index: 0;
    }

    /* Remove background color from the <i> element */
    .fas {
        background-color: transparent !important;
    }
</style>

<!-- ✅ Scripts -->
<script>
    // Parallax scroll effect
    window.addEventListener('scroll', function () {
        const parallax = document.querySelector('.parallax-bg');
        let scrollPosition = window.pageYOffset;
        parallax.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
    });

    // Toggle user dropdown
    const userMenuButton = document.getElementById('userMenuButton');
    const userMenu = document.getElementById('userMenu');

    userMenuButton.addEventListener('click', function () {
        userMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', function (event) {
        if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });

    // Toggle mobile nav
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>

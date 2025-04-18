<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

        <a href="index.php" class="flex items-center absolute top-4 left-4 text-2xl font-bold mb-8 space-x-3">
                <!-- Logo SVG -->
                <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v10m4-10v10m-9 0h14" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <!-- Logo Text -->
                <span class="text-2xl font-bold text-blue-400">RoadHealth AI</span>
                
        </a>
    <div class="w-full max-w-sm p-5">
        
        <h2 class="text-3xl font-semibold text-center mb-5">Create an account</h2>

        <?php
            session_start();
            if (isset($_SESSION['error'])) {
              echo "<p class='text-red-500 text-center mb-4'>" . $_SESSION['error'] . "</p>";
              unset($_SESSION['error']);
            }
        ?>

        <form action="process_signup.php" method="post">
        
        <div class="mb-5">
            <input type="text" name="fullname" placeholder="Full Name" class="w-full p-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-1 focus:ring-green-500" required />
        </div>

        <div class="mb-5">
            <input type="email" name="email" placeholder="Email address" class="w-full p-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-1 focus:ring-green-500" required />
        </div>

        <div class="mb-5">
            <input type="password" name="password" placeholder="Enter Your Password" class="w-full p-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-1 focus:ring-green-500" required />
        </div>

        <button type="submit" class="w-full bg-green-700 text-white font-semibold text-base py-3 rounded-md mb-5 hover:bg-green-900">Continue</button>

        </form>

        <div class="text-center text-sm mb-5">
            Already have an account? <a href="login.php" class="text-green-600 hover:underline">Log in</a>
        </div>

        <div class="text-center text-xs text-green-600 mt-5">
            <a href="#" class="hover:underline">Terms of Use</a> | <a href="#" class="hover:underline">Privacy Policy</a>
        </div>
    </div>
</body>
</html>

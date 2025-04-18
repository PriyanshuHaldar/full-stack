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
    <title>RoadHealth AI - Analysis Results</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .parallax {
            background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            opacity: 0.1;
            position: fixed;
            width: 100%;
            z-index: -1;
        }
        .navbar {
            transition: background-color 0.3s ease;
        }
        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .result-card {
            transition: transform 0.2s ease-in-out;
        }
        .result-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="relative">
    <div class="parallax"></div>
    
    <!-- Navigation Bar -->
    <nav class="navbar fixed top-0 left-0 w-full bg-white z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="index.php" class="text-2xl font-bold text-blue-700">RoadHealth AI</a>
                </div>
                <div class="flex space-x-4">
                    <a href="dashboard.php" class="text-gray-600 hover:text-blue-700 px-3 py-2 rounded-md">Dashboard</a>
                    <a href="upload.php" class="text-gray-600 hover:text-blue-700 px-3 py-2 rounded-md">Upload</a>
                    <a href="logout.php" class="text-gray-600 hover:text-blue-700 px-3 py-2 rounded-md">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4">
        <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl p-8">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold text-blue-800 flex items-center justify-center">
                    <i class="fas fa-road mr-2"></i> Pavement Analysis Results
                </h1>
                <p class="text-gray-600 mt-3">Detailed results of your latest road condition assessment.</p>
            </div>

            <?php if (isset($_SESSION['result'])): ?>
                <div class="result-card p-6 mb-8 bg-green-50 border border-green-200 rounded-xl">
                    <h2 class="text-xl font-semibold text-green-800 mb-4">Analysis Summary</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-700"><strong>Road Segment:</strong> <?php echo htmlspecialchars($_SESSION['result']['segment'] ?? 'N/A'); ?></p>
                            <p class="text-gray-700"><strong>Condition:</strong> <?php echo htmlspecialchars($_SESSION['result']['condition'] ?? 'N/A'); ?></p>
                            <p class="text-gray-700"><strong>Damage Type:</strong> <?php echo htmlspecialchars($_SESSION['result']['damage'] ?? 'None'); ?></p>
                        </div>
                        <div>
                            <p class="text-gray-700"><strong>Severity:</strong> <?php echo htmlspecialchars($_SESSION['result']['severity'] ?? 'N/A'); ?></p>
                            <p class="text-gray-700"><strong>Analysis Date:</strong> <?php echo htmlspecialchars($_SESSION['result']['date'] ?? date('Y-m-d')); ?></p>
                        </div>
                    </div>
                    <?php unset($_SESSION['result']); ?>
                </div>
            <?php elseif (isset($_SESSION['error'])): ?>
                <div class="p-6 mb-8 bg-red-50 border border-red-200 rounded-xl">
                    <h2 class="text-xl font-semibold text-red-800 mb-4">Error</h2>
                    <p class="text-red-700"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php else: ?>
                <div class="p-6 mb-8 bg-yellow-50 border border-yellow-200 rounded-xl">
                    <h2 class="text-xl font-semibold text-yellow-800 mb-4">No Results Available</h2>
                    <p class="text-yellow-700">Upload a road image to start the analysis.</p>
                </div>
            <?php endif; ?>

            <div class="text-center space-x-4">
                <a href="dashboard.php" class="inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-lg hover:bg-blue-700 transition-all duration-200">
                    <i class="fas fa-tachometer-alt mr-2"></i> Back to Dashboard
                </a>
                <a href="upload.php" class="inline-block px-8 py-3 bg-gray-600 text-white font-semibold rounded-md shadow-lg hover:bg-gray-700 transition-all duration-200">
                    <i class="fas fa-upload mr-2"></i> Upload New Image
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2025 RoadHealth AI. All rights reserved.</p>
            <div class="mt-4 flex justify-center space-x-6">
                <a href="https://x.com" class="text-gray-400 hover:text-white"><i class="fab fa-x-twitter"></i></a>
                <a href="https://linkedin.com" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>










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
    <title>Analysis Results</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-3xl bg-white shadow-lg rounded-xl p-8">
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-blue-700">📊 Analysis Results</h1>
            <p class="text-gray-600 mt-2">Here are the results of your latest analysis.</p>
        </div>

        <?php if (isset($_SESSION['result'])): ?>
            <div class="p-4 mb-6 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                <?php
                echo nl2br(htmlspecialchars($_SESSION['result']));
                unset($_SESSION['result']);
                ?>
            </div>
        <?php elseif (isset($_SESSION['error'])): ?>
            <div class="p-4 mb-6 bg-red-100 border border-red-300 text-red-800 rounded-lg">
                <?php
                echo htmlspecialchars($_SESSION['error']);
                unset($_SESSION['error']);
                ?>
            </div>
        <?php else: ?>
            <div class="p-4 mb-6 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-lg">
                No analysis available at the moment.
            </div>
        <?php endif; ?>

        <div class="text-center">
            <a href="dashboard.php" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-700 transition-all duration-200">
                ← Back to Dashboard
            </a>
        </div>
    </div>

</body>
</html>

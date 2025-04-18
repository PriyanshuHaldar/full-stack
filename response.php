<?php
// response.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulate form data being processed
    $name = htmlspecialchars($_POST['name']); // Sanitize name
    $email = htmlspecialchars($_POST['email']); // Sanitize email
    $message = htmlspecialchars($_POST['message']); // Sanitize message

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='text-red-500'>Invalid email format. Please go back and try again.</p>";
        exit();
    }

    // Display success message and automatically redirect to index.php after 3 seconds
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Response Recorded</title>
        <link href='https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap' rel='stylesheet'>
        <script>
            // Redirect to home page after 3 seconds
            setTimeout(function() {
                window.location.href = 'index.php'; // Adjust path if needed
            }, 3000);
        </script>
    </head>
    <body class='font-poppins text-white bg-gray-800'>
        <section class='pt-24 pb-20 bg-gray-900'>
            <div class='container mx-auto text-center px-4'>
                <h2 class='text-4xl font-semibold text-blue-400 mb-6'>Your Response Has Been Recorded</h2>
                <p class='text-lg text-gray-300 mb-12'>Thank you, $name. We have received your message and will get back to you shortly!</p>
                <p class='text-lg text-gray-300'>You will be redirected to the home page shortly...</p>
            </div>
        </section>
    </body>
    </html>";
}
?>

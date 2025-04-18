<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['road_photo'])) {
    $upload_dir = 'Uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $file_name = basename($_FILES['road_photo']['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    $file_size = $_FILES['road_photo']['size'];
    $saved_file = $upload_dir . time() . '_' . $file_name;

    if (!in_array($file_ext, $allowed_ext)) {
        $_SESSION['error'] = "Only JPG, JPEG, PNG, GIF files are allowed!";
        header("Location: results.php");
        exit();
    }

    if ($file_size > 10 * 1024 * 1024) {
        $_SESSION['error'] = "File size exceeds 10MB!";
        header("Location: results.php");
        exit();
    }

    if (move_uploaded_file($_FILES['road_photo']['tmp_name'], $saved_file)) {
        $api_key = $_ENV['OPENAI_API_KEY'];
        $prompt = "Analyze this road image and determine its safety. Look for cracks, potholes, or other damages. Provide a detailed text description of the road condition and a safety rating (Safe, Moderate, Unsafe).";

        // Convert image to base64
        $image_data = base64_encode(file_get_contents($saved_file));
        $mime_type = mime_content_type($saved_file); // e.g., image/jpeg

        $payload = [
            "model" => "gpt-4o",
            "messages" => [
                [
                    "role" => "user",
                    "content" => [
                        ["type" => "text", "text" => $prompt],
                        [
                            "type" => "image_url",
                            "image_url" => [
                                "url" => "data:{$mime_type};base64,{$image_data}"
                            ]
                        ]
                    ]
                ]
            ],
            "max_tokens" => 2048
        ];

        $ch = curl_init("https://api.openai.com/v1/chat/completions");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer {$api_key}",
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200) {
            $result = json_decode($response, true);
            $analysis = $result['choices'][0]['message']['content'] ?? 'No analysis returned.';
            $_SESSION['result'] = "Photo uploaded successfully! AI Analysis: " . $analysis;
        } else {
            $_SESSION['error'] = "AI analysis failed! HTTP Code: {$http_code}, Response: " . $response;
        }

        header("Location: results.php");
        exit();
    } else {
        $_SESSION['error'] = "Upload failed! Error: " . $_FILES['road_photo']['error'];
        header("Location: results.php");
        exit();
    }
} else {
    $_SESSION['error'] = "No file uploaded!";
    header("Location: results.php");
    exit();
}
<?php
// Update these values to match your local MySQL setup.
$host = 'localhost';
$dbname = 'amnon_portfolio';
$username = 'root';
$password = '';

try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    error_log('Portfolio database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('The website database is not available yet. Please check the database setup.');
}

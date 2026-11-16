<?php
session_start();

function backWithError(): void
{
    header('Location: index.php?status=error#contact');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}

$token = $_POST['csrf_token'] ?? '';
if (!isset($_SESSION['csrf_token']) || !is_string($token) || !hash_equals($_SESSION['csrf_token'], $token)) {
    backWithError();
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || mb_strlen($name) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 150 || $subject === '' || mb_strlen($subject) > 150 || $message === '' || mb_strlen($message) > 3000) {
    backWithError();
}

require __DIR__ . '/connect.php';

try {
    $stmt = $pdo->prepare('INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)');
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':subject' => $subject,
        ':message' => $message,
    ]);
    header('Location: index.php?status=success#contact');
    exit;
} catch (PDOException $e) {
    error_log('Portfolio message save failed: ' . $e->getMessage());
    backWithError();
}

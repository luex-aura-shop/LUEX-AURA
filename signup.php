<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "luex_aura"); // Change these as needed

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $verification_code = bin2hex(random_bytes(16)); // Generate a unique verification code

    // Insert user into the database
    $sql = "INSERT INTO users (name, email, password, verification_code) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $password, $verification_code);
    $stmt->execute();

    // Send verification email
    $verify_link = "http://yourdomain.com/verify.php?code=$verification_code"; // Change with your domain
    $subject = "Please Verify Your Email";
    $body = "Hi $name,\n\nPlease click the link below to verify your email and activate your account:\n$verify_link";
    $headers = "From: noreply@luexaura.com";
    mail($email, $subject, $body, $headers);

    echo "Please check your email to verify your account.";
}
?>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "luex_aura"); // Your DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $verification_code = bin2hex(random_bytes(16)); // Generate a unique verification code

  // Insert into the database
  $sql = "INSERT INTO users (name, email, password, verification_code, is_verified) VALUES (?, ?, ?, ?, 0)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $name, $email, $password, $verification_code);
  $stmt->execute();

  // Send verification email
  $verify_link = "http://yourdomain.com/verify.php?code=$verification_code"; // Update with your domain
  $subject = "Please Verify Your Email";
  $body = "Hi $name,\n\nPlease click the link below to verify your email and activate your account:\n$verify_link";
  $headers = "From: noreply@luexaura.com";
  mail($email, $subject, $body, $headers);

  echo "Please check your email to verify your account.";
}
?>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "luex_aura");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $verification_code = bin2hex(random_bytes(16)); // Generate unique verification code

    // Insert user into the database
    $sql = "INSERT INTO users (name, email, password, verification_code, is_verified) VALUES (?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $password, $verification_code);
    $stmt->execute();

    // Send verification email
    $verify_link = "http://yourdomain.com/verify.php?code=$verification_code"; // Update with your domain
    $subject = "Please Verify Your Email Address";
    $body = "Hi $name,\n\nPlease click the link below to verify your email address:\n$verify_link";
    $headers = "From: noreply@luexaura.com";

    if (mail($email, $subject, $body, $headers)) {
        echo "A verification email has been sent to your email address. Please check your inbox.";
    } else {
        echo "Failed to send verification email.";
    }
}
?>
<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = new mysqli("localhost", "root", "", "your_db");

$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$token = md5(rand());

$stmt = $conn->prepare("INSERT INTO users (email, username, password, token, is_verified) VALUES (?, ?, ?, ?, 0)");
$stmt->bind_param("ssss", $email, $username, $password, $token);
$stmt->execute();


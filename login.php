<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Find user
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION["user"] = $row["name"];
            header("Location: index.php");
            exit;
        } else {
            echo "❌ Invalid password.";
        }
    } else {
        echo "❌ No user found with this email.";
    }
}
?>
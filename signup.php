<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST["name"];
    $email   = $_POST["email"];
    $pass    = password_hash($_POST["password"], PASSWORD_DEFAULT); // Encrypt
    $phone   = $_POST["phone"];
    $gender  = $_POST["gender"];
    $dob     = $_POST["dob"];
    $address = $_POST["address"];
    $city    = $_POST["city"];

    $sql = "INSERT INTO users (name, email, password, phone, gender, dob, address, city)
            VALUES ('$name', '$email', '$pass', '$phone', '$gender', '$dob', '$address', '$city')";

    if (mysqli_query($conn, $sql)) {
        echo "Signup successful! <a href='login.html'>Click here to login</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
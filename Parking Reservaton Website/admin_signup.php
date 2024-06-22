<?php
session_start();


$adminUsername = "Zayn Afaq";
$adminPassword = "Zain123";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["admin_username"];
    $password = $_POST["admin_password"];

    if ($username === $adminUsername && $password === $adminPassword) {
       
        header("Location: admin.html");
        exit();
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>

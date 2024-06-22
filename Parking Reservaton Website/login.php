<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "parking_reservation_website"; 

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_check = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        $_SESSION["email"] = $email;
        header("Location: reservation.html");
        exit();
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }

    $conn->close();
}
?>

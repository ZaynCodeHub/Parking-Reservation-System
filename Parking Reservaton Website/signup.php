<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $dbpassword = ""; // Password for MySQL server
    $dbname = "parking_reservation_website"; // Name of your database

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email already exists
    $sql_check = "SELECT * FROM userss WHERE email='$email'";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        echo "<script>alert('Email already exists!');</script>";
    } else {
        // Insert user data into the user table
        $sql_insert = "INSERT INTO users (first_name, last_name, email, password)
        VALUES ('$firstName', '$lastName', '$email', '$password')";
        if ($conn->query($sql_insert) === TRUE) {
            // Redirect to the login page after successful signup
            header("Location: login.html");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

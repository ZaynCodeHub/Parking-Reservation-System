<?php

// Replace with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking_reservation_website";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data (assuming form submission)
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Create SQL insert statement
$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

// Execute the query
if (mysqli_query($conn, $sql)) {
  echo "Thank you for contacting us! We will get back to you soon.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header('Location: index.html');
exit();

mysqli_close($conn);
?>

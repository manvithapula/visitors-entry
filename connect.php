<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visitorlog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO visitors (date, name, address, email, phone, purpose, source, pan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisss", $date, $name, $address, $email, $phone, $purpose, $source, $pan);

// Set parameters and execute
$date = $_POST['date'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$purpose = $_POST['purpose'];
$source = $_POST['source'];
$pan = $_POST['pan'];

if ($stmt->execute()) {
    echo "successfully recorded";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

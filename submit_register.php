<?php

// Connect to the database
$conn = new mysqli("localhost", "username", "password", "database");

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Prepare the SQL statement
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Bind the parameters to the statement
    $stmt->bind_param("sss", $username, $email, $password);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

?>

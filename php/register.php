<?php
error_reporting(error_level: E_ALL);
ini_set(option: "display_errors", value: 1);
include ("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim(string: $_POST["username"]);
    $password = $_POST["password"];


    // Step 3: Check if user already exists
    $stmt = $conn->prepare(query: "SELECT id,username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        die("Username already taken. Try something cooler.");
    }

    // Step 4: Hash the password
    $hashed_password =password_hash(password: $password, algo:PASSWORD_DEFAULT);

    // Step 5: Insert new user
    $stmt = $conn->prepare(query: "INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param( "ss", $username,  $hashed_password);

    if ($stmt->execute()) {
        header(header: "Location: ../topics/login.html");
        //echo "'Registration successful'. <a href='../topics/login.html'>Log in now</a>.";
    } else {
        echo "Something went wrong. Try again later.";
    }

    $stmt->close();
    $conn->close();
}
?>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
include("db.php");

if (isset($_SESSION["user_id"])) {
    header("Location: ../topics/home.php");
    exit;
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = htmlspecialchars($username);
            header("Location: ../topics/home.php");
            exit;
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No user found with that username.";
    }
    echo "$error_message";
    $stmt->close();
    $conn->close();
}
?>

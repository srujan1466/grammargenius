
<?php
error_reporting(error_level: E_ALL);
ini_set(option: "display_errors", value: 1);

session_start();
include("db.php");

if (isset($_SESSION["user_id"])) {
    header(header: "Location: ../topics/home.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim(string: $_POST["username"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare(query: "SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param(types: "s", var: $username);
    $stmt->execute();

    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->bind_result(var: $id, vars: $hashed_password);
        $stmt->fetch();

        if (password_verify(password: $password, hash: $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = htmlspecialchars(string: $username);
            header(header: "Location: ../topics/home.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }

    $stmt->close();
    $conn->close();
}
?>
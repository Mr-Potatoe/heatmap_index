<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']); // Hash the input password with MD5

    $sql = "SELECT * FROM Admin WHERE username = '$username' AND password_hash = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: ../admin/dashboard.php');
        exit;
    } else {
        // Failed login
        header('Location: ../admin_login.php?error=1');
        exit;
    }
}
?>

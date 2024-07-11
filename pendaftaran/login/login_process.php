<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";


$admin_username = "chiquita";
$admin_password = "admin123"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == $admin_username && $password == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
    } else {
        echo "Username atau password salah!";
    }
}
?>

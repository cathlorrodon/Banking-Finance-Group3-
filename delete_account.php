<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "database_bankfinance";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteAccount"])) {
    $accountNumber = $_POST["account_number"];

    $deleteSql = "DELETE FROM users WHERE accountNumber='$accountNumber'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Account deleted successfully!";
        header("Location: finance.html");
        exit();
    } else {
        echo "Error deleting account: " . $conn->error;
    }
}

$conn->close();
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "database_bankfinance";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM users WHERE id = $user_id";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $contact = $row["contact"];
        $age = $row["age"];
        $accountNumber = $row["account_number"];
    } else {
        echo "User not found";
    }
} else {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

$conn->close();
?>

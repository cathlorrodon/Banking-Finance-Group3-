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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginEmail = $_POST["lemail"];
    $loginPassword = $_POST["lpassword"];

    // Validate the login credentials against the database
    $sql = "SELECT id, name, email, contact, age, accountNumber FROM users WHERE email='$loginEmail' AND password='$loginPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id']; // Save user ID in session
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['contact'] = $row['contact'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['accountNumber'] = $row['accountNumber'];
    
        // Debug: Output session variables
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    
        header("Location: homepage.html");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid email or password. Please try again.";
    }
    
}

$conn->close();
?>

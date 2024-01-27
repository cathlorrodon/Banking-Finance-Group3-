<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $userPassword = $_POST["password"];

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "database_bankfinance";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // $accountNumber = generateUniqueAccountNumber($conn);

    // SQL query to insert user data into the 'users' table
    $sql = "INSERT INTO users (name, age, contact, email, password) 
    VALUES ('$name', '$age', '$contact', '$email', '$userPassword')";


    if ($conn->query($sql) === TRUE) {
        // Signup successful
        echo "Sign Up successful!";

        // Include user_info.php to set session variables
        include("user_info.php");

        // Debug: Output session variables
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    } else {
        // Signup failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// function generateUniqueAccountNumber($conn) {
//     do {
//         // Generate a unique account number using uniqid
//         $accountNumber = uniqid();
//         $query = "SELECT * FROM users WHERE accountNumber = '$accountNumber'";
//         $result = $conn->query($query);
//     } while ($result->num_rows > 0);

//     return $accountNumber;
// }
?>

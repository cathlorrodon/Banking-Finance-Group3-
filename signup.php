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

    $accountNumber = generateUniqueAccountNumber($conn);

    // SQL query to insert user data into the 'users' table
    $sql = "INSERT INTO users (name, age, contact, email, password, accountNumber) 
            VALUES ('$name', '$age', '$contact', '$email', '$userPassword', '$accountNumber')";

    if ($conn->query($sql) === TRUE) {
        // Signup successful
        echo "Sign Up successful!";

        // Include user_info.php to set session variables
        include("user_info.php");

        // Debug: Output session variables
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';

        // Redirect to accountoverview.html
        header("Location: finance.html");
        exit();
    } else {
        // Signup failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function generateUniqueAccountNumber($conn) {
    // Customize the format or length of the account number as needed
    do {
        $accountNumber = rand(1000000000, 9999999999);
        $query = "SELECT * FROM users WHERE accountNumber = '$accountNumber'";
        $result = $conn->query($query);
    } while ($result->num_rows > 0);

    return $accountNumber;
}
?>
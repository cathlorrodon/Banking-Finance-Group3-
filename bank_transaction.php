<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"] ?? "";
    $amount = $_POST["amount"] ?? 0;
    

    // Get the current date and time
    $date = date("Y-m-d H:i:s");


    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "database_bankfinance";
    
    $conn = new mysqli($servername, $username, $password, $database);
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO transaction_history (date, description, amount) 
            VALUES ('$date', '$description', $amount)";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

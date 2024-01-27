<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $billType = $_POST["bill-type"];
    $fullName = $_POST["fullname"];
    $billAmount = $_POST["billAmount"];

    // Assuming the server, username, password, and database name are correct
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "database_bankfinance";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the current date and time
    $currentDateTime = date("Y-m-d H:i:s");

    // Prepare SQL statement to insert data into 'transaction_history' table
    $sql = "INSERT INTO transaction_history (date, description, amount) 
            VALUES ('$currentDateTime', 'Bill Payment - $billType', $billAmount)";

    if ($conn->query($sql) === TRUE) {
        echo "Bill payment saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

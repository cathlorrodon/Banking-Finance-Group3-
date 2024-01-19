<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $description = $_POST["description"];
    $amount = $_POST["amount"];

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "database_bankfinance";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $accountNumber = generateUniqueAccountNumber($conn);
    // SQL query to insert user data into the 'transaction_history' table 
    $sql = "INSERT INTO transaction_history (date, description, amount, accountNumber) 
            VALUES ('$date', '$description', '$amount','$accountNumber')";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function generateUniqueAccountNumber($conn) {
    // Customize the format or length of the account number as needed
    do {
        $accountNumber = rand(1000000000, 9999999999);
        $query = "SELECT * FROM transaction_history WHERE accountNumber = '$accountNumber'";
        $result = $conn->query($query);
    } while ($result->num_rows > 0);

    return $accountNumber;
}
?>

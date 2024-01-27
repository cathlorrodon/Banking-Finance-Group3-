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

$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0;

if ($user_id > 0) {
  $sql = "SELECT * FROM transaction_history WHERE user_id = $user_id";
  $result = $conn->query($sql);

  $data = "Date, Name, Account Number, Description, Amount\n";

  while ($row = $result->fetch_assoc()) {
    $date = $row["date"];
    $name = $row["name"];
    $account = $row["account"];
    $description = $row["description"];
    $amount = $row["amount"];

    $data .= "$date, $name, $account, $description, $amount\n";
  }

 
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename="transaction_history.txt"');

  echo $data;
  exit; 
}

$conn->close();
?>
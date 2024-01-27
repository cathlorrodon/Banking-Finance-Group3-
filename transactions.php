<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
    <title>Bank Finance Transactions</title>
    <link rel="stylesheet" href="styles.css">
</head>

<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Lucida Sans Unicode, sans-serif;
  line-height: 1.6;
  background-color: #ffffff;
}

ul li a:hover {
    color: orange;
}

header {
  background-color: #333;
  color: #ff7b00;
  padding: 20px;
  text-align: center;
}

header h1 {
  margin: 0;
}

nav ul {
  list-style: none;
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

nav ul li a {
  margin-right: 20px;
  text-decoration: none;
  color: #ffffff;
}


main {
  padding: 20px;
}


section {
  margin-bottom: 30px;
  background-color: #ffffff;
  border-radius: 5px;
  padding: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.service-content {
  text-align: center; 
}

.button-container {
  display: flex;
  justify-content: space-between; 
}

button {
 margin-right: 10px;
}

button {
  padding: 10px 20px;
  margin-top: 10px;
  border: none;
  background-color: #ff7b00;
  color: #ffffff;
  cursor: pointer;
  font-weight: bold;
  -webkit-transition-duration: 0.3s; /* Safari */
  transition-duration: 0.3s;
  border-radius: 3px;
}

button:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

button:hover {
  background-color: #000000;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

input[type="text"],
select {
  padding: 8px;
  margin: 5px 0;
  width: 100%;
  box-sizing: border-box;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

table th,
table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

table th {
  background-color: #ff7b00;
}


</style>

<body>
    <header>
        <h1>Bank Finance Transactions</h1>
        <nav>
            <ul>
                <li><a href="homepage.html">Back to Homepage</a></li>
                <li><a href="#payment">Payment Services</a></li>
                <li><a href="#transfer">Fund Transfer</a></li>
                <li><a href="#bill">Bill Payment</a></li>
                <li><a href="currency-converter.html">Currency Converter</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="payment">
            <h2>Payment Services</h2>
            <div class="service-content">
                <p>Choose a Payment Service:</p>
                <button onclick="payWithCreditCard()">Pay with Credit Card</button>
                <button onclick="payWithDebitCard()">Pay with Debit Card</button>
                <button onclick="payWithGcash()">Pay with Gcash</button>
                <button onclick="payWithPaypal()">Pay with Paypal</button>
            </div>
            
        </section>
  <script>
     function payWithCreditCard() {
            //for paying with Credit Card
            alert('Coming Soon. This feature is not available at the moment. Check back another time.');
        }

        function payWithDebitCard() {
            //for paying with Debit Card
            alert('Coming Soon. This feature is not available at the moment. Check back another time.');
        }

        function payWithGcash() {
            //for paying with Gcash
            alert('Coming Soon. This feature is not available at the moment. Check back another time.');
        }

        function payWithPaypal() {
            //for paying with Paypal
            alert('Coming Soon. This feature is not available at the moment. Check back another time.');
        }
  </script>


        
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



$accountNumber = "";
if ($user_id > 0) {
  $sql = "SELECT accountNumber FROM users WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $stmt->bind_result($accountNumber);
  $stmt->fetch();
  $stmt->close();
}




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_transaction"])) {
  $name = $_POST["name"] ?? "";
  $account = $_POST["account"] ?? "";
  $description = $_POST["description"] ?? "";
  $amount = $_POST["amount"] ?? 0;

  $date = date("Y-m-d H:i:s");
  $sql = "INSERT INTO transaction_history (user_id, date, name, account, description, amount) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("issssd", $user_id, $date, $name, $account, $description, $amount);

  if ($stmt->execute()) {
    echo "Transaction added successfully!";
  } else {
    echo "Error adding transaction: " . $stmt->error;
  }

  $stmt->close();
}

function display_TransactionHistory($conn)
{



  $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0;


  if ($user_id > 0) {
    $sql = "SELECT * FROM transaction_history WHERE user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<h2>Transaction History</h2>";
      echo "<table border='1'>";
      echo "<thead><tr><th>Date</th><th>Name</th><th>Account Number</th><th>Description</th><th>Amount</th></tr></thead>";
      echo "<tbody>";

      while ($row = $result->fetch_assoc()) {
        $date = $row["date"];
        $name = $row["name"];
        $account = $row["account"];
        $description = $row["description"];
        $amount = $row["amount"];

        echo "<tr><td>$date</td><td>$name</td><td>$account</td><td>$description</td><td>$amount</td></tr>";
      }

      echo "</tbody></table>";
    } else {
      echo "No transactions found for the current user.";
    }
  } else {
    echo "User not logged in.";
  }
}

$conn->close();
?>

<section id="transfer">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <h2>Fund Transfer</h2>
  <label for="name">Name:</label>
  <input type="text" name="name" required><br>
  <label for="account">Account Number:</label>
  <input type="text" name="account" required><br>
  <input type="hidden" name="description" value="Fund Transfer"><br>
  <label for="amount">Amount:</label>
  <input type="text" name="amount" required><br>
  <button type="submit" name="add_transaction">Transfer Fund</button>
</form>
</section>
<br> <br>

<section id="bill">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <h2>Bills Payment</h2>
  <select id="bill-type" name="description">
    <option hidden>Select the Bill Type</option>
    <option value="Electric Utilities">Electric Utilities</option>
    <option value="Water Utilities">Water Utilities</option>
    <option value="Cable/Internet">Cable/Internet</option>
    <option value="Telecoms">Telecoms</option>
  </select>
  <label for="name">Name:</label>
  <input type="text" name="name" required><br>
  <label for="account">Account Number:</label>
  <input type="text" name="account" value="<?php echo $accountNumber; ?>" readonly><br>
  <label for="account">Amount:</label>
  <input type="text" name="amount" required><br>
  <button type="submit" name="add_transaction">Pay Bills</button>
</form>
</section>

<?php

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
display_TransactionHistory($conn);

$conn->close();
?>
<form action="download_statement.php" method="post">
  <button type="submit" name="download_statement">Download Transaction History</button>
</form>
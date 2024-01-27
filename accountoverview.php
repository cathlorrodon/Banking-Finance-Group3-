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

if (isset($_SESSION['accountNumber'])) {
    $accountNumber = $_SESSION['accountNumber'];

    $sql = "SELECT * FROM users WHERE accountNumber = '$accountNumber'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['name'] = $row["name"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['contact'] = $row["contact"];
        $_SESSION['age'] = $row["age"];
        $_SESSION['balance'] = $row["balance"];
        $_SESSION['accountNumber'] = $row["accountNumber"];
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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BankFinance</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #cdf8f8;
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: #53677c;
            color: #fff;
        }

        h1, h2 {
            text-align: center;
            margin-top: 50px;
            font-size: 50px;
            color: #ff8400;
        }

        nav {
            text-align: center;
            margin: 20px;
        }

        .navbar2 a {
            color: white;
            text-decoration: none;
            margin: 0 5px;
            font-size: 18px;
        }

        .content {
            margin: 0px;
        }

        .content-section {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            margin: 10px;
        }

        .profile-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        button {
            padding: 10px;
            margin: 5px;
            margin-top: 100px;
            background-color: #fda101;
            color: #050505;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 80px;
            margin-bottom: 100px;
        }

        li {
            margin-bottom: 10px;
            margin-top: 20px;
            font-size: 30px;
        }
    </style>
</head>
<body>

    <header>
        <h1>ACCOUNT OVERVIEW</h1>
        <nav class="navbar2">
            <a href="homepage.html">Back to Homepage</a>
        </nav>
    </header>

    <div class="content">
        <div class="content-section">
      <ul>
        <center>
            <li><strong>Name:</strong> <?php echo $_SESSION['name']; ?></li>
            <li><strong>Account Number:</strong> <?php echo $_SESSION['accountNumber']; ?></li>
            <li><strong>Email:</strong> <?php echo $_SESSION['email']; ?></li>
            <li><strong>Contact Number:</strong> <?php echo $_SESSION['contact']; ?></li>
            <li><strong>Age:</strong> <?php echo $_SESSION['age']; ?></li>
            <li><strong>Balance:</strong> <?php echo $_SESSION['balance']; ?></li>
        </center>
      </ul>


            <!-- Add the "Delete Account" button without changing the style -->
            <div class="profile-container" style="text-align: center;">
                <!-- Add onclick event to redirect to delete_account.html -->
                <!-- <button id="deleteAccountBtn" style="padding: 10px; margin: 5px; background-color: #fda101; color: #050505; border: none; border-radius: 5px; cursor: pointer;" onclick="window.location.href='delete_account.html'">Delete Account</button> -->
            </div>
        </div>
    </div>

</body>
</html>
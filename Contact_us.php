<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "database_bankfinance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Values from the form
    $full_name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $investmentType = $_POST["investmentType"];

    
    $sql = "INSERT INTO contact_us (full_name, email, message, investmentType) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $email, $message, $investmentType);


    if ($stmt->execute()) {
        $success_message = "Form is successfully submitted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us-BankFinance</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {

            justify-content: center;
            font-family: Arial, sans-serif;
           background-color: #cdf8f8;
        }

        .top {
            margin: auto;
            width: 50%;
            margin-top: -70px;
        }


        #button {
            
            padding: 10px;
      margin: 5px;
      background-color: #fda101;
      color: #050505;
      border: none;
      border-radius: 5px;
      cursor: pointer;
        }

        .button:active {
            transform: scale(0.06);
        }

         nav {
  color: white;
  text-decoration: solid;
  text-align: center;
  margin: 20px;
  font-family: Arial, sans-serif;
  font-size: 20px;
  font-weight: bold;
  
  }

  nav a {
  color: white;
  text-decoration: none;
  border: 2px solid #000;
  padding: 10px;
  border-radius: 10px;
  background-color: #2b323a;
  }
   .navbar2 a {
      color: white;
      text-decoration: none;
      margin: 0px;
      font-size: 20px;
      border: none;
      background-color: transparent;
    }

     header {
      text-align: center;
      padding: 20px;
      background-color: #53677c;
      color: #fff;
    }

    h1 {
      color: #ff8400;
      margin-top: 30px;
      margin-bottom: 50px;
      font-size: 50px;
    }

    h2 {
      color: #ff8400;
    }

        #Input {
        height: 35px;
        width: 600px;
}
    </style>
</head>

<body>
    <header>
        <h1>Investment</h1>
    
        <nav class="navbar2">
            <a href="Investment.html">Back</a>

        </nav>
    
    </header>

    <div class="top">
        <br><br><br><br><br><br><br>
        <h2 style="text-align: center; font-size: 50px;"> Contact Us
        </h2> <br><br><br><br>

        <?php
        if (isset($success_message)) {
        echo "<script>alert('$success_message');</script>";
        } elseif (isset($error_message)) {
        echo "<p>$error_message</p>";
        }
        ?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="">Full Name: </label> <br> 
            <input type="text" name="name" id="Input" size="50" >
            <br> <br>
            <label for="">Email:  </label> <br>
            <input type="text" name="email" id="Input" required>
            <br>
            <br>
            <label for="">Message:  </label> <br><br>
            
            <textarea name="message" id="" cols="84" rows="10"></textarea>
            <br><br>

            <label for="investmentType">Select Investment Type:</label>
            <select id="investmentType" name="investmentType" required>
            <option value="education">Educational Planning</option>
            <option value="stocks">Stocks</option>
            </select>
            <br><br>

            <input type="submit" id="button" value="Submit">
            <br>
            
        </form>
        
        
    </div>



</body>

</html>
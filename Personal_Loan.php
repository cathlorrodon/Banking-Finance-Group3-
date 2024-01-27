<?php
require 'db_connection.php';

if(isset($_POST["submit"])){
    $name =$_POST["full_name"];
    $email =$_POST["email"];
    $phone =$_POST["phone"];
    $address =$_POST["address"];
    $city =$_POST["city"];
    $state =$_POST["state"];
    $zip =$_POST["zip"];
    $amount =$_POST["loan_amount"];
    $term =$_POST["loan_term"];
    $status =$_POST["employment_status"];

    $query = "INSERT INTO auto_loan VALUES('', '$name', '$email', '$phone', '$address', '$city ', '$state', '$zip', '$amount', '$term', ' $status' )";
    mysqli_query($conn, $query);
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            
        }

        body {

            justify-content: center;
            font-family: Arial, sans-serif;
           background-color: #cdf8f8;
        }

        .top {
            margin: auto;
            width: 50%;
        }


        .button {
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
      margin: 0 5px;
      font-size: 30px;
      border: none;
      background-color: transparent;
    }

     header {
      text-align: center;
      padding: 20px;
      background-color: #53677c;
      color: #fff;
    }
    .one {
      color: orange;
    } 

    form {
      max-width: 600px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }
        
    </style>
</head>

<body>
<header>

    <h1 class="one">Loans</h1>

    <nav class="navbar2">
        <a href="finance.html">Home</a>
        <a href="about.html">About</a>
        <a href="services.html">Services</a>
        <a href="user_dashboard.html">User Dashboard</a>
        <a href="support.html">Support</a>
    </nav>


</header>
    <div class="top">
        <h3 style="text-align: center;"><u>Personal Loans</u></h3>
        <br><br>
        <h1 style="text-align: center;"> Consolidate debt, finance a home remodeling, pay for a wedding, and much more.</h1>
        <br><br><br><br>
        <p> If you need cash without the rates and terms often associated with a credit card, a personal loan from Banking & Finance
        might be the answer.
        <br><br>
        After a brief credit check, we may provide you with a lump sum to use as you see fit. Payment terms, interest rates, and
        amortization are all competitively flexible. </p>
            <br><br>
        <h1> How Can a Personal Loan Help You? </h1><br><br>
        <p>A personal loan can help you achieve your goals such as lowering debt or making a larger purchase. You can do just about
        anything with a personal loan.</p><br><br>

        <h1>Why Get a Personal Loan from Banking & Finance</h1><br><br>
        <p>When you get a personal loan from Banking & Finance you get the money you need for whatever you need in 24 hours or less.</p>
        <br><br>
        <h1>Personal Loans Offer:</h1>
        <br><br>
        <ul>
            <li>Competitive rates</li>
            <li>Convenient terms</li>
            <li>Quick, Local decisions</li>
        </ul>
        <br><br>
        <h1>Apply For a Personal Loan</h1><br><br>
        <p>Apply online or come in and tell us exactly what you need.</p>

        <p>Questions about personal loans? Contact us or visit one of our convenient locations in Binan Laguna,  to talk with a lender. We have 2 convenient locations in San Pedro & Santa Rosa.</p>
         <br><br>
        
    </div>


    <form action="">
        
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
    
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
    
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
    
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>
    
        <label for="zip">ZIP Code:</label>
        <input type="text" id="zip" name="zip" required>
    
        <label for="loan_amount">Loan Amount:</label>
        <input type="number" id="loan_amount" name="loan_amount" required>
    
        <label for="loan_term">Loan Term (months):</label>
        <input type="number" id="loan_term" name="loan_term" required>
        
        <label for="employment_status">Employment Status:</label>
        <select id="employment_status" name="employment_status" required>
            <option value="employed">Employed</option>
            <option value="self_employed">Self-Employed</option>
            <option value="unemployed">Unemployed</option>
        </select>
    
        <button type="submit" name="submit" class="button">Submit Application</button>
    </form>
    


</body>

</html>
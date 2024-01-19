<?php
require 'db_connection.php';

if(isset($_POST["submit"])){
    $name =$_POST["full_name"];
    $email =$_POST["email"];
    $phone =$_POST["phone"];
    $vehicle_type =$_POST["vehicle_type"];
    $vehicle_make =$_POST["vehicle_make"];
    $model =$_POST["vehicle_model"];
    $year =$_POST["vehicle_year"];
    $amount =$_POST["loan_amount"];
    $term =$_POST["loan_term"];
    $status =$_POST["employment_status"];

    $query = "INSERT INTO auto_loan VALUES('', '$name', '$email', '$phone', '$vehicle_type', '$vehicle_make', '$model', '$year', '$amount', '$term', ' $status' )";
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
        <h3 style="text-align: center;"><u>AUTO & RECREATIONAL VEHICLE LOANS</u></h3>
        <br><br>
        <h1 style="text-align: center;"> Purchase a car, a new boat, or any other recreational vehicle.
        </h1>
        <br><br><br><br>
        <h1>Whether you’re making a purchase from a dealership or a private party, talk to Banking & Finance about your auto loan.</h1>
        <br><br>
        <h1> What Does a Vehicle Loan Cover? </h1><br><br>
        <p>If you’re looking for car loans, boat loans, or RV loans in Central and Western Kentucky or Southern Indiana, you’ve
        come to the right place. Vehicle loan is an umbrella term that covers those types of vehicles and watercraft. A vehicle
        loan also covers:</p><br><br>

        <ul>
            <li>Motorcycles</li>
            <li>New or used cars, trucks, and SUVs</li>
            <li>Boats of all sizes and types</li>
            <li>Side-by-sides</li>
            <li>Jet skis</li>
            <li>ATVs</li>
            <li>Private airplanes</li>
        </ul>

        <br><br>

        <h1>Why Get A Vehicle Loan With Field And Main</h1><br><br>
        <p>Field and Main auto loans have competitive interest rates, flexible loan lengths, and easy payment tools. We’ll make
        quick decisions so you can enjoy the freedom of cruising the open road (or water).</p>
        <br>
        <p><b>Banking & Finance offers auto, boat, and recreational vehicle loans with:</b></p>
        <br>
        <ul>
            <li>Competitive rates.</li>
            <li>Convenient terms.</li>
            <li>Options to view and pay online.</li>
            <li>Credit, life and disability insurance available for your protection.</li>
            <li>Quick, local decisions</li>
        </ul>
        <br><br>
        
        <h1>Apply For A Vehicle Loan</h1><br><br>
        <p>When you apply for a vehicle loan with Banking & Finance, you get the money you need for your car or recreational vehicle in
        24 hours or less.</p>
        <br>

        <p>Questions about vehicle loans? Contact us or visit one of our convenient locations in Binan Laguna, to talk
            with a lender. We have 2 convenient locations in San Pedro & Santa Rosa.</p>
        <br><br>
        
    </div>


    <br>

<form action="" method="post">

    <label for="full_name">Full Name:</label>
    <input type="text" id="full_name" name="full_name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" required>

    <label for="vehicle_type">Vehicle Type:</label>
    <select id="vehicle_type" name="vehicle_type" required>
        <option value="auto">Auto</option>
        <option value="motorcycle">Motorcycle</option>
        <option value="RV">Recreational Vehicle (RV)</option>
    </select>

    <label for="vehicle_make">Vehicle Make:</label>
    <input type="text" id="vehicle_make" name="vehicle_make" required>

    <label for="vehicle_model">Vehicle Model:</label>
    <input type="text" id="vehicle_model" name="vehicle_model" required>

    <label for="vehicle_year">Vehicle Year:</label>
    <input type="number" id="vehicle_year" name="vehicle_year" required>

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

    <button type="submit" name="submit" class="button" >Submit Application</button>
</form>

</body>

</html>
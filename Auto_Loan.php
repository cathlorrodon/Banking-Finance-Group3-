<?php
 $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "database_bankfinance";

    $conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $vehicleType = $_POST["vehicleType"];
    $vehicleMake = $_POST["vehicleMake"];
    $model = $_POST["model"];
    $year = $_POST["year"];
    $amount = $_POST["amount"];
    $term = $_POST["term"];
    $status = $_POST["status"];

    $sql = "INSERT INTO auto_loan (fullName, email, phone, vehicleType, vehicleMake, model, year, 
            amount, term, status) 
            VALUES ('$fullName', '$email', '$phone', '$vehicleType', '$vehicleMake', '$model', '$year', 
            '$amount', '$term', '$status')";

if ($conn->query($sql) === TRUE) {
    echo '<div style="text-align: center; padding: 20px; background-color: #5f7ea1; border-radius: 10px; font-family: Arial, sans-serif; font-size: 20px;">';
    echo '<h2 style="color: #ff8400; font-family: "Arial", sans-serif;">AUTO AND RECREATIONAL LOAN APPLICATION SUBMITTED SUCCESSFULLY!</h2>';
    echo '<p style="color: #333; font-family: "Arial", sans-serif;">Thank you for choosing us!</p>';
    echo '<a href="Loans.html" style="text-decoration: none;">';
    echo '<button style="padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Back to Loan Services</button>';
    echo '</a>';
    echo '</div>';
} else {
    echo '<div style="text-align: center; padding: 20px; background-color: #f8d7da; border-radius: 10px; font-family: Arial, sans-serif; font-size: 20px;">';
    echo '<h2 style="color: #721c24; font-family: "Arial", sans-serif;">Error submitting the application.</h2>';
    echo '<p style="color: #721c24;" font-family: "Arial", sans-serif;">Please try again or contact support.</p>';
    echo '<a href="finance.html" style="text-decoration: none;">';
    echo '<button style="padding: 10px; background-color: #721c24; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Back to Homepage</button>';
    echo '</a>';
    echo '</div>';
}
}
$conn->close();
?>


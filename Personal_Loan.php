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
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $loanAmount = $_POST["loanAmount"];
    $loanTerm = $_POST["loanTerm"];
    $employmentStatus = $_POST["employmentStatus"];

    $sql = "INSERT INTO personal_loan (fullName, email, phone, address, city, state, zip, 
            loanAmount, loanTerm, employmentStatus) 
            VALUES ('$fullName', '$email', '$phone', '$address', '$city', '$state',
                    '$zip', '$loanAmount', '$loanTerm', '$employmentStatus')";

if ($conn->query($sql) === TRUE) {
    echo '<div style="text-align: center; padding: 20px; background-color: #5f7ea1; border-radius: 10px; font-family: Arial, sans-serif; font-size: 20px;">';
    echo '<h2 style="color: #ff8400; font-family: "Arial", sans-serif;">PERSONAL LOAN APPLICATION SUBMITTED SUCCESSFULLY!</h2>';
    echo '<p style="color: #333; font-family: "Arial", sans-serif;">Thank you for choosing us!</p>';
    echo '<a href="Loans.html" style="text-decoration: none;">';
    echo '<button style="padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Back to Loan Service</button>';
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



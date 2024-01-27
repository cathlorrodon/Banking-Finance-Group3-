<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "database_bankfinance";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $maritalStatus = $_POST["maritalstatus"];
    $address = $_POST["address"];
    $phoneNumber = $_POST["phonenumber"];
    $emailAddress = $_POST["emailad"];
    $typesOfDwelling = $_POST["typesofdwelling"];
    $ageOfHome = $_POST["ageofhome"];
    $propertyAddress = $_POST["propertyad"];
    $typesOfInsurance = $_POST["typesofinsurance"];
    $policyLength = $_POST["policylength"];
    $coverageAmount = $_POST["coverageAmount"];
    $beneficiary = $_POST["beneficiary"];

    $sql = "INSERT INTO homeinsurance_services (fullName, dob, gender, maritalstatus, address, phonenumber, emailad, 
            typesofdwelling, ageofhome, propertyad, typesofinsurance, policylength, coverageAmount, beneficiary) 
            VALUES ('$fullName', '$dob', '$gender', '$maritalStatus', '$address', '$phoneNumber', '$emailAddress',
                    '$typesOfDwelling', '$ageOfHome', '$propertyAddress', '$typesOfInsurance', '$policyLength', '$coverageAmount', '$beneficiary')";

    if ($conn->query($sql) === TRUE) {
        echo '<div style="text-align: center; padding: 20px; background-color: #5f7ea1; border-radius: 10px; font-family: Arial, sans-serif; font-size: 20px;">';
        echo '<h2 style="color: #ff8400; font-family: "Arial", sans-serif;">HOME INSURANCE APPLICATION SUBMITTED SUCCESSFULLY!</h2>';
        echo '<p style="color: #333; font-family: "Arial", sans-serif;">Thank you for choosing us!</p>';
        echo '<a href="insuranceservices.html" style="text-decoration: none;">';
        echo '<button style="padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Back to Insurance Services</button>';
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



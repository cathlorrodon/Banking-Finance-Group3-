<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $maritalStatus = $_POST["maritalstatus"];
    $address = $_POST["address"];
    $phoneNumber = $_POST["phonenumber"];
    $emailAddress = $_POST["emailad"];
    $licenseNumber = $_POST["license"];
    $dateOfIssuance = $_POST["doi"];
    $modelAndYear = $_POST["mmy"];
    $vehicleIdentificationNumber = $_POST["vin"];
    $typesOfInsurance = $_POST["typesofinsurance"];
    $policyLength = $_POST["policylength"];
    $coverageAmount = $_POST["coverageAmount"];
    $beneficiary = $_POST["beneficiary"];

    $sql = "INSERT INTO autoinsurance_services (fullName, dob, gender, maritalstatus, address, phonenumber, emailad, 
            license, doi, mmy, vin, typesofinsurance, policylength, coverageAmount, beneficiary) 
            VALUES ('$fullName', '$dob', '$gender', '$maritalStatus', '$address', '$phoneNumber', '$emailAddress',
                    '$licenseNumber', '$dateOfIssuance', '$modelAndYear', '$vehicleIdentificationNumber', 
                    '$typesOfInsurance', '$policyLength', '$coverageAmount', '$beneficiary')";

if ($conn->query($sql) === TRUE) {
    echo '<div style="text-align: center; padding: 20px; background-color: #5f7ea1; border-radius: 10px; font-family: Arial, sans-serif; font-size: 20px;">';
    echo '<h2 style="color: #ff8400; font-family: "Arial", sans-serif;">AUTO INSURANCE APPLICATION SUBMITTED SUCCESSFULLY!</h2>';
    echo '<p style="color: #333; font-family: "Arial", sans-serif;">Thank you for choosing us!</p>';
    echo '<a href="lifeinsurance.html" style="text-decoration: none;">';
    echo '<button style="padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Back to Life Insurance Form</button>';
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
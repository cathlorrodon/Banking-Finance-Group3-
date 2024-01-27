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

if (isset($_POST['accountNumber']) && $_POST['accountNumber'] != '') {
    $updateField = '';

    // Check which button was clicked
    if (isset($_POST['editNameBtn'])) {
        $updateField = "`name`='" . $_POST['editName'] . "'";
    } elseif (isset($_POST['changeEmailBtn'])) {
        $updateField = "`email`='" . $_POST['changeEmail'] . "'";
    } elseif (isset($_POST['changeContactBtn'])) {
        $updateField = "`contact`='" . $_POST['changeContact'] . "'";
    } elseif (isset($_POST['changeAgeBtn'])) {
        $updateField = "`age`='" . $_POST['changeAge'] . "'";
    } elseif (isset($_POST['changePasswordBtn'])) {
        $updateField = "`password`='" . $_POST['changePassword'] . "'";
    }

    if (!empty($updateField)) {
        $sql = "UPDATE users SET $updateField WHERE `accountNumber`='" . $_POST['accountNumber'] . "'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>alert("Personal Information Updated");</script>';
            header("Location: finance.html");
            exit();
        } else {
            echo "<br>Update failed: " . mysqli_error($conn);
        }
    } else {
        echo "<br>No fields to update";
    }
}

$conn->close();
?>

<?php
/*---------------------------------------------------------------------------------------------------------------------
File: registerFormHandler.php
Written by: Jorge Siverio 2024
Description: This script is responsible for handling the registration form functionality.
---------------------------------------------------------------------------------------------------------------------*/
//DB connection
require '../Include/DBSetup.php';

//Grabbing the data from the form
$name = trim($_POST['firstname']);
$name = strtolower($name);
$lastname = trim($_POST['lastname']);
$lastname = strtolower($lastname);
$badge = trim($_POST['badge']);
$agency = trim($_POST['agency']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$email = strtolower($email);
$password = trim($_POST['password']);

//Server side validation
if (empty($name) || empty($lastname) || empty($badge) || empty($agency) || empty($phone) || empty($email) || empty($password)) {
    echo "Please fill in all the fields";
    exit();
}
if ($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email";
        exit();
    }
}

//Hashing the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//Checking  if the email is already in the database
$sql = "SELECT email FROM users WHERE email = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL Error";
} else {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
        echo "Email already exists";
        exit();
    } else {
        //Inserting the data into the database
        $sql = "INSERT INTO users (name, last_name, badge, phone_number, email, password, user_type, user_status, agency) VALUES (?, ?, ?, ?, ?, ?,2,2,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        } else {
            mysqli_stmt_bind_param($stmt, "ssssssi", $name, $lastname, $badge, $phone, $email, $hashed_password,$agency);
            mysqli_stmt_execute($stmt);
            header("Location: ../../registration_.php");
        }
    }
}
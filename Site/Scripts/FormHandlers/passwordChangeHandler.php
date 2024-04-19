<?php
session_start();
/*---------------------------------------------------------------------------------------------------------------------
File: passwordChangeHandler.php
Written by: Jorge Siverio 2024
Description: This script is responsible for handling the user password change functionality.
---------------------------------------------------------------------------------------------------------------------*/
require '../Include/DBSetup.php';

$oldPassword = $_POST['oldPassword'];
$oldPassword = trim($oldPassword);
$newPassword = $_POST['newPassword'];
$newPassword = trim($newPassword);
$confirmPassword = $_POST['confirmPassword'];
$confirmPassword = trim($confirmPassword);

//Error handling
if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
    header("Location: ../../adminPasswordChange.php?error=All fields are required");
    exit();
}
if ($newPassword !== $confirmPassword) {
    header("Location: ../../adminPasswordChange.php?error=Passwords do not match");
    exit();
}

//Check if old password is correct
$sqlQuery = "SELECT password FROM users WHERE users_id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
    header("Location: ../../adminPasswordChange.php?error=SQL Error");
    exit();
}
mysqli_stmt_bind_param($stmt, "i", $_SESSION['users_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $passwordCheck = password_verify($oldPassword, $row['password']);
    if ($passwordCheck === false) {
        header("Location: ../../adminPasswordChange.php?error=Incorrect password");
        exit();
    } else if ($passwordCheck === true) {
        //Update password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sqlQuery = "UPDATE users SET password = ? WHERE users_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            header("Location: ../../adminPasswordChange.php?error=SQL Error");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $_SESSION['users_id']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../../adminPasswordChange.php?success=Password changed successfully");
        exit();
    }
} 
else {
    header("Location: ../../adminPasswordChange.php?error=Incorrect password");
    exit();
}
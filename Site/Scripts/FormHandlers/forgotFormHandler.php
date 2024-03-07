<?php
if(!isset($_POST['email'])){
    header("Location: ../../forgot.php");
    exit();
}

require '../Include/DBSetup.php';
require '../Classes/TokenClass.php';

$email = trim($_POST['email']);
$email = strtolower($email);

if(empty($email)){
    header("Location: ../../forgot.php?error=".rawurlencode('Please enter an email address.'));
    exit();
}


$sql = "SELECT users_ID  FROM users WHERE email = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../../forgot.php?error=".rawurlencode('There was an error Processing your request. Please try again.'));
    exit();
}
else{
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        $token = new Token();
        $token->addTokenToDB($row['users_ID']);
        $token->sendToken($email,$row['users_ID']);
        header("Location: ../../forgot_.php");
        exit();
    }
    else{
        //This is a security measure to prevent attackers from knowing if an email exists in the database.
        header("Location: ../../forgot_.php");
    }
}
        



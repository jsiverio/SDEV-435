<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$password = trim($_POST['password']);
$password2 = trim($_POST['password2']);
$token = trim($_POST['token']);
$userId = trim($_POST['uid']);

resetPassword($password, $token, $userId);

}
else { 
    header('Location: ../../index.php');
}

//Update the user's password
function resetPassword($password, $token, $userId){
    //serverSideValidation();
    require_once '../Include/DBSetup.php';
    if(tokenIsVerified($token, $userId)){
        $sql = "UPDATE users SET password = ? WHERE users_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../../forgot.php?error=".rawurlencode('There was an error Processing your request. Please try again.'));
            exit();
        }
        else{
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $userId);
            if(mysqli_stmt_execute($stmt)){
                $sql = "DELETE FROM tokens WHERE users_id = ?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../../forgot.php?error=".rawurlencode('There was an error Processing your request. Please try again.'));
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "i", $userId);
                    if(mysqli_stmt_execute($stmt)){
                        header("Location: ../../index.php?success=".rawurlencode('Password reset successful. Please login.'));
                        exit();
                    }
                    else{
                        header("Location: ../../forgot.php?error=".rawurlencode('There was an error Processing your request. Please try again.'));
                        exit();
                    }
                }
            }
            else{
                header("Location: ../../forgot.php?error=".rawurlencode('There was an error Processing your request. Please try again.'));
                exit();
            }
        }
    }
}

//Check if the token is valid
function tokenIsVerified($token, $uid){
    require '../Include/DBSetup.php';
    $sql = "SELECT token, token_exp_date FROM tokens WHERE users_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: /forgot.php?error=".rawurlencode('There was an error Processing your request. Please try again.'));    
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "i", $uid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($rows as $row){  
            //Check the token exist and is not expired  
            if(password_verify($token, $row['token']) && $row['token_exp_date'] >= date("U")){
                return true;
            }
            else{
                return false;
            }             
        }
    }
}

//Server side validation
/*function serverSideValidation(){
    if (empty($password) || empty($password2)) {
        header("Location: ../../reset.php?error=Please fill in all fields");
    exit();
    } else if ($password !== $password2) {
        header("Location: ../../reset.php?error=Passwords do not match");
    exit();
    } else if (strlen($password) < 8) {
        header("Location: ../../reset.php?error=Password must be at least 8 characters long");
    exit();
    } else if (!preg_match('/[A-Z]/', $password)) {
        header("Location: ../../reset.php?error=Password must contain at least one uppercase letter");
        exit();
    } else if (!preg_match('/[a-z]/', $password)) {
        header("Location: ../../reset.php?error=Password must contain at least one lowercase letter");
        exit();
    } else if (!preg_match('/[0-9]/', $password) && !preg_match('/[^A-Za-z0-9]/', $password)) {
        header("Location: ../../reset.php?error=Password must contain at least one special character or number");
        exit();
    }
}*/









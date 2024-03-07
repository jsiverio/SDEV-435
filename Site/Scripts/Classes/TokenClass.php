<?php
// Author: Jorge Siverio
// 2024
// POLARIS RMS
// Token Class
// The class is used to generate a token and store it in the database. The token is used to reset the user's password.

class Token {
    
    //Properties
    private $token;
    private $hashedToken;
    private $expirationDate;
    
    //Constructor generates a random 64 bytes token when object is created.
    function __construct() {
        $this->token = bin2hex(random_bytes(64));
        $this->hashedToken = password_hash($this->token, PASSWORD_DEFAULT);
        $this->expirationDate = date("U") + 1800; // Token expires in 30 minutes
    }

    //Methods
    //Method to add the token to the database and returns true if successful.
    public function addTokenToDB($userID) {
        require '../Include/DBSetup.php';
        $sql = "INSERT INTO tokens (users_id, token, token_exp_date) VALUES (?,'" . $this->hashedToken . "','".$this->expirationDate ."')";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ". $_SERVER['DOCUMENT_ROOT'] . "forgot.php?error=".rawurlencode('There was an error Processing your request. Please try again.'));    
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "i", $userID);
            if(mysqli_stmt_execute($stmt)){
                return true;
            }
            else{
                return false;
            }
        }
    }
    public function sendToken($email,$userID){
        $to = $email;
        $subject = "Password Reset";
        $message = "You are receiving this email because you requested a password reset. Please click the link below to reset your password. If you did not request a password reset, please ignore this email. \n\n";
        $message .= "This link will expire in 30 minutes. \n\n";
        $message .= "http://localhost/reset.php?token=" . $this->token."&uid=".$userID;
        $headers = "From: polarisdrms@gmail.com";
        mail($to, $subject, $message, $headers);
    }
    
}



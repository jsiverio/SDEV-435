<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require '../Include/DBSetup.php';

    $email = trim($_POST['email']);
    $email = strtolower($email);
    $password = $_POST['password'];
    
    logIn($conn, $email, $password);
}
else{
    header('Location: ../../index.php');
} 
    function logIn($conn, $email, $password){
        $sqlQuery = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            header('Location: ../../index.php?error=SQL%20Error');
        }
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_assoc($result);
        }
        //Lock the user out if they have entered the wrong password 5 times
        if($rows['wrong_pwd_count'] >= 5){  
            $sqlQuery = "UPDATE users SET user_status = 3 WHERE email = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
                    echo "SQL Error";
                }
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                header('Location: ../../index.php?error=Account%20Locked.%20Please contact your administrator.');
                die();
            }
        else if($rows['wrong_pwd_count'] < 5) {
                if(password_verify($password, $rows['password'])){
                    session_start();
                    $_SESSION['users_id'] = $rows['users_id'];
                    $_SESSION['firstName'] = $rows['name'];
                    $_SESSION['lastName'] = $rows['last_name'];
                    $_SESSION['badge'] = $rows['badge'];
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $rows['phone_number'];
                    $_SESSION['userType'] = $rows['user_type'];
                    $_SESSION['agency'] = $rows['agency'];
                    
                    // Route user to proper panel based on user type
                    switch($_SESSION['userType']){
                        case 1:
                            header('Location: ../../adminPanel.php');
                            break;
                        case 2:
                            header('Location: ../../investigatorPanel.php');
                            break;
                        case 3:
                            header('Location: ../../examinerPanel.php');
                            break;
                    }    
                }
                else{
                    $sqlQuery = "UPDATE users SET wrong_pwd_count = wrong_pwd_count + 1 WHERE email = ?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
                        echo "SQL Error";
                    }
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    header('Location: ../../index.php?error=Invalid%20Credentials');
                    die();
                }
            }
        }
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

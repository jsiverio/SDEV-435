<?php
/*---------------------------------------------------------------------------------------------------------------------
File: userUpdateAjx.php
Written by: Jorge Siverio 2024
Description: This script is responsible for handling the user update form functionality.
---------------------------------------------------------------------------------------------------------------------*/

require '../Include/DBSetup.php'; 
require '../Classes/User.php';

$user = new User();
if($_POST['role'] == 1){
    $user->updateUser($conn, $_POST['id'], $_POST['name'], $_POST['lastname'], $_POST['badge'], $_POST['phone'], $_POST['email'], $_POST['role'], $_POST['status'], $_POST['agency']);
}
else{
    $user->updateProfile($conn, $_POST['id'], $_POST['name'], $_POST['lastname'], $_POST['badge'], $_POST['phone'], $_POST['email']);
    
}
<?php
/*---------------------------------------------------------------------------------------------------------------------
File: userEditActionAjx.php
Written by: Jorge Siverio 2024
Description: This script is responsible for diplaying the user edit form functionality based in the user status.
---------------------------------------------------------------------------------------------------------------------*/

require '../Include/DBSetup.php';
require '../Classes/User.php';

$user = new User();
$user->setStatus($_POST['status']);

if ($user->getStatus() == 2 || $user->getStatus() == 3){
    $user->unlockUser($conn, $_POST['id']);
}
else if($user->getStatus() == 1){
    $user->suspendUser($conn, $_POST['id']);
}
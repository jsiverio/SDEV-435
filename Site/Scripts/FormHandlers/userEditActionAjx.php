<?php
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



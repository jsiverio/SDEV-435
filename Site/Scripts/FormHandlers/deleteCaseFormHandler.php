<?php
 session_start();
require '../Include/DBSetup.php';
require '../Include/functions.php';
if (!isset($_SESSION['users_id'])){
     header('Location: index.php');
     die();
}
if(deleteCase($conn, $_GET['id'])){
    header('Location: ../../investigatorPanel.php');
}
else{
    header('Location: ../../investigatorPanel.php?error=Error%20Deleting%20Record.');
    exit();
}

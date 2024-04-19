<?php
/*---------------------------------------------------------------------------------------------------------------------
File: completeCaseFormHandler.php
Written by: Jorge Siverio 2024
Description: This script is responsible for setting a case as completed.
---------------------------------------------------------------------------------------------------------------------*/ 

session_start();
if (!isset($_SESSION['users_id'])) {
    header("Location: ../index.php");
    exit();
}
require '../Include/DBSetup.php';
require '../Include/functions.php';

//Grab case ID
$caseID = $_GET['id'];

if($caseID == null){
    exit();
}
else{
    setCaseCompleted($conn,$caseID);
    header("Location: ../../examinerPanel.php");
}
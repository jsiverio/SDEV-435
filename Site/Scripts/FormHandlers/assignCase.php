<?php
session_start();
if (!isset($_SESSION['users_id'])){
    header('Location: index.php');
    die();
}
require '../Include/functions.php';
require '../Include/DBSetup.php';

$examiner = $_POST['examiner'];
$caseId = $_POST['caseId'];

assignCase($conn, $caseId, $examiner);
return true;

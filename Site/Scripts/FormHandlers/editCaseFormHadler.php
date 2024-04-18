<?php
session_start();
require '../Include/DBSetup.php';
require '../Include/functions.php';
//Case Details
$id = $_POST['caseId'];
$dr = $_POST['dr'];
$authority = $_POST['authority'];
$swNumber = $_POST['swNumber'];
$offense = $_POST['offense'];

//Narrative
$narrative = $_POST['narrative'];

//Evidence
$evidenceId = $_POST['evidenceId'];
$evidenceNumber = $_POST['evidenceNumber'];
$deviceType = $_POST['deviceType'];
$evidenceSize = $_POST['evidenceSize'];
$evidenceNotes = $_POST['evidenceNotes'];
$numberOfEvidenceItems = sizeof($evidenceNumber);


//Update Case
if(updateCase($conn, $id, $dr, $authority, $swNumber, $offense, $narrative)){
    for ($i = 0; $i < $numberOfEvidenceItems; $i++) {
        if(!updateEvidence($conn, $evidenceId[$i], $evidenceNumber[$i], $deviceType[$i], $evidenceSize[$i], $evidenceNotes[$i])){
            header('Location: ../../investigatorCase.php?error=Error%20Updating%20Record.');
            exit();
        }
    }
    header('Location: ../../investigatorCase.php?success=Case%20Updated%20Successfully.');
}
else{
    header('Location: ../../investigatorCase.php?error=Error%20Updating%20Record.');
    exit();
}

<?php
/*---------------------------------------------------------------------------------------------------------------------
File: newCaseFormHandler.php
Written by: Jorge Siverio 2024
Description: This script is responsible for handling the new case form functionality.
---------------------------------------------------------------------------------------------------------------------*/

session_start();
require '../Include/DBSetup.php';
require '../Include/functions.php';

//Case Details
$dr = $_POST['dr'];
$authority = $_POST['authority'];
$swNumber = $_POST['swNumber'];
$offense = $_POST['offense'];

//Narrative
$narrative = $_POST['narrative'];

//Evidence
$evidenceNumber = $_POST['evidenceNumber'];
$deviceType = $_POST['deviceType'];
$evidenceSize = $_POST['evidenceSize'];
$evidenceNotes = $_POST['evidenceNotes'];
$numberOfEvidenceItems = sizeof($evidenceNumber);

// Inserting the new case and getting the case record id to use with the evidence records 
$caseRecordId = insertNewCase($conn, $dr, $_SESSION['users_id'], $authority, $swNumber, $offense, $narrative);

if ($caseRecordId < 0 || $caseRecordId == NULL) {
    header('Location: ../../investigatorNewCase.php?error=An%20Error%20Occurred%20While%20Creating%20The%20Case%20Record.');
    die();
}
else {
    // Inserting the evidence records
for ($i = 0; $i < $numberOfEvidenceItems; $i++) {
    insertNewEvidence($conn,$evidenceNumber[$i], $deviceType[$i], $evidenceSize[$i], $caseRecordId, $evidenceNotes[$i]);
}
header('Location: ../../investigatorNewCase.php?success=New%20Case%20Created%20Successfully.');
}
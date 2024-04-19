<?php
/*---------------------------------------------------------------------------------------------------------------------
File: dbEditFormHandler.php
Written by: Jorge Siverio 2024
Description: This script is responsible for handling the admin panel database edit form functionality.
---------------------------------------------------------------------------------------------------------------------*/
require '../Include/DBSetup.php';

//Add feature
if ($_GET['action'] == 'add') {
    if ($_GET['type'] == 'agency') {
        $agency = $_GET['value'];
        if (empty($agency)) {
            header("Location: ../../adminPanelDB.php?error=Agency name is required");
            exit();
        }
        addAgency($conn, $agency);
    }
    if ($_GET['type'] == 'offense') {
        $offense = $_GET['value'];
        if (empty($offense)) {
            header("Location: ../../adminPanelDB.php?error=Offense name is required");
            exit();
        }
        addOffense($conn, $offense);
    }
    if ($_GET['type'] == 'evidence') {
        $evidence = $_GET['value'];
        if (empty($evidence)) {
            header("Location: ../../adminPanelDB.php?error=Evidence name is required");
            exit();
        }
        addEvidence($conn, $evidence);
    }
}

//Edit feature
if ($_GET['action'] == 'edit') {
    if ($_GET['type'] == 'agency') {
        $id = $_GET['id'];
        $agency = $_GET['value'];
        if (empty($agency)) {
            header("Location: ../../adminPanelDB.php?error=Agency name is required");
            exit();
        }
        editAgency($conn, $id, $agency);
    }
    if ($_GET['type'] == 'offense') {
        $id = $_GET['id'];
        $offense = $_GET['value'];
        if (empty($offense)) {
            header("Location: ../../adminPanelDB.php?error=Offense name is required");
            exit();
        }
        editOffense($conn, $id, $offense);
    }
    if ($_GET['type'] == 'evidence') {
        $id = $_GET['id'];
        $evidence = $_GET['value'];
        if (empty($evidence)) {
            header("Location: ../../adminPanelDB.php?error=Evidence name is required");
            exit();
        }
        editEvidence($conn, $id, $evidence);
    }
}
//Remove feature
if ($_GET['action'] == 'delete') {
    if ($_GET['type'] == 'agency') {
        $id = $_GET['id'];
        deleteAgency($conn, $id);
    }
    if ($_GET['type'] == 'offense') {
        $id = $_GET['id'];
        deleteOffense($conn, $id);
    }
    if ($_GET['type'] == 'evidence') {
        $id = $_GET['id'];
        deleteEvidence($conn, $id);
    }
}

//Backup feature
if ($_GET['action'] == 'backup') {
    backupDB($conn);
}


// Fucntions

// Agency Fucntions
function addAgency($conn, $agency): void
{
    $sqlQuery = "INSERT INTO users_agency_lu (agency) VALUES (?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $agency);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Agency added successfully");
}
function editAgency($conn, $id, $agency): void
{
    $sqlQuery = "UPDATE users_agency_lu SET agency = ? WHERE users_agency_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $agency, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Agency edited successfully");
}
function deleteAgency($conn, $id): void
{
    $sqlQuery = "DELETE FROM users_agency_lu WHERE users_agency_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Agency deleted successfully");
}

// Offense Functions
function addOffense($conn, $offense): void
{
    $sqlQuery = "INSERT INTO cases_offense_lu (offense) VALUES (?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $offense);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Offense added successfully");
}
function editOffense($conn, $id, $offense): void
{
    $sqlQuery = "UPDATE cases_offense_lu SET offense = ? WHERE cases_offense_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $offense, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Offense edited successfully");
}
function deleteOffense($conn, $id): void
{
    $sqlQuery = "DELETE FROM cases_offense_lu WHERE cases_offense_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Offense deleted successfully");
}

// Evidence Functions
function addEvidence($conn, $evidence): void
{
    $sqlQuery = "INSERT INTO evidence_type_lu (type) VALUES (?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $evidence);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Evidence added successfully");
}
function editEvidence($conn, $id, $evidence): void
{
    $sqlQuery = "UPDATE evidence_type_lu SET type = ? WHERE evidence_type_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $evidence, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Evidence edited successfully");
}
function deleteEvidence($conn, $id): void
{
    $sqlQuery = "DELETE FROM evidence_type_lu WHERE evidence_type_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        header("Location: ../../adminPanelDB.php?error=SQL Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../../adminPanelDB.php?success=Evidence deleted successfully");
}

// DB Backup Function

function backupDB($conn): void
{
    $backupFile = 'c:/xampp/htdocs/SDEV/Site/backup/DBBK' . '.sql';
    $command = "c:/xampp/mysql/bin/mysqldump -u root polarisrms > $backupFile";
    exec($command);
    $url = "localhost/SDEV/Site/backup/$backupFile";
    $file_name = basename($url);
    if(file_put_contents($file_name, file_get_contents($url))){
        echo "File downloaded successfully";
    }else{
        echo "File download failed";
    } 
    
}
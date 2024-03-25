<?php
require 'Scripts/Classes/User.php';
require 'Scripts/Include/DBSetup.php';
require 'Scripts/Include/functions.php';

function backupDB($conn): void
{
    $backupFile = '/Site/backup/backup-' . date("Y-m-d-H-i-s") . '.sql';
    $command = "mysqldump --user=root --password=  polarisrms > $backupFile";
    exec($command);
    header("Location: ../../adminPanelDB.php?success=Database backed up successfully");
}

backupDB($conn);

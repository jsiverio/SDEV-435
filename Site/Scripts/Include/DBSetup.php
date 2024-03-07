<?php
/*---------------------------------------------------------------------------------------------------------------------
File:DBconnection.php
Written by: Jorge Siverio 2024
Database connection details.
---------------------------------------------------------------------------------------------------------------------*/
$servername = "localhost";
$username = "root";
$pwd = "";
$dbName = "polarisrms";

$conn = mysqli_connect($servername, $username, $pwd, $dbName);

if (!$conn) {
    die("There was a problem connecting to the database. " . mysqli_connect_error());
}
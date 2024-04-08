<?php
require 'Scripts/Classes/User.php';
require 'Scripts/Include/DBSetup.php';
require 'Scripts/Include/functions.php';


function getEvidenceCount($conn, $case_id){
    $sql = "SELECT COUNT(*) FROM evidence WHERE associated_case=$case_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['COUNT(*)'];
}

echo getEvidenceCount($conn, 138);





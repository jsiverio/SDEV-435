<?php
function encrytpPassword($password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

function checkIfEmailExist($conn,$emailAddressToCheck)
{
    $sqlQuery = "SELECT email FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        echo "SQL Error";
    }
    mysqli_stmt_bind_param($stmt, "s", $emailAddressToCheck);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_stmt_affected_rows($stmt) > 0)
        return true;
    else
        return false;
}
function logIn($conn, $email, $password){
    $sqlQuery = "SELECT users_id, email, password FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        echo "SQL Error";
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0){
        $rows = mysqli_fetch_all($result);
        return $rows;
    }
    else {
        return false;
    }
}
    function addNewUser($conn, $firstName, $lastName, $badge, $email): void
    {
        $sqlQuery = "CALL userADD(?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "Query error";
        }
        mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $badge,$email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);



        //NEW functions
    
    }
    function getAgencies($conn)
    {
        $sqlQuery = "SELECT * FROM users_agency_lu";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result);
            return $rows;
        }
        else {
            return false;
        }
    }
    function getRole($conn)
    {
        $sqlQuery = "SELECT * FROM users_type_lu";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result);
            return $rows;
        }
        else {
            return false;
        }
    }
    function getUserWaitingForApproval($conn){
        $sqlQuery = "CALL get_users_waiting_for_approval();";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result);
        }
        if ($rows[0][0] > 0){
        return true;
        }
            else
        {
            return false;
        }
        
    }
    function getUserAgency($conn, $id){
        $sqlQuery = "SELECT agency FROM users_agency_lu WHERE users_agency_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result);
            return $rows[0][0];
        }
        else {
            return false;
        }

    }
    function getUserStatus($conn, $id){
        $sqlQuery = "SELECT status FROM users_status_lu WHERE users_status_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result);
            return $rows[0][0];
        }
        else {
            return false;
        }

    }
    function getUserType($conn, $id){
        $sqlQuery = "SELECT type FROM users_type_lu WHERE users_type_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result);
            return $rows[0][0];
        }
        else {
            return false;
        }

    }
    function getOffences($conn)
    {
        $sqlQuery = "SELECT * FROM cases_offense_lu";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result);
            return $rows;
        }
        else {
            return false;
        }
    }
    function getEvidence($conn)
    {
        $sqlQuery = "SELECT * FROM evidence_type_lu";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result);
            return $rows;
        }
        else {
            return false;
        }
    }
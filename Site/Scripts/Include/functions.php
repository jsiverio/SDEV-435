<?php
/*---------------------------------------------------------------------------------------------------------------------
File:functions.php
Written by: Jorge Siverio 2024
Misc funtion used to fetch data from the database.
---------------------------------------------------------------------------------------------------------------------*/

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


    }
    function getAuthority($conn)
    {
        $sqlQuery = "SELECT * FROM cases_authority_lu";
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
    function getInvestigatorCases($conn, $id)
    {
        $sqlQuery = "CALL get_all_investigator_cases(?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $rows;
        }
        else {
            return false;
        }
    }
    function getInvestigatorSubmittedCaseNumber($conn, $id)
    {
        $sqlQuery = "CALL get_investigator_submitted_cases(?)";
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
    function getInvestigatorInProgressCaseNumber($conn, $id)
    {
        $sqlQuery = "CALL get_investigator_inProgress_cases(?)";
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
    function getInvestigatorCompletedCasesNumber($conn, $id)
    {
        $sqlQuery = "CALL get_investigator_completed_cases(?)";
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
    function tblValueParse($conn, $type, $value){
        switch ($type) {
            case 'examiner':
                $sqlQuery = "SELECT name, last_name FROM users WHERE users_id = ?";
                break;
            case 'investigator':
                $sqlQuery = "SELECT name, last_name FROM users WHERE users_id = ?";
                break;    
            case 'offense':
                $sqlQuery = "SELECT offense FROM cases_offense_lu WHERE cases_offense_id = ?";
                break;
            case 'status':
                $sqlQuery = "SELECT status FROM case_status_lu WHERE case_status_id = ?";
                break;
            }
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $value);
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
    function insertNewCase($conn, $dr, $owner, $authority, $swNumber, $offense, $narrative){
        $sqlQuery = "SELECT insert_new_case(?,?,?,?,?,?)" ;
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "siisis", $dr, $owner, $authority, $swNumber, $offense, $narrative, );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result);
        mysqli_stmt_close($stmt);
        return $rows[0][0];
    }
    function insertNewEvidence($conn, $evideceNumber, $deviceType, $evidenceSize, $drId, $evidenceNotes){
        $sqlQuery = "CALL insert_evidence(?,?,?,?,?)" ;
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "siiis", $evideceNumber, $deviceType, $evidenceSize, $drId, $evidenceNotes);
        if(mysqli_stmt_execute($stmt)){
            return true;
        }
        else{
            return false;
        }
        mysqli_stmt_close($stmt);
        
    }
    function refreshUser($conn, $id){
        $sqlQuery = "SELECT * FROM users WHERE users_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_assoc($result);
                    $_SESSION['firstName'] = $rows['name'];
                    $_SESSION['lastName'] = $rows['last_name'];
                    $_SESSION['badge'] = $rows['badge'];
                    $_SESSION['email'] = $rows['email'];
                    $_SESSION['phone'] = $rows['phone_number'];
        }
        else {
            return false;
        }
    }
    function getNarrative($conn, $id){
        $sqlQuery = "SELECT narrative FROM cases WHERE cases_id = ?";
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
    function getEvidenceCount($conn, $case_id){
        $sql = "SELECT COUNT(*) FROM evidence WHERE associated_case=$case_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['COUNT(*)'];
    }
    function getEvidenceRecord($conn, $case_id){
        $sql = "SELECT * FROM evidence WHERE associated_case=$case_id";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            return "SQL Error";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $evidence = array();
            while ($row = mysqli_fetch_assoc($result)){
                $evidence[] = $row;
            }
            return $evidence;
        }
    }
    function updateCase($conn, $id, $dr, $authority, $swNumber, $offense, $narrative) {
        $sql = "UPDATE cases SET dr = ?, authority = ?, sw_number = ?, offense = ?, narrative = ? WHERE cases_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        }
        else {
            mysqli_stmt_bind_param($stmt, "sisisi", $dr, $authority, $swNumber, $offense, $narrative, $id);
            mysqli_stmt_execute($stmt);
            return true;
            
        }
    }
    function updateEvidence($conn, $id, $evidenceNumber, $deviceType, $evidenceSize, $evidenceNotes) {
        $sql = "UPDATE evidence SET evidence_number = ?, evidence_type = ?, storage_size = ?, notes = ? WHERE evidence_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            return false;   
        }
        else {
            mysqli_stmt_bind_param($stmt, "siisi", $evidenceNumber, $deviceType, $evidenceSize, $evidenceNotes, $id);
            mysqli_stmt_execute($stmt);
            return true;
        }
    
    }
    function deleteCase($conn, $id) {
        $sql = "CALL delete_Case(?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        }
        else {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            return true;
        }
    }
    function getExaminerAssignedCasesCount($conn, $id){
        $sqlQuery = "CALL get_examiner_cases_count(?)";
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
    function getExaminersInProgressCasesCount($conn, $id){
        $sqlQuery = "CALL get_examiner_inProgress_cases_count(?)";
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
    function getExaminerCompletedCasesCount($conn, $id)
    {
        $sqlQuery = "CALL get_examiner_completed_cases_count(?)";
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
    function getExaminerAssignedCases($conn, $id)
    {
        $sqlQuery = "CALL get_examiner_cases(?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $rows;
        }
        else {
            return false;
        }
    }
    function getAllAssignedCasesCount($conn){
        $sqlQuery = "SELECT COUNT(*) FROM cases WHERE status = 4";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result);
        return $rows[0][0];
    }
    function getAllInProgressCasesCount($conn){
        $sqlQuery = "SELECT COUNT(*) FROM cases WHERE status = 2";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result);
        return $rows[0][0];
    }
    function getAllCompletedCasesCount($conn){
        $sqlQuery = "SELECT COUNT(*) FROM cases WHERE status = 3";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result);
        return $rows[0][0];
    }
    function getAllCases($conn){
        $sqlQuery = "CALL get_all_cases()";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }
    function getExaminers($conn){
        $sqlQuery = "SELECT users_id, name, last_name FROM users WHERE user_type = 3";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }
    function assignCase($conn, $case_id, $examiner_id){
        $sqlQuery = "UPDATE cases SET examiner = ?, status = 4 WHERE cases_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "ii", $examiner_id, $case_id);
        if(mysqli_stmt_execute($stmt)){
            return true;
        }
        else{
            return false;
        }
        mysqli_stmt_close($stmt);
    }
    function setCaseInProgress($conn, $id){
        $sql = "UPDATE cases SET in_progress_date = NOW(), status = 2 WHERE cases_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            return true;   
            exit();
        }
    }
    function setCaseCompleted($conn, $id){
        $sql = "UPDATE cases SET completed_date = NOW(), status = 3 WHERE cases_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            return true;   
            exit();
        }
    }   
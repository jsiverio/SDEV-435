<?php
/*---------------------------------------------------------------------------------------------------------------------
File: pagination.php
Written by: Jorge Siverio 2024
This script is responsible for handling pagination functionality.
It retrieves the total number of rows from the 'users' table,
calculates the number of pages based on the rows per page,
and provides a function to fetch a subset of users based on the start and rows per page values.
---------------------------------------------------------------------------------------------------------------------*/

$start = 0;
$rowsPerPage = 3;
$totalRows = 0;

require 'Scripts/Include/DBSetup.php';

// Retrieve the total number of rows from the 'users' table
$sql = 'SELECT COUNT(*) FROM users';
$smt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($smt, $sql)) {
    header("Location: adminPanelUsers.php?error=" . rawurlencode('There was an error Processing your request. Please try again.'));
    exit();
} else {
    mysqli_stmt_execute($smt);
    $result = mysqli_stmt_get_result($smt);
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['COUNT(*)'] - 1;
}

// Calculate the number of pages based on the rows per page
$pages = ceil($totalRows / $rowsPerPage);

if (isset($_GET['page'])) {
    $page = $_GET['page'] - 1;
    $start = $page * $rowsPerPage;
}

/**
 * Retrieves a subset of users from the 'users' table based on the start and rows per page values.
 *
 * @param int $start The starting index of the subset.
 * @param int $rowsPerPage The number of rows to retrieve per page.
 * @return mysqli_result|bool The result set of the query or false on failure.
 */
function getUsers($start, $rowsPerPage, $id)
{
    require 'Scripts/Include/DBSetup.php';
    $sql = 'CALL get_all_users(?,?,?)';
    $smt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($smt, $sql)) {
        header("Location: adminPanelUsers.php?error=" . rawurlencode('There was an error Processing your request. Please try again.'));
        exit();
    } else {
        mysqli_stmt_bind_param($smt, "iii", $start, $rowsPerPage, $id);
        mysqli_stmt_execute($smt);
        $result = mysqli_stmt_get_result($smt);
        return $result;
    }
}
?>
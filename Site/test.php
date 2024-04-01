<?php
require 'Scripts/Classes/User.php';
require 'Scripts/Include/DBSetup.php';
require 'Scripts/Include/functions.php';

$cases = getInvestigatorCases($conn, 4 /*$_SESSION['users_id']*/);

var_dump( $cases);






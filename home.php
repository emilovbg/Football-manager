<?php
include('includes/dbconn.php');
include('functions/mainFunctions.php');

$userId = loginCheck($cookie, $link);

include('header.php');
include('forms/menu.php');
$user = getUser($userId, $link);
$userTeam = getTeam($user["u_id"], $link);
include('footer.php');
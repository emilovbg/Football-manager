<?php
include('includes/dbconn.php');
include('functions/mainFunctions.php');

loginCheck($cookie, $link);
include('header.php');
include('forms/menu.php');
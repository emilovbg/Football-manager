<?php
include('includes/dbconn.php');
include('functions/mainFunctions.php');


include('header.php');
include('forms/menu.php');
$userId = loginCheck($cookie, $link);
$user = getUser($userId, $link);
$getPlayers = mysqli_query($link, "SELECT * FROM player where pl_team=$user[4] ORDER by pl_number ASC LIMIT 11")
or die(mysqli_error($link));
?>
 <div class="content">
<div class="title">ОТБОР</div>
     <?php while($resPlayers = mysqli_fetch_array($getPlayers)){
		 
		 echo "<br> $resPlayers[pl_number] $resPlayers[pl_name] $resPlayers[pl_vorname] $resPlayers[pl_position]";
	 }
	 ?>
	 </div>
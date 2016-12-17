<?php
include('includes/dbconn.php');
include('functions/mainFunctions.php');
include('header.php');
$getData = mysqli_query($link, "SELECT * FROM changes LIMIT 5") 
or die(mysqli_error($link));
while($chg_result = mysqli_fetch_array($getData)) {
	echo "<br>".date('d/m/Y - H:i:s', $chg_result['chg_date']);
	echo "<br>$chg_result[chg_title]";
	echo "<br>$chg_result[chg_text]";
	echo "<br>-----------------------";
}
include('footer.php');
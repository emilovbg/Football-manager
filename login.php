<?php
include('includes/dbconn.php');

$username = $_POST['username'];
if (!preg_match("/^[a-zA-Z]*$/",$username)) {
		header("Location: $url_logget");
  }
$password = md5($_POST['password']);
$url_notlogget = "index.php";
$url_logget = "home.php";

$cookie_expiring = time() + 3600;
$randsum = rand(1, 1000000);
$cookievalue = md5($logintime + $randsum);
$loginQuery = mysqli_query($link, "SELECT u_id, u_password 
									FROM user 
									WHERE u_username='$username' 
									LIMIT 1")
                or die(mysqli_error());
$loginResult = mysqli_fetch_array($loginQuery);
if($loginResult['u_password'] == $password) {
$userId = $loginResult['u_id'];


mysqli_query($link, "INSERT INTO cookie (c_name, c_userid, c_expiring) 
					 VALUES ('$cookievalue', '$userId', '$cookie_expiring')")
            or die(mysqli_error()); 


header("Location: $url_logget");
setcookie("ManarcheGoldcup", $cookievalue);



}
else {
header("Location: $url_notlogget");
}
//TO DO
// 1) Да се обезопаси $username
?>
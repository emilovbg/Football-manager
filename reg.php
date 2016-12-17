<?php
include('includes/dbconn.php');
//БРОЯЧ НА ГРЕШКИТЕ
$error_count = 0;
$username = $_POST["username"];
$email = $_POST["email"];
//Дата на регистрация
$reg_date = time();

	$check_username = mysqli_query($link, "SELECT * FROM user WHERE u_username='$username'")
		or die(mysqli_error($link));
		$username_result = mysqli_num_rows($check_username);
		
		$check_email = mysqli_query($link, "SELECT * FROM user WHERE u_email='$email'")
		or die(mysqli_error($link));
		$email_result = mysqli_num_rows($check_email);
		
		
//ПРОВЕРКА НА ПОТРЕБИТЕЛСКОТО ИМЕ
 if (empty($_POST["username"])) {
	$error_count++;
    $usernameError = "<br>Не сте въвели потребителско име!";
  } 
  elseif($username_result > 0){	   
		$error_count++;
		$usernameError = "<br>Потребителското име е заето!";
	  }
  elseif(strlen($username) < 4){
		$error_count++;
		$usernameError = "<br>Потребителското ви име трябва да е поне 4 символа!";
	  }
  elseif(strlen($username) > 15){
		$error_count++;
		$usernameError = "<br>Потребителското ви име трябва да е по-кратко от 15 символа!";
	  }
  elseif (!preg_match("/^[a-zA-Z]*$/",$username)) {
		$error_count++;
      $usernameError = "<br>Потребителското име трябва да е на латиница, без интервали, цифри или специални знаци!";  
  }
  
 
//ПРОВЕРКА НА ПАРОЛАТА
if (empty($_POST["password"])){
	$error_count++;
	$passwordError = "<br>Не сте въвели парола!";
}
else {
	$md5pass = md5($_POST["password"]);	
}

//ПОВТОРЕНИЕ НА ПАРОЛАТА
if (empty($_POST["re_password"])){
	$error_count++;
	$re_passwordError = "<br>Не сте повторили паролата!";
}
else {
    $re_md5pass = md5($_POST["re_password"]);
	if($md5pass != $re_md5pass) {
		$error_count++;
		$re_passwordError = "<br>Паролите не са еднакви!";
	}
}
//ПРОВЕРКА НА ИМЕЙЛА
if(empty($_POST["email"])){
	$error_count++;
	$emailError = "<br>Не сте въвели e-mail адрес!";
}	
 elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error_count++;
    $emailError = "<br>Грешен e-mail адрес!"; 
}
  elseif($email_result > 0){
		$error_count++;
		$emailError = "<br>Имейлът е зает!";
	  }

//ИЗКАРВАНЕ НА ГРЕШКИ
if(!empty($usernameError)){
	echo $usernameError;
}
if(!empty($passwordError)){
	echo $passwordError;
}
if(!empty($re_passwordError)){
	echo $re_passwordError;
}
if(!empty($emailError)){
	echo $emailError;
}

//АКО НЯМА ГРЕШКИ - ПРОЦЕДУРА НА РЕГИСТРАЦИЯ
if ($error_count == 0) {
	mysqli_query($link, "INSERT INTO user (u_username, u_password, u_email) VALUES ('$username', '$md5pass', '$email')")
	or die(mysqli_error($link));
	echo "Регистрацията е успешна!!!";
}
  ?>
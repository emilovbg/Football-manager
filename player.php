<?php
set_time_limit(0);
include $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/functions/mainFunctions.php';

$pl_id = rand(1, 2816);
$player_request = mysqli_query($link, "SELECT * FROM player WHERE pl_id='$pl_id' LIMIT 1")
	or die(mysqli_error($link));
	$player = mysqli_fetch_array($player_request);
	
	echo "<br>Име: $player[pl_name] $player[pl_vorname]";
	echo "<br>Име: $player[pl_position]";
	echo "<br>Възраст: $player[pl_age]";
	echo "<br>Височина: $player[pl_height]";
	echo "<br>Тегло: $player[pl_weight]";
	echo "<br>Рефлекс: $player[pl_reflex]";
	echo "<br>Ловкост: $player[pl_ability]";
	echo "<br>Единоборство: $player[pl_pvp]";
	echo "<br>Шпагат: $player[pl_tackling]";
	echo "<br>Пресичане: $player[pl_interception]";
	echo "<br>Пласиране: $player[pl_placement]";
	echo "<br>Пас: $player[pl_passing]";
	echo "<br>Креативност: $player[pl_creativity]";
	echo "<br>Центриране: $player[pl_crossing]";
	echo "<br>Удар: $player[pl_shooting]";
	echo "<br>Нюх към гола: $player[pl_flair]";
	echo "<br>Техника: $player[pl_technic]";
	echo "<br>Дрибъл: $player[pl_drible]";
	echo "<br>Игра с глава: $player[pl_heading]";
	echo "<br>Скорост: $player[pl_speed]";
	echo "<br>Издръжливост: $player[pl_endurance]";
	echo "<br>Морал: $player[pl_moral]";
	echo "<br>Кондиция: $player[pl_condition]";
?>										 										 								 															 
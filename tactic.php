<?php
include('includes/dbconn.php');
include('functions/mainFunctions.php');
include('functions/team.functions.php');
include('functions/arrays.functions.php');
$userId = loginCheck($cookie, $link);

include('header.php');
include('forms/menu.php');

$user = getUser($userId, $link);
$team = getTeamStats($user['u_team'], $link);
echo $team['Name'];
$lineUp = getLineUp($team['LineUp']);
$tactic = getLineTactic($team['Team Defense Tactic'], $team['Team Midfield Tactic'], $team['Team Attack Tactic']);
echo "<br>Схема на игра: ".$lineUp['lineUpName'];
echo "<br>Тактика в защита: ".$tactic['Defense Tactic'];
echo "<br>Тактика в полузащита: ".$tactic['Midfield Tactic'];
echo "<br>Тактика в нападение: ".$tactic['Attack Tactic']."</br>";
?>
<br>ТАКТИКА В ЗАЩИТА
<select onchange="document.getElementById('defense-tactic').src = '/images/t' + this.value + '.jpeg'">
  <?php
foreach($defenseTactic as $key => $value)
{
	if($value == $tactic['Defense Tactic']) {
	 $selected = 'selected';
	 $src = "/images/t".$key.".jpeg";
	}
	else{
		$selected = '';
	}
  echo "<option value=".$key." ".$selected.">".$value."</option>";
}
  ?>
</select>
<img id="defense-tactic" src = <?php echo $src; ?>>

<br>ТАКТИКА В ПОЛУЗАЩИТА
<select onchange="document.getElementById('midfield-tactic').src = '/images/t' + this.value + '.jpeg'">
  <?php

foreach($midfieldTactic as $key => $value)
{
	if($value == $tactic['Midfield Tactic']) {
	 $selected = 'selected';
	 $src = "/images/t".$key.".jpeg";
	}
	else{
		$selected = '';
	}
  echo "<option value=".$key." ".$selected.">".$value."</option>";
}
  ?>
</select>
<img id="midfield-tactic" src = <?php echo $src; ?>>


<br>ТАКТИКА В НАПАДЕНИЕ
<select onchange="document.getElementById('attack-tactic').src = '/images/t' + this.value + '.jpeg'">
  <?php

foreach($attackTactic as $key => $value)
{
	if($value == $tactic['Attack Tactic']) {
	 $selected = 'selected';
	 $src = "/images/t".$key.".jpeg";
	}
	else{
		$selected = '';
	}
  echo "<option value=".$key." ".$selected.">".$value."</option>";
}
  ?>
</select>
<img id="attack-tactic" src = <?php echo $src; ?>>
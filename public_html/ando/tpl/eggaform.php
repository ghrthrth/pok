<?php 
if($user_id == 1 OR $user_id == 3 OR $user_id == 968 OR $user_id == 459 OR $user_id == 1462){


if(isset($_GET['new'])){

$mysqli->query("INSERT INTO `base_egg_attack` (`pokemon_base_id`,`attack_id`) VALUES ('".$_POST['pokemon_base_id']."','".$_POST['attack_id']."') ");
 echo "<SCRIPT>location.href='game.php?fun=eggaform';</SCRIPT>"; return;
}
?>
<center> <h1>Атаки покемонам</h1></center>

<form action="game.php?fun=eggaform&new=1" method="POST">
<b>Яйцевая для:</b><br>
<input type = "text" list = "pokspis" name = "pokemon_base_id"> 
<datalist id = "pokspis">  <!--Выводимый список покемонов-->
<?php 
$awrd = $mysqli->query("SELECT * FROM `base_pokemon` ");
                  while($awr = $awrd->fetch_assoc()){ 
?>
 <option value="<?=$awr['id'];?>"><?=$awr['id'];?> <?=$awr['name'];?></option>
 <?php } ?>
</datalist>	
<br>
<b>Атака:</b><br>
<input type = "text" list = "atspis" name = "attack_id"> 
<datalist id = "atspis">  <!--Выводимый список атак покемонов-->
<?php 
$pr = $mysqli->query("SELECT * FROM `base_attacks` WHERE `atac_id` > '0' ORDER BY attac_name_eng ");
                  while($p = $pr->fetch_assoc()){ 
?>
 <option value="<?=$p['atac_id'];?>"><?=$p['attac_name_eng'];?></option>
 <?php } ?>
</datalist>	
<br><br>
<input type="submit" value="Подтвердить"> <!--Кнопка подтверждения-->
<?php 

} else{ 
	 echo "<SCRIPT>location.href='http://claimbe.ru';</SCRIPT>"; return;
	 }

?>


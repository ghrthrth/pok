<?php 
if($user_id == 1 OR $user_id == 3 OR $user_id == 968 OR $user_id == 459 OR $user_id == 1462){


if(isset($_GET['new'])){
$mysqli->query("INSERT INTO `attack_learn` (`poke_base_id`,`atac_id`,`atc_lvl`) VALUES ('".$_POST['pok']."','".$_POST['tm']."','".$_POST['tmid']."') ");
 echo "<SCRIPT>location.href='game.php?fun=atkform';</SCRIPT>"; return;
}
?>
<form action="game.php?fun=atkform&new=1" method="POST">
<b>Покемон:</b><br>
<select name='pok'>
<?php 
$awrd = $mysqli->query("SELECT * FROM `base_pokemon` ");
                  while($awr = $awrd->fetch_assoc()){ 
?>
 <option value="<?=$awr['id'];?>"><?=$awr['id'];?> <?=$awr['name'];?></option>
 <?php } ?>
</select>
<br>
<b>Атака:</b><br>
<select name='tm'>
<?php 
$pr = $mysqli->query("SELECT * FROM `base_attacks` WHERE `atac_id` > '0' ORDER BY attac_name_eng ");
                  while($p = $pr->fetch_assoc()){ 
?>

 <option value="<?=$p['atac_id'];?>"><?=$p['attac_name_eng'];?></option>
 <?php } ?>
</select><br>
<b>Уровень учебы</b><br>
<input type="text" name="tmid"><br>
<input type="submit" value="ОК">
</form>
<?php 

} else{ 
	 echo "<SCRIPT>location.href='http://claimbe.ru';</SCRIPT>"; return;
	 }

?>
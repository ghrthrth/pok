<?php 
if($user_id == 1570 or $user_id == 1573){


if(isset($_GET['new'])){
$incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_new."' and `active`='1'");
$pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$_POST['pokemon_base_id']."'")->fetch_assoc();

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight,`trade`) VALUES ('".$_POST['u_id']."','".$_POST['pokemon_base_id']."','".$_POST['pokemon_base_id']."','".$pok_base['name']."','".$_POST['pokemon_base_har']."','".$_POST['pokemon_base_lvl']."','".time()."','".$activ."','".$_POST['pokemon_base_type']."','".$_POST['pokemon_base_gender']."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$_POST['pokemon_base_gen']."','".$_POST['pokemon_base_gen']."','".$_POST['pokemon_base_gen']."','".$_POST['pokemon_base_gen']."','".$_POST['pokemon_base_gen']."','".$_POST['pokemon_base_gen']."','".$_POST['u_id']."','".$_POST['u_id']."','0','".rand(1,3)."','".$_POST['pokemon_base_sparka']."','".$pok_base['weight']."',".$_POST['pokemon_base_trade'].") ");

        $text_pok = "Был выдан покемон через Админ - панель.";
        $subject_pok = 'Pokemon' ;
        $date = get_last_online(time());
	    $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','1','Выдан покемон № ".$_POST['pokemon_base_id']." тренеру под ID ".$_POST['u_id']."','".$subject_pok."','".$date."')");
	    $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','3','Выдан покемон № ".$_POST['pokemon_base_id']." тренеру под ID ".$_POST['u_id']."','".$subject_pok."','".$date."')");
	    $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_POST['u_id']."','info','Администрация','Вам был выдан покемон','false') ");

 echo "<SCRIPT>location.href='game.php?fun=insertpok';</SCRIPT>"; return; 
}
?>
<center> <h1>Выдача покемонов</h1></center>

<form action="game.php?fun=insertpok&new=1" method="POST">
<b>Покемон</b><br>
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
<b>lvl</b><br>
<input type = "text"  name = "pokemon_base_lvl"> 
<br>
<b>Характер</b><br>
<input type = "text" list = "atspis" name = "pokemon_base_har"> 
<datalist id = "atspis">  <!--Выводимый список характеров покемонов-->
<?php 
$pr = $mysqli->query("SELECT * FROM `har` WHERE `id_har` > '0' ORDER BY name ");
                  while($p = $pr->fetch_assoc()){ 
?>
 <option value="<?=$p['id_har'];?>"><?=$p['name'];?></option>
 <?php } ?>
</datalist>	
<br>
<b>Гены</b><br>
<input type = "text"  name = "pokemon_base_gen"> 

<br>
<b>Тренер ID</b><br>
<input type = "text"  list = "trspis" name = "u_id"> 
<datalist id = "trspis">  <!--Выводимый список покемонов-->
<?php 
$trsp = $mysqli->query("SELECT * FROM `users` ");
                  while($trs = $trsp->fetch_assoc()){ 
?>
 <option value="<?=$trs['id'];?>"><?=$trs['login'];?></option>
 <?php } ?>
</datalist>	
<br>
<b>Тип shine/normal</b><br>
<input type = "text"  list = "typep"  name = "pokemon_base_type"> 
<datalist id = "typep"> <!--Список предопределенных вариантов для ввода-->
				 <option value = "normal" label = "normal">
				 <option value = "shine" label = "shine">
				 <option value = "fighter" label = "fighter">
				 <option value = "champion" label = "champion">
				 <option value = "gym" label = "gym">

			</datalist>	
<br>
<b>Пол</b><br>
<input type = "text" list = "sex"  name = "pokemon_base_gender"> 
<datalist id = "sex"> <!--Список предопределенных вариантов для ввода-->
				 <option value = "male" label = "Мальчик">
				 <option value = "female" label = "Девочка">
				 <option value = "no" label = "Бесполый">
			</datalist>	
<br>
<b>Передача 0-1</b><br>
<input type = "text" list = "trade" name = "pokemon_base_trade"> 
<datalist id = "trade"> <!--Список предопределенных вариантов для ввода-->
				 <option value = "0" label = "Разрешена">
				 <option value = "1" label = "Запрещена">
			</datalist>	
<br>
<b>Спарка: 0-1</b><br>
<input type = "text"  list = "sparka" name = "pokemon_base_sparka"> 
<datalist id = "sparka"> <!--Список предопределенных вариантов для ввода-->
	             <option value = "1" label = "Разрешена">
				 <option value = "0" label = "Запрещена">
			</datalist>	
<br><br>
<b>Номер покемона</b>
<input type="number" name="pokNumb">
<br><br>
<b>Название покемона</b>
<input type="text" name="pokName">
<br><br>
<b>HP Стат</b>
<input type="number" name="hpStat">
<br><br>
<b>Атака Стат</b>
<input type="number" name="atkStat">
<br><br>
<b>Защита Стат</b>
<input type="number" name="defStat">
<br><br>
<b>Скорость Стат</b>
<input type="number" name="speedStat">
<br><br>
<b>Спец.Атаки Стат</b>
<input type="number" name="satkStat">
<br><br>
<b>Спец.Защиты Стат</b>
<input type="number" name="sdefStat">
<br><br>
<b>Первый тип</b>
<input type="text" name="typePok" list="typePokList">
<!-- 'bug','dark','dragon','electric','fairy','fighting','fire','flying','ghost','grass','ground','ice','normal','poison','psychic','rock','steel','water' -->
<datalist id="typePokList">
    <option value="bug">Насекомое</option>
    <option value="dark">Темный</option>
    <option value="dragon">Драконий</option>
    <option value="electric">Электрический</option>
    <option value="fairy">Волшебный</option>
    <option value="fighting">Боевой</option>
    <option value="fire">Огненный</option>
    <option value="flying">Летающий</option>
    <option value="ghost">Призрачный</option>
    <option value="grass">Травяной</option>
    <option value="ground">Земляной</option>
    <option value="ice">Ледяной</option>
    <option value="normal">Нормальный</option>
    <option value="poison">Ядовитый</option>
    <option value="psychic">Психический</option>
    <option value="rock">Каменный</option>
    <option value="steel">Металлический</option>
    <option value="water">Водный</option> 
</datalist>
<br><br>

<input type="submit" value="Подтвердить"> <!--Кнопка подтверждения-->
</form>
<?php 

} else{ 
	 echo "<SCRIPT>location.href='http://oldpokemon.ru';</SCRIPT>"; return;
	 }

?>


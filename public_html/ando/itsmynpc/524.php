<?php 
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Создание команды';
/*if($npc == 4000 && empty($answer)){
    $textNPC = 'Спасибо за помощь юный тренер!Ах сколько чудесных букетов!За твою помощь я бы хотел наградить тебя наградой,выбери что-нибудь подходящее для себя...';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=4000&answ_id=1&map=1">А что у вас есть?! ...</a></li>';
}else*/if($npc == 524 && empty($answer)){
   // $textNPC = 'Покемоны будут не доступны для разведения после вылупления!.';
?>


  <style>
   .textT { 
    font-family: Tahoma;
    font-size: 13px;
}
   }
  </style>



<H1>Создание команды</H1>

<?php 
if($user_id == 1 OR $user_id == 3 OR $user_id == 459 OR $user_id == 187 OR $user_id == 459){


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

 echo "<SCRIPT>location.href='game.php?fun=panelpok';</SCRIPT>"; return; 
}
?>
<form action="game.php?fun=panelpok&new=1" method="POST">
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

<b>lvl</b>
<input type = "text"  name = "pokemon_base_lvl"> 

<b>Характер</b>
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
<b>Гены</b>
<input type = "text"  name = "pokemon_base_gen"> 


<b>Тренер ID</b>
<input type = "text"  list = "trspis" name = "u_id"> 
<datalist id = "trspis">  <!--Выводимый список покемонов-->
<?php 
$trsp = $mysqli->query("SELECT * FROM `users` ");
                  while($trs = $trsp->fetch_assoc()){ 
?>
 <option value="<?=$trs['id'];?>"><?=$trs['login'];?></option>
 <?php } ?>
</datalist> 

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
<b>Пол</b>
<input type = "text" list = "sex"  name = "pokemon_base_gender"> 
<datalist id = "sex"> <!--Список предопределенных вариантов для ввода-->
         <option value = "male" label = "Мальчик">
         <option value = "female" label = "Девочка">
         <option value = "no" label = "Бесполый">
      </datalist> 

<b>Передача 0-1</b>
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
<input type="submit" value="Подтвердить"> <!--Кнопка подтверждения-->
<?php 

} else{ 
   echo "<SCRIPT>location.href='http://oldpokemon.ru';</SCRIPT>"; return;
   }

?>


 
<?php 
return ;
}
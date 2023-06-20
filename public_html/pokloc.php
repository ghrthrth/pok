<?
session_start();
require_once ('ando/bsqldate/dbconsql.php');
require_once ('ando/functions/game.functions.php');
require_once ('ando/functions/tip.functions.php');
header('Content-Type: text/html; charset=utf-8');
$us = $mysqli->query('SELECT * FROM `users` WHERE `id` = '.$_SESSION['user_id'])->fetch_assoc();
 $loc = $mysqli->query('SELECT * FROM `base_location` WHERE `id` = '.$us['location'])->fetch_assoc();
 $pok_bd = $mysqli->query('SELECT * FROM `pok_town` WHERE `town` = '.$loc['id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
 <TITLE>Покемоны на локации</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; Charset=Windows-1251">
 <LINK REL="Stylesheet" HREF="style.css" TYPE="text/css">
</HEAD>
<BODY>
  <h4>Покемоны на локации <?=$loc['name'];?>:</h4>
<?
if($pok_bd->num_rows >= 1){
  while($pk = $pok_bd->fetch_assoc()){
    if($pk['catch'] == 0){$l = '<span style="color: #4a9c49">Ловится</span>';}else{ $l = '<span style="color: #9c4949">Не ловится</span>' ;}
    $bd = $mysqli->query('SELECT * FROM `base_pokemon` WHERE `id` = '.$pk['pok'])->fetch_assoc();
    if($pk['timeday'] == 1){ $t = "День";}elseif($pk['timeday'] == 2){ $t = "Ночь";}else{ $t = "Круглосуточно";}
    $bd_drop = $mysqli->query('SELECT * FROM `drop_item` WHERE `pok` = '.$pk['pok'])->fetch_assoc();
    if($bd_drop){
      if($bd_drop['loc'] != 0){
        if($bd_drop['loc'] == $loc['id']){ $d = '<img src="/img/items/'.$bd_drop['item'].'.gif" >';}else{ $d = "";}
      }else{
        $d = '<img src="/img/items/'.$bd_drop['item'].'.gif" >';
      }
    }else{
      $d = "";
    }
    if($bd_drop){ $d = '<img src="/img/items/'.$bd_drop['item'].'.gif" >';}else{ $d = "";}
    if($pk['chanc'] >= 1 AND $pk['chanc'] < 20){ $r = '<span style="color: #9c4949">Очень редко</span>';}
    elseif($pk['chanc'] >= 20 AND $pk['chanc'] < 50){ $r = '<span style="color: #9c7e49">Редко</span>';}
    elseif($pk['chanc'] >= 50 AND $pk['chanc'] < 70){ $r = '<span style="color: #49629c">Средне</span>';}
    else{ $r = '<span style="color: #4a9c49">Часто</span>';}
    ?>
<p style="font-size: 12px"><img src="img/pkmna/<?=numbPok($pk['pok']);?>.gif" border="0"><a href="pokedex.php?sp_id=<?=numbPok($pk['pok']);?>">#<?=numbPok($pk['pok']);?> <?=$bd['name'];?> </a> <?=$pk['lvl'];?>-lvl - <?=$t;?>, <?=$l;?>, <?=$r;?> <?=$d;?></p>
    <?
  }
}else{
  echo "<h3>На этой локации не нападают покемоны</h3>";
}
if($loc['trub_count'] > 0){
?>
<p style="font-size: 12px">На локации осталось еще: <b> <?=$loc['trub_count']?> </b> <img src="img/pkmna/568.gif" border="0"><a href="pokedex.php?sp_id=568">#568 Trubbish</a></p>
<?
}else{
  echo "<h3>Эта локация чиста</h3>";
}
?>
</BODY>

<?php
ini_set("display_errors",0);
if(isset($_GET['btl'])){
  $bid = obTxt($_GET['btl']);
$battle = $mysqli->query("SELECT * FROM battle WHERE `id` = '".$bid."' and `tip` = '0' and `loc` = '".$user['location']."' LIMIT 1")->fetch_assoc();
if(empty($battle)) { echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>"; return; }

require_once ('ando/functions/btl.function.php');

    $ind = 1;
    $indv = 2;
    $mID = $battle['user1'];
    $vID = $battle['user2'];
    $pMY = $battle['pok1'];
    $pVS = $battle['pok2'];
    $aMY = $battle['atk1'];
    $aVS = $battle['atk2'];
    $zMY = $battle['zm1'];
    $zVS = $battle['zm2'];
    $iMY = $battle['item1'];
    $iVS = $battle['item2'];
    $time1 = $battle['time1'];
    $time2 = $battle['time2'];
    $rldMY = $battle['rload1'];

 if($battle['kom'] > 0) {
  $kMy = $mysqli->query("SELECT * FROM team_btl WHERE `kom` = '".$battle['kom']."' and `user` = '".$mID."'")->fetch_assoc();
  $kVs = $mysqli->query("SELECT * FROM team_btl WHERE `kom` = '".$battle['kom']."' and `user` = '".$vID."'")->fetch_assoc();
 }
 if(isset($_GET['pluskom'])){
  if($battle['kom'] > 0){
    $team = obTxt($_GET['pluskom']);
$cMPK2 =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1' and `hp` > '0'");
$cmpk_2 = $cMPK2->num_rows;
$ckom =  $mysqli->query("SELECT * FROM `team_btl` WHERE `kom`='".$battle['kom']."' and `team`='".$team."'");
$ck = $ckom->num_rows;
    if($user['status'] !== "free"){
      $rt = "Ошибка! Вы заняты!";
    }else
    if($user['location'] !== $battle['loc']){
      $rt = "Ошибка! Вы далеко от боя!";
    }else
    if($cmpk_2 == 0){
      $rt = "Ошибка! Ваши покемоны не в состоянии сражаться!";
    }else
     if($user['reputation'] < 200){
      $rt = "Ошибка! Ваш ранг не позволяет принимать участие!";
    }else
     if($ck == 5){
      $rt = "Ошибка! В коменде нет мест!";
     }else{
      $rt = "<b>Заявка отправлена!</b>";
$href = "<a target=_work href=game.php?fun=m_online&get_team=".$user_id.">->ПРИНЯТЬ<-</a>";
$text = "<b>Тренер ".$user['login']." просит ".$href." его в команду.</b>";
$infLead = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom` = '".$battle['kom']."' and `leader` = '1' and `team` = '".$team."'")->fetch_assoc();

$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$infLead["user"]."','info','Информация','".$text."','false') ");
    }
    echo "<script>parent.mess('".$rt."');</script>";
  }else{
   echo "<script>parent._location.location='game.php?fun=view_fight&btl=".$bid.";</script>"; return; 
  }
 }

$Me = $mysqli->query("SELECT * FROM users WHERE `id` = '".$mID."'")->fetch_assoc();
if($pMY > 0 and $pVS > 0){
$PokM = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$pMY."' and `user_id` = '".$mID."'")->fetch_assoc();
}

 if($battle['tip'] == 1){
$Vs = array("login"=>"Дикий покемон"); 
$PokV = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '".$pVS."'")->fetch_assoc();
 }else{
$Vs = $mysqli->query("SELECT * FROM users WHERE `id` = '".$vID."'")->fetch_assoc();
if($pMY > 0 and $pVS > 0){
$PokV = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$pVS."' and `user_id` = '".$vID."'")->fetch_assoc();
}
 }
 if($PokM['type'] == 'normal') {$type1 = 'poketitle'; $img1 = 'normal'; $name1 = false;}
elseif($PokM['type'] == 'shine') {$type1 = 'poketitleshine'; $img1 = 'shine';  $name1 = 'shine';}
elseif($PokM['type'] == 'shadow') {$type1 = 'poketitleshadow'; $img1 = 'shine'; $name1 = 'shadow';}
elseif($PokM['type'] == 'snowy') {$type1 = 'poketitleshowy'; $img1 = 'shine'; $name1 = 'snowy';}
elseif($PokM['type'] == 'fighter') {$type1 = 'poketitleshine'; $img1 = 'shine'; $name1 = 'fighter';}
elseif($PokM['type'] == 'contest') {$type1 = 'poketitleshine'; $img1 = 'shine'; $name1 = 'contest';}
elseif($PokM['type'] == 'champion') {$type1 = 'poketitlechampion'; $img1 = 'champion'; $name1 = 'champion';}
elseif($PokM['type'] == 'zombie') {$type1 = 'poketitlezombie'; $img1 = 'zombie'; $name1 = 'zombie';}
elseif($PokM['type'] == 'nord') {$type1 = 'poketitlenord'; $img1 = 'nord'; $name1 = 'Nord';}
elseif($PokM['type'] == 'gym') {$type1 = 'poketitleshine'; $img1 = 'shine'; $name1 = 'gym';}
elseif($PokM['type'] == 'Coordinator') {$type1 = 'poketitleshine'; $img1 = 'shine'; $name1 = 'Coordinator';}
elseif($PokM['type'] == 'magistra') {$type1 = 'poketitleshine'; $img1 = 'shine'; $name1 = 'magistra';} 
elseif($PokM['type'] == 'arena') {$type1 = 'poketitle'; $img1 = 'normal'; $name1 = 'arena';}
elseif($PokM['type'] == 'brilliant') {$type1 = 'poketitleshine'; $img1 = 'shine'; $name1 = 'Brilliant';}
elseif($PokM['type'] == 'coloring') {$type1 = 'poketitleshine'; $img1 = 'shine'; $name1 = 'coloring';}
elseif($PokM['type'] == 'legacy') {$type1 = 'poketitleshine'; $img1 = 'shine'; $name1 = 'Legacy';}

if($PokV['type'] == 'normal') {$type2 = 'poketitle'; $img2 = 'normal'; $name2 = false;}
elseif($PokV['type'] == 'shine') {$type2 = 'poketitleshine'; $img2 = 'shine';  $name2 = 'shine';}
elseif($PokV['type'] == 'shadow') {$type2 = 'poketitleshadow'; $img2 = 'shine'; $name2 = 'shadow';}
elseif($PokV['type'] == 'snowy') {$type2 = 'poketitleshowy'; $img2 = 'shine'; $name2 = 'snowy';}
elseif($PokV['type'] == 'fighter') {$type2 = 'poketitleshine'; $img2 = 'shine'; $name2 = 'fighter';}
elseif($PokV['type'] == 'contest') {$type2 = 'poketitleshine'; $img2 = 'shine'; $name2 = 'contest';}
elseif($PokV['type'] == 'champion') {$type2 = 'poketitlechampion'; $img2 = 'champion'; $name2 = 'champion';}
elseif($PokV['type'] == 'zombie') {$type2 = 'poketitlezombie'; $img2 = 'zombie'; $name2 = 'zombie';}
elseif($PokV['type'] == 'nord') {$type2 = 'poketitlenord'; $img2 = 'nord'; $name2 = 'Nord';}
elseif($PokV['type'] == 'gym') {$type2 = 'poketitleshine'; $img2 = 'shine'; $name2 = 'gym';}
elseif($PokV['type'] == 'Coordinator') {$type2 = 'poketitleshine'; $img2 = 'shine'; $name2 = 'Coordinator';}
elseif($PokV['type'] == 'magistra') {$type2 = 'poketitleshine'; $img2 = 'shine'; $name2 = 'magistra';}
elseif($PokV['type'] == 'arena') {$type2 = 'poketitle'; $img2 = 'normal'; $name2 = 'arena';}
elseif($PokV['type'] == 'brilliant') {$type2 = 'poketitleshine'; $img2 = 'shine'; $name2 = 'Brilliant';}
elseif($PokV['type'] == 'coloring') {$type2 = 'poketitleshine'; $img2 = 'shine'; $name2 = 'coloring';}
elseif($PokV['type'] == 'legacy') {$type2 = 'poketitleshine'; $img2 = 'shine'; $name2 = 'Legacy';}

  // count pokemon user and count pokemon enemy
 $cMPK =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$mID."' and `active`='1'");
 $cmpk_ = $cMPK->num_rows;
 $nBl = 6-$cmpk_;
 if($battle['tip'] == 1){
 $cmpk_2 = 1;
 }else{
 $cMPK2 =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$vID."' and `active`='1'");
 $cmpk_2 = $cMPK2->num_rows;
 $nBl2 = 6-$cmpk_2;
 }

 if($ind == 1){ $PokM['ind'] = 1; $PokV['ind'] = 2; }else{
                $PokM['ind'] = 2; $PokV['ind'] = 1;      }

$cntMYpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$mID."' and `active`='1' and `hp` > '0' and `id` != '".$pMY."'");
$cmp_ = $cntMYpk->num_rows;

  $cntVSpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$vID."' and `active`='1' and `hp` > '0' ");
  $cvp_ = $cntVSpk->num_rows;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
 <TITLE>POKEZONE FIGHT!</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; Charset=Windows-1251">
 <META NAME="Author" CONTENT="Serg">
 <LINK REL="Stylesheet" HREF="style.css" TYPE="text/css">
</HEAD>
<STYLE>
  DIV.x {
    position:relative;
    top:-250;left:5;width:250;height:190;
    padding: 1 1 1 2;
    COLOR: #1E3955; FONT-SIZE: 11px;FONT-FAMILY: Tahoma;
    text-align:left;
  }
  DIV.item {
    position:relative;
    top:-290;left:105;
    visibility:visible;
    width:32; height:32;
  }

  table.log {
    border-bottom: 1px dotted #97BDE5;
    width:100%;
  }
  td.log {
    font-size:21px;
    color:#97BDE5;
    font-weight:bold;
    width:40px;
  }

</STYLE>
<script src="js/jquery.min.js"></script>

 <script language="JavaScript">

   function lay(ID, Type) {
     eval("document.all." + ID + ".style.visibility = \"" + Type + "\"");
   }

   function switchLogDivs() {
     d1=document.getElementById("divLog");
     d2=document.getElementById("divTeam");
     if (d1.style.display!="none") {
      d1.style.display="none";;
      d2.style.display="block";
     } else {
      d2.style.display="none";;
      d1.style.display="block";
     }
   }
 </script>
<BODY>
<span id=its_fight_frame></span>
<DIV style="height:390;overflow:hidden;">
<TABLE width=100% border=0>
<TR>
<TD width=25% valign="top" align="center">
       <?
		if($PokM['name_new'] != ''){
			$poke_name = $PokM['name_new'];
		}else{
			$poke_name = $PokM['name'];
		}
	   ?>
         <TABLE class=nonBorder cellpadding=3 cellspacing=1 width=210><TR><TD class=title align=center><span class='<?=$type1; ?>'>
         <?php if($PokM['name']){ ?><a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$PokM['basenum'];?>","dex","width=600,height=600,scrollbars=yes");>
         <img src=img/pokedex.gif alt=Покедекс title=Покедекс border=0>
         </a>#<?=numbPok($PokM['basenum']);?> <?=$poke_name;?> <?=$PokM['lvl'];?>-lvl <?=$name1;?>  <?php if($PokM['trn'] > 0){ ?><img src='./img/trn/Tren_ar<?=$PokM["trn"];?>.png'><?php } ?></span><?php } ?>
         </TD>
         </TR>
         <TR><TD width=250>
         <img src=img/pkmn/<?php if($PokM['type']){ echo $img1."/"; }?><?=numbPok($PokM['basenum']);?>.jpg width=250 height=190 border=1><BR>
         <TABLE border=0 cellspacing=0 width=252 height=10 class=nonBorder>
           <TR><TD style='padding:0'><DIV style="width:<?=round(($PokM['hp']/$PokM['hp_max'])*100);?>%;background:<?=colorHPbar(($PokM['hp']/$PokM['hp_max'])*100);?>;height:12;font-size:9;"><?=$PokM['hp'];?></DIV></TD></TR>
           <TR><TD style='padding:0'><DIV style="width:<?=($PokM['exp']/$PokM['exp_max'])*100;?>%;background:blue;height:5;font-size:0;"></DIV></TD></TR>
         </TABLE>
 
         </TD></TR></TABLE><CENTER id=txt_c><b><big><a href='game.php?fun=treninf&to_id=<?=$mID;?>' onclick="window.open('game.php?fun=treninf&to_id=<?=$mID;?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/img/question.gif' border=0></a> <font color='<?=colorsUsers($Me["groups"]);?>'><?=$Me["login"];?></font></big>
         </b><BR>
         <?php 
        $blPOK = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$mID.' and active = 1');
                 while($blPOK_ = $blPOK->fetch_assoc()){
         ?>
         <img src=img/cond/slot<?php if($blPOK_['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
         for ($x=0; $x<$nBl; $x++){
         ?>
         <img src=img/cond/slot_n.png class=slot>
         <?php } ?>
         </CENTER>
         <DIV ID=iV class=x>
         <?php 
        $chg = $mysqli->query("SELECT * FROM changes WHERE bid = '".$battle['id']."' and pok = '".$PokM['id']."'");
                 while($ch = $chg->fetch_assoc()){ ?>
          <?php if($ch['atk'] > 0) { echo "Атака";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['atk']."<br>"; } ?>
          <?php if($ch['def'] > 0) { echo "Защита";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['def']."<br>"; } ?>
          <?php if($ch['speed'] > 0) { echo "Скорость";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['speed']."<br>"; } ?>
          <?php if($ch['satk'] > 0) { echo "Сп.Атака";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['satk']."<br>"; } ?>
          <?php if($ch['sdef'] > 0) { echo "Сп.Защита";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['sdef']."<br>"; } ?>
          <?php if($ch['accuracy'] > 0) { echo "Точность";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['accuracy']."<br>"; } ?>
          <?php if($ch['agillity'] > 0) { echo "Ловкость";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['agillity']."<br>"; } ?>
                 <?php } 
                 if($battle['spikes1'] > 0) { echo "Шипы x".$battle['spikes1']."<br>"; }
                 if($battle['tspikes1'] > 0) { echo "Отравленные шипы x".$battle['tspikes1']."<br>"; }
                 if($battle['spide1'] > 0) { echo "Поле в паутине<br>"; }
                 if($battle['rock1'] > 0) { echo "Каменная ловушка<br>"; }
          $sta = $mysqli->query("SELECT * FROM status WHERE bid = '".$battle['id']."' and pok = '".$PokM['id']."'");
                 while($st = $sta->fetch_assoc()){ ?>
          <?php if($st['status'] == 7) { echo "Проклят"."<br>"; }
                if($st['status'] == 1) { echo "Отравлен"."<br>"; }
                if($st['status'] == 2) { echo "Усыплен"."<br>"; }
                if($st['status'] == 3) { echo "Подожжен"."<br>"; }
                if($st['status'] == 4) { echo "Парализован"."<br>"; }
                if($st['status'] == 5) { echo "Заморожен"."<br>"; }
                if($st['status'] == 6) { echo "Спутан"."<br>"; }
                if($st['status'] == 8) { echo "Toxic"."<br>"; }
                if($st['status'] == 9) { echo "Семена-пиявки"."<br>"; }
                if($st['status'] == 10) { echo "Насмешка"."<br>"; }
                if($st['status'] == 11) { echo "Защитный экран"."<br>"; }
                if($st['status'] == 12) { echo "Экран света"."<br>"; }
                if($st['status'] == 13) { echo "Напуган"."<br>"; }
                if($st['status'] == 14) { echo "Сильное отравление"."<br>"; }
                if($st['status'] == 15) { echo "Ускорен ветром"."<br>"; }
                if($st['status'] == 16) { echo "Свито гнездо"."<br>"; }
                if($st['status'] == 17) { echo "Кольцо воды"."<br>"; }
                if($st['status'] == 18) { echo "Кошмары"."<br>"; }
                if($st['status'] == 19) { echo "Бодрящее кофе"."<br>"; }
                if($st['status'] == 20) { echo "Связан"."<br>"; }
                if($st['status'] == 21) { echo "Блок атаки"."<br>"; }
           ?>

          <?php }  ?>
         </DIV>
                  <? if($PokM['item_id']){?>
          <div class='item'><img src='img/items/<?=$PokM['item_id'];?>.gif' width='32' height='32' border='0'></div>
           <?}else{?>
           <div class='item'><img src='img/items/blank.gif' width='32' height='32' border='0'></div>
                   <?}?>
           </TD>
<TD width=50%><DIV style="position:relative; top:-70; overflow:hidden;">


    <a href='game.php?fun=view_fight&btl=<?=$bid;?>'>обновить</a> | <a href='game.php?fun=m_location&map=1'>уйти >></a>
    <HR>
    <DIV style="
             padding:5 5 5 5;
             color: #000000;
             background-color: #aecff1;
             border: groove 0px #295858;
             height: 250;
             text-align:justify;
             overflow: auto;
             COLOR: #1E3955; FONT-SIZE: 11px; FONT-FAMILY: Tahoma;">
             <P>
             <?php if($battle['kom'] > 0) { ?>
<div id='divTeam' style="display:none">
  <b><a href=javascript: onclick='switchLogDivs();'><< К БОЮ</a></b>
  <br><br>
    <div style='float: left; margin-left: 10px;'>
 <?php 
        $mTeam = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom` = '".$battle['kom']."' and `team` = '".$kMy['team']."'");
                 while($mT = $mTeam->fetch_assoc()){
                  $pl_team1 = $mT['team'];
         ?>    
  <b><big><a href="game.php?fun=treninf&amp;to_id=<?=$mT['user'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$mT['user'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <font style="color:<?=colorsUsers(infUsr($mT['user'],'groups')); ?>;"><?=infUsr($mT['user'],"login");?></font><?php if($mT['leader'] == 1){ echo "<font color='red'>*</font>"; } ?> </big>
         </b><br>
          <?php 
        $blPOK = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$mT['user'].' and active = 1');
                 while($blPOK_ = $blPOK->fetch_assoc()){
         ?>
         <img src=img/cond/slot<?php if($blPOK_['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
          $cMPKi =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$mT['user']."' and `active`='1'");
          $cmpk_i = $cMPKi->num_rows;
          $nBli = 6-$cmpk_i;
         for ($x1=0; $x1<$nBli; $x1++){
         ?>
         <img src=img/cond/slot_n.png class=slot>
         <?php } ?>
         <br>
         <?php } ?>
         <br>
         <?php 
$ckom =  $mysqli->query("SELECT * FROM `team_btl` WHERE `kom`='".$battle['kom']."' and `team`='1'");
$ck = $ckom->num_rows;
if($ck < 5 and $user['status'] == "free"){
         ?>
         <b><a target="_work" href='game.php?fun=view_fight&btl=<?=$battle["id"];?>&pluskom=<?=$pl_team1;?>'>ПРИСОЕДИНИТЬСЯ</b>
<?php } ?>
         </div>

           <div style='float: right; margin-right: 10px;'>
         <?php 
        $vTeam = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom` = '".$battle['kom']."' and `team` != '".$kMy['team']."'");
                 while($vT = $vTeam->fetch_assoc()){
                  $pl_team2 = $vT['team'];
         ?>    
  <b><big><a href="game.php?fun=treninf&amp;to_id=<?=$vT['user'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$vT['user'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <font style="color:<?=colorsUsers(infUsr($vT['user'],'groups')); ?>;"><?=infUsr($vT['user'],"login");?></font><?php if($vT['leader'] == 1){ echo "<font color='red'>*</font>"; } ?></big>
         </b><br>
          <?php 
        $blPOK2 = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$vT['user'].' and active = 1');
                 while($blPOK_2 = $blPOK2->fetch_assoc()){
         ?>
         <img src=img/cond/slot<?php if($blPOK_2['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
          $cMPKi2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$vT['user']."' and `active`='1'");
          $cmpk_i2 = $cMPKi2->num_rows;
          $nBli2 = 6-$cmpk_i2;
         for ($x2=0; $x2<$nBli2; $x2++){
         ?>
         <img src=img/cond/slot_n.png class=slot>
         <?php } ?> 
         <br>
         <?php } ?>
         <br>
                  <?php 
$ckom2 =  $mysqli->query("SELECT * FROM `team_btl` WHERE `kom`='".$battle['kom']."' and `team`='2'");
$ck2 = $ckom2->num_rows;
if($ck2 < 5 and $user['status'] == "free"){
         ?>
         <b><a target="_work" href='game.php?fun=view_fight&btl=<?=$battle["id"];?>&pluskom=<?=$pl_team2;?>'>ПРИСОЕДИНИТЬСЯ</b>
<?php } ?>
         </div>
<div style="margin-left: 35%;">
<?php 
 $bKom = $mysqli->query('SELECT * FROM battle WHERE kom = '.$battle['kom']);
                 while($bk = $bKom->fetch_assoc()){
?>
<p id="txt"><a href="game.php?fun=treninf&amp;to_id=<?=$bk['user1'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$bk['user1'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <a style="color:<?=colorsUsers(infUsr($bk['user1'],"groups"));?>;" href="javascript:parent.priv_m('<?=infUsr($bk['user1'],"login");?>',<?=$bk['user1'];?>);"><?=infUsr($bk['user1'],"login");?></a> 
VS 
<a href="game.php?fun=treninf&amp;to_id=<?=$bk['user2'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$bk['user2'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <a style="color:<?=colorsUsers(infUsr($bk['user2'],"groups"));?>;" href="javascript:parent.priv_m('<?=infUsr($bk['user2'],"login");?>',<?=$bk['user2'];?>);"><?=infUsr($bk['user2'],"login");?></a> <a target="_location" href="game.php?fun=view_fight&btl=<?=$bk['id'];?>"> <font color="red">>>></font> </a></p>
<?php } ?>
  </div>

  </div>
  <?php } ?>
<div id=divLog>
 <?php if($battle['kom'] > 0) { ?>
 <b><a href=javascript: onclick='switchLogDivs();'>КОМАНДА</a></b>
 <?php } ?>
<?php 
$weather = $mysqli->query('SELECT * FROM weather WHERE id = '.$base_region['weather'])->fetch_assoc();
?>
<center><b><sup>Раунд: <?=$battle['turn'];?> - Погода: <?=$weather['name']; ?></sup></b></center>
<br />
<!-- Лог боя-->
<?
  $battle_log = $mysqli->query('SELECT * FROM log WHERE battle_id = '.$battle['id'].' ORDER BY id DESC');
  while($logs = $battle_log->fetch_assoc()){
      $log .= "<table class='log'><td class='log'>".$logs['raund']."&nbsp;</td>";
      $log .= "<td id='txt'>".$logs['text']."<br><p></td></table>";
  }
?>
<?=$log;?>

Начало боя: <?=$battle['data'];?>
</div>
</DIV></DIV></DIV>
</TD>


<TD width=25% valign="top" align="center">
       
         <TABLE class=nonBorder cellpadding=3 cellspacing=1 width=210><TR><TD class=title align=center><span class='<?=$type2;?>'>
          <?php if($PokV['name']){ ?><a  HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$PokV['basenum'];?>","dex","width=600,height=600,scrollbars=yes");><img src=img/pokedex.gif alt=Покедекс title=Покедекс border=0></a>
         #<?=numbPok($PokV['basenum']);?> <?=$PokV['name'];?> <?=$PokV['lvl'];?>-lvl <?=$name2;?>  <?php if($PokV['trn'] > 0){ ?><img src='./img/trn/Tren_ar<?=$PokV["trn"];?>.png'><?php } ?></span><?php } ?>
         </TD></TR>
         <TR><TD width=250><img src=img/pkmn/<?php if($PokV['type']){ echo $img2."/"; }?><?=numbPok($PokV['basenum']);?>.jpg width=250 height=190 border=1><BR>
         <TABLE border=0 cellspacing=0 width=252 height=10 class=nonBorder>
           <TR><TD style='padding:0'><DIV style="width:<?=round(($PokV['hp']/$PokV['hp_max'])*100);?>%;background:<?=colorHPbar(($PokV['hp']/$PokV['hp_max'])*100);?>;height:12;font-size:9;"><?=$PokV['hp'];?></DIV></TD></TR>
           <TR><TD style='padding:0'><DIV style="width:<?=($PokV['exp']/$PokV['exp_max'])*100;?>%;background:blue;height:5;font-size:0;"></DIV></TD></TR>
         </TABLE>
         </TD></TR></TABLE><CENTER id=txt_c><?php if($battle['tip'] == 1){ ?><b><big><?=$Vs["login"];?></big></b><?php }else{ ?>
        <b><big><a href='game.php?fun=treninf&to_id=<?=$vID;?>' onclick="window.open('game.php?fun=treninf&to_id=<?=$vID;?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/img/question.gif' border=0></a> <font color='<?=colorsUsers($Vs["groups"]);?>'><?=$Vs["login"];?></font></big><?php } ?>
         </b>
         <BR>
        <?php 
        if($battle['tip'] == 0){
        $blPOK2 = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$vID.' and active = 1');
                 while($blPOK_2 = $blPOK2->fetch_assoc()){
         ?>
         <img src=img/cond/slot<?php if($blPOK_2['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
         for ($x2=0; $x2<$nBl2; $x2++){
         ?>
         <img src=img/cond/slot_n.png class=slot>
         <?php }
          }else{ ?>
         <img src=img/cond/slot.png class=slot>
        <?php } ?>
         </CENTER>
         <DIV ID=hV class=x>
           <?php 
        $chg2 = $mysqli->query("SELECT * FROM changes WHERE bid = '".$battle['id']."' and pok = '".$PokV['id']."'");
                 while($ch2 = $chg2->fetch_assoc()){ ?>
          <?php if($ch2['atk'] > 0) { echo "Атака";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['atk']."<br>"; } ?>
          <?php if($ch2['def'] > 0) { echo "Защита";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['def']."<br>"; } ?>
          <?php if($ch2['speed'] > 0) { echo "Скорость";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['speed']."<br>"; } ?>
          <?php if($ch2['satk'] > 0) { echo "Сп.Атака";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['satk']."<br>"; } ?>
          <?php if($ch2['sdef'] > 0) { echo "Сп.Защита";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['sdef']."<br>"; } ?>
          <?php if($ch2['accuracy'] > 0) { echo "Точность";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['accuracy']."<br>"; } ?>
          <?php if($ch2['agillity'] > 0) { echo "Ловкость";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['agillity']."<br>"; } ?>
                 <?php } 
                 if($battle['spikes2'] > 0) { echo "Шипы x".$battle['spikes2']."<br>"; }
                 if($battle['tspikes2'] > 0) { echo "Отравленные шипы x".$battle['tspikes2']."<br>"; }
                 if($battle['spide2'] > 0) { echo "Поле в паутине<br>"; }
                 if($battle['rock2'] > 0) { echo "Каменная ловушка<br>"; }
          $sta2 = $mysqli->query("SELECT * FROM status WHERE bid = '".$battle['id']."' and pok = '".$PokV['id']."'");
                 while($st2 = $sta2->fetch_assoc()){ ?>
          <?php if($st2['status'] == 7) { echo "Проклят"."<br>"; }
                if($st2['status'] == 1) { echo "Отравлен"."<br>"; } 
                if($st2['status'] == 2) { echo "Усыплен"."<br>"; } 
                if($st2['status'] == 3) { echo "Подожжен"."<br>"; } 
                if($st2['status'] == 4) { echo "Парализован"."<br>"; } 
                if($st2['status'] == 5) { echo "Заморожен"."<br>"; } 
                if($st2['status'] == 6) { echo "Спутан"."<br>"; } 
                if($st2['status'] == 8) { echo "Toxic"."<br>"; } 
                if($st2['status'] == 9) { echo "Семена-пиявки"."<br>"; } 
                if($st2['status'] == 10) { echo "Насмешка"."<br>"; } 
                if($st2['status'] == 11) { echo "Защитный экран"."<br>"; } 
                if($st2['status'] == 12) { echo "Экран света"."<br>"; } 
                if($st2['status'] == 13) { echo "Напуган"."<br>"; } 
                if($st2['status'] == 14) { echo "Сильное отравление"."<br>"; }
                if($st2['status'] == 15) { echo "Ускорен ветром"."<br>"; }
                if($st2['status'] == 18) { echo "Кошмары"."<br>"; }
                if($st2['status'] == 19) { echo "Бодрящее кофе"."<br>"; }
                if($st2['status'] == 20) { echo "Связан"."<br>"; }
                if($st2['status'] == 21) { echo "Блок атаки"."<br>"; }
          ?>

          <?php }  ?>

         </DIV>
         <? if($PokV['item_id'] > 0){?>
          <div class='item'><img src='img/items/<?=$PokV['item_id'];?>.gif' width='32' height='32' border='0'></div>
           <?}else{?>
           <div class='item'><img src='img/items/blank.gif' width='32' height='32' border='0'></div>
                   <? } ?>
         </TD>
</TR>
</TABLE>

</body>
</html>
<?php
}else{
   echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>"; return; 
}
?>
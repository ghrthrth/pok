<?php
$arena = $mysqli->query("SELECT * FROM `arena` WHERE `id` = '1' ")->fetch_assoc();
/*if($arena['next'] == strtotime("Today")){
 $nxt = strtotime("next Monday");
 $mysqli->query("UPDATE arena SET `next` = '$nxt' WHERE `id` = '1'");
 $mysqli->query("UPDATE users SET `plus_jet` = '1',`jeton`='0' WHERE `id` > '0'");
}*/
$mysqli->query("DELETE FROM `user_status` WHERE `date` < '".time()."'");
$usr = $mysqli->query("SELECT * FROM `users` WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
$conquer = $mysqli->query("SELECT * FROM `base_location` WHERE `id` = '".$usr['location']."'")->fetch_assoc();
if($usr['time_conquerloc'] == time()){
    $mysqli->query("UPDATE base_location SET conquer = '".$usr['clan_id']."' WHERE id = '".$usr['location']."' ");
}

$stat_upd = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id']);
while($stat_update = $stat_upd->fetch_assoc()){
	stat_updates($stat_update['id']);
}
$pok_active = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND start_pok = 1');

// logger($arena);
// logger($usr);
// logger($conquer);
// logger($stat_upd);
// logger($stat_update);
// logger($pok_active);

//$bonus = $mysqli->query("SELECT * FROM `bonus` WHERE `user` = '".$_SESSION['user_id']."'")->fetch_assoc();
// if(!$bonus){
//	$next = time()+3600*24;
//    $mysqli->query("INSERT INTO bonus (next , user, count) VALUES ('".$next."','".$_SESSION['user_id']."','1') ");
//    $prize = 1;
//}else{
//if(($bonus['next']+3600*24) < time()) {
//	$next = time()+3600*24;
//    $mysqli->query("UPDATE bonus SET count = '1', next = '".$next."' WHERE `id` = '".$bonus['id']."'");
//    $prize = 1;
//}elseif($bonus['next'] < time()){
//$next = time()+3600*24;
//$mysqli->query("UPDATE bonus SET `count` = `count`+'1', `next` = '".$next."' WHERE `id` = '".$bonus['id']."'");
//$prize = $bonus['count']+1;
//}	
//}
//if(isset($prize) && $prize > 0) {
//  if($prize == 2){ $itm = 1;   $count = 10000; }else
//  if($prize == 3){ $itm = 61;  $count = 15; }else
 // if($prize == 4){ $itm = 1;   $count = 20000; }else
//  if($prize == 5){ $itm = 41;  $count = 8; }else
//  if($prize == 6){ $itm = 309; $count = 2; }else
//  if($prize == 7){ $itm = 309; $count = 4; }else
 // if($prize == 8){ $itm = 309; $count = 6; }else
//  if($prize == 9){ $itm = 72;  $count = 3; }else
//  if($prize == 10){ $itm = 72; $count = 3; }else{
//  	$itm = 1; $count = (1000*$prize)+10000;
 // }
//  plus_item($count,$itm);
 // $infIt = $mysqli->query("SELECT name FROM `base_items` WHERE `id` = '".$itm."'")->fetch_assoc();
//  $log_bonus = "<b>Ежедневный бонус: ".$infIt['name']." x".price($count)." <img src='/img/items/".$itm.".gif'></b>";
//}
$log_bonus = isset($log_bonus)?$log_bonus:'';
?> 
<h2>Pokezone приветствует вас, тренер <font color="<?=colorsUsers($user['groups']);?>"><?=$login;?></font>! </h2>
<!-- <div align='center'><big><b><span class='rednote'>Уважаемый тренер, обязательно прочтите <a href='http://forum.claimbe.ru/viewtopic.php?f=13&t=3' target='_blank'>Замечания по безопасности >></a><br> Это позволит надежно сохранить ваш аккаунт от взлома.</span></b></big></div> -->
<br>
<body>
   <!-- <script src="js/snowscript.js"></script> -->
<table width='100%'>
    <td width='220' valign='top' align='center'>
        <img src='img/avas/<?=$user['avatars'];?>.png' width='215' height='410' alt='' border='0' align='left'>
    </td>
    <td valign='top' style='font-size:14px;'>
    <?=$log_bonus;?><br>
    <!-- <big><b><span class='rednote'>Заберите ежедневный <a href='game.php?fun=daily'>бонус!<img src="https://i.gifer.com/YlWG.gif" alt="псидак"></a></span></b></big><br> -->
        <b>Регион:</b> <?=$region;?> 
        <br>
        <b>Последний раз вы были в мире Лиги:</b> <?=get_last_online($user['online_time']);?>
        <br>
        <?php
        $cLS = $mysqli->query("SELECT * FROM `sends` WHERE `user_to`='{$user_id}' and `view`='0'");
        $cls = isset($cLS->num_rows) ? $cLS->num_rows : 0;
        ?>
        <b>Непрочитанных <a href='game.php?fun=messages'>личных сообщений</a>: </b><?=$cls;?>
        <br>&nbsp;
        <table width=100%>
        <?php
        if(isset($pok_active->num_rows) && $pok_active->num_rows == 0 ){
        ?>
        <center>У вас нет стартового покемона</center>
        <?php  } else {
            $pok = $pok_active->fetch_assoc();
            if($pok['type'] == 'normal') { $img = 'normal'; $name = false;}
            elseif($pok['type'] == 'shine') {$img = 'shine';  $name = 'shine';}
            elseif($pok['type'] == 'shadow') {$img = 'shine'; $name = 'shadow';}
            elseif($pok['type'] == 'snowy') { $img = 'shine'; $name = 'snowy';}
            elseif($pok['type'] == 'fighter') {$img = 'shine';  $name = 'fighter';}
            elseif($pok['type'] == 'contest') {$img = 'shine';  $name = 'contest';}
            elseif($pok['type'] == 'champion') {$img = 'shine';  $name = 'champion';}
            elseif($pok['type'] == 'zombie') {$img = 'zombie';  $name = 'zombie';}
            elseif($pok['type'] == 'gym') {$img = 'shine';  $name = 'gym';}
            elseif($pok['type'] == 'Coordinator') {$img = 'shine';  $name = 'Coordinator';}
            elseif($pok['type'] == 'magistra') {$img = 'shine';  $name = 'magistra';}
            
            if(!empty($pok['name_new'])) $pokname = $pok['name_new'];
            else $pokname = $pok['name'];
        ?>
            <tr><td class='title' colspan='3' style='text-align:center; font-size:14px;'><a href='game.php?fun=pokemons'>ВАШИ ПОКЕМОНЫ</a></td></tr>
            <tr><td style='font-size:12px; font-weight:bold; background-color:#AFD0F1; text-align:center;'><a href=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=numbPok($pok['basenum']);?>","dex","width=600,height=600,scrollbars=yes");><img src='img/pokedex.gif' alt='Покедекс' title='Покедекс' border='0'></a>#<? print numbPok($pok['basenum']).' '.$pokname.' '.$pok['lvl'].'-lvl';?> <br><img src='img/pkmn/<?=$img;?>/<?=numbPok($pok['basenum']);?>.jpg' width='250' height='190' border='1'></td><td style='background-color:#AFD0F1;'>&nbsp;</td></tr>
            
        <?php } ?>
        </table>
    </td>
</table>
<hr>
<table width="100%">
    <tr>
        <td align="right" width=200>
            <b><?=$_SERVER['HTTP_HOST']?> || admin@<?=$_SERVER['HTTP_HOST']?></b><br>
            © 2009-<?=date('Y')?>
        </td>
    <tr>
</table>
</body>
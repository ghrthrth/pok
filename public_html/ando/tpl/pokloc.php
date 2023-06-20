<?
	if(!isset($_GET['clan_id']) || empty($_GET['clan_id'] || $_GET['clan_id'] == 0)){
		Header('Location: ../');
	}else{
		$clan_id = obr_chis($_GET['clan_id']);
	}
	$clan   = $mysqli->query('SELECT * FROM base_clans WHERE id = '.$clan_id)->fetch_assoc();
	$users  = $mysqli->query('SELECT * FROM users WHERE clan_id = '.$clan_id.' ORDER BY clan_admin DESC');
	$ratung = $mysqli->query('SELECT * FROM users WHERE clan_id = '.$clan_id);
	$count  = $users->num_rows;
	if($clan['tax'] == 1){
		$taxon = 'Вкл.';
	}else{
		$taxon = 'Выкл.';
	}
	if($user['clan_admin'] == 1 && $user['clan_id'] == $clan['id']){
		$admin = true;
	}
	if($user['clan_id'] == $clan['id']){
		$clanuser = true;
	}
	$clan_reiting = $clan['rating'];
?>
<html>
	<head>
		<meta http-equiv='Content-Type' content="text/html" charset="windows-1251">
		<title>POKEZONE > Кланкарта </title>
		<link rel="stylesheet" href="style.css" type="text/css" >
	</head>
	<body style="margin: 5 5 5 5">

  <table width='100%'>
    <tr>
      <td rowspan='2'><img src="http://claimbe.ru/img/clans/<?=$clan['id'];?>.gif" width='32' height='32'></td>
      <td align='center'><h2><?=$clan['name'];?></h2></td>
    </tr>
    <tr>
      <td align='center'>Рейтинг: <b><?=$clan_reiting;?></b>. <?php if($user['clan_id'] == $clan_id){ ?> Фонд: <b><?=price($clan['fond']);?>кр.</b><?php } ?></td>
    </tr>
  </table>

  <table width='100%' cellspacing='0' cellpadding='2'>
    <tr><td class='title' align='center'>Личный состав: <?=$count;?> | <?if(isset($admin)){?>Количество эмблем: <?=$clan['emblem_count'];?> | <?}?><?if(isset($clanuser)){?>Сбор налогов: <?=$taxon;?><?}?></td></tr>
    <tr><td style='background-color:#AFD0F1;'>
          <div style='width:100%; height:180; overflow: auto;'>
		  <?
		 
		  while($clanList = $users->fetch_assoc()){
			  // $clans = $mysqli->query('SELECT * FROM base_clans WHERE id = '.$clan_id)->fetch_assoc();
			  if($clanList['clan_admin'] == 1) { $admins = "<span class='rednote'>* </span>"; }else{ $admins = ""; }
			  if($clanList['clan_rating'] >= 0){ $color = 'green';}
			  elseif($clanList['clan_rating'] < 0){ $color = 'red';}
			?>
               <?=$admins;?><a href='/game.php?fun=treninf&to_id=<?=$clanList['id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$clanList['id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/img/question.gif' border=0></a> <font color='#6b89a8'><?=$clanList['clan_status'];?></font> <span style='color:<?=colorsUsers($clanList['groups']);?>;<? if($clan['admin_id'] == $clanList['id']){?>text-decoration:underline;<?}?>'><?=$clanList['login'];?></span> : <span style='color:<?=$color;?>'><?=$clanList['clan_rating'];?></span><br>
          <? } ?>
		  </div>
  </td></tr>
  <?php if($user['clan_id'] == $clan_id){ ?> 
   <tr><td class='title' align='center'>Последние события клана:</td></tr>
  <tr><td style='background-color:#AFD0F1;'>
          <div style='width:100%; height:180; overflow: auto; padding: 5px;'>
<?php $log_ = $mysqli->query("SELECT * FROM `clan_log` WHERE `clan` = '".$clan_id."' ORDER BY id DESC LIMIT 20");
while($log = $log_->fetch_assoc()){
	echo $log['log']."<br>";
}
 ?>
		  </div>
  </td></tr>
  <?php } ?>
  </table>
</body>
</html>

<?php
$npcloc = $mysqli->query("SELECT id, location FROM base_npc WHERE location = ".$user['location']."")->fetch_assoc();
if($user['status'] != 'free' && $user['status'] != 'talking' && $npcloc['location'] != $user['location']){
		echo "<script>alert('В данный момент вы не можете перемещаться по локациям!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['location'] == '2'){
		echo "<script>alert('В данный момент вы в тюрьме! Дождитесь окончания срока!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	/*}elseif($user['location'] != $npcloc['location']){
		echo "<script>alert('В данный момент админ тестит. Не беспокойтесь.');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");*/
}
$nameNPC = false;
$textNPC = false;
$moveNPC = false;
$filesLoc = "ando/itsmynpc/".$_GET['npc_id'].".php";
$fileimg = "img/npc/".$_GET['npc_id'].".png";
$filemusic = "mp3/".$_GET['npc_id'].".mp3";
if(!(file_exists($filesLoc))) {
	die("Ошибка при разговоре с NPC, пожалуйста сообщите администраторам.");
}else{
	include ($filesLoc);
}
?>
<HTML>
<head>
<meta HTTP-EQUIV='Content-Type' CONTENT='text/html;Charset=Windows-1251'>
<link REL='Stylesheet' HREF="/style.css" TYPE='text/css'>
</head>
<body ID='tab'>
<span id='txt'>
<h1><?=$nameNPC;?></h1><SPAN ID='txt'>
	<? if (file_exists($fileimg)){?>
<img src='img/npc/<?=$_GET['npc_id']?>.png'>
<?}?>
<b><?=$nameNPC;?></b>: 
<?=$textNPC;?>
<br>
<? if (file_exists($filemusic)) {?>
<audio controls muted>
	<source src="mp3/<?=$_GET['npc_id']?>.mp3" type="audio/mp3">
</audio>
<? } ?>
<P><?=$moveNPC;?>
<P ID='txt'><a href='game.php?fun=m_location&map=1'><< уйти</a>
</body>
</html>
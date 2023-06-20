<?php
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мастер телепортации';
$tur = 1;
if($npc == 110){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if($tur == 0){
if(empty($answer)){
$textNPC = 'Привет!';
}
}else{
if(array_key_exists('go',$_GET)) {
	$mysqli->query("UPDATE users SET location = '137', arena = '200' WHERE `id` = '".$_SESSION['user_id']."'");
	minus_item (3000,1);
	echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
	return;
}
if(empty($answer)){
$textNPC = 'Привет, я могу помочь тебе отправиться на Арену Западного Джото за 3.000 кредитов. Тебя это интересует?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&go=1">Да</a></li><br>';
}
}
?>
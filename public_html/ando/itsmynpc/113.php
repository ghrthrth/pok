<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Портал';
if($npc == 113){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(array_key_exists('go',$_GET)) {

	$mysqli->query("UPDATE users SET location = '".$user['arena']."', arena = '0' WHERE `id` = '".$_SESSION['user_id']."'");
	echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
	return;
}
if(empty($answer)){
$textNPC = '*Вдалеке виднеется Площадь Голденрода*';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&go=1">*Войти в протал*</a></li><br>';
}
?>
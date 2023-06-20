<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Билл';
if($npc == 25 && empty($answer)){
	$textNPC = 'Привет, тренер. Магазин пока не работает, потому что у нас совершенно нет товаров!';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
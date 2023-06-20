<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Флорист';
if($npc == 102 && empty($answer)){
	$textNPC = 'Мои цветочки... Нежные лепесточки и бутончики... а так хотелось порадовать любимых учителей с праздником...';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
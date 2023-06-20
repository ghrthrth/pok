<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Крис';
if($npc == 54){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(info_quest(48,'step') == 4){
if(empty($answer)){
$textNPC = 'Привет';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Привет, ты случайно не видел тут что-то подозрительное?</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Често говоря, да, видел. Один странный тип заходил в лес, а вышел уже с какой-то красной штуковиной в руках. Пожалуй все.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо, а ты не помнишь куда он пошел?</a></li>';	
}else
if($answer == 2){ 
	quest_update(48,5);
$textNPC = 'Помню, в сторону Оливина.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Большое спасибо!</a></li>';	

}
}else{
	echo "<script>parent.frames._location.location.reload();</script>";	
}

?>
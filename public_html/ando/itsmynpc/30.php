<?php #Незрячая
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Незрячая';
if($npc == 30 && empty($answer)){
	$textNPC = 'Я вижу. Страник. Вижу то, что может испугать.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Меня не испугать.</a></li>';
}elseif($npc == 30 && $answer == 1){
	$textNPC = 'Духи рядом. Они повсюду. У каждого свой. Есть добрые. Есть злые. Я вижу только злых. В этом моё страдание...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Кто же достался мне?</a></li>';
}elseif($npc == 30 && $answer == 2){
	$textNPC = ' Хм... Увы, я никого не вижу. НИКОГО! И НИЧЕГО!';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
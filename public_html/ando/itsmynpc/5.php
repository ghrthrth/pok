<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Филл';
if($npc == 5 && empty($answer)){
	$textNPC = 'Привет';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте.</a></li>';
}elseif($npc == 5 && $answer == 1){
	$textNPC = 'Ты уже встречал этих покемонов?!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Простите, каких покемонов?</a></li>';
}elseif($npc == 5 && $answer == 2){
	$textNPC = ' О! Это покемоны сбежавшие из института в Джото! Там были очень редкие экземпляры! Я точно знаю, что там был мой любимый покемон, Электробазз, теперь я задался целью найти его. Но помимо него, из института сбежало ещё много других покемонов, ладно, извини, мне некогда, нужно продолжать мои поиски, я уверен я его найду!';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
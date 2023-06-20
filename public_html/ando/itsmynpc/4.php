<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Майкл';
if($npc == 4 && empty($answer)){
	$textNPC = 'Доброго вам времени суток';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте, а чем вы тут занимаетесь?</a></li>';
}elseif($npc == 4 && $answer == 1){
	$textNPC = 'Хороший вопрос. Ничем. Да-да, ты не ослышался, я совершенно ничего не делаю. А живу я, за счёт своего особняка.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Особняка?</a></li>';
}elseif($npc == 4 && $answer == 2){
	$textNPC = 'Я сдаю в аренду крупный особняк на окраине Джото, вот недавно, туда заселилась какая-то пара. Правда, честно сказать, не внушают они доверия, и мяут их подозрительный. Ну ладно, не будем об этом.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Удачи вам.</a></li>';
}elseif($npc == 4 && $answer == 3){
	$textNPC = 'Ага, и тебе, до встречи.';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$img = "<img src='https://oldpokemon.ru/img/snowman2.gif' width='300' height='400'>";
$nameNPC = 'Снеговик';
if($npc == 506 && empty($answer)){
    $textNPC  = $img;
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1"><i>*лепить снеговика*</i></a></li>';
}elseif($npc == 506 && $answer == 1){
	$textNPC = ':3';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
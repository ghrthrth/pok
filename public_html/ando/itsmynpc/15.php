<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Бармен';
if($npc == 15 && empty($answer)){
	$textNPC = 'Добрый день, что-нибудь выпить?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Привет. Можно чашку чая?</a></li>';
}elseif($npc == 15 && $answer == 1){
	$textNPC = 'Да, конечно. С тебя 5000 кредитов.';
	$zapros = $mysqli->query('SELECT * FROM user_items WHERE user_id = '.$_SESSION['user_id'].' AND item_id = 1 AND count >= 5000');
	if($zapros->num_rows > 0){
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Вот, держи.</a></li>';
    }
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, спасибо. Это слишком дорого.</a></li>';
}elseif($npc == 15 && $answer == 2){
	minus_item(5000,1);
		$textNPC = 'Вот держите.';
 }
?> 
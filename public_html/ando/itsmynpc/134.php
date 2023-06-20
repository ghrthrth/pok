<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Секретарь';
if($npc == 134 && empty($answer)){
	$textNPC = 'Здравствуйте. Мы ведем статистику по миру Лиги 17, а так же оказываем различные услуги населению. Чем я могу вам помочь?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Расшифровка моего ранга</a></li>';
}elseif($npc == 134 && $answer == 1){
	$textNPC = ' Стоимость услуги - 7000 кр';
	$zapros = $mysqli->query('SELECT * FROM user_items WHERE user_id = '.$_SESSION['user_id'].' AND item_id = 1 AND count >= 7000');
	if($zapros->num_rows > 0){
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Вот, держите. <sup>[Отдать деньги]</sup></a></li>';
	}
}elseif($npc == 134 && $answer == 2){
	minus_item(7000,1);
	$winprc = round($user['win']/$user['btl_count']*100);
	$textNPC = 'Ваша <b>популярность</b> составляет - '.$user['population'].', <b>репутация</b> - '.$user['reputation'].',  <b>процент побед</b> - '.$winprc.'%.';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
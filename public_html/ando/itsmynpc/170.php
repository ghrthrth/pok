<?php  // Софи
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Новогодняя ёлка';
if($npc == 170) { }else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
	$textNPC = '<i>Посреди деревни стоит скромная новогодняя ёлочка. Прямо под ним лежит целый ворох подарков. Может быть взяь один подарок?</i>';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1"><i>Подойти и взять подарок</i></a></li>';
}elseif($answer == 1 and !info_quest(170,'step')){
	$usr = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
	$textNPC = 'На подарке написано: <b>С наступающим Новым годом, '.$usr['login'].'</b>!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Ура! У меня есть подарок!</a></li>';
	plus_item(1,442);
	quest_update(170,1);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 

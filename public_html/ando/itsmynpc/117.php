<?php #Фред Сваровски
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Фред Сваровски';
if($npc == 117 && empty($answer) && info_quest(117,'step') >= 1){
$textNPC = 'Здравствуй!';
}
elseif($npc == 117 && empty($answer)){
	$textNPC = 'Бедный Вэйлорд...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте! О каком Вэйлорде идет речь?</a></li>';
}elseif($npc == 117 && $answer == 1){
	$textNPC = 'На берегу острова огромного Вэйлорда прибило волной к берегу и он там застрял... Не повезло же ему...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Бедный Вэйлорд! Я должен ему помочь!</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Бывает, это вообще не мое дело.</a></li>';
}elseif($npc == 117 && $answer == 2){
	$textNPC = 'Только добраться туда не так и легко, ведь путь к берегу закидан камнями.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">И как туда пройти?</a></li>';
}elseif($npc == 117 && $answer == 3){
	$textNPC = 'Спроси у Строителя, он даст тебе лучше совет.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо!</a></li>';
	quest_update(117,1);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
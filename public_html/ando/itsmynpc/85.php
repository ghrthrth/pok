<?php #Мистер Букер
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мистер Букер';
if($npc == 85 && empty($answer) && !info_quest(82,'step')){
	$textNPC = 'Уходите! Тут проводятся иследования!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините.</a></li>';
}elseif($npc == 85 && empty($answer) && info_quest(82,'step') == 4){
	$textNPC = 'Уходите! Тут проводятся иследования!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Постойте, это вы Мистер Букер?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините.</a></li>';
}elseif($npc == 85 && $answer == 1  && info_quest(82,'step') == 4){
	$textNPC = 'Да, а что случилось? Я просто сейчас очень занят.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Вы бы знали... В Джото беда, все Трико покинули родные леса и никто не может с этим ничего поделать...</a></li>';
}elseif($npc == 85 && $answer == 2  && info_quest(82,'step') == 4){
	$textNPC = 'Как покинули?! Нужно срочно выезжать! Но я не закончил важную экспедицию тут.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Я могу принести нужных вам покемонов.</a></li>';
}elseif($npc == 85 && $answer == 3  && info_quest(82,'step') == 4){
	$textNPC = 'Хорошо, мне нужны #066 Machop, #104 Cubone и #115 Kangaskhan 1 уровня. Отдашь их мне в Восточном Джото. А я тогда собираюсь в путь.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Хорошо, увидимся там!</a></li>';
	quest_update(82,5);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Офицер Дженни';
if($npc == 3 && empty($answer)){
	$textNPC = 'Приветствую, покетренер!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&answ_id=1&map=1">Где я могу вылечить своих покемонов?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&answ_id=2&map=1">Где я могу купить или продать вещи?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&answ_id=3&map=1">Расскажите мне об этом городе?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&answ_id=5&map=1">Я знаю о нарушении правил Лиги!</a></li>';
}elseif($npc == 3 && $answer == 1){
	$textNPC = 'Вам нужно в покецентр. Сестра Джой поможет вам и вашим покемонам.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&map=1">У меня другой вопрос</a></li>';
}elseif($npc == 3 && $answer == 2){
	$textNPC = 'Посетите супермаркет. Это крупнейший магазин Голденрода и всего региона Джото!
Так же вы всегда можете купить предметы у других тренеров,а что бы ваше сообще было более заметно,вы можете начать сообщение с /trade,но помните что такое сообщение можно отправлять раз в 10 минут,или вас могут временно лишить возможности писать в чат! ';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&map=1">У меня другой вопрос</a></li>';
}elseif($npc == 3 && $answer == 3){
	$textNPC = 'Голденрод - столица региона Джото! Город был основан более тысячи лет назад исследователями, изучавшими новые виды покемонов. Сейчас это бурлящий жизнью и энергично развивающийся мегаполис. Каждый покетренер начинает своё путешествие именно здесь. Персональные телепортеры настроены на площадь Голденрода. Здесь располагается самая крупная Арена Лиги-17, предназначенная для проведения боев, институты и академии для покетренеров, мэрия и многие другие важные объекты.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&answ_id=4&map=1">Телепортеры?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&map=1">У меня другой вопрос</a></li>';
}elseif($npc == 3 && $answer == 4){
	$textNPC = 'В любой момент вы можете попасть на площадь Голденрода набрав в чате /tp';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&map=1">У меня другой вопрос</a></li>';
}elseif($npc == 3 && $answer == 5){
	$textNPC = 'Сообщите известную вам информацию игровой полиции!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&answ_id=6&map=1">Где мне найти полицию?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&map=1">У меня другой вопрос</a></li>';
}elseif($npc == 3 && $answer == 6){
	$textNPC = 'Обратите внимание на людей находящихся с вами в локации - имена Администраторов Лиги-17 и полиции отличаются цветом!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3&map=1">У меня другой вопрос</a></li>';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>
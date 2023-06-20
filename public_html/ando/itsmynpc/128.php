<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Инструктор Сорен';
$poks = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
$active = $poks->num_rows;
if(!info_quest(128,'step') == 2 && $active < 4){
	if($npc == 128 && empty($answer)){
		$textNPC = 'Привет! Мой коллега Олин сказал что ты способный ученик! Что ж, проверим. С помощью специального аппарата - покебола - можно поймать дикого покемона, только если он достаточно ослаб во время битвы с уже прирученным покемоном, иначе дикий покемон может вырваться. Покебол - вещь, необходимая любому тренеру покемонов. О технологии их функционирования известно далеко не все. Если бол достиг своей цели, а не был отбит или пущен мимо, он открывается, конвертирует покемона внутри себя в сгусток энергии и закрывается. Пойманный покемон быстро становится ручным. Тебе пора попрактиковаться в поимке покемонов. Отправляйся в Зеленую зону, поймай как минимум три разных покемона и принеси мне три покебола с ними внутри.';
		quest_update(128,2);
		plus_item(35,60);
	}
}elseif(!info_quest(128,'step') == 2 && $active >= 4){
	if($npc == 128 && empty($answer)){
		$textNPC = 'Привет! Мой коллега Олин сказал что ты способный ученик! Что ж, проверим. С помощью специального аппарата - покебола - можно поймать дикого покемона, только если он достаточно ослаб во время битвы с уже прирученным покемоном, иначе дикий покемон может вырваться. Покебол - вещь, необходимая любому тренеру покемонов. О технологии их функционирования известно далеко не все. Если бол достиг своей цели, а не был отбит или пущен мимо, он открывается, конвертирует покемона внутри себя в сгусток энергии и закрывается. Пойманный покемон быстро становится ручным. Тебе пора попрактиковаться в поимке покемонов. Отправляйся в Зеленую зону, поймай как минимум три разных покемона и принеси мне три покебола с ними внутри.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я поймал трех покемонов.</a></li>';
	}if($npc == 128 && $answer == 1){
		$textNPC = ' Какие прекрасные покемоны! Думаю ты можешь оставить их в своей команде. Не забывай что дикие покемоны водятся почти в каждом уголке мира Лиги. Старайся искать редких и сильных покемонов. Теперь обратись к Инструктору Джеку для продолжения обучения.';
		quest_update(128,2);
	}
}elseif(!info_quest(128,'step') == 2 && $active <= 4){
	$textNPC = 'Напоминаю, твоя задача - поймать с помощью покебола, 3 покемонов и принести мне.';
}elseif(!info_quest(128,'step') == 2){
	$textNPC = 'Привет! Кажется, ты полностью освоил мой курс.';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
 /*$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Кембелл';
if($npc == 128){ }else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
	if(empty($answer)){
		$textNPC = 'Приветствую, юный Тренер. Я представитель компании "ColoresEgg". Из за праздника у нас недостаток Яиц для пасхи. Меня направили сюда. Говорят что вы можете помочь мне с проблемой? Я награжу вас в зависимости от количества собранных вами яиц.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Конечно, держите!</a></li>';
	}if($answer == 1 && info_quest(128,'step') == 2 && item_isset(1044,1){
		$textNPC = 'Вот, держи. ';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		plus_item(1,23,$_SESSION['user_id']);
		quest_update(128,2);
		}if($answer == 1 && info_quest(128,'step') == 2 && item_isset(1044,51){
		$textNPC = 'Вот, держи. ';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		plus_item(1,24,$_SESSION['user_id']);
		quest_update(128,2);
		}if($answer == 1 && info_quest(128,'step') == 2 && item_isset(1044,101){
		$textNPC = 'Вот, держи. ';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		plus_item(1,25,$_SESSION['user_id']);
		quest_update(128,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
*/
?> 
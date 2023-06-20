<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Импа';
if($npc == 168 && empty($answer)){
	if(!info_quest(168,'step') == 1){
		$textNPC = 'Ты что - то хотел, тренер? Мне уже не нужна помощь, спасибо большое.';
			//$textNPC = '*У Импы растерянный вид. Может быть узнать что случилось?*';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Хорошо, до свидания!</a></li>';
	        //$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">У вас что-то случилось? Такой праздник на носу, а на вас нет лица!</a></li>';
	    }elseif(info_quest(168,'step') == 1 and item_isset(443,1)){
	    	$textNPC = 'Ты победил злую сущность?? И заполучил ценный для нас артефакт? Мы все благодарны тебе за это! От лица всей нашей деревни прими данную благодарность. Тут список покемонов, и так же будет список ТМ - атак. Я думаю они тебе пригодятся, странник.';
	    	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=10&map=1">Я выбираю: #137 Porygon + оба модернизатора.</a></li>';
	    	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=11&map=1">Я выбираю: #079 Slowpoke + корона.</a></li>';
            $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=12&map=1">Я выбираю: #447 Riolu + эвольвер счастья.</a></li>';
            $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=13&map=1">Я выбираю: #207 Gligar + режущий клык.</a></li>';
            $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=14&map=1">Я выбираю: #215 Sneasel + режущий коготь.</a></li>';
	    }
}elseif($answer == 1) {
	$textNPC = 'Случилось? А, добрый день юный тренер. Это я так, вспомнила былое, не обращай внимание.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Видимо, это нечто важное для вас?</a></li>';
}elseif($answer == 2) {
	$textNPC = 'Верно мыслишь, но вряд ли сможешь поверить в нечто подобное. Никто мне не верит...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Быть может, я смогу поверить вам?</a></li>';
}elseif($answer == 3) {
	$textNPC = 'Какой ты словоохотливый. Что же, ладно, всё равно спешить некуда. Эта история берёт своё начало ещё задолго до моего рождения, в те времена, когда дома освещались светом свечи и камином и электричество Теслa только снилось. Так вот, местная гора была обителей одного старателя, что прибыл к нам из далёкого края и даже речь его была неясна. Он же повсеместно пытался найти зацепку для какой-то легенды и подолгу пропадал в глуши здешних окрестностей, но люди быстро к нему привыкли. Так вот, в один прекрасный момент он ушёл на долго, все уж подумали что бедняга вернулся восвояси не найдя искомого, но всё же, он вернулся. Вернулся буквально за неделю до нового года и знаешь что?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Что? Говорите дальше, мне очень интересно.</a></li>';
}elseif($answer == 4) {
	$textNPC = 'Ааа, вижу что не знаешь, рот открыл - глаза горят. Интересно? Ну так слушай. Вернулся он весь исхудалый, грязный, от одежды - одно название. Но самое странное - дикий взгляд и то, что он постоянно себе нашептывал "Он видит все наши грехи и он придёт за нами". Казалось бы, свихнулся бедолага, но...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Но?</a></li>';
}elseif($answer == 5) {
	$textNPC = 'Но с момента его возвращения, каждый день вплоть до самой новогодней ночи пропадало по человеку. Сперва пропажи были обнаружены в окрестных тюрьмах, но после исчезали обычные селяне. Не было ни следа, ни догадки, все думали что одни успешно сбегали, другие просто неожиданно переезжали. Данная история повторяется каждые семь лет, но мало кто уж и помнит историю о старателе...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=6&map=1">Вон оно что... Так вот почему вы так сильно волнуетесь. Этот год седьмой, я ведь прав?</a></li>';
}elseif($answer == 6) {
	$textNPC = 'Верно. Я очень долго изучала эту тему и нашла весьма интересную статью, в которой была гипотеза одного учёного о том, что крайне редко покемоны, которые переступили на сторону зла по тем или иным причинам, могут становиться фактически бессмертными. Но, как я и говорила - никто мне не верит...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=7&map=1">Так давайте же я проведу своё собственное расследование! Я довольно сильный тренер и смогу постоять за себя!</a></li>';
}elseif($answer == 7) {
	$textNPC = 'Судя по тому, каков огонь азарта в твоих глазах, отговаривать тебя нет смысла? Что же, тогда, не стану препятствовать. Я верю в тебя!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Я разберусь в данной проблеме, и спасу Новый год!</a></li>';
	quest_update(168,1);
}elseif($answer == 10 and info_quest(168,'step') != 2 and info_quest(168,'step') != 3){
	$textNPC = 'Держи свою награду!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=8&map=1">Спасибо. Ещё будет ТМ-Атака?</a></li>';
	quest_update(168,2);
	neweventPokemon(137,$_SESSION['user_id']);
	plus_item(1,140);
	plus_item(1,252);
	minus_item(1,443);
}elseif($answer == 11 and info_quest(168,'step') != 2 and info_quest(168,'step') != 3){
	$textNPC = 'Держи свою награду!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=8&map=1">Спасибо. Ещё будет ТМ-Атака?</a></li>';
	quest_update(168,2);
	neweventPokemon(79,$_SESSION['user_id']);
	plus_item(1,25);
	minus_item(1,443);
}elseif($answer == 12 and info_quest(168,'step') != 2 and info_quest(168,'step') != 3){
	$textNPC = 'Держи свою награду!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=8&map=1">Спасибо. Ещё будет ТМ-Атака?</a></li>';
	quest_update(168,2);
	neweventPokemon(447,$_SESSION['user_id']);
	plus_item(1,143);
	minus_item(1,443);
}elseif($answer == 13 and info_quest(168,'step') != 2 and info_quest(168,'step') != 3){
	$textNPC = 'Держи свою награду!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=8&map=1">Спасибо. Ещё будет ТМ-Атака?</a></li>';
	quest_update(168,2);
	neweventPokemon(207,$_SESSION['user_id']);
	plus_item(1,306);
	minus_item(1,443);
}elseif($answer == 14 and info_quest(168,'step') != 2 and info_quest(168,'step') != 3){
	$textNPC = 'Держи свою награду!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=8&map=1">Спасибо. Ещё будет ТМ-Атака?</a></li>';
	quest_update(168,2);
	neweventPokemon(215,$_SESSION['user_id']);
	plus_item(1,303);
	minus_item(1,443);
}elseif($answer == 8 and info_quest(168,'step') == 2){
	$textNPC = 'Верно. Что выберешь?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=20&map=1">Я выбираю: ТМ 6 Toxic.</a></li>';
    $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=21&map=1">Я выбираю: ТМ 26 Earthquake.</a></li>';
    $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=22&map=1">Я выбираю: ТМ 55 Scald.</a></li>';
    $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=23&map=1">Я выбираю: ТМ 44 Rest.</a></li>';
}elseif($answer == 20 and info_quest(168,'step') != 3 and info_quest(168,'step') == 2) {
	$textNPC = 'Вот и твоя ТМ-Атака. Спасибо еще раз за помощь, тренер. Кстати, Пайя хотела тебя видеть. Ты сходишь к ней?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо большое, Импа. Хорошо, я схожу к ней.</a></li>';
	plus_item(1,1011);
	quest_update(168,3);
}elseif($answer == 21 and info_quest(168,'step') != 3 and info_quest(168,'step') == 2) {
	$textNPC = 'Вот и твоя ТМ-Атака. Спасибо еще раз за помощь, тренер. Кстати, Пайя хотела тебя видеть. Ты сходишь к ней?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо большое, Импа. Хорошо, я схожу к ней.</a></li>';
	plus_item(1,1019);
	quest_update(168,3);
}elseif($answer == 22 and info_quest(168,'step') != 3 and info_quest(168,'step') == 2) {
	$textNPC = 'Вот и твоя ТМ-Атака. Спасибо еще раз за помощь, тренер. Кстати, Пайя хотела тебя видеть. Ты сходишь к ней?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо большое, Импа. Хорошо, я схожу к ней.</a></li>';
	plus_item(1,1038);
	quest_update(168,3);
}elseif($answer == 23 and info_quest(168,'step') != 3 and info_quest(168,'step') == 2) {
	$textNPC = 'Вот и твоя ТМ-Атака. Спасибо еще раз за помощь, тренер. Кстати, Пайя хотела тебя видеть. Ты сходишь к ней?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо большое, Импа. Хорошо, я схожу к ней.</a></li>';
	plus_item(1,1003);
	quest_update(168,3);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
<?php #Бридж
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Сария';
$prov_farf = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 83 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_dodu = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 84 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_tail = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 276 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_murk = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 198 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_hoot = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 163 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
if($npc == 81 && empty($answer)){
	if(!info_quest(81,'step')){
		$textNPC = 'Приве-е-ет тренерюшка!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Тренерюшка?! Ты чего обзываешься?? </a></li>';
	}elseif(info_quest(81,'step') == 1){
		$textNPC = 'Ты уже принёс мне моих птенчиков?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, держи, только осторожно.</a></li>';
	}else{
		$textNPC = 'Хей - хей! Привет! Помнишь этого Фарфетчта? Он хочет стать Сэром - Фарфетчтом! Как думаешь, скоро ли он сможет?';
	}
}elseif($npc == 81 && $answer == 1){
	if(!info_quest(81,'step')){
		$textNPC = 'Ай, да ладно тебе, не обижайся! Слушай, а ты можешь мне помочь? Не так давно я очень сильно увлеклась Летающими покемонами, и...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Прости что перебил, но почему именно Летающие? Ведь есть куча других классных типов покемонов! Вот мне например нрави...</a></li>';
	}elseif(info_quest(81,'step') == 1){
		if($prov_farf['id'] && $prov_dodu['id'] && $prov_tail['id'] && $prov_murk['id'] && $prov_hoot['id']){
            $textNPC = 'Вот это чудесно-расчудесно. А ты скулил тут, прямо как Гроули. Молодец, вот тебе немного за помощь. У меня здесь завалялись Наборы тренировок х5, ТМ 36 - Sludge Bomb, Камни - Мегаэволюции х3, и один Билет удачи. Надеюсь тебе придутся по душе эти призы. Возможно когда нибудь я ещё тебя о чём - нибудь попрошу, спасибо!';
            $moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Пока - пока.</a></li>';
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_farf['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_dodu['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_tail['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_murk['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_hoot['id']);
			plus_item(5,330);
			plus_item(1,1007);
			plus_item(3,1046);
			plus_item(1,1051);
			quest_update(81,2,1);
		}else{
			$textNPC = 'Их не хватает! Ты что забыл кто мне нужен? Тогда записывай: Farfetchd, Doduo, Taillow, Murkrow и Hoothoot, но помни что я хочу воспитать их сама и мне нужны новорожденные птенцы.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Ой, да блин разоралась! Сейчас я найду, успокойся.</a></li>';
		}
	}
}elseif($npc == 81 && $answer == 2){
	if(!info_quest(81,'step')){
		$textNPC = 'А вот теперь я тебя перебью! Отвечу на твой вопрос - ты только представь! Красивые крылья, грациозный полёт... В общем, я хочу вывести очень - очень - очень - очень - очень - очень - очень много таких покемонов!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">И конечно же ты хочешь что бы я изловил для тебя несколько таких покемонов, я прав?</a></li>';
	}
}elseif($npc == 81 && $answer == 3){
	if(!info_quest(81,'step')){
		$textNPC = 'Какой же ты догадливый! Абсолютно верно.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Опять одно и то же. Неужели никто не может попросить сделать что то интересное?...</a></li>';
	}
}elseif($npc == 81 && $answer == 4){
	if(!info_quest(81,'step')){
		$textNPC = 'Так, хватит скулить! Быстро за работу, коль ты уже согласился! Записывай кто мне нужен: Farfetchd, Doduo, Taillow, Murkrow и Hoothoot, но помни что я хочу воспитать их сама и мне нужны новорожденные птенцы.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Окей, я найду для тебя их.</a></li>';
		quest_update(81,1);
	}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>
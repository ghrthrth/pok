<?php
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id', $_GET) ? obr_chis($_GET['npc_id']) : '';
$answer = array_key_exists('answ_id', $_GET) ? obr_chis($_GET['answ_id']) : '';
$nameNPC = 'Турист'; // поменять имя если не нравится
$prov_rogenrola = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 524 AND lvl <=15  AND user_id = ' . $_SESSION['user_id'] . ' LIMIT 1 ')->fetch_assoc();
if ($npc == 189 && empty($answer)) { // придумать айди нпс
	if (!info_quest(189, 'step')) {
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=' . $npc . '&answ_id=2&map=1">Здравствуйте, меня к вам направила Джувия!</a></li>';
	} elseif (info_quest(189, 'step') == 1 or info_quest(189, 'step') == 2) {
		$textNPC = '...?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=' . $npc . '&answ_id=2&map=1">Здравствуйте вновь, вот все что вы просили!</a></li>';
		quest_update(189, 2);
	} elseif (info_quest(189, 'step') == 3) {
		$textNPC = 'Ты нажал на уйти?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=' . $npc . '&answ_id=2&map=1">..</a></li>';
	} else {
		$textNPC = 'Чуть пойзже.'; // текст после выполнения квеста если с ней снова говорить
	}
} elseif ($npc == 189 && $answer == 2) {
	if (!info_quest(189, 'step')) {
		$textNPC = 'Хохо, приветствую! Да мой друг я знаю такую, что ты отменя хочешь?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=' . $npc . '&answ_id=3&map=1">Она поделилась со мной информацией о Хо-охе и посоветовала обратиться к вам!</a></li>';
	} elseif (info_quest(189, 'step') == 2) {
		if ($prov_rogenrola['id'] && item_isset(323,30)) {
			$textNPC = 'Приветствую, благодарю за твою помощь, теперь и мой черёд тебе помочь.
    	О Хо-охе я услышал от одного туриста, который приехал покорять наши регионы в рамках своего кругосветного путешествия. Пересеклись мы как раз неподалёку от
    	Целадона, он заплутал и не мог сообразить как добраться до местного кондитерского городка в котором ему крайне сильно хотелось задержаться. Я помог ему, 
    	подсказав дорогу и сориентировав на местности, завязался разговор в котором он и поведал о своей встрече с каким-то скитальцем Хоэнна, якобы тот знает, где 
    	эта чудо-птица нашла своё пристанище!';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=' . $npc . '&answ_id=3&map=1">Хорошо, значит, сладкий городок говорите?</a></li>';
			quest_update(189, 3);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = ' . $prov_rogenrola['id']);
			plus_item(30, 330); // промежутоные призы я не знаю какие
			plus_item(1, 1112);
			plus_item(1, 1051); 
			plus_item(1, 1135); // фотография хооха для привязки к локе
			minus_item(1, 1134); // забирает конверт
			minus_item(30, 323); // пластины
		} else {
			$textNPC = 'Чем ты слушал(а), я же сказал мне нужно: #524 Roggenrola 15 и ниже уровня и 30 металлических пластин!! ';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините,я все сделаю правильно.</a></li>';
			quest_update(189, 2);
		}
	}
} elseif ($npc == 189 && $answer == 3) {
	if (!info_quest(189, 'step')) {
		$textNPC = 'Я много чего о нем знаю, но перед тем как я тебе расскажу ты должен мне помочь?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=' . $npc . '&answ_id=4&map=1">Опять!? Ладно я тебе помогу!</a></li>';
	} elseif (info_quest(189, 'step') == 3) {
		$textNPC = 'Верно, возможно ты ещё застанешь его там! И, тренер, спасибо тебе за помощь, держи - пригодится : Набор Тренировки x30, Билет Удачи x1, TM 106 - Energy Ball, Конверт из Канто.
            Всё, направляйтесь в Восточный Шафран!'; // тут надо дописать какие призы будут
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">....</a></li>';
		quest_update(189, 4, 1);
	}
} elseif ($npc == 189 && $answer == 4) {
	if (!info_quest(189, 'step')) {
		$textNPC = 'Отлично, мне нужно чтобы ты принес(ла), #524 Roggenrola 15 и ниже уровня и 30 металлических пластин';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Опять этот нудный фарм, но что делать я все принесу!</a></li>';
		quest_update(189, 1);
	}
} else {
	die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}

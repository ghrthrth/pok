<?php #Бридж
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Сорен';
$prov_happ = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 440 AND lvl = 1 AND active = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_bask = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 550 AND lvl = 1 AND active = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_koff = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 109 AND lvl = 1 AND active = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_grow = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 58 AND lvl = 1 AND active = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_raic = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 26 AND lvl = 1 AND active = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
if($npc == 166 && empty($answer)){
	if(!info_quest(166,'step')){
		$textNPC = 'Хей! Привет! Не хочешь помочь мне за необычную награду?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Ты меня заинтересовал, продолжай...</a></li>';
	}elseif(info_quest(166,'step') == 1){
		$textNPC = 'Ну как там наше дело?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Выполнено, держи их. Но аккуратно.</a></li>';
	}else{
		$textNPC = 'Хей - хей! Привет! Ну, как тебе Саландит? Милашка, не правда ли?';
	}
}elseif($npc == 166 && $answer == 1){
	if(!info_quest(166,'step')){
		$textNPC = 'В общем, такое дело... Мой младший братик собирается стать тренером покемонов, и скоро у него будет День рождения. И я хочу сделать подарок в виде небольшой комады покемонов.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">И я так думаю, тебе нужны кто-то необычные?</a></li>';
	}elseif(info_quest(166,'step') == 1){
		if($prov_happ['id'] && $prov_bask['id'] && $prov_koff['id'] && $prov_grow['id'] && $prov_raic['id']){
            $textNPC = 'Отлично. Просто прекрасно. Итс селебрейтбл! Держи за свои старания редкого покемона Саландита. И немного налички, я думаю, она тебе нужна.';
            $moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Ого, какой покемон. Спасибо большое.</a></li>';
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_happ['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_bask['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_koff['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_grow['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_raic['id']);
			plus_item(1200000,1);
			newPokemon(757,$_SESSION['user_id']);
			quest_update(166,2,1);
		}else{
			$textNPC = 'Их не хватает! Ты что забыл кто мне нужен? Тогда записывай: Happiny, Basculin, Growlithe, Koffing, Raichu. Но помни что это подарок для брата, и нужно что бы они были 1-го уровня.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Прости, сейчас найду.</a></li>';
		}
	}
}elseif($npc == 166 && $answer == 2){
	if(!info_quest(166,'step')){
		$textNPC = 'Да, но видишь ли... Я думаю что это будет не так уж и просто.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Почему же?</a></li>';
	}
}elseif($npc == 166 && $answer == 3){
	if(!info_quest(166,'step')){
		$textNPC = 'Дело в том что он фанатеет от определенных покемонов. А их не так уж и легко поймать.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Не тяни уже резину, скажи кто тебе нужен? И стоит ли это того?</a></li>';
	}
}elseif($npc == 166 && $answer == 4){
	if(!info_quest(166,'step')){
		$textNPC = 'В общем мне нужны: Happiny, Basculin, Growlithe, Koffing, Raichu. И все они должны быть 1-го уровня что бы сразу же начать обучение.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Окей, я найду для тебя их.</a></li>';
		quest_update(166,1);
	}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>
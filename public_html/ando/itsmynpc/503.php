<?php #Ивент
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Егерь';
$pok1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '220' and `atk1` = '420' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$pok2 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '225' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$pok3 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '361' and `atk1` = '423' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$pok4 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '712' and `atk1` = '301' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$pok5 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '215' and `atk1` = '196' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
if($npc == 503 && empty($answer)){
	if(info_quest(500,'step') == 5){
		$textNPC = 'Что вас занесло в эти леса?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте! Организатор выступлений передал мне что вам нужна помощь.</a></li>';
	}elseif(info_quest(500,'step') == 6){
		$textNPC = 'Ты уже принес покемонов? Напоминаю, мне нужны #220 Swinub с Ice Shard, #225 Delibird, #361 Snorunt с Ice Fang, #712 Bergmite c Ice Ball, #215 Sneasel c Icy Wind, учти что все атаки должны стоять первые в списке изученных. Все они обитают на о. Селене.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Да, держите!</a></li>';
	}else{
		$textNPC = 'С Наступающим тебя!';
	}
}elseif($npc == 503 && $answer == 1){
		$textNPC = 'Да, мне действительно нужна помощь...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я могу помочь, я обещал Деду Морозу.</a></li>';
	}elseif(info_quest(500,'step') == 6 && $answer == 5){
		if($pok1['id'] && $pok2['id'] && $pok3['id'] && $pok4['id'] && $pok5['id']){
			$textNPC = 'Спасибо! Теперь мы построим самого огромного снеговика в мире! За свои старания держи: Случайная Карта х5. Кстати, недавно в лесу я видел Праздничного Оленя Деда Мороза, но он сбежал от меня и сейчас находится где-то на острове, мне кажется что Дед Мороз ищет его и было бы неплохо отвезти его Деду Морозу в Восточное Джото и лучше всего использовать Мастербол для его поимки.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо за информацию, до свидания! Я должен успеть поймать его и отдать Деду Морозу!</a></li>';
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok1['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok2['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok3['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok4['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok5['id']);
			plus_item(5,427);
			quest_update(500,7);
		}else{
			$textNPC = 'Почему ты меня обманиваешь? Напоминаю, мне нужны #220 Swinub с Ice Shard, #225 Delibird, #361 Snorunt с Ice Fang, #712 Bergmite c Ice Ball, #215 Sneasel c Icy Wind, учти что все атаки должны стоять первые в списке изученных. Все они обитают на о. Селене.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините.</a></li>';
		}
	}elseif($npc == 503 && $answer == 2){

		$textNPC = 'Для хорошего Нового Года нам нужен огромный снеговик...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">...</a></li>';
	
	
}elseif($npc == 503 && $answer == 3){

		$textNPC = 'Для его постройки нам надо покемонов с определенными ледяными атаками.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Я принесу вам нужных покемонов.</a></li>';
	
}elseif($npc == 503 && $answer == 4){
	
		$textNPC = 'Вот и отлично! Мне нужны #220 Swinub с Ice Shard, #225 Delibird, #361 Snorunt с Ice Fang, #712 Bergmite c Ice Ball, #215 Sneasel c Icy Wind, учти что все атаки должны стоять первые в списке изученных. Все они обитают на о. Селене.';
        $moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Хорошо, я мигом соберу их всех!</a></li>'; 
		quest_update(500,6);
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>
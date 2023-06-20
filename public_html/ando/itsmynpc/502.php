<?php #Ивент
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Организатор выступлений';
$pok1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '19' and `character` = '2' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$pok2 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '19' and `character` = '3' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$pok3 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '19' and `character` = '4' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$pok4 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '19' and `character` = '13' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$pok5 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '19' and `character` = '18' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
if($npc == 502 && empty($answer)){
	if(info_quest(500,'step') == 3){
		$textNPC = 'Отойдите... не мешайте организации праздника...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте! Я от Деда Мороза! </a></li>';
	}elseif(info_quest(500,'step') == 4){
		$textNPC = 'Ты уже принес покемонов? Напоминаю, нам нужны 5 #019 Rattata для массовки, а именно #019 Rattata с характерами Выносливый, Застенчивый, Кроткий, Обычный, Причудливый.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Да, держите!</a></li>';
	}else{
		$textNPC = 'С Наступающим тебя!';
	}
}elseif($npc == 502 && $answer == 1){
		$textNPC = 'От Деда Мороза? Ха-ха, очень смешно.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я говорю правду! Дед Мороз сейчас в Канто, с ним случилась беда и он попросил меня помочь вам с организацией праздника.</a></li>';
	}elseif(info_quest(500,'step') == 4 && $answer == 5){
		if($pok1['id'] && $pok2['id'] && $pok3['id'] && $pok4['id'] && $pok5['id']){
			$textNPC = 'Спасибо, ты нас очень выручил! За твою помощь держи от нас скромный презент - Набор тренировки х3. Если хочешь дальше помогать с организацией плыви на о. Селен и поговори там с Егерем.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо, до свидания!</a></li>';
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok1['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok2['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok3['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok4['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok5['id']);
			plus_item(3,330);
			quest_update(500,5);
		}else{
			$textNPC = 'Почему ты меня обманиваешь? Напоминаю, нам нужны 5 #019 Rattata для массовки, а именно #019 Rattata с характерами Выносливый, Застенчивый, Кроткий, Обычный, Причудливый.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините.</a></li>';
		}
	}elseif($npc == 502 && $answer == 2){

		$textNPC = 'Звучит правдоподобно. Хорошо, нам как раз нужна помощь.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Я готов помочь ради праздника.</a></li>';
	
	
}elseif($npc == 502 && $answer == 3){

		$textNPC = 'У нас есть идея сделать огромную постановку в честь Нового Года, актеры-покемоны, декорации и костюмы уже готовы, но нам не хватает массовки...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">...</a></li>';
	
}elseif($npc == 502 && $answer == 4){
	
		$textNPC = 'Так как 2020 год - год крысы, нам нужны 5 #019 Rattata для массовки, а именно #019 Rattata с характерами Выносливый, Застенчивый, Кроткий, Обычный, Причудливый.';
        $moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Я берусь за это дело!</a></li>'; 
		quest_update(500,4);
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>
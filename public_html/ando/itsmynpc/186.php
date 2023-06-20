<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Синтия'; // поменять имя если не нравится
if($npc == 186 && empty($answer)){ // придумать айди нпс
	if(!info_quest(186,'step')){
		$textNPC = 'Привет, зачем ты меня искал!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте! Мне рассказала о вас джувия!</a></li>';
	}elseif(info_quest(186,'step') == 1){
		$textNPC = 'Ты уже принёс то что я просила??';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, держи!</a></li>';
	}else{
		$textNPC = '????'; // текст после выполнения квеста если с ней снова говорить
	}
}elseif($npc == 186 && $answer == 1){
	if(!info_quest(186,'step')){
		$textNPC = 'Это правда? Могу вам чем-то помочь?!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Да, расскажите мне об радужном летающем покемоне!!</a></li>';
	}elseif(info_quest(186,'step') == 1){
			if(item_isset(323,20)){
			$textNPC = '?????'; // тут надо дописать какие призы будут и весь другой текст
            $moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Большое спасибо, я побегу!</a></li>';
			plus_item(5,330); // промежутоные призы я не знаю какие
			plus_item(1,1007);
			plus_item(3,1046);
			plus_item(1,1051);
			minus_item(20,323,$user_id); // металические пластины
			quest_update(186,2,1); // тут пере айди для доступа дальше ну или какая-то другая вещь для допуска к след локации с нпс
		}else{
			$textNPC = 'Их не хватает! Мне нужно 10 магнитных гаек, 20 железных пластин и 20 лазуритов. .';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините,я принесу.</a></li>';
		}
	}
}elseif($npc == 186 && $answer == 2){
	if(!info_quest(186,'step')){
		$textNPC = 'Расскажу после твоей небольшой помощи. Согласен?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Чем я могу вам помочь?</a></li>';
	}
}elseif($npc == 186 && $answer == 3){
	if(!info_quest(186,'step')){
		$textNPC = 'Мне нужно 50 железных пластин .';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Хорошо, я их принесу.</a></li>';
		quest_update(186,1); // это мы смотрим степ один где она рассказывает про призы
	}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>
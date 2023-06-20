<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Смотритель музея';
if($npc == 97 && empty($answer) && info_quest(97,'step') == 7){
	if(!item_isset(327, 1)){
		$textNPC = 'И как там результаты?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Пока никак, но я этим занимаюсь.</a></li>';
	}elseif(item_isset(327, 1)){
     $textNPC = 'Спасибо за помощь! Я от имени Музея истории отблагодарить тебя и сделать подарок. Выбирай #131 Lapras или TM 44 Rest?';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Я выбираю #131 Lapras.</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Я выбираю TM 44 Rest.</a></li>';
	}elseif (info_quest(97,'step') == 8){
		$textNPC = 'Спасибо за твою помощь!';
	}
}elseif($npc == 97 && empty($answer) && !info_quest(97,'step') == 8){
	$textNPC = 'Извините, мы закрыты!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Почему? Я всегда мечтал взглянуть на эскпонаты музея...</a></li>';
}elseif($npc == 97 && $answer == 1){
	$textNPC = 'Дело в том что пару дней назад нас обворовала преступная организация R. Украла самый ценны экспонат - Статуэтку в форме Лапраса.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Команда R? Грр... Я могу помочь!</a></li>';
}elseif($npc == 97 && $answer == 2){
	$textNPC = 'Этим делом уже занимается полиция Эйстар Сити, но если тебе так хочется, то можешь спросить у Офицер Дженни.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Не переживайте! Статуэтка скоро будет.</a></li>';
}elseif($npc == 97 && $answer == 3){
	$textNPC = 'Очень на это надеююсь.';
	quest_update(97,1);
}elseif($npc == 97 && $answer == 4){
	$textNPC = 'Поздравляю тебя с новым питомцем. Надеюсь вы станете настоящими друзьями. Удачи!';
	minus_item(1,327);
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 131;
		}elseif($pok_rand > 50){
			$pok = 131;
		}elseif($pok_rand > 15){
			$pok = 131;
		}else{
			$pok = 131;
		}
		newPokemon($pok,$_SESSION['user_id']);
		quest_update(97,8,1);
}elseif($npc == 97 && $answer == 5){
	$textNPC = 'Спасибо еще раз! Надеюсь ты найдешь применение этой штуке. Удачи!';	
		minus_item(1,327);
	  	plus_item(1,1003);
	  	quest_update(97,8,1);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
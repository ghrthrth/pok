<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Стефани';
if($npc == 73 && empty($answer) && !info_quest(73,'step')){
	$textNPC = 'Добрый день. Что-то хотели?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Здравствуйте, нет просто мимо проходил.</a></li>';
}elseif($npc == 73 && empty($answer) && info_quest(73,'step') == 2){
	if(!item_isset(344, 10) && !item_isset(34, 2) && !item_isset(25, 2)){
		$textNPC = 'Напоминаю, что тебе нужно принести 10 веток дерева Чванши, 2 водных амулета и 2 короны. Поторопись, свадьба через пару дней!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да, я этим занимаюсь.</a></li>';
	}elseif(item_isset(344, 10) && item_isset(34, 2) && item_isset(25, 2)){
		$textNPC = 'Большое спасибо! Свадьба произвела фурор, гости были рады. Вот и новое потомство родилось от наших молодежен. Думаю тебе стоит посетить их в Канто.<br />';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Был рад помочь.</a></li>';
		minus_item(10,344);
		minus_item(2,34);
		minus_item(2,25);
	   quest_update(73,3);
	}else{
		$textNPC = 'Напоминаю, что тебе нужно принести 10 веток дерева Чванши, 2 водных амулета и 2 короны. Поторопись, свадьба через пару дней!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да, я этим занимаюсь.</a></li>';
	}
}elseif($npc == 73 && empty($answer) && info_quest(73,'step') == 1){
	$textNPC = 'Добрый день. Что-то хотели?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, это вы Стефани? Я просто слышал что вы огранизовуете свадьбу Спироу.</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, извините.</a></li>';
}elseif($npc == 73 && $answer == 1  && info_quest(73,'step') == 1){
	$textNPC = 'Да совершенно верно... Только вот не свадьбу Спироу, а свадьбы Сквиртлов. В наше время очень модно делать свадьбы для покемонов. Так вот моя подруга из Канто решила помолвить своих покемонов, у нее два Сквиртла, мальчик и девочка. А я решила помочь с организацией. Знала бы я что это так сложно... Даже язык бы не повернулся согласиться... Вот бы кто то мне помог...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я могу помочь! Я же покетренер! </a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, извините.</a></li>';
}elseif($npc == 73 && $answer == 2  && info_quest(73,'step') == 1){
	$textNPC = 'Вот и отлично! Смотри, мне нужно 10 веток Чванши для декорации арки, 2 водных амулета, которыми будут обмениваться молодожены и 2 короны для костюмов молодожен.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Хорошо, я берусь за это дело. Только вот что такое ветки Чва...</a></li>';
}elseif($npc == 73 && $answer == 3  && info_quest(73,'step') == 1){
	$textNPC = 'Спасибо! Тогда я побежала искать платье невесте!';
	quest_update(73,2);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
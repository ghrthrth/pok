<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мастер';
if($npc == 19 && empty($answer)){
	if(quest_step(3,3) && !item_isset(280,15) || !item_isset(323,3) || !item_isset(28,1) || !item_isset(1,300000)){
		$textNPC = 'Ты помнишь? Мне нужны:
		<li>Магнитная гайка х15</li>
		<li>Магнит х1</li>
		<li>Металлические пластины х3</li>
		<li>Кредиты х300000</li>';
	}elseif(quest_step(3,3) && item_isset(280,15) && item_isset(323,3) && item_isset(28,1) && item_isset(1,300000)){
		$textNPC = 'Отличная работа! Приходи через 12 часов, все будет готово!';
		minus_item(1,100);
		$date_end = time() + 3600*12;//Ставим отметку в 12 часа
		$mysqli->query("INSERT INTO user_status (user_id, status, date) VALUES ('".$_SESSION['user_id']."', '19', '".$date_end."') ");
		quest_update(3,4);
	}elseif(quest_step(3,4)){
		$check = $mysqli->query('SELECT * FROM user_status WHERE user_id = '.$_SESSION['user_id'].' AND status = 19')->fetch_assoc();
		if($check['date'] <= time()){
			$textNPC = 'Вот. Держи, все готово!<br /><li>Получено: Подводный сканер x1</li>';	
			plus_item(1,102);
			quest_update(3,5);
		}else{
			$textNPC = 'Я еще не выполнил твою просьбу.';
		}
	}else{
		$textNPC = '<i>Зайдя в мастерскую вы видете мужчину не малых лет, который что то чинит….</i>';
	}
	if(info_quest(3,'step') == 2){
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте ,вы не не могли бы почитить этот сканер?</a></li>';
	}
}elseif($npc == 19 && $answer == 1){
	$textNPC = 'Ага, это довольно сложный механизм, для его починки мне потребуется 3 дня, а также: 
		<li>Магнитная гайка х15</li>
		<li>Магнит х1</li>
		<li>Металлические пластины х3</li>
		<li>Кредиты х300000</li><br />';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я согласен!</a></li>';
}elseif($npc == 19 && $answer == 2){
	$textNPC = 'Тогда жду тебя.';
	quest_update(3,3);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>
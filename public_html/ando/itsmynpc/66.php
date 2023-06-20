<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Лаборант Эдвард';
if($npc == 66 && empty($answer)){
    if(quest_step(66,3) && item_isset(280,10) && item_isset(276,10) && item_isset(277,10)){
		$textNPC = 'Отличная работа! Приходи через 12 часов, все будет готово!';
		$date_end = time() + 45600;//Ставим отметку в 12 часа
		$mysqli->query("INSERT INTO user_status (user_id, status, date) VALUES ('".$_SESSION['user_id']."', '66', '".$date_end."') ");
		minus_item (10,280);
		minus_item (10,276);
		minus_item (10,277);
		quest_update(66,4);
		
    }elseif(quest_step(66,3)){
		$textNPC = ' Напоминаю что мне нужны:
		<li>Лист Олеандора х10</li>
		<li>Угольки х10</li>
		<li>Магнитная гайка х10</li>';
		
	}elseif(quest_step(66,4)){
		$check = $mysqli->query('SELECT * FROM user_status WHERE user_id = '.$_SESSION['user_id'].' AND status = 66')->fetch_assoc();
		if($check['date'] <= time()){
			$textNPC = 'Вот. Держи, все готово!<br /><li>Получено: TM 14 - Blizzard x1</li>';	
			plus_item(1,1005);
			quest_update(66,5);
		}else{
			$textNPC = 'Я еще не выполнил вашу просьбу.';
		}
		}elseif(quest_step(66,6) && item_isset(278,10) && item_isset(281,10) && item_isset(282,10)){
		$textNPC = 'Отличная работа! Приходи через 12 часов, все будет готово!';
		$date_end = time() + 45600;//Ставим отметку в 12 часа
		$mysqli->query("INSERT INTO user_status (user_id, status, date) VALUES ('".$_SESSION['user_id']."', '66', '".$date_end."') ");
		minus_item (10,278);
		minus_item (10,281);
		minus_item (10,282);
		quest_update(66,7);
		
    }elseif(quest_step(66,6)){
		$textNPC = ' Напоминаю что мне нужны:
		<li>Волосок Веноната x10</li>
		<li>Споры Элшрума x10 </li>
		<li>Горсть кристаллов x10</li>';
		
	}elseif(quest_step(66,7)){
		$check = $mysqli->query('SELECT * FROM user_status WHERE user_id = '.$_SESSION['user_id'].' AND status = 66')->fetch_assoc();
		if($check['date'] <= time()){
			$textNPC = 'Вот. Держи, все готово!<br /><li>Получено: TM 25 - Thunder x1</li>';	
			plus_item(1,1004);
			quest_update(66,5);
		}else{
			$textNPC = 'Я еще не выполнил вашу просьбу.';
		}
		
	}else{
		$textNPC = '<i>Зайдя в научный институт, Вы видете молодого парня, который сидел за странным компьютером</i>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте, Вы не могли бы создать TM 14 - Blizzard?</a></li>';
		$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Здравствуйте, Вы не могли бы создать TM 25 - Thunder?</a></li>';
	}
}elseif($npc == 66 && $answer == 1){
	$textNPC = 'Да, конечно, но для её создания мне потребуется 12 часов времени, а также ингредиенты: 
		<li>Лист Випенбела х10</li>
		<li>Угольки х10</li>
		<li>Магнитная гайка х10</li><br />';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я согласен!</a></li>';
}elseif($npc == 66 && $answer == 2){
	$textNPC = 'Тогда жду тебя.';
	quest_update(66,3);
	
}elseif($npc == 66 && $answer == 3){
	$textNPC = 'Да, конечно, но для её создания мне потребуется 12 часов времени, а также ингредиенты: 
		<li>Волосок Веноната x10</li>
		<li>Споры Элшрума x10 </li>
		<li>Горсть кристаллов x10</li><br />';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Я согласен!</a></li>';
}elseif($npc == 66 && $answer == 4){
	$textNPC = 'Тогда жду тебя.';
	quest_update(66,6);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>
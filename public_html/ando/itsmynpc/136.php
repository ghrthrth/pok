<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Ювелир Грант';
if($npc == 136 && empty($answer)){
		if(quest_step(136,6) && item_isset(131,1) && item_isset(132,1) && item_isset(133,1) && item_isset(1,50000)){
		$textNPC = 'Очень хорошо. Приходи через 12 часов, к этому времени я успею.';
		$date_end = time() + 45600;//Ставим отметку в 12 часа
		$mysqli->query("INSERT INTO user_status (user_id, status, date) VALUES ('".$_SESSION['user_id']."', '136', '".$date_end."') ");
		minus_item (1,131);
		minus_item (1,132);
		minus_item (1,133);
		minus_item (50000,1);
		quest_update(136,7);
		
    }elseif(quest_step(136,6)){
		$textNPC = ' Напоминаю что мне нужны:
		<li>Огненный камень x1</li>
		<li>Лиственный камень x1 </li>
		<li>Водный камень x1</li>
		<li>50.000 кр. за работу</li><br />';
		
	}elseif(quest_step(136,7)){
		$check = $mysqli->query('SELECT * FROM user_status WHERE user_id = '.$_SESSION['user_id'].' AND status = 136')->fetch_assoc();
		if($check['date'] <= time()){
			$textNPC = 'Вот. Держи, все готово!<br /><li>Получено: Камень мега-эволюции х1.</li>';	
			plus_item(1,1046);
			quest_update(136,5);
		}else{
			$textNPC = 'Заказ ещё не готов.';
		}
		
	}else{
		$textNPC = '<i>В маленьком магазинчике пахнет дегтем и пеки. Ну а чего ещё можно было ожидать заходя в мастерскую Ювелира? А вот и он, вы его заметили.</i>';
		$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Здравствуйте, вы можете выточить камень Мега-эволюции?</a></li>';
	}
}elseif($npc == 136 && $answer == 3){
	$textNPC = 'Привет юнец. Конечно могу, но это очень затратное предприятие как и по времени, так и по ресурсам. Из обычных камней такой не выточишь, и поэтому мне нужны эти камни: 
		<li>Огненный камень x1</li>
		<li>Лиственный камень x1 </li>
		<li>Водный камень x1</li><br />
		<br>Так же хочу предупредить, что моя работа тоже не бесплатная. 50.000 кр. цена моему труду. И выточить я смогу лишь 1 камень Мега-эволюции.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Хорошо, я согласен.</a></li>';
}elseif($npc == 136 && $answer == 4){
	$textNPC = 'Принеси мне камни, и я всё сделаю.';
	quest_update(136,6);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>
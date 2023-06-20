<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Люциус';
if($npc == 147){
	if(empty($answer)){
		$textNPC = 'Приветствую, тренер. Пришли за подарком от администрации?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">ДА!</a></li>';
	}elseif($answer == 1 && !info_quest(147,'step') == 2 && $user['timereg'] <= 1592898542){
		$textNPC = 'Тогда держи! Случайная эволюция Eevee, и несколько конфет, наборов ослабления, даркболлов и витаминов. Приятной игры! Поздравляю с окончанием учебного года и начала лета!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		$randompok = rand(1,8);
		if($randompok == 1){ $eevee = 134; }
		if($randompok == 2){ $eevee = 135; }
		if($randompok == 3){ $eevee = 136; }
		if($randompok == 4){ $eevee = 196; }
		if($randompok == 5){ $eevee = 197; }
		if($randompok == 6){ $eevee = 470; }
		if($randompok == 7){ $eevee = 471; }
		if($randompok == 8){ $eevee = 700; }
		$randomdrugs = rand(1,6);
		if($randomdrugs == 1){ $drug = 10; }
		if($randomdrugs == 2){ $drug = 59; }
		if($randomdrugs == 3){ $drug = 39; }
		if($randomdrugs == 4){ $drug = 24; }
		if($randomdrugs == 5){ $drug = 23; }
		if($randomdrugs == 6){ $drug = 11; }
		newPokemon($eevee,$_SESSION['user_id']);
		plus_item(10,330,$_SESSION['user_id']);
		plus_item(10,$drug,$_SESSION['user_id']);
		plus_item(30,309,$_SESSION['user_id']);
		plus_item(10,72,$_SESSION['user_id']);
		plus_item(3,1026,$_SESSION['user_id']);
		quest_update(147,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}
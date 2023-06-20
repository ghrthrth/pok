<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Представитель Администрации';
if($npc == 159){
	if(empty($answer)){
		$textNPC = 'Здравствуйте, Тренеры! В связи с последними, неспокойными событиями Администрация хочет компенсировать игрокам потерю игрового прогресса в половину 1-го дня. Однако это не относится к тем, кто зарегистрировался позже 8 Мая 2021г.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, я пришёл за компенсацией.</a></li>';
	}elseif($answer == 1 && !info_quest(159,'step') == 2 && $_SESSION['user_id'] < 1691){
		$textNPC = 'Пройдёмся по списку. Вам положено следующее: <b>Кредит х500.000</b>, <b>Витамины х10</b>, <b>Набор тренировок х5</b>.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		$randomdrugs = rand(1,6);
		if($randomdrugs == 1){ $drug = 10; }
		if($randomdrugs == 2){ $drug = 59; }
		if($randomdrugs == 3){ $drug = 39; }
		if($randomdrugs == 4){ $drug = 24; }
		if($randomdrugs == 5){ $drug = 23; }
		if($randomdrugs == 6){ $drug = 11; }
		plus_item(500000,1,$_SESSION['user_id']);
		plus_item(10,$drug,$_SESSION['user_id']);
		plus_item(5,330,$_SESSION['user_id']);
		quest_update(159,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}
<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Клауд';
if($npc == 129){
	if(empty($answer)){
		//$date_now = 286;
        //$iduser = $mysqli->query("SELECT id FROM `users` WHERE `id` = '".$_SESSION['id']."'");
		$textNPC = 'Привет Тренер! Для вас тут кое - что есть. Если ты зарегистрировался в нашем мире до 22.04.2020, то тебя ждёт сюрприз!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Слушаю?</a></li>';
	}elseif($answer == 1 && !info_quest(129,'step') == 2 && $_SESSION['user_id'] <= 285){
		$textNPC = 'Это подарок за то что наш мир был отключен 2 дня. Надеюсь оно вам по душе! По списку вы получаете: Ванильная конфета х30, Даркбол х3, Сладкая ягода х3, Случайная карта х3. Знаете что если Ванильную конфету скормить покемону на котором надета Скоба, то покемон получит сразу 3 EV, всместо 2 EV? Ну всё, удачи!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		plus_item(30,309,$_SESSION['user_id']);
		plus_item(3,72,$_SESSION['user_id']);
		plus_item(3,179,$_SESSION['user_id']);
		plus_item(3,427,$_SESSION['user_id']);
		quest_update(129,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}
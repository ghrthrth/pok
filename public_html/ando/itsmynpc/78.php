<?php #Сквиртл
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Сквиртл';
if($npc == 78 && empty($answer) && !info_quest(73,'step')){
	$textNPC = 'Сквирт-сквиртл';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Привет!</a></li>';
}elseif($npc == 78 && empty($answer) && info_quest(73,'step') == 3){
	$textNPC = 'Сквиртл-сквиртл!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Ричард?! Это ты? Привет!</a></li>';
}elseif($npc == 78 && $answer == 1  && info_quest(73,'step') == 3){
	$textNPC = 'Сквир-сквиртл! Сквиртл! Сквиртл! Сквиртл-сквиртл!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я рад за вас! А как ваше потомство?</a></li>';
}elseif($npc == 78 && $answer == 2  && info_quest(73,'step') == 3){
	$textNPC = 'Сквиртл-сквиртл!<sub> *За панцирем Ричарда Вы замечаете маленького Сквиртла который танят к вам лапки.* </sub> Сквиртл-Сквиртл!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Какой милаш!<sub> *Вы обнимаете малыша-Сквиртла.* </sub> </a></li>';
}elseif($npc == 78 && $answer == 3  && info_quest(73,'step') == 3){
	$textNPC = 'Сквиртл-сквиртл. Сквиртл!<br /> Получено: #007 Squirtle 1-lvl';
	quest_update(73,4,1);
	$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 7;
		}elseif($pok_rand > 50){
			$pok = 7;
		}elseif($pok_rand > 25){
			$pok = 7;
		}else{
			$pok = 7;
		}
		newPokemon($pok,$_SESSION['user_id']);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
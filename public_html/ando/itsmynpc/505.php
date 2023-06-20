<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Дед Мороз';
$pok1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `type` = 'snowy' and `basenum` = '234' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
if($npc == 505 && info_quest(500,'step') == 8 && empty($answer)){
	$textNPC = 'А вот и ты! Спасибо что помог мне!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Это было не сложно, тем более это все ради Нового Года.</a></li>';
}elseif($npc == 505 && $answer == 1){
	$textNPC = 'Ты очень мудрый и храбрый тренер и ты заслуживаешь на хороший подарок!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Правда?</a></li>';
}elseif($npc == 505 && $answer == 2){
	$textNPC = 'Да, теперь с тобой в путешествие пойдет твой новый друг! Я уверен что вы будете хорошей командой. С Новым Годом!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо, Дедушка Мороз!</a></li>';
	$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$pok1['id']);
	quest_update(500,9);
	$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 138;
		}elseif($pok_rand > 50){
			$pok = 138;
		}elseif($pok_rand > 25){
			$pok = 140;
		}else{
			$pok = 142;
		}
   newPokemon($pok,$_SESSION['user_id']);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
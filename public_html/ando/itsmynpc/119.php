<?php #Фред Сваровски
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = '<i>Завал</i>';
$prov_rhy = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 112 AND lvl = 100 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
if($npc == 119 && empty($answer) && info_quest(117,'step') == 2){
	$textNPC = '<i>*огромная груда камней не дает вам пройти дальше*</i>';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1"><i>*попытаться разобрать завал*</i></a></li>';
}elseif($npc == 119 && $answer == 1){
if($prov_rhy['id']){
			$textNPC = '<i>*завал начал поддаваться под силой #112 Rhydon*</i>';
			$date_end = time() + 1800;
			$mysqli->query("INSERT INTO user_status (user_id, status, date) VALUES ('".$_SESSION['user_id']."', '117', '".$date_end."') ");
			quest_update(117,3);
		}else{
			$textNPC = '<i>*завал не поддается*</i>';
		}		
}elseif($npc == 119 && quest_step(117,3) && empty($answer)){
$check = $mysqli->query('SELECT * FROM user_status WHERE user_id = '.$_SESSION['user_id'].' AND status = 117')->fetch_assoc();
if($check['date'] <= time()){
			$textNPC = '<i>*завал разобран. путь очищен*</i>';	
			quest_update(117,4);
		}else{
			$textNPC = '<i>*нужно еще немного времени*</i>';
		}
}elseif($npc == 119 && info_quest(117,'step') >= 4 && empty($answer)){
	$textNPC = '<i>*путь очищен*</i>';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1"><i>*пробраться на берег*</i></a></li>';
	$mysqli->query("UPDATE users SET location = '248' WHERE `id` = '".$_SESSION['user_id']."'");
}elseif($npc == 119 && empty($answer)){
    $textNPC = '<i>*огромная груда камней не дает вам пройти дальше*</i>';	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
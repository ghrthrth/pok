<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$npcloc = $mysqli->query("SELECT id, location FROM base_npc WHERE location = ".$user['location']."")->fetch_assoc();
$usr = $mysqli->query("SELECT * FROM users WHERE id = ".$_SESSION['user_id'])->fetch_assoc();
$nameNPC = 'Сестра Джой';
if($npc == 8 && empty($answer)){
	$textNPC = 'Здравствуйте! Рады вас видеть в нашем покецентре, что мы можем для вас сделать?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Лечение покемонов</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Доступ к питомнику Лиги</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Возврат покемонов</a></li>';
}elseif($npc == 8 && $answer == 1){
	$moveNPC = '<a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1"><img src="img/red_cross.gif" width="15" height="15" alt="Лечить" border=0> Лечить всех</a><P><a href="game.php?fun=m_location&map=1">';
}elseif($npc == 8 && $answer == 2 /*&& $npcloc['location'] != $user['location']*/){
	include ("8_1.php");
	die();
}elseif($npc == 8 && $answer == 3 /*&& $npcloc['location'] != $user['location']*/){
	#Возврат покемонов
	include ("8_2.php");
	die();
}elseif(($npc == 8 && $answer == 4) && ($usr['location'] == 3 OR $usr['location'] == 39 OR $usr['location'] == 58 OR $usr['location'] == 79 OR $usr['location'] == 85 OR $usr['location'] == 97 OR $usr['location'] == 106 OR $usr['location'] == 112 OR $usr['location'] == 124 OR $usr['location'] == 130 OR $usr['location'] == 201 OR $usr['location'] == 324 OR $usr['location'] == 325 OR $usr['location'] == 326 OR $usr['location'] == 327 OR $usr['location'] == 328 OR $usr['location'] == 329 OR $usr['location'] == 330 OR $usr['location'] == 331 OR $usr['location'] == 332 OR $usr['location'] == 333 OR $usr['location'] == 334 OR $usr['location'] == 335 OR $usr['location'] == 336 OR $usr['location'] == 337 OR $usr['location'] == 338 OR $usr['location'] == 339 OR $usr['location'] == 365 OR $usr['location'] == 1005 OR $usr['location'] == 1006 OR $usr['location'] == 1114 OR $usr['location'] == 7 OR $usr['location'] == 8 OR $usr['location'] == 400 OR $usr['location'] == 258)){
	$mysqli->query('UPDATE user_pokemons SET hp=hp_max WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
	$q = $mysqli->query('SELECT id,atk1,atk2,atk3,atk4 FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active=1');
	 while($a = $q->fetch_assoc()){
	
		 	if($a['atk1'] > 0){
		 $one = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk1'])->fetch_assoc();
		 $mysqli->query('UPDATE user_pokemons SET pp1 = '.$one['atac_pp'].' WHERE id = '.$a['id']);	
		      }
		    if($a['atk2'] > 0){
		 $tw = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk2'])->fetch_assoc();
		 $mysqli->query('UPDATE user_pokemons SET pp2 = '.$tw['atac_pp'].' WHERE id = '.$a['id']);	
		      }
		      if($a['atk3'] > 0){
		 $tr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk3'])->fetch_assoc();
		 $mysqli->query('UPDATE user_pokemons SET pp3 = '.$tr['atac_pp'].' WHERE id = '.$a['id']);	
		      }
		      if($a['atk4'] > 0){
		 $fr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk4'])->fetch_assoc();
		 $mysqli->query('UPDATE user_pokemons SET pp4 = '.$fr['atac_pp'].' WHERE id = '.$a['id']);	
		      }
		 
		 
	}
	$nameNPC = 'Покемоны вылечены!';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
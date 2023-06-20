<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$npcloc = $mysqli->query("SELECT id, location FROM base_npc WHERE location = ".$user['location']."")->fetch_assoc();
$nameNPC = 'Сестра Мерси';
if($npc == 167 && empty($answer)){
	$textNPC = 'Здравствуйте! Рады вас видеть в нашем покедоме. Не замерзли? Может быть хотите кружку какао?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Лечение покемонов</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Доступ к питомнику Лиги</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Возврат покемонов</a></li>';
}elseif($npc == 167 && $answer == 1 /*&& $npcloc['location'] != $user['location']*/){
	$moveNPC = '<a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1"><img src="img/red_cross.gif" width="15" height="15" alt="Лечить" border=0> Лечить всех</a><P><a href="game.php?fun=m_location&map=1">';
}elseif($npc == 167 && $answer == 2 /*&& $npcloc['location'] != $user['location']*/){
	include ("8_1.php");
	die();
}elseif($npc == 167 && $answer == 3 /*&& $npcloc['location'] != $user['location']*/){
	#Возврат покемонов
	include ("8_2.php");
	die();
}elseif($npc == 167 && $answer == 4 /*&& $npcloc['location'] != $user['location']*/){
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
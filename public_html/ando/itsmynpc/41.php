<?php  // Ричард
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Ричард';
if($npc == 41) { }else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }

if(empty($answer)){
	$textNPC = 'Доброго вам времени суток. Вижу ты тренер покемонов? Эх... Когда-то давно я тоже был тренером, первоклассным...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Серьезно?</a></li>';
}elseif($answer == 1) {
	$textNPC = 'Конечно! И у меня остались кое-какие навыки в тренировке покемона. Могу даже заставить вспомнить все его атаки, но нужно специальное зелье - Зелье памяти. ';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Да, оно у меня есть. Я сварил его еще в Восточном Джото.</a></li>
	<br>        <li id="txt"><a href="game.php?fun=m_location&map=1">Я еще не нашел все ингредиенты.</a></li>';
}elseif($answer == 2) {
 $textNPC = "Выбери покемона:<br>";
 	$mypok = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
	while ($active = $mypok->fetch_assoc()){ 
 $textNPC = $textNPC."<br><a href='game.php?fun=m_npc&answ_id=3&npc_id=".$npc."&pok=".$active['id']."'>#".numbPok($active['basenum'])." ".$active['name']."</a>";
	}
}elseif($answer == 3){
	if($_GET['pok'] > 0){
	$pok = obTxt($_GET['pok']);
	$pk = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 and id = '.$pok)->fetch_assoc();
	if($pk) {
		if(item_isset(248,1)){
        $atl = $mysqli->query("SELECT * FROM `attack_learn` WHERE `poke_base_id` = '".$pk['basenum']."' AND `atc_lvl` <= '".$pk['lvl']."'");
	while ($al = $atl->fetch_assoc()){ 
     $mysqli->query("INSERT INTO mypok_learn (pok,atk ) VALUES ('".$pk['id']."','".$al['atac_id']."') ");
	}
	$textNPC = 'Готово! Твой покемон вспомнил все атаки.'; 
	minus_item(1,248);
		}else{ $textNPC = 'Извини, но у тебя нет зелья..'; }
	}
}else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
}
else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
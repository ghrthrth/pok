<?php  // Софи
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Крис';
if($npc == 42) { }else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }

if(empty($answer)){
	$textNPC = 'Привет! Вижу ты тренер покемонов? Я начинающий покевед и я изобрел новую методику для изменения характера, но учти, ты только один раз можешь перевоспитать своего покемона.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Вы это серьезно?</a></li>';
}elseif($answer == 1) {
	$textNPC = 'Да! Могу помочь и тебе, конечно, не бесплатно. Цена в 200.000 кр., тебя устроит?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Да</a></li>
	<br>        <li id="txt"><a href="game.php?fun=m_location&map=1">Нет</a></li>';
}elseif($answer == 2) {
 $textNPC = "Выбери покемона:<br>";
 	$mypok = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 AND change_har = 0');
	while ($active = $mypok->fetch_assoc()){ 
 $textNPC = $textNPC."<br><a href='game.php?fun=m_npc&answ_id=3&npc_id=".$npc."&pok=".$active['id']."'>#".numbPok($active['basenum'])." ".$active['name']."</a>";
	}
}elseif($answer == 3){
	if($_GET['pok'] > 0){
	$pok = obTxt($_GET['pok']);
	$pk = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 and id = '.$pok)->fetch_assoc();
	if($pk) {
		if(item_isset(1,200000)){
		 if(rand(1,100) < 90){   
        $har = 13; if($har == $pk['har']) { $har = 13; }
		 }else{
         $har = mt_rand(1,26); if($har == $pk['har']) { $har = mt_rand(1,26); }    
		 }
        $mysqli->query("UPDATE `user_pokemons` SET `character` = '".$har."' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `change_har` = '1' WHERE `id` = '".$pk['id']."'");
	$textNPC = 'Готово! У твоего покемона изменился характер.'; 
	minus_item(200000,1);
		}else{ $textNPC = 'Извини, но у тебя не хватает денег.'; }
	}
}else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
}
else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
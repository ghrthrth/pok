<?php  // Софи
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Праздничный дух';
if($npc == 106) { }else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }

if(empty($answer)){
	$textNPC = 'Привет! На дворе запах Нового Года, а хочешь я подниму твое новогоднее настроение?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Привет! А как ты это сделаешь?</a></li>';
}elseif($answer == 1 && !info_quest(106,'step') == 2) {
	$textNPC = 'Я могу разрисовать твоего покемона снежными красками и он станет snowy, только учти, после окраски он станет прирученным!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Круто! Я согласен(а).</a></li>
	<br>        <li id="txt"><a href="game.php?fun=m_location&map=1">Неее, у меня и без этого хорошее новогоднее настроение.</a></li>';
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
		if(item_isset(1,1)){
        $mysqli->query("UPDATE `user_pokemons` SET `type` = 'snowy' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `trade` = '1' WHERE `id` = '".$pk['id']."'");
	$textNPC = 'Поздравляю! Твой покемон теперь такой белоснежный :3'; 
	minus_item(1,1);
	quest_update(106,2);
		}else{ $textNPC = 'Что пошло не так.'; }
	}
}else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
}
else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
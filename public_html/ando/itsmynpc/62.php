<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$jet_week = infUsr($user_id,"jet_week");
$nameNPC = 'МакГрегор';
$cMPK =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1' and `hp` > '0'");
         $cmpk_ = $cMPK->num_rows;
if($npc == 62){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if($user['barena'] == 0){
if(empty($answer)){
$textNPC = 'Привет, я куратор этой арены. Правила очень просты. Побеждаешь в бою - получаешь жетон. Жетоны можно обменять на ценные призы. Чтобы начать бой нужно подать заявку.  Бои начнутся только тогда, когда на арене будет 4 и более человек, после каждого боя нужно снова подать заявку. Максимальное количество боев за неделю - 100.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Подать заявку</a></li><br>';
}else{
	if($user['plus_jet'] == 1){
$textNPC = 'Отлично, ожидайте когда 4 или более человек подадут заявки. Ты уже провел '.$jet_week.' боев.';
$mysqli->query("UPDATE users SET barena = '1',plus_jet = '0', jeton = '1' WHERE `id` = '".$_SESSION['user_id']."'");	
	}elseif($user['plus_jet'] == 0 and $user['jet_week'] >= 100){
		$textNPC = 'Вы уже провели 100 боев за неделю. Приходите попозже.';
	}elseif($cmpk_ == 0){
		$textNPC = 'Ваши покемоны не в состоянии сражаться.';
	}else{
$textNPC = 'Отлично, ожидайте когда 4 или более человек подадут заявки. Ты уже провел '.$jet_week.' боев.';
$mysqli->query("UPDATE users SET barena = '1' WHERE `id` = '".$_SESSION['user_id']."'");
}
}
}else{
	if(empty($answer)){
$textNPC = 'Ты всегда можешь уйти из арены, отменив заявку.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Отменить заявку</a></li><br>';
}else{
$textNPC = 'Приходи еще!';
$mysqli->query("UPDATE users SET barena = '0' WHERE `id` = '".$_SESSION['user_id']."'");
}
}
?>
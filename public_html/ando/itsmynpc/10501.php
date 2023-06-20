<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Секретарь стадиона Души';
if($user['id'] == 3 or $user['id'] == 296){
if($npc == 10501){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(array_key_exists('go',$_GET)) {
                 $ban = $kod[1];
                        $bans = time(0)+0 + $ban*60;
	     $mysqli->query("UPDATE users SET `fetig`='".$bans."' WHERE id='".$user['id']."'");
	$mysqli->query("UPDATE users SET location = '".$user['arena']."', arena = '0' WHERE `id` = '".$_SESSION['user_id']."'");
	echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
	return;
}
if(empty($answer)){
$textNPC = 'Привет, я смотрю ты закончил тут свои дела. Готов вернуться назад?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&go=1">Да!</a></li><br>';
}}else
{$textNPC = 'Я общаюсь только со своим Лидером!';}
?>
<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Секретарь Темного стадиона';
$tur = 1;
if($user['id'] == 3 or $user['id'] == 49){
if($npc == 10011){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if($tur == 0){
if(empty($answer)){
$textNPC = 'Привет!';
}
}else{
            $ban = $kod[1];
                        $bans = time(99999)+99999 + $ban*60;
                             $mysqli->query("UPDATE users SET `fetig`='".$bans."' WHERE id='".$user['id']."'");
     $mysqli->query("UPDATE users SET `fetig`='".$bans."' WHERE id='".$user['id']."'");
if(array_key_exists('go',$_GET)) {
	$mysqli->query("UPDATE users SET location = '54', arena = '200' WHERE `id` = '".$_SESSION['user_id']."'");
	echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
	return;
}
if(empty($answer)){
$textNPC = 'Привет, по всей видимости у тебя есть срочные дела на стадионе? Отправить тебя на стадион?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&go=1">Да!</a></li><br>';
}
}}else
{$textNPC = 'Я общаюсь только со своим Лидером!';}
?>
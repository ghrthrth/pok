<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Снорлакс - Мороз';
$img = "<img src='https://oldpokemon.ru/img/snorlaxmas.jpg'>";
$rndpok = rand(1,8);
    if($rndpok == 1){ $pok = 446; }
    if($rndpok == 2){ $pok = 304; }
    if($rndpok == 3){ $pok = 333; }
    if($rndpok == 4){ $pok = 228; }
    if($rndpok == 5){ $pok = 626; }
    if($rndpok == 6){ $pok = 551; }
    if($rndpok == 7){ $pok = 396; }
    if($rndpok == 8){ $pok = 672; }
if($npc == 173 and empty($answer)){
	if(!info_quest(173,'step') == 1){
	$textNPC = ' '.$img.' Sno-o-o-orl...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Это для меня? Cпасибо!</a></li>';
        }else{
        	$textNPC = ''.$img.' А?';
        }
}elseif($answer == 1 and info_quest(173,'step') != 2) {
	$textNPC = ''.$img.' Snorl. Sno - Snorl-l-l! ';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Ух - ты... Новогодний покемон!!</a></li>';
	quest_update(173,2);
	neweventPokemon($pok,$_SESSION['user_id']);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
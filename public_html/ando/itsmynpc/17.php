<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Старый ветеран';
if($npc == 17 && empty($answer)){
	if(!info_quest(3,'step')){
		$textNPC = '<i>Зайдя в Дом вы видите старика ,который не может стоять на месте и постоянно то туда, то обратно бегает к какому то покемону</i>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">У вас что то случилось дедушка?</a></li>';
		$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Я вижу вы слишком заняты ,не буду вам мешать.<sub>[Уйти]</sub></a></li>';	
	}elseif(info_quest(3,'step') == 1 || info_quest(3,'step') == 2 || info_quest(3,'step') == 3){
		$textNPC = 'Я вам этого не забуду ,держите меня в курсе. Поспрашивайте у местных может кто-нибудь вам поможет в поисках.';
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
	
}elseif($npc == 17 && $answer == 1 && !info_quest(3,'step')){
	$textNPC = 'Ох ,я вас не заметил юноша ,я места не могу себе найти. Вчера наш дом пыталась ограбить какая-то шайка ,мой Slaking вступил бой с их покемонами но в какой-то момент проиграл ,а сейчас Сестра Джой по причине сломанных аппаратов (что как я думаю по их вине тоже) не может ему помочь.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Может я могу вам чем то помочь?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Сочувствую вам ,но я тороплюсь.<sub>[Уйти]</sub>.</a></li>';
}elseif($npc == 17 && $answer == 2 && !info_quest(3,'step')){
	$textNPC = 'Я благодарен вам Юноша но чем вы мне помо…. Хотя, есть одна легенда о таинственном озере,в котором вода пропитана радужными лучами с крыльев легендарного покемона Ho-oh имеет целебные свойства, однако оно давно потеряна. Но если вы найдете туда дорогу я смогу спасти своего Slaking и хорошо отблагодарю вас за помощь.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Я с радостью отыщу туда дорогу ,я вижу что вы очень цените и заботитесь о своих покемонах.</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините,я очень тороплюсь, мне не до этого.<sub>[Уйти]</sub>.</a></li>';
}elseif($npc == 17 && $answer == 3 && !info_quest(3,'step')){
	$textNPC = 'Я вам этого не забуду ,держите меня в курсе. Поспрашивайте у местных может кто-нибудь вам поможет в поисках.';
	quest_update(3,1);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>
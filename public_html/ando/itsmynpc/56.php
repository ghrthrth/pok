<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Высокий мужчина';
if($npc == 56){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
$textNPC = '...';
if(info_quest(48,'step') == 6){
if(empty($answer)){
$textNPC = 'Ты кто?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Простите, кажется, Ваш подчиненный кое-что украл.</a></li><br>';
}else
if($answer == 1){
$textNPC = 'В эти дела лучше не суйся.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Меня попросили помочь и я обязательно помогу!</a></li>';	
}else
if($answer == 2){ 
	quest_update(48,7);
$textNPC = 'Наглости тебе не занимать... Хорошо, принеси мне 10 Орехов, которые можно выбить из Noctowl и 5 Перьев Spearow. Тогда, может быть, я помогу.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Хорошо.</a></li>';	
}
}else
if(info_quest(48,'step') == 7){
if(empty($answer)){
$textNPC = 'Принес?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да</a></li><br>';
}else
if($answer == 1){
	if(item_isset(187,10) and item_isset(351,5)){
		 plus_item(1,181,$user_id);
		 minus_item(5,351,$user_id);
		 minus_item(10,187,$user_id);
		 quest_update(48,8);
$textNPC = 'Отлично. Держи Письмо, передай его моему агенту. Он вернет тебе то, что украл.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо</a></li>';	
}else{
$textNPC = 'Это не все! Принеси мне 10 Орехов, которые можно выбить из Noctowl и 5 Перьев Spearow!';
}
}
}
?>
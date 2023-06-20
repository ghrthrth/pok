<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Профессор Зодзи';
if($npc == 601){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
$textNPC = 'Привет! Я так рад, что ты смог(ла) мне помочь.';
	if(!info_quest(601,'step')){
if(empty($answer)){
$textNPC = 'Здравствуй, тренер!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте! Что вы здесь делаете, профессор ?</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Размышляю, у нас в лаборатории Козмо, случилась небольшая проблема, нам для работы необходимы некоторые материалы, но у нас совсем нет свободных людей для этого.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я могу вам с этим помочь ?</a></li>';	
}else
if($answer == 2){ 
	quest_update(601,7);
$textNPC = 'Хм, думаю да, вполне можешь. Мне нужны Перья Запдоса х5, их ты можешь найти в штормовых облаках, но учти, попасть туда можно, только с помощью летающего покемона с атакой Tailwind. Дабы ты смог поднять порыв ветра и разогнать облака.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Отлично! Я скоро вернусь.</a></li>';	
}
}else
if(info_quest(601,'step') == 7){
if(empty($answer)){
$textNPC = 'Уже здесь, а ты быстро, ну как, смог(ла) достать перья ?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Конечно, держите!</a></li><br>';
}else
if($answer == 1){
	if(item_isset(429,5)){
		 plus_item(1,430,$user_id);
		 minus_item(5,429,$user_id);
		 quest_update(601,8);
$textNPC = 'Отлично! Вижу ты справился, тренер. Вот держи «Пропуск в лабораторию Козмо», думаю наш профессор сможет найти способ, вознаградить тебя.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо! Сейчас же отправлюсь туда.</a></li>';	
}else{
$textNPC = 'Хм, кажется здесь не все перья.';
}
}
}
?>
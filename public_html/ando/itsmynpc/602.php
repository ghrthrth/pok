<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Профессор Грей';
if($npc == 602){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
$textNPC = 'Привет! Я так рад, что ты смог(ла) мне помочь.';
	if(!info_quest(602,'step')){
if(empty($answer)){
$textNPC = 'А вот и ты! Профессор Зодзи, говорил мне о тебе, тренер. ';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте! Я пришёл чтобы помочь вам.</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Рад это слышать, у нас есть несколько заданий для тебя, за которые мы щедро с профессором Козмо, тебе отплатим.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Чем я могу быть полезен ?</a></li>';	
}else
if($answer == 2){ 
	quest_update(602,2);
$textNPC = 'Так уж случилось что, я занимаюсь работой над созданием различного рода модификаций и улучшений в сторону обучения покемона. И мне необходимы некоторые материалы для этого. Сам я отправиться не могу а мой лаборант сейчас находится далеко отсюда. Не мог(ла) бы ты принести для меня : Дракоценный камень х3 и Пласита Реджирока х2, эти предметы очень необходимы мне для текущего исследования. Найти их можно исследуя песчанные руины.  ';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да, скоро вернусь.</a></li>';	
}
}else
if(info_quest(602,'step') == 2){
if(empty($answer)){
$textNPC = 'Рад тебя видеть, ты принес(ла) мне Дракоценный камень х3 и Пласита Реджирока х2 ?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Это было нелегко, держите!</a></li><br>';
}else
if($answer == 1){
	if(item_isset(431,3) and item_isset(432,2)){
		 plus_item(1,1047,$user_id);
		 minus_item(3,431,$user_id);
		 minus_item(2,432,$user_id);
		 quest_update(602,3);
$textNPC = 'Спасибо! Вот, держи эту ТМ атаку! Покемон что её выучит, будет способен передвигаться вместе со своим тренером через многие водянистые места. Если встретишь моего лаборанта в Дьюфорд Таун, попроси его как можно скорее передать образцы проб в нашу Лабораторию, профессору Козмо. ';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Большое вам спасибо! Конечно, я передам ему, если встречу.</a></li>';	
}else{
$textNPC = 'Здесь не всё что я просил.';
}
}
}
?>
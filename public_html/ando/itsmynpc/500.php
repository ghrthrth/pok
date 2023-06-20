<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Дед Мороз';
if($npc == 500){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(!info_quest(500,'step')){
if(empty($answer)){
$textNPC = '*Вы замечаете перевернутые сани в сугробе* ';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Вы кто? *перепуганным голосом*</a></li>';
}else
if($answer == 1){
$textNPC = 'Моя голова... Я? Я, вроде, Дедушка Мороз...';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Сам Дед Мороз?! А что с Вами случилось?</a></li>';	
}else
if($answer == 2){ 
$textNPC = 'На меня... уффф... Напал злой покемон и, кажеться, я потерял своего #234 Stantler... Он, наверное, испугался и убежал...';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Я могу вам помочь?</a></li>';	
}else
if($answer == 3){ 
quest_update(500,1);
$textNPC = 'Мне нужны медикаменты чтобы залечить мои раны, потому что мой посох без моего друга-Оленя не работает... Принеси мне Лечебной травы 5х, Стимпаков 20х и Антифриза 15х.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Хорошо, Дедушка Мороз!</a></li>';   
}
}else{
if(info_quest(500,'step') == 1 ){
  if(!item_isset(173,5)){
		$textNPC = 'Ты принес медикаменты? Мне нужны Лечебная трава 5х, Стимпак 20х и Антифриз 15х';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Я в поисках! Держитесь!</a></li>';
	}elseif(item_isset(173,5) && item_isset(29,20) && item_isset(13,15)){
     $textNPC = 'Спасибо за помощь! А вот и подарочек, держи Даркбол 10х, Мастербол 3х. Пока мне нужен отдых, кости уже старые, а ты езжай в Восточное Джото и помоги с организацией праздника... Чуть не забыл, если встретишь того назойливого Гранбулла, то проучи его как следует, а то может и детей покусать.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо за подарок! Я все сделаю!</a></li>';
    quest_update(500,2);
    minus_item (5,173);
    minus_item (20,29);
    minus_item (15,13);
    plus_item(10,72);
    plus_item(3,62);
   }
}else{
if(info_quest(500,'step') >= 2 ){
		$textNPC = 'С Наступающим тебя!';
}
}
}
?>
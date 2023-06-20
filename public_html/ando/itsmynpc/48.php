<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мисс Тревис';
if($npc == 48){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(!info_quest(48,'step')){
if(empty($answer)){
$textNPC = 'Опять этот покемон! Ох, простите, кто вы?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я тренер покемонов</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Это правда? Быть может, вы сможете мне помочь?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">А что случилось?</a></li>';	
}else
if($answer == 2){ 
$textNPC = 'Город терроризирует дикий покемон, он запугал всех граждан, я не знаю что мне делать!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Успокойтесь, я Вам помогу.</a></li>';	
}else
if($answer == 3){ 
quest_update(48,1);
$textNPC = 'Вы серьезно? Говорят, последний раз его видели на 10 маршруте.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Хорошо.</a></li>';   
}
}else{
if(info_quest(48,'step') >= 2){
   $textNPC = 'Привет!';
}else{
  if(item_isset(178,1)){
   quest_update(48,2);
   $rand = rand(1,1);
   plus_item(1,1001,$user_id);
   minus_item(1,178);
   $mysqli->query("UPDATE `users` SET `population`=`population`+'300',`reputation`=`reputation`+'300' WHERE `id` = '".$user_id."'");
$textNPC = 'Огромное тебе спасибо! Я отдам эту сферу на исследование. Ты избавил наш город от постоянного террора и у меня есть чем тебя отблагодарить: популярность +300, репутация +300 и ТМ39 Rock Tomb ';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо</a></li>'; 
   }else{
$textNPC = 'Покемон все еще терроризирует город.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Простите</a></li>';       
   }
}
}
?>
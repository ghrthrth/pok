<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Профессор Джордж';
if($npc == 52){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
$textNPC = 'Прости, я работаю...';
if(info_quest(48,'step') == 2){
if(empty($answer)){
$textNPC = 'Здравствуй, это же ты, тот тренер, который помог Мисс Тревис в Лавандии?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, это я</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Отлично! Она отправила нам эту сферу... Честно говоря, первый раз такое вижу. Это ужасная вещь! Все покемоны, которым я давал ее сходили с ума, но обретали огромную мощь... Слушай, можешь принести ее мне, я оставил ее на своем складе в старом районе?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Конечно</a></li>';	
}else
if($answer == 2){ 
$textNPC = 'Я жду...';
quest_update(48,3);
}
}elseif(info_quest(48,'step') == 3){
	if(empty($answer)){
$textNPC = 'Прости! Я забыл дать тебе ключ от моего склада!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Но, он был не закрыт...</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Не может быть! Так, дай мне посмотреть сферу... *суетливо разглядывает сферу*. Только не это! Это же не та сфера, которую мне передала Мисс Тревис я пометил специальной краской. Где ты взял эту?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=2">Когда я зашел на склад, на меня напал покемон. У него я и обнаружил ее.</a></li><br>';
}else
if($answer == 2){
minus_item(1,178,$user_id);
quest_update(48,4);
$textNPC = 'Только не это. Кажется команда R начала действовать. Поспрашивай у местных жителей, может быть они что-то видели.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Хорошо</a></li><br>';
}

}elseif(info_quest(48,'step') == 9){
	if(empty($answer)){
   $rn = mt_rand(1,3);
   if($rn == 1) { $pok = 123; } else
   if($rn == 2) { $pok = 123; } else
   if($rn == 3) { $pok = 123; }
   $dat = date("d.m");
   $inf = $mysqli->query("SELECT name from `base_pokemon` WHERE `id`='$pok'")->fetch_assoc();
   newPokemon($pok,$_SESSION['user_id']);
   minus_item(1,178,$user_id);
   quest_update(48,10);
$textNPC = 'Отлично! Это именно та сфера! Теперь я смогу продолжить ее изучение. Ты отлично постарался, возьми за это нового питомца - '.$inf['name'];
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Большое спасибо!</a></li><br>';
}
}
?>
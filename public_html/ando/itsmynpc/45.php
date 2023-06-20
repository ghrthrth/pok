<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Прораб';
if($npc == 45){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(info_quest(45,'step') == 2){
$textNPC = 'Привет...';
}else{
if(!info_quest(45,'step')){
if(empty($answer)){
$textNPC = '*Вы проходите мимо пещеры диглеттов и замечаете толпу лесорубов, стоящих полукругом. Вы решили обратиться к главному...*';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я извиняюсь, а что произошло?</a></li>';
}else
if($answer == 1){
$textNPC = 'Понимаете, мы рубили деревья, чтобы построить дамбу для Бидуфов, и наш коллега вырыл маленькое дерево, которое, как раз росло над одним из туннелей Дугтрио, и провалился внутрь. Теперь нам нужно вытаскивать его оттуда, а наши покемоны совсем без сил. Думаю, нам нужна помощь какого-нибудь тренера.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я тренер покемонов!</a></li>';	
}else
if($answer == 2){ 
quest_update(45,1);
$textNPC = 'Отлично, значит слушай. Мне очень нужна канатня верёвка и трое Мачампов 75-лвла, с характерами: Непреклонный, Распущенный, Мягкий. Я обязательно отблагодарю тебя за помощь.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Хорошо, я скоро вернусь.</a></li>';	
}
}else{
if(empty($answer)){
$textNPC = 'Ты принёс то, о чем я тебя просил?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да</a></li>';
}else
if($answer == 1){
$m1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '68' and `lvl` = '75' and `character` = '12' and `user_id` = '".$user_id."'")->fetch_assoc();
$m2 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '68' and `lvl` = '75' and `character` = '6' and `user_id` = '".$user_id."'")->fetch_assoc();
$m3 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '68' and `lvl` = '75' and `character` = '19' and `user_id` = '".$user_id."'")->fetch_assoc();
if(item_isset(168,1) and $m1['id'] > 0 and $m2['id'] > 0 and $m3['id'] > 0) { 
plus_item(1,1001,$user_id);
plus_item(1,1002,$user_id);
plus_item(1,43,$user_id);
quest_update(45,2);
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m1['id']."'");
				$mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m1['id']."'");
				$mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m1['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m2['id']."'");
				$mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m2['id']."'");
				$mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m2['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m3['id']."'");
				$mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m3['id']."'");
				$mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m3['id']."'");
minus_item(1,168);
$textNPC = 'Ты очень нас выручил, держи в знак благодарности: TM 39 Rock Tomb, TM 30 Shadow Ball и Линзы';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо!</a></li>';
}else{
$textNPC = 'Но это не все.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Простите.</a></li>';	
}

}	
}
}
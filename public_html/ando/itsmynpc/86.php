<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = "Мистер Букер";
if($npc == 86){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = 'Привет!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1">Здраствуйте! Я вижу Трико почти все вернулись в родной лес.</a></li>';
}else
if($answer == 1){
$textNPC = 'Да, мы справились с этой бедой. Дело в злых Пинсерах..';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Хорошо что все возвращается на свои места.</a></li>';	
}else
if($answer == 2){ 
$textNPC = 'Это еще не все. Не все прокаженные Пинсиры покинули Лес, но у нас есть идея, нам нужен #127 Pinsir 70-lvl, возможно, с помощью взрослого покемона мы сможем управлять дикими Пинсирами, и Орех х7, а так же не забывай про покемонов, которых я тебе доручил поймать в Канто.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Хорошо, постраюсь все это раздобыть.</a></li>';  
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3">Я принес нужных покемонов и предметы.</a></li>';	
}else
if($answer == 3){ 
$m1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '66' and `lvl` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m2 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '115' and `lvl` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m3 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '104' and `lvl` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m4 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '127' and `lvl` = '70' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();

if($m1['id'] > 0){
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m1['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m1['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m1['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m2['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m2['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m2['id']."'");  
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m3['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m3['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m3['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m4['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m4['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m4['id']."'");
			minus_item (7,187);
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 252;
		}elseif($pok_rand > 50){
			$pok = 252;
		}elseif($pok_rand > 25){
			$pok = 252;
		}else{
			$pok = 252;
		}
		newPokemon($pok,$_SESSION['user_id']);
	   quest_update(82,6,1);
$textNPC = "Отличная работа! Мы с Рейнджером посовещались и за хорошую работу ты получаешь #252 Treecko 1-lvl. Береги его, надеюсь он вырастит отличным покемоном.";
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Спасибо! Даже не сомневайтесь!</a></li>';  
}else{
$textNPC = 'Тут нет нужных покемонов и предметов. Не забывай, нам нужны Орех х7, #127 Pinsir 70-lvl, а также покемоны с экспедиции в Канто.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извините.</a></li>';  
}
}
?>
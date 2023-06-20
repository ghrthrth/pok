<?php #Маленький человечек
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Маленький человечек';
$prov_poliwag = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 60 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_seel = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 86 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_spheal = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 363 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_azurill = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 298 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
if($npc == 32 && empty($answer)){
	if(!info_quest(6,'step')){
		$textNPC = '<sub>Плак.плак.</sub>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Добрый День! Что-то случилось?</a></li>';
	}elseif(info_quest(6,'step') == 1){
		$textNPC = 'Ты уже принес?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, вот держите!</a></li>';
	}else{
		$textNPC = 'Огромное вам спасибо от всего нашего цирка! Вы вселили надежду в скорое открытие, мы уже тренируем покемонов и готовим новые представления!';
	}
}elseif($npc == 32 && $answer == 1){
	if(!info_quest(6,'step')){
		$textNPC = 'У меня скоро открытие, а эти злые люди забрали их у меня. ВСЕХ ЗАБРАЛИ...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Что такое? Кого забрали?</a></li>';
	}elseif(info_quest(6,'step') == 1){
		if($prov_poliwag['id'] && $prov_seel['id'] && $prov_spheal['id'] && $prov_azurill['id']){
			$textNPC = 'Спасибо большое, Ты самый лучший тренер. Держи награду за твою помощь!';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_poliwag['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_seel['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_spheal['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_azurill['id']);
			plus_item(1,40);
			plus_item(1,34);
			quest_update(6,2);
		}else{
			$textNPC = 'Зачем ты меня обманываешь? Напоминаю, мне нужны Поливаг, Сил, Сфил и Азурилл...';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините.</a></li>';
		}
	}
}elseif($npc == 32 && $answer == 2){
	if(!info_quest(6,'step')){
		$textNPC = 'Моих дорогих покемонов. Что теперь делать, откуда брать мне их...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Может я помогу вам?</a></li>';
	}
}elseif($npc == 32 && $answer == 3){
	if(!info_quest(6,'step')){
		$textNPC = 'Как ты мне поможешь?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Я могу принести вам новых покемонов. Я тренер покемонов!</a></li>';
	}
}elseif($npc == 32 && $answer == 4){
	if(!info_quest(6,'step')){
		$textNPC = 'Ох какой счастье! Так мне нужно много покемонов. Поливаг, Сил, Сфил и Азурилл, но... *хнык-хнык* они все обитают в Канто.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Сейчас все будет, не плачьте.</a></li>';
		quest_update(6,1);
	}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>
<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Джек';
$checkjecklamp	= $mysqli->query("SELECT * FROM awards WHERE img = 1062 AND user = ".$_SESSION['user_id'])->fetch_assoc();
if($npc == 165){
	if(empty($answer)){
		$textNPC = 'Доброго сумрака тебе, чернь. Я вижу, вы хорошо постарались с умирвщлением озлобленных духов покемонов. Похвально - похвально. Но, так просто я тебе не дам награду. Если у тебя есть мой сувенир, то я готов тебя вознаградить.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Награда? Думаю, это приемлемо после всего того, что нам пришлось пережить на Хеллоуин. Давай его сюда!</a></li>';
	}elseif($answer == 1 && !info_quest(165,'step') == 2 && $checkjecklamp['img'] == 1062){
		$textNPC = 'Тогда держи! Случайная эволюция Eevee, и немного инвентаря. Что именно я дал тебе? Сам разберешься, не маленький.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Уходи злой дух, и не возвращайся больше!</a></li>';
		$randompok = rand(1,8);
		if($randompok == 1){ $eevee = 134; }
		if($randompok == 2){ $eevee = 135; }
		if($randompok == 3){ $eevee = 136; }
		if($randompok == 4){ $eevee = 196; }
		if($randompok == 5){ $eevee = 197; }
		if($randompok == 6){ $eevee = 470; }
		if($randompok == 7){ $eevee = 471; }
		if($randompok == 8){ $eevee = 700; }
		neweventPokemon($eevee,$_SESSION['user_id']);
		plus_item(20,330,$_SESSION['user_id']);
		plus_item(2,384,$_SESSION['user_id']);
		plus_item(30,309,$_SESSION['user_id']);
		plus_item(5,72,$_SESSION['user_id']);
		plus_item(5,1055,$_SESSION['user_id']);
		plus_item(3,101,$_SESSION['user_id']);
		plus_item(2000000,1,$_SESSION['user_id']);
		quest_update(165,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}
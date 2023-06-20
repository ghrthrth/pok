<?php #Жуколов Кристи
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Жуколов Кристи';
if($npc == 76 && empty($answer)){
	$textNPC = 'Привет!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Привет, как Вас зовут?</a></li>';
}elseif($npc == 76 && $answer == 1){
	$textNPC = 'Меня зовут Кристи, я с Олстона. Кстати, хочешь забаную историю?';
	$zapros = $mysqli->query('SELECT * FROM user_items WHERE user_id = '.$_SESSION['user_id'].' AND item_id = 1 AND count >= 5000');
	if($zapros->num_rows > 0){
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Да, интересно было бы послушать что то новое.</a></li>';
    }
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, спасибо, я спешу.</a></li>';
}elseif($npc == 76 && $answer == 2){
	minus_item(100,1);
	$textNPC = 'Моя подружка Стефани недавно начала заниматься покесвадьбой. Ты представляешь? Свадьба для покемонов! Не понимаю я этой современной моды...';
	if(!info_quest(73,'step')){
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Свадьба покемонов?! Ого, а можно поподробней?</a></li>';
	}else{
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Ой, Кристи, привет не узнал тебя. Извини, мне нужно бежать.</a></li>';
	}
}elseif($npc == 76 && $answer == 3){
	$textNPC = 'Если честно, то я так и не поняла каких она покемонов женит. Кажется, парочка молодых Спироу или Спинараков... Что то на С...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Ого! А можешь еще что то рассказать?</a></li>';
}elseif($npc == 76 && $answer == 4){
	$textNPC = 'Если честно я сама не до конца в курсе этой всех истории, но если тебе так интересно, то можешь поискать ее где то в Новом районе, она как раз ищет красивые цветы для молодожен.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Хорошо, спасибо, досвидания!</a></li>';
}elseif($npc == 76 && $answer == 5){
	$textNPC = 'Обращайся.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">...</a></li>';
	quest_update(73,1);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
<?php #Рейнджер
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Рейнджер';
if($npc == 82 && empty($answer)){
	$textNPC = 'Что ты здесь делаешь?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Просто гуляю, а что?</a></li>';
}elseif($npc == 82 && $answer == 1){
	$textNPC = 'Прогулки тут запрещены! Тут ведутся исследования.';
	$zapros = $mysqli->query('SELECT * FROM user_items WHERE user_id = '.$_SESSION['user_id'].' AND item_id = 1 AND count >= 1');
	if($zapros->num_rows > 0){
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">А что за исследования?</a></li>';
    }
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Не очень то и хотелось...</a></li>';
}elseif($npc == 82 && $answer == 2){
	minus_item(100,1);
	$textNPC = 'Мы пытаемся разобраться почему Трико покинули лес.';
	if(!info_quest(82,'step')){
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Странно, раньше их тут было уйма, а сейчас несоискать даже одного.</a></li>';
	}else{
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Как поживуют Трико?</a></li>';
	}
}elseif($npc == 82 && $answer == 3){
	$textNPC = 'Местные биологи также не понимают что случилось и мы нуждаемся в более профессиональном специалисте.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Я хочу помочь!</a></li>';
}elseif($npc == 82 && $answer == 4){
	$textNPC = 'Хороший тон, но не думаю что у тебя достаточно знаний для этого. Но ты можешь помочь в поисках ученого для разгадки этой тайны.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Хорошо, а где мне его искать?</a></li>';
}elseif($npc == 82 && $answer == 5){
	$textNPC = 'Если бы мы сами знали...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Понял, погому чем смогу. Я не оставлю это на месте.</a></li>';
	quest_update(82,1);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
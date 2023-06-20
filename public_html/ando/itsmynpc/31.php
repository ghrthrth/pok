<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Старушка';
if($npc == 31 && empty($answer)){
	if(!info_quest(5,'step')){
		$textNPC = 'Здравствуй, внучек';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуй бабушка, а что это ты сидишь тут одна?</a></li>';
	}else{
		$textNPC = 'Здравствуй, внучек';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Вот, я принес несколько.</a></li>';
	}
}elseif($npc == 31 && $answer == 1){
	if(!info_quest(5,'step')){	
		$textNPC = 'Да вот, пришлось расстаться со своим хобии из-за возраста. Я собирала камни разной породы, а теперь...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Может я смогу чем-то помочь?</a></li>';
	}else{
		$all_count = 0;
		$kvarc = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '150'")->fetch_assoc();
		if($kvarc){
			$all_count = $all_count + $kvarc['count'];
		}
		$malaxit = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '151'")->fetch_assoc();
		if($malaxit){
			$all_count = $all_count + $malaxit['count']*2;
		}
		$lazurit = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '152'")->fetch_assoc();
		if($lazurit){
			$all_count = $all_count + $lazurit['count']*5;
		}
		$onix = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '153'")->fetch_assoc();
		if($onix){
			$all_count = $all_count + $onix['count']*10;
		}
		if($all_count < 100){
			$textNPC = 'Тут не достаточно камней.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините</a></li>';
		}else{
			if($kvarc){ minus_item($kvarc['count'],150); }
			if($malaxit){ minus_item($malaxit['count'],151); }
			if($lazurit){ minus_item($lazurit['count'],152); }
			if($onix){ minus_item($onix['count'],153); }
			$stone_rand = rand(1,100);
			if($stone_rand > 30){
				plus_item(1,134);
				$textNPC = 'Вижу ты все принес, спасибо тебе. Держи награду за это! Я нашла его возле своего сада, возможно какой то тренер выронил. Громовой камень!';
			}else{
				plus_item(1,134);
				$textNPC = 'Вижу ты все принес, спасибо тебе. Держи награду за это! Я нашла его возле своего сада, возможно какой то тренер выронил. Громовой камень!';
			}
		}
	}
}elseif($npc == 31 && $answer == 2){
	if(!info_quest(5,'step')){	
		$textNPC = 'А это интересеная затея, посмотрим что из этого получится. Мне нужны камни кварца,малахита,лазурита и оникса. Как принесешь мне нужное количество для коллекции я награжу тебя.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Я все понял. Скоро буду!</a></li>';
		quest_update(5,1);
	}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 
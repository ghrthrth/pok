<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Lumenion';

$img = "<img src='https://oldpokemon.ru/img/200.png'>";
if($npc == 200 && empty($answer) && item_isset(1052, 1)){
		$textNPC = ' '.$img.'  Привет! Я собираю Кусочки Тортика.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я как раз для этого к вам и пришёл!</a></li>';
	}elseif($npc == 200 && $answer == 1){
        $item1 = $mysqli->query("SELECT * FROM base_items WHERE categories = 1 AND dress = 1 ORDER BY rand() LIMIT 1")->fetch_assoc();
		$item2 = $mysqli->query("SELECT * FROM base_items WHERE categories = 1 AND dress = 1 ORDER BY rand() LIMIT 1")->fetch_assoc();
		$tm1 = $mysqli->query("SELECT * FROM base_items WHERE categories = 18 AND tm > 0 ORDER BY rand() LIMIT 1")->fetch_assoc();
		$tm2 = $mysqli->query("SELECT * FROM base_items WHERE categories = 18 AND tm > 0 ORDER BY rand() LIMIT 1")->fetch_assoc();
		$all_count = 0;
		$snow = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '1052'")->fetch_assoc();
		if($snow){
			$all_count = $all_count + $snow['count'];
		}
		if($all_count >= 10){  
			$textNPC = 'За свою помощь ты получаешь случайные предметы: <b>'.$item1['name'].'</b> и <b>'.$item2['name'].'</b> . <br> Это еще не все! Совершенно случайные ТМ-Атаки: <b>'.$tm1['name'].'</b> и <b>'.$tm2['name'].'</b> . Так же, 35 Наборов тренировок,Коробка витаминов x2, Билет удачи x1, 2.500.000 Кредитов!';
		    plus_item(2500000,1);
		    plus_item(35,330);
		    plus_item(2,1055);
		    plus_item(1,1051);
		    plus_item(1,$item1['id']);
		    plus_item(1,$item2['id']);
		    plus_item(1,$tm1['id']);
		    plus_item(1,$tm2['id']);
		    minus_item($snow['count'],1052); 
		    quest_update(200,2);

		}else{
			if($all_count = 0) 
				$textNPC = 'У тебя Кусчков Тортика!';
			}	
			
	}elseif(!item_isset(1052, 1)){
     $textNPC = '  '.$img.'   У тебя нет Кусчков Тортика';		
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 
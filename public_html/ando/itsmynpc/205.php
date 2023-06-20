<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Кондитер Рик';

if($npc == 205 && empty($answer) && item_isset(445, 20)){
		$textNPC = 'Здравстуйте, я надеюсь вы здесь затем чтобы отдать ваши вкусные Кусочки Тортика?</b>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Конечно!</a></li>';
	}elseif($answer == 1 && item_isset(445, 20)){
        $all_count = 0;
		$snow = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '445'")->fetch_assoc();
		if($snow){
		$all_count = $all_count + $snow['count'];
		if($all_count >= 20){ // так же не уверен что строчки 63-67 в нужном месте 
				$randomaward = rand(1,7);// в этой части правильно?
				if($randomaward == 1){
				$textNPC = 'За вклад внесенный в выбивание Кусочков Тортика вы получаете: #506 Lillipup, TM 25-Thunder x1, TM 14-Blizzard x1, Камень Рассвета x1, Лупа x1, Объедки x1.'; //допишу как будет нпс работать
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			newPokemon(506,$_SESSION['user_id']); // покемон
		    minus_item($all_count,445); // 
			plus_item(1,1005);// тандер
			plus_item(1,253); // камень рассвета
		    plus_item(1,1004);// близард
		    plus_item(1,293);// лупа
		    plus_item(1,26);// объедки
			quest_update(205,2);
				}
				if($randomaward == 2){
					$textNPC = 'За вклад внесенный в выбивание Кусочков Тортика вы получаете: #506 Lillipup, TM 25-Thunder x1, TM 14-Blizzard x1, Огеннный камень x1, Лупа x1, Линзы x1.';//допишу как будет нпс работать
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			newPokemon(506,$_SESSION['user_id']);
		    minus_item($all_count,445);
			plus_item(1,1005);// тандер
			plus_item(1,131); // огненный
		    plus_item(1,1004);// близард
		    plus_item(1,293);// лупа
		    plus_item(1,43);// линзы
			quest_update(205,2);
				}
				if($randomaward == 3){
			    $textNPC = 'За вклад внесенный в выбивание Кусочков Тортика вы получаете: #506 Lillipup, TM 25-Thunder x1, TM 14-Blizzard x1, Водный Камень x1, Блестки x1, Объедки x1.';// допишу как будет нпс работать
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			newPokemon(506,$_SESSION['user_id']);
		    minus_item($all_count,445);
			plus_item(1,1005);// тандер
			plus_item(1,132); // водный
		    plus_item(1,1004);// близард
		    plus_item(1,8);//  блестки
		    plus_item(1,26);// объедки
			quest_update(205,2);
				}
		   	    if($randomaward == 4){
			    $textNPC = 'За вклад внесенный в выбивание Кусочков Тортика вы получаете: #506 Lillipup, TM 25-Thunder x1, TM 14-Blizzard x1, Овальный Камень x1, Блестки x1, Линзы x1.';// допишу как будет нпс работать
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			newPokemon(506,$_SESSION['user_id']);
		    minus_item($all_count,445);
			plus_item(1,1005);// тандер
			plus_item(1,251); // овальный
		    plus_item(1,1004);// близард
		    plus_item(1,8);// Блестки
		    plus_item(1,43);// линзы
			quest_update(205,2);
		        }
		   	    if($randomaward == 5){
			    $textNPC = 'За вклад внесенный в выбивание Кусочков Тортика вы получаете: #506 Lillipup, TM 25-Thunder x1, TM 14-Blizzard x1, Камень Рассвета x1, Блестки x1, Лупа x1.';// допишу как будет нпс работать
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			newPokemon(506,$_SESSION['user_id']);
		    minus_item($all_count,445);
			plus_item(1,1005);// тандер
			plus_item(1,253); // рассвета
		    plus_item(1,1004);// близард
		    plus_item(1,8);// Блестки
		    plus_item(1,293);// лупа
			quest_update(205,2);
		       }		   	   
		       if($randomaward == 6){
			    $textNPC = 'За вклад внесенный в выбивание Кусочков Тортика вы получаете: #506 Lillipup, TM 25-Thunder x1, TM 14-Blizzard x1, Водный x1, Объедки x1, Линзы x1.';// допишу как будет нпс работать
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			newPokemon(506,$_SESSION['user_id']);
		    minus_item($all_count,445);
			plus_item(1,1005);// тандер
			plus_item(1,132); // водный
		    plus_item(1,1004);// близард
		    plus_item(1,26);// объедки
		    plus_item(1,43);// линзы
			quest_update(205,2);
		       }
		       if($randomaward == 7){
				$textNPC = 'За вклад внесенный в выбивание Кусочков Тортика вы получаете: #506 Lillipup, TM 25-Thunder x1, TM 14-Blizzard x1, Водный Камень x1, Лупа x1, Объедки x1.';// допишу как будет нпс работать
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			newPokemon(506,$_SESSION['user_id']);
		    minus_item($all_count,445);
			plus_item(1,1005);// тандер
			plus_item(1,132); // водный
		    plus_item(1,1004);// близард
		    plus_item(1,293);//  Лупа
		    plus_item(1,26);// объедки
			quest_update(205,2);
            }
		}else{ 
				$textNPC = 'Тебе не хватает Кусочков Тортика!';
			}	
		}
			
	 }else{
     $textNPC = '  '.$img.'  Тебе не хватает Кусочков Тортика!';		
	 }
?> 
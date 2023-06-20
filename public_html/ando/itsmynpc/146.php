<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мартин';
if($npc == 146 && empty($answer)){
	if(!item_isset(437, 1)){
		$textNPC = 'У вас нет самоцветов!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да? А я и не заметил, простите.</a></li>';
	}elseif(item_isset(437, 1) && !info_quest(146,'step') == 8){
     $textNPC = 'Спасибо за участие в ивенте! Выберите покемона 3-ей категории. Цена 150 самоцветов.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=20&map=1">Я выбираю #443 Gible.</a></li>'; //1011
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=21&map=1">Я выбираю #532 Timburr.</a></li>'; //1036
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=22&map=1">Я выбираю #554 Darumaka.</a></li>'; //1050
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=23&map=1">Я выбираю #621 Druddigon.</a></li>'; //1019
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=24&map=1">Я выбираю #570 Zorua.</a></li>'; //1006
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=25&map=1">Я выбираю #622 Golett.</a></li>'; //1019
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=26&map=1">Я выбираю #672 Skiddo.</a></li>'; //1006
	}
	/*}elseif (info_quest(146,'step') == 8){
		$textNPC = 'Спасибо за твою помощь!';
	}*/
	    }elseif($npc == 146 && $answer == 20 && item_isset(437,150)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(150,437);
	  	neweventPokemon(443,$_SESSION['user_id']);
	  	quest_update(146,8,0);
        }elseif($npc == 146 && $answer == 21 && item_isset(437,150)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(150,437);
	  	neweventPokemon(532,$_SESSION['user_id']);
	  	quest_update(146,8,0);
	  	}elseif($npc == 146 && $answer == 22 && item_isset(437,150)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(150,437);
	  	neweventPokemon(554,$_SESSION['user_id']);
	  	quest_update(146,8,0);
	  	}elseif($npc == 146 && $answer == 23 && item_isset(437,150)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(150,437);
	  	neweventPokemon(621,$_SESSION['user_id']);
	  	quest_update(146,8,0);
	  	}elseif($npc == 146 && $answer == 24 && item_isset(437,150)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(150,437);
	  	neweventPokemon(570,$_SESSION['user_id']);
	  	quest_update(146,8,0);
	    }elseif($npc == 146 && $answer == 25 && item_isset(437,150)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(150,437);
	  	neweventPokemon(622,$_SESSION['user_id']);
	  	quest_update(146,8,0);
	  	}elseif($npc == 146 && $answer == 26 && item_isset(437,150)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(150,437);
	  	neweventPokemon(672,$_SESSION['user_id']);
	  	quest_update(146,8,0);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
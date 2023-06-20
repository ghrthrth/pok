<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Элиот';
if($npc == 144 && empty($answer)){
	if(!item_isset(437, 1)){
		$textNPC = 'У вас не хватает самоцветов!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да? А я и не заметил, простите.</a></li>';
	}elseif(item_isset(437, 1) && !info_quest(144,'step') == 8){
     $textNPC = 'Спасибо за участие в ивенте! Выберите покемона 1-ой категории. Цена 50 самоцветов.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=20&map=1">Я выбираю #236 Tyrogue.</a></li>'; //1011
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=21&map=1">Я выбираю #311 Plusle.</a></li>'; //1036
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=22&map=1">Я выбираю #312 Minun.</a></li>'; //1050
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=23&map=1">Я выбираю #418 Buizel.</a></li>'; //1019
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=24&map=1">Я выбираю #427 Buneary.</a></li>'; //1006
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=25&map=1">Я выбираю #425 Drifloon.</a></li>'; //1019
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=26&map=1">Я выбираю #436 Bronzor.</a></li>'; //1006
	}
	/*}elseif (info_quest(144,'step') == 8){
		$textNPC = 'Спасибо за твою помощь!';
	}*/
	    }elseif($npc == 144 && $answer == 20 && item_isset(437,50)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(50,437);
	  	neweventPokemon(236,$_SESSION['user_id']);
	  	quest_update(144,8,0);
        }elseif($npc == 144 && $answer == 21 && item_isset(437,50)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(50,437);
	  	neweventPokemon(311,$_SESSION['user_id']);
	  	quest_update(144,8,0);
	  	}elseif($npc == 144 && $answer == 22 && item_isset(437,50)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(50,437);
	  	neweventPokemon(312,$_SESSION['user_id']);
	  	quest_update(144,8,0);
	  	}elseif($npc == 144 && $answer == 23 && item_isset(437,50)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(50,437);
	  	neweventPokemon(418,$_SESSION['user_id']);
	  	quest_update(144,8,0);
	  	}elseif($npc == 144 && $answer == 24 && item_isset(437,50)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(50,437);
	  	neweventPokemon(427,$_SESSION['user_id']);
	  	quest_update(144,8,0);
	  }elseif($npc == 144 && $answer == 25 && item_isset(437,50)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(50,437);
	  	neweventPokemon(425,$_SESSION['user_id']);
	  	quest_update(144,8,0);
	  	}elseif($npc == 144 && $answer == 26 && item_isset(437,50)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(50,437);
	  	neweventPokemon(436,$_SESSION['user_id']);
	  	quest_update(144,8,0);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
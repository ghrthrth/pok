<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Терри';
if($npc == 145 && empty($answer)){
	if(!item_isset(437, 1)){
		$textNPC = 'У вас нет самоцветов!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да? А я и не заметил, простите.</a></li>';
	}elseif(item_isset(437, 1) && !info_quest(145,'step') == 8){
     $textNPC = 'Спасибо за участие в ивенте! Выберите покемона 2-ой категории. Цена 100 самоцветов.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=20&map=1">Я выбираю #079 Slowpoke.</a></li>'; //1011
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=21&map=1">Я выбираю #239 Elekid.</a></li>'; //1036
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=22&map=1">Я выбираю #240 Magby.</a></li>'; //1050
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=23&map=1">Я выбираю #142 Aerodactyl.</a></li>'; //1019
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=24&map=1">Я выбираю #175 Togepi.</a></li>'; //1006
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=25&map=1">Я выбираю #207 Gligar.</a></li>'; //1019
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=26&map=1">Я выбираю #449 Hippopotas.</a></li>'; //1006
	}
	/*}elseif (info_quest(145,'step') == 8){
		$textNPC = 'Спасибо за твою помощь!';
	}*/
	    }elseif($npc == 145 && $answer == 20 && item_isset(437,100)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(100,437);
	  	neweventPokemon(79,$_SESSION['user_id']);
	  	quest_update(145,8,0);
        }elseif($npc == 145 && $answer == 21 && item_isset(437,100)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(100,437);
	  	neweventPokemon(239,$_SESSION['user_id']);
	  	quest_update(145,8,0);
	  	}elseif($npc == 145 && $answer == 22 && item_isset(437,100)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(100,437);
	  	neweventPokemon(240,$_SESSION['user_id']);
	  	quest_update(145,8,0);
	  	}elseif($npc == 145 && $answer == 23 && item_isset(437,100)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(100,437);
	  	neweventPokemon(142,$_SESSION['user_id']);
	  	quest_update(145,8,0);
	  	}elseif($npc == 145 && $answer == 24 && item_isset(437,100)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(100,437);
	  	neweventPokemon(175,$_SESSION['user_id']);
	  	quest_update(145,8,0);
	  }elseif($npc == 145 && $answer == 25 && item_isset(437,100)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(100,437);
	  	neweventPokemon(207,$_SESSION['user_id']);
	  	quest_update(145,8,0);
	  	}elseif($npc == 145 && $answer == 26 && item_isset(437,100)){
	$textNPC = 'Отличный выбор! Держи!';	
		minus_item(100,437);
	  	neweventPokemon(449,$_SESSION['user_id']);
	  	quest_update(145,8,0);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
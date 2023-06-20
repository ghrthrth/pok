<?php
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Собиратель свечей';
if($npc == 176 && empty($answer)){
		$textNPC = 'Привет привет! Поговаривают, что здесь недавно произошло празднование игры? Если это так - то я пришел прямо по адресу! Возьму у тебя комплекты свечей! Учти, что 1 комплет это полный набор слова - OLDPOKEMON. Призы будут позже, сначала я соберу это все.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Вот. Всё что у меня есть.</a></li>';
	}elseif($npc == 176 && $answer == 1){
		$check_confrm = $mysqli->query("SELECT user FROM dr_game WHERE user = ".$_SESSION['user_id'])->fetch_assoc();
		if($check_confrm){
			if(item_isset(1080,3) && item_isset(1081,1) && item_isset(1082,1) && item_isset(1083,1) && item_isset(1084,1) && item_isset(1085,1) && item_isset(1086,1) && item_isset(1087,1)){  
			$textNPC = 'Отлично. Я соберу их сейчас. Призы будут позже - учти. Если есть еще один комплект - обратись снова!';
		    minus_item(3,1080);
		    minus_item(1,1081); 
		    minus_item(1,1082); 
		    minus_item(1,1083); 
		    minus_item(1,1084); 
		    minus_item(1,1085); 
		    minus_item(1,1086); 
		    minus_item(1,1087);
		    $mysqli->query("UPDATE dr_game SET count_set = count_set + 1 WHERE user = ".$_SESSION['user_id']);
		    }else{
		    	$textNPC = 'У тебя не хватает свечей!';
		    }
		}else{
			$usrlogin = $mysqli->query("SELECT * FROM users WHERE id = ".$_SESSION['user_id'])->fetch_assoc();
			if(item_isset(1080,3) && item_isset(1081,1) && item_isset(1082,1) && item_isset(1083,1) && item_isset(1084,1) && item_isset(1085,1) && item_isset(1086,1) && item_isset(1087,1)){  
			$textNPC = 'Отлично. Я соберу их сейчас. Призы будут позже - учти. Если есть еще один комплект - обратись снова!';
		    minus_item(3,1080);
		    minus_item(1,1081); 
		    minus_item(1,1082); 
		    minus_item(1,1083); 
		    minus_item(1,1084); 
		    minus_item(1,1085); 
		    minus_item(1,1086); 
		    minus_item(1,1087);
		    $mysqli->query("INSERT INTO `dr_game` (`user`,`count_set`,`user_login`) VALUES ('".$usrlogin['id']."','1','".$usrlogin['login']."') ");
		    }else{
		    	$textNPC = 'У тебя не хватает свечей!';
		    }
		}
		
			
	}elseif(!item_isset(1080, 1)){
     $textNPC = 'У тебя нет свечей!';
		
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 
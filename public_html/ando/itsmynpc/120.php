<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Огромный Вайлорд';
if($npc == 120 && empty($answer) && info_quest(117,'step') == 4){
	$textNPC = 'Ууууу... Вууууу... Вэйлооорд...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1"><i>*приблизиться к Вэлорду*</i></a></li>';
}elseif($npc == 120 && $answer == 1){
	$textNPC = 'Вэйлооорд... Вуууу... Вуууу....';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1"><i>*прислушаться*</i></a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=4"><i>*напасть*</i></a></li>';
}elseif($npc == 120 && $answer == 2){
	$textNPC = 'Вэйлооорд... Вууууу!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Бедный Вэлорд, чем я могу тебе помочь?</a></li>';
}elseif($npc == 120 && $answer == 3){
	$textNPC = 'Вуууу! Вэйлооооорд...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1"><i>*вы замечаете как к берегу приближаются два Шарпидо*</i></a></li>';
	quest_update(117,5);
}elseif($npc == 120 && empty($answer) && info_quest(117,'step') == 7){   
    $textNPC = 'Вуууу! Вэйлорд! <i>*в знак помощи Огромный Вэйлорд вручил вам TM 14 - Blizzard*</i>';
    plus_item (1,1005);
    quest_update(117,8,1);
    
}elseif($npc == 120 && empty($answer)){
    $textNPC = 'Вууууу! Вэйлооорд!';

	}elseif($npc == 120 && $answer == 4){
		$inCatchPok = $mysqli->query("select * from `base_pokemon` WHERE `id`='321' LIMIT 1")->fetch_assoc();
		$inMyPok = $mysqli->query("select * from `user_pokemons` WHERE  `user_id`='".$_SESSION['user_id']."' and `hp`>'0' and `active`='1' ORDER BY start_pok DESC LIMIT 1")->fetch_assoc();
		$lvl = 100;
		$harR = rand(1,26);
		$hp =    round(($inCatchPok['hp']*2+rand(1,30)+(1/2))*($lvl/100)+10+$lvl);
		$atk =   round((($inCatchPok['atk']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$def =   round((($inCatchPok['def']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$speed = round((($inCatchPok['speed']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$sdef =  round((($inCatchPok['sdef']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$satk =  round((($inCatchPok['satk']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$atk_pok1 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '321' and `atc_lvl` < '$lvl' ORDER BY RAND() LIMIT 1")->fetch_assoc();
		$atk_pok2 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '321' and `atc_lvl` < '$lvl' and `atac_id` != '".$atk_pok1['atac_id']."' ORDER BY RAND() LIMIT 1")->fetch_assoc();
		$atk1 = $atk_pok1['atac_id'];
		$atk2 = $atk_pok2['atac_id'];
		$mysqli->query("INSERT INTO pokem_vs (basenum,name,lvl,hp,hp_max,attack,def,speed,sp_attack,sp_def,har,type,gender,atk1,atk2,money,catch ) VALUES('321','Wailord','$lvl','$hp','$hp','$atk','$def','$speed','$satk','$sdef','$harR','normal','1','$atk1','$atk2','100','1')"); 
		$pID = $mysqli->insert_id;
		$mysqli->query("INSERT INTO battle (user1 , pok1 , pok2  , tip, data) VALUES('".$_SESSION['user_id']."','".$inMyPok['id']."','$pID','1','".date("Y-m-d H:i:s")."')");
		$mysqli->query("UPDATE users SET `status`='battle' WHERE id='".$_SESSION['user_id']."'");
		echo "<script>parent.frames._location.location.reload();</script>";	
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 320;
		}elseif($pok_rand > 50){
			$pok = 320;
		}elseif($pok_rand > 15){
			$pok = 320;
		}else{
			$pok = 320;
		}
		newPokemon($pok,$_SESSION['user_id']);
		quest_update(117,8,1);
	}else{
		echo "<script>parent.frames._location.location.reload();</script>";	
	}	
?>
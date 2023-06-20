<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
if($npc == 49){
	if(item_isset(178,1)){
		$nameNPC = 'Дитто';
		$textNPC = '...';
	}elseif(info_quest(48,'step') == 1){
		$inCatchPok = $mysqli->query("select * from `base_pokemon` WHERE `id`='132' LIMIT 1")->fetch_assoc();
		$inMyPok = $mysqli->query("select * from `user_pokemons` WHERE  `user_id`='".$_SESSION['user_id']."' and `hp`>'0' and `active`='1' ORDER BY start_pok DESC LIMIT 1")->fetch_assoc();
		$lvl = 400;
		$harR = rand(1,26);
		$hp =    round(($inCatchPok['hp']*2+rand(1,30)+(1/2))*($lvl/100)+10+$lvl);
		$atk =   round((($inCatchPok['atk']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$def =   round((($inCatchPok['def']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$speed = round((($inCatchPok['speed']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$sdef =  round((($inCatchPok['sdef']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$satk =  round((($inCatchPok['satk']*2+rand(1,30)+(1/2))*($lvl/100)+5)*1);
		$atk_pok1 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '210' and `atc_lvl` < '$lvl' ORDER BY RAND() LIMIT 1")->fetch_assoc();
		$atk_pok2 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '210' and `atc_lvl` < '$lvl' and `atac_id` != '".$atk_pok1['atac_id']."' ORDER BY RAND() LIMIT 1")->fetch_assoc();
		$atk1 = $atk_pok1['atac_id'];
		$atk2 = $atk_pok2['atac_id'];
		$mysqli->query("INSERT INTO pokem_vs (basenum,name,lvl,hp,hp_max,attack,def,speed,sp_attack,sp_def,har,type,gender,atk1,atk2,money,item,catch ) VALUES('132','Ditto','$lvl','$hp','$hp','$atk','$def','$speed','$satk','$sdef','$harR','normal','1','$atk1','$atk2','100','178','1')"); 
		$pID = $mysqli->insert_id;
		$mysqli->query("INSERT INTO battle (user1 , pok1 , pok2  , tip, data) VALUES('".$_SESSION['user_id']."','".$inMyPok['id']."','$pID','1','".date("Y-m-d H:i:s")."')");
		$mysqli->query("UPDATE users SET `status`='battle' WHERE id='".$_SESSION['user_id']."'");
		//echo "<script>parent.frames._location.location.reload();</script>";	
	}else{
		echo "<script>parent.frames._location.location.reload();</script>";	
	}	
}
?>
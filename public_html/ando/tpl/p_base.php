<?
if(!empty($_GET['TP_id']) && !empty($_GET['type'])){
	$pok_id = obr_chis($_GET['TP_id']);
	$type = obTxt($_GET['type']);
	if(infUsr($_SESSION['user_id'],"status") !== 'free' && infUsr($_SESSION['user_id'],"status") !== 'talking'){
		echo "<script>alert('В данный момент вы в бою/обмене!');</script>";
		echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 	
		return;
	}
		if($type == 'del'){
			$pokemon = $mysqli->query('SELECT starts,master FROM user_pokemons WHERE id = '.$pok_id.' AND active = 1 AND user_id = '.$_SESSION['user_id'])->fetch_assoc();
			if($pokemon['master'] !== $_SESSION['user_id']){
				die("<script>alert('Вы не являетесь хозяином покемона!');window.location.href='/game.php?fun=pokemons';</script>");
			}elseif($pokemon['starts'] == 1){
				die("<script>alert('Нельзя отпустить стартового покемона!');window.location.href='/game.php?fun=pokemons';</script>");
			}else{
				$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$pok_id."'");
				$mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$pok_id."'");
				$mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$pok_id."'");
				echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			}
		}elseif($type == 'rename'){
		 $name = obTxt($_POST['pname']);
		 if(strlen($name) < 3){
		 	echo "<script>alert('Слишком короткое имя');</script>";
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 
		 }
		 if(empty($name)){
			echo "<script>alert('Вы ввели  пустое значение');</script>";
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 		
		 }else{
			$a = $mysqli->query('SELECT nn,master FROM user_pokemons WHERE id = '.$pok_id)->fetch_assoc();
			if($a['nn'] == 0 and $a['master'] == $_SESSION['user_id']){
				$mysqli->query('UPDATE user_pokemons SET name_new = "'.$name.'", nn = 1 WHERE user_id = '.$_SESSION['user_id'].' AND id = '.$pok_id);		
				echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";return;
			}else{
				echo "<script>alert('Вы не хозяин покемона!');</script>";
				echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 	
			}
		 }
	 }else
		if($type == 'start'){
			 $a = $mysqli->query('SELECT * FROM user_pokemons WHERE id = '.$pok_id)->fetch_assoc();
				 if($user['status'] != 'free' && $user['status'] != 'talking'){
					echo "<script>alert('В бою, обмене нельзя совершить это действие!');</script>";
					echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 	
				 }else{
				 	
					$mysqli->query('UPDATE user_pokemons SET start_pok = 0 WHERE user_id = '.$_SESSION['user_id']);
					$mysqli->query('UPDATE user_pokemons SET start_pok = 1 WHERE user_id = '.$_SESSION['user_id'].' AND id = '.$pok_id);	 	 
					echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 	 
				    				 }
			 
		}else
			if($type == 'collapse'){
			 $a = $mysqli->query('SELECT * FROM user_pokemons WHERE id = '.$pok_id)->fetch_assoc();
			 if($a['user_id'] == $_SESSION['user_id']){
				 if($user['status'] !== 'free' && $user['status'] !== 'talking'){
					echo "<script>alert('В бою, обмене нельзя совершить это действие!');</script>";
					echo "<script>location.href='..';</script>"; 
				 }else{
				 	 $cMPK =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1'");
                     $cmpk_ = $cMPK->num_rows;
                     if($cmpk_ == 1){
                      echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 	
                     }else{
					$mysqli->query('UPDATE user_pokemons SET active = 0 WHERE user_id = '.$_SESSION['user_id'].' AND id = '.$pok_id);
					echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 		
					}			
				 }
			 }else{
				echo "<script>alert('Вы не хозяин покемона!');</script>";
				echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 	
			 }
		}else
			if($type == 'extract'){
			
				 if($user['status'] !== 'free' && $user['status'] !== 'talking'){
					echo "<script>alert('В бою, обмене нельзя совершить это действие!');</script>";
					echo "<script>location.href='..';</script>"; 
				 }else{
				 	$cMPK =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1'");
                     $cmpk_ = $cMPK->num_rows;
                     if($cmpk_ < 6){
					$mysqli->query('UPDATE user_pokemons SET active = 1 WHERE user_id = '.$_SESSION['user_id'].' AND id = '.$pok_id);
					echo "<script>location.href='/game.php?fun=m_npc&npc_id=8&answ_id=2&map=1';</script>";
					}else{
						echo "<script>location.href='/game.php?fun=m_npc&npc_id=8&answ_id=2&map=1';</script>";
					} 					
				 }
		}else
			if($type == 'extract_transfer'){
	          if($user['transfer_count'] < 3){
				$ap = $mysqli->query("SELECT * FROM `user_pokemons_old` WHERE id = ".$pok_id)->fetch_assoc();
					 if($user['status'] !== 'free' && $user['status'] !== 'talking'){
						echo "<script>alert('В бою, обмене нельзя совершить это действие!');</script>";
						echo "<script>location.href='..';</script>"; 
					 }else{
						 $cMPK =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1'");
						 $cmpk_ = $cMPK->num_rows;
						 if($cmpk_ < 6){
							$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`nn`,`name_new`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_ev`,`atc_ev`,`def_ev`,`speed_ev`,`spatc_ev`,`spdef_ev`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,`spark`,`Weight`,`trade`,`atk1`,`atk2`,`atk3`,`atk4`,`vitamines`,`ev`) 
							VALUES 
							('".$user['id']."','".$ap['basenum']."','".$ap['numbpu']."','".$ap['name']."','".$ap['nn']."','".$ap['name_new']."','".$ap['character']."','".$ap['lvl']."','".$ap['date_get']."','0','legacy','".$ap['gender']."','".$ap['exp_max']."','".$ap['hp']."','".$ap['hp_max']."','".$ap['attack']."','".$ap['def']."','".$ap['speed']."','".$ap['sp_attack']."','".$ap['sp_def']."','".$ap['hp_ev']."','".$ap['atc_ev']."','".$ap['def_ev']."','".$ap['speed_ev']."','".$ap['spatc_ev']."','".$ap['spdef_ev']."','".$ap['hp_gen']."','".$ap['atc_gen']."','".$ap['def_gen']."','".$ap['speed_gen']."','".$ap['spatc_gen']."','".$ap['spdef_gen']."','".$user['id']."','".$user['id']."','0','".$ap['simpaty']."','0','".$ap['weight']."','1','".$ap['atk1']."','".$ap['atk2']."','".$ap['atk3']."','".$ap['atk4']."','".$ap['vitamines']."','".$ap['ev']."') ");
						$mysqli->query("DELETE FROM `user_pokemons_old` WHERE `id` = '".$pok_id."'");
						if($_SESSION['user_id'] == 26){
							echo "<script>location.href='/game.php?fun=m_npc&npc_id=190&answ_id=1&map=1';</script>";
						}else{
						$mysqli->query('UPDATE users SET transfer_count = transfer_count + 1 WHERE id = '.$_SESSION['user_id']);
						echo "<script>location.href='/game.php?fun=m_npc&npc_id=190&answ_id=1&map=1';</script>";
						}
						}else{
							echo "<script>location.href='/game.php?fun=m_npc&npc_id=190&answ_id=1&map=1';</script>";
						}			
					 }
					}else{
						echo "<script>location.href='/game.php?fun=m_npc&npc_id=190&answ_id=1&map=1';</script>";
					}
		}else
			if($type == 'ADS'){
				$a = $mysqli->query('SELECT master FROM user_pokemons WHERE id = '.$pok_id)->fetch_assoc();
			
				echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 	}
                if($a['master'] == $_SESSION['user_id']){ 	echo "<script>alert('Вы не хозяин покемона!');</script>";
				if(!empty($_GET['amount'])){
						$value = obr_chis($_GET['amount']); 
					}else { 
						$value = 1;
					}					
				$stat = obTxt($_GET['add']);
				$pokemon = $mysqli->query('SELECT * FROM user_pokemons WHERE id = '.$pok_id.' AND active = 1 AND user_id = '.$_SESSION['user_id'])->fetch_assoc();
				
				if(empty($pokemon['id']))die("<script>window.location.href='/game.php?fun=pokemons';</script>");
				if($pokemon['ev'] <= 0) die("<script>alert('Недостаточно очков EV.');window.location.href='/game.php?fun=pokemons';</script>");
				if($value > $pokemon['ev']) die("<script>alert('Недостаточно очков EV.');window.location.href='/game.php?fun=pokemons';</script>");
				
				$chis = $pokemon[$stat.'_ev'] + $value;
				$all = $pokemon['hp_ev']+$pokemon['atc_ev']+$pokemon['def_ev']+$pokemon['spatc_ev']+$pokemon['spdef_ev']+$pokemon['speed_ev']+$value;
				if($all > 595) die("<script>alert('Максимальное количество очков в покемоне не может превышать отметки 594.');window.location.href='/game.php?fun=pokemons';</script>");
				if($chis > 126) die("<script>alert('Количество EV не может превышать отметки 126 в одном стате.');window.location.href='/game.php?fun=pokemons';</script>");
				$evMyRes = $pokemon['ev'] - $value;
				$mysqli->query('UPDATE user_pokemons SET '.$stat.'_ev = '.$chis.', ev = '.$evMyRes.' WHERE id = '.$pok_id);
				echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		}
}else{
	echo "<script>location.href='..';</script>";
}
?>
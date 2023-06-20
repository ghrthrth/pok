<style>::-webkit-scrollbar {
    width: 7px;
    height: 7px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgb(100, 123, 148);
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background: #898c87;
    -webkit-box-shadow: inset 0 0 6px rgb(77, 162, 253);
}</style><?php 
switch($user['status']){
case "battle":
	echo "<script>parent._location.location='game.php?fun=fight';</script>";
	return;
break;
case "trade":
	echo "<script>parent._location.location='game.php?fun=m_trade_work';</script>";
	return;
break;
case "spark":
	echo "<script>parent._location.location='game.php?fun=m_breed&good=1';</script>";
	return;
break;
}
if(isset($_GET['clean'])){
	 $mysqli->query("UPDATE users SET time_chat = ".time()." WHERE id = ".$user_id);
}
if(isset($_GET['newto'])){
	$got = obTxt($_GET['newto']);
	if($got == ""){
		$rt = "Ошибка!";
	}else{
    $itus = $mysqli->query("SELECT id,location,status,online,login FROM users WHERE login = '".$got."'")->fetch_assoc();
    if($itus){
     if($itus['login'] == $user['login']){
     	$rt = "Нельзя предлагать обмен себе!";
     }else
     if($itus['online'] == 0){
     	$rt = "Тренер не в сети!";
     }else
     if($itus['status'] !== "free"){
     	$rt = "Тренер занят!";
     }else
     if($user['status'] !== "free"){
     	$rt = "Вы заняты!";
     }else
     if($user['location'] !== $itus['location']){
     	$rt = "Тренер далеко от вас!";
     }else{
     	$rt = "<b>Обмен начался!</b>";
     	    $cntMYpk =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1'");
            $cmp_ = $cntMYpk->num_rows;
            $cntVSpk =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$itus['id']."' and `active`='1'");
            $cvp_ = $cntVSpk->num_rows;
     	    $mysqli->query("INSERT INTO trade (user1 , user2 , c1 , c2) VALUES ('".$user_id."','".$itus['id']."','".$cmp_."','".$cvp_."') ");
			$mysqli->query("UPDATE users SET status = 'trade' WHERE `id` = '".$user_id."'");
			$mysqli->query("UPDATE users SET status = 'trade',reload = '1' WHERE `id` = '".$itus['id']."'");
			echo "<script>parent.frames._location.location.reload();</script>";
     }
    }else{
    	$rt = "Тренер не найден!";
    }
	}
	
	echo "<script>parent.mess('".$rt."');</script>";
}

if(isset($_POST['ToID'])){
	$toid = obr_chis($_POST['ToID']);
	$save = $mysqli->query("SELECT pve,save FROM base_location WHERE id = ".$user['location'])->fetch_assoc();
	$itu = $mysqli->query("SELECT * FROM users WHERE id = ".$toid)->fetch_assoc();
	if($itu){
	if($_POST['type'] == "recieve"){
     $cMPK =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1' and `hp` > '0'");
         $cmpk_ = $cMPK->num_rows;
         $cMPK2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$itu['id']."' and `active`='1' and `hp` > '0'");
         $cmpk_2 = $cMPK2->num_rows;
		if($user_id == $itu['id']){
			$rt = "Ошибка! Нельзя бросать вызов себе!";
		}else
		if($itu['online'] == 0){
			$rt = "Ошибка! Тренер не онлайн!";
		}else
		if($itu['status'] !== "free"){
			$rt = "Ошибка! Тренер занят!";
		}else
		if($user['location'] !== $itu['location']){
			$rt = "Ошибка! Вы далеко друг от друга!";
		}else
		if($cmpk_2 == 0){
			$rt = "Ошибка! Покемоны тренера не в состоянии сражаться!";
		}else
		if($cmpk_ == 0){
			$rt = "Ошибка! Ваши покемоны не в состоянии сражаться!";
		}else{
			$rt = "<b>Бой начался!</b>";
			$tdata = date("Y-m-d H:i:s");
			$mysqli->query("INSERT INTO battle (user1 , user2, data,loc) VALUES ('".$toid."','".$user_id."', '".$tdata."','".$user['location']."') ");
			$mysqli->query("UPDATE users SET status = 'battle' WHERE `id` = '".$user_id."'");
			$mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '".$toid."'");
			echo "<script>parent.frames._location.location.reload();</script>";
		}
		echo "<script>parent.mess('".$rt."');</script>";
	}else
	if($_POST['type'] == "recieve_gym"){
     $cMPK =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1' and `hp` > '0'");
         $cmpk_ = $cMPK->num_rows;
         $cMPK2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$itu['id']."' and `active`='1' and `hp` > '0'");
         $cmpk_2 = $cMPK2->num_rows;
		if($user_id == $itu['id']){
			$rt = "Ошибка! Нельзя бросать вызов себе!";
		}else
		if($itu['online'] == 0){
			$rt = "Ошибка! Тренер не онлайн!";
		}else
		if($itu['status'] !== "free"){
			$rt = "Ошибка! Тренер занят!";
		}else
		if($user['location'] !== $itu['location']){
			$rt = "Ошибка! Вы далеко друг от друга!";
		}else
		if($cmpk_2 == 0){
			$rt = "Ошибка! Покемоны тренера не в состоянии сражаться!";
		}else
		if($cmpk_ == 0){
			$rt = "Ошибка! Ваши покемоны не в состоянии сражаться!";
		}else{
			$rt = "<b>Бой начался!</b>";
			$tdata = date("Y-m-d H:i:s");
			$mysqli->query("INSERT INTO battle (user1 , user2, data,loc,type) VALUES ('".$toid."','".$user_id."', '".$tdata."','".$user['location']."','5') ");
			$mysqli->query("UPDATE users SET status = 'battle' WHERE `id` = '".$user_id."'");
			$mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '".$toid."'");
			echo "<script>parent.frames._location.location.reload();</script>";
		}
		echo "<script>parent.mess('".$rt."');</script>";
	}else{
		 $cMPK =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1' and `hp` > '0'");
         $cmpk_ = $cMPK->num_rows;
         $cMPK2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$itu['id']."' and `active`='1' and `hp` > '0'");
         $cmpk_2 = $cMPK2->num_rows;
	  if($_POST['mode'] == "call"){
	  	$chkapp = $mysqli->query("SELECT user FROM `app` WHERE user = ".$_SESSION['user_id'])->fetch_assoc();
		if($user_id == $itu['id']){
			$rt = "Ошибка! Нельзя бросать вызов себе!";
		}else
		if($itu['online'] == 0){
			$rt = "Ошибка! Тренер не онлайн!";
		}else
		if($itu['status'] !== "free"){
			$rt = "Ошибка! Тренер занят!";
		}else
		if($user['location'] !== $itu['location']){
			$rt = "Ошибка! Вы далеко друг от друга!";
		}else
		if($user['location'] == 521){
			$rt = "Ошибка! Здесь разрешены только ГИМ битвы!";
		}else
		if($cmpk_2 == 0){
			$rt = "Ошибка! Покемоны тренера не в состоянии сражаться!";
		}else
		if($cmpk_ == 0){
			$rt = "Ошибка! Ваши покемоны не в состоянии сражаться!";
		}else{
			if($chkapp){
			$rt = "Ошибка! Вызов уже отправлен. Ждите окончания.";
		}else{
			$rt = "<b>Вызов отправлен!</b>";
			$tmo = time()+20;
			$mysqli->query("INSERT INTO app (type , user , user_to , timeout) VALUES ('1','".$user_id."','".$toid."','".$tmo."') ");
		}
	}
		echo "<script>parent.mess('".$rt."');</script>";
	}elseif($_POST['mode'] == "gymbattle"){
	  	$chkapp = $mysqli->query("SELECT user FROM `app` WHERE user = ".$_SESSION['user_id'])->fetch_assoc();
		if($user_id == $itu['id']){
			$rt = "Ошибка! Нельзя бросать вызов себе!";
		}else
		if($itu['online'] == 0){
			$rt = "Ошибка! Тренер не онлайн!";
		}else
		/*if($itu['date_gym_battle'] == date("d.m.Y")){
			$rt = "Ошибка! Тренер сегодня уже был в бою!";
		}else*/
		if($itu['status'] !== "free"){
			$rt = "Ошибка! Тренер занят!";
		}else
		if($user['groups'] !== '5.1' AND $user['groups'] !== '5.2' AND $user['groups'] !== '5.3' AND $user['groups'] !== '5.4' AND $user['groups'] !== '5.6' AND $user['groups'] !== '5.8'){
			$rt = "Ошибка! Вы не ГИМ Лидер!";
		}else
		if($user['location'] !== $itu['location']){
			$rt = "Ошибка! Вы далеко друг от друга!";
		}else
		if($cmpk_2 == 0){
			$rt = "Ошибка! Покемоны тренера не в состоянии сражаться!";
		}else
		if($cmpk_ == 0){
			$rt = "Ошибка! Ваши покемоны не в состоянии сражаться!";
		}else{
			if($chkapp){
			$rt = "Ошибка! Вызов уже отправлен. Ждите окончания.";
		}else{
			$rt = "<b>Вызов отправлен!</b>";
			$tmo = time()+20;
			$mysqli->query("INSERT INTO app (type ,user , user_to , timeout) VALUES ('2','".$user_id."','".$toid."','".$tmo."') ");
		}
	}
		echo "<script>parent.mess('".$rt."');</script>";
	}else
	if($_POST['mode'] == "agro"){
         $gd = 0;
         $pop = round(($user['population']/100)*30);
         $l_g = 0;
         if($itu['karma'] <= -10 and $baseloc['opasn'] == 0){
         	$l_g = 1;
         }else
         if($user['karma'] <= 10 and $baseloc['opasn'] == 1){
         	$l_g = 1;
         }

         if($user['karma'] <= -10 and $itu['karma'] >= 10){ $gd = 1; $itm_m = 0;  }else
         if($user['karma'] >= 10 and $itu['karma'] <= -10){ $gd = 1; $itm_m = 0;  }else
         if(item_isset(312,1) and $itu['population'] >= 100 and $pop <= $itu['population']) { $gd = 1; $itm_m = 312; }else
         if(item_isset(313,1) and $itu['population'] >= 100) { $gd = 1;  $itm_m = 313; }

		if(item_isset(313,1) == false and item_isset(312,1) == false){
            $rt = "Ошибка! У Вас нет прав напасть на тренера!";
		}else
		if($itu['groups'] == 1){
            $rt = "Ошибка! У Вас нет прав напасть на тренера!";
		}else
		if($l_g == 3){
          $rt = "Ошибка! Вы не можете напасть на этой локации!";
		}else
		
        if($save['save'] == 1){
        $rt = "Ошибка! Нельзя нападать в покецентре!";
        }else
		if($gd == 0){
          $rt = "Ошибка! Ранг тренера слишком мал для Вас!";
		}else
		if($user_id == $itu['id']){
			$rt = "Ошибка! Нельзя бросать вызов себе!";
		}else
		if($itu['online'] == 0){
			$rt = "Ошибка! Тренер не онлайн!";
		}else
		if($itu['status'] !== "free"){
			$rt = "Ошибка! Тренер занят!";
		}else
		/*if($itu['population'] <= 350){
			$rt = "Тренер ещё новичок. Нельзя нападать на маленьких.";
		}else*/
		if($itu['time_noagro'] > time()){
			$rt = "Тренер защищен пактом о ненападении!";
		}else
		if($user_id['time_noagro'] > time()){
			$rt = "У вас активирован пакт о ненападении. Вы не можете нападать.";
		}else
		if($user['location'] !== $itu['location']){
			$rt = "Ошибка! Вы далеко друг от друга!";
		}else
		if($cmpk_2 == 0){
			$rt = "Ошибка! Покемоны тренера не в состоянии сражаться!";
		}else
		if($cmpk_ == 0){
			$rt = "Ошибка! Ваши покемоны не в состоянии сражаться!";
		}else
		if($cmpk_ > $cmpk_2){
			$rt = "Команда противника меньше Вашей!";
		}else{
			$rt = "<b>Бой начался!</b>";
			if($itm_m > 0){
			minus_item(1,$itm_m);
		    }
			$tdata = date("Y-m-d H:i:s");
			$mysqli->query("INSERT INTO battle (user1 , user2, data,loc,type) VALUES ('".$user_id."','".$toid."', '".$tdata."','".$user['location']."','1') ");
			$mysqli->query("UPDATE users SET status = 'battle' WHERE `id` = '".$user_id."'");
			$mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '".$toid."'");
			echo "<script>parent.frames._location.location.reload();</script>";
		}
		echo "<script>parent.mess('".$rt."');</script>";
	}
	if($_POST['mode'] == "conquer"){
		$conquerclanusr = $mysqli->query("SELECT conquer FROM base_location WHERE id = ".$itu['location'])->fetch_assoc();
         $gd = 0;
         $pop = round(($user['population']/100)*30);
         $l_g = 0;
         $itm_m = 441;
         if($itu['karma'] <= -10 and $baseloc['opasn'] == 0){
         	$l_g = 1;
         }else
         if($user['karma'] <= 10 and $baseloc['opasn'] == 1){
         	$l_g = 1;
         }
         if($user['clan_id'] == $itu['clan_id']){
         	$rt = "Ошибка! Вы из одного клана!";
         }else
         if($user['clan_id'] !== $conquerclanusr['conquer']){
         	$rt = "Ошибка! Вы не из клана контроллируемой территории";
         }
         /*if($user['karma'] <= -10 and $itu['karma'] >= 10){ $gd = 1; $itm_m = 0;  }else
         if($user['karma'] >= 10 and $itu['karma'] <= -10){ $gd = 1; $itm_m = 0;  }else
         if(item_isset(312,1) and $itu['population'] >= 100 and $pop <= $itu['population']) { $gd = 1; $itm_m = 312; }else
         if(item_isset(313,1) and $itu['population'] >= 100) { $gd = 1;  $itm_m = 313; }*/

		/*if(item_isset(441,1) == false){
            $rt = "Ошибка! У вас нет ордера захвата локации!";
		}else*/
		if($itu['groups'] == 1){
            $rt = "Ошибка! У Вас нет прав напасть на тренера!";
		}else
		if($l_g == 3){
          $rt = "Ошибка! Вы не можете напасть на этой локации!";
		}else
		
        if($save['save'] == 1){
        $rt = "Ошибка! Нельзя нападать в покецентре!";
        }else
        if($save['pve'] == 0){
        $rt = "Ошибка! Нельзя захватить мирную локацию!";
        }else
		/*if($gd == 0){
          $rt = "Ошибка! Ранг тренера слишком мал для Вас!";
		}else*/
		if($user_id == $itu['id']){
			$rt = "Ошибка! Нельзя бросать вызов себе!";
		}else
		if($itu['online'] == 0){
			$rt = "Ошибка! Тренер не онлайн!";
		}else
		if($itu['status'] !== "free"){
			$rt = "Ошибка! Тренер занят!";
		}else
		/*if($itu['population'] <= 350){
			$rt = "Тренер ещё новичок. Нельзя нападать на маленьких.";
		}else*/
		if($itu['time_conquerloc'] < time()){
			$rt = "У тренера не активирован Ордер захвата локации";
		}else
		if($user['location'] !== $itu['location']){
			$rt = "Ошибка! Вы далеко друг от друга!";
		}else
		if($user['clan_admin'] != 1){
			$rt = "Ошибка! Вы не лидер своего клана!";
		}else
		if($cmpk_2 == 0){
			$rt = "Ошибка! Покемоны тренера не в состоянии сражаться!";
		}else
		if($cmpk_ == 0){
			$rt = "Ошибка! Ваши покемоны не в состоянии сражаться!";
		}else
		if($cmpk_ > $cmpk_2){
			$rt = "Команда противника меньше Вашей!";
		}else{
			$rt = "<b>Бой начался!</b>";
			/*if($itm_m > 0){
			minus_item(1,$itm_m);
		    }*/
			$tdata = date("Y-m-d H:i:s");
			$mysqli->query("INSERT INTO battle (user1 , user2, data,loc,type) VALUES ('".$user_id."','".$toid."', '".$tdata."','".$user['location']."','2') ");
			$mysqli->query("UPDATE users SET status = 'battle' WHERE `id` = '".$user_id."'");
			$mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '".$toid."'");
			echo "<script>parent.frames._location.location.reload();</script>";
		}
		echo "<script>parent.mess('".$rt."');</script>";
	}
}
	}
	
	return;
}

$move = $mysqli->query('SELECT * FROM loc_to WHERE loc_id = '.$baseloc['id']);
$user_status1 = $mysqli->query('SELECT * FROM user_status WHERE status1 = 2 and user_id = '.$_SESSION['user_id'])->fetch_assoc();
$status1 = isset($status1) ? $status1 : 0;
$date1   = isset($date1) ? $date1 : 0;
$mysqli->query("INSERT INTO user_status (user_id, status1, date1) VALUES ('".$_SESSION['user_id']."','".$status1."','".$date1."') ");
$getnpc = $mysqli->query('SELECT * FROM base_npc WHERE location = '.$baseloc['id']);
$awrd = $mysqli->query("SELECT * FROM `awards` WHERE `user` = '".$user_id."'");
$atkpok = $mysqli->query('SELECT * FROM user_pokemons WHERE start_pok = 1 and user_id = '.$_SESSION['user_id'])->fetch_assoc();
if(!empty($_GET['locid'])){
	if($user['location'] == '2' and $user['arest'] < time()){
		$mysqli->query("UPDATE users SET `groups`='6' WHERE id='".$user_id."'" );
	}
	if($user['fetig'] > time() ){
		echo "<script>parent.mess('Вы слишком устали и не можете передвигаться!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($baseloc['region'] == 10 and $user['time_road'] > time() ){
		echo "<script>parent.mess('Вы еще не можете выйти!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 128 and $user['karma'] > -10 ){
		echo "<script>parent.mess('Вы не можете сюда войти!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 243 and $atkpok['atk1'] != 57 and $atkpok['atk2'] != 57 and $atkpok['atk3'] != 57 and $atkpok['atk4'] != 57){
		$txt = "Стартовый покемон должен знать атаку Surf";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Запретная зона','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");;
}elseif($_GET['locid'] == 303 and $atkpok['atk1'] != 366 and $atkpok['atk2'] != 366 and $atkpok['atk3'] != 366 and $atkpok['atk4'] != 366){
		$txt = "Стартовый покемон должен знать атаку Tailwind";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Вход закрыт','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");

}elseif($_GET['locid'] == 135 and !item_isset(260,1,$user_id)){
		$txt = "Без Абонемента сюда не пройти.";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Вход закрыт','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 998 and $user['groups'] > 1 ){
		echo "<script>parent.mess('Вы не можете сюда войти!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 902  and  $user['id'] != 1   and  $user['id'] != 3 and  $user['id'] != 75 and  $user['id'] != 69 and  $user['id'] != 49 and  $user['id'] != 279 and  $user['id'] != 511){
		echo "<script>parent.mess('Вход только для Гим.Лидеров!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 903  and  $user['id'] != 1 and  $user['id'] != 3 and  $user['id'] != 75 and  $user['id'] != 69 and  $user['id'] != 49 and  $user['id'] != 279 and  $user['id'] != 511){
		echo "<script>parent.mess('Вход только для Гим.Лидеров!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 904  and  $user['id'] != 1 and  $user['id'] != 3 and  $user['id'] != 75 and  $user['id'] != 69 and  $user['id'] != 49 and  $user['id'] != 279 and  $user['id'] != 511){
		echo "<script>parent.mess('Вход только для Гим.Лидеров!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($baseloc['region'] == 11 and $user['time_road'] > time() ){
		echo "<script>parent.mess('Вы еще не можете выйти!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['barena'] == 1){
		echo "<script>parent.mess('Чтобы выйти из арены отмените заявку.');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['rarena'] == 1 or $user['na_rarene'] == 1){
		echo "<script>parent.mess('Чтобы выйти из арены отмените заявку.');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['status'] != 'free' && $user['status'] != 'talking'){
		echo "<script>parent.mess('В данный момент вы не можете перемещаться по локациям!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['time_conquerloc'] > time()){
		echo "<script>parent.mess('В данный момент вы не можете перемещаться по локациям!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['status'] == 'talking'){
		echo "<script>parent.mess('В данный момент вы не можете перемещаться по локациям!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['location'] == '2' and $user['arest'] > time()){
		echo "<script>parent.mess('В данный момент вы в тюрьме! Дождитесь срока окончания!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 2 || $_GET['locid'] == 9 || $_GET['locid'] == 14){
		echo "<script>parent.mess('Нельзя попасть в локацию!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	// }elseif(info_quest(1,'step') >= 6 && $_GET['locid'] == 7){
	// 	echo "<script> parent.mess('На данную локацию можно пройти, лишь при окончании курса в Академии!');</script>";
	// 	die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	// }elseif(info_quest(1,'step') < 6  && $_GET['locid'] == 48){
	// 	echo "<script> parent.mess('На данную локацию можно пройти, лишь при окончании курса в Академии!');</script>";
	// 	die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['population'] < 50  && $_GET['locid'] == 48){
		echo "<script> parent.mess('На данную локацию можно пройти, лишь после достижения ранга \"Неизвестный\"!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");	
	}elseif($user['karma'] < 10  && $_GET['locid'] == 148){
		echo "<script> parent.mess('На данную локацию могут пройти только \"Защитники\"!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['clan_id'] != 1 && $_GET['locid'] == 518){
		echo "<script> parent.mess('Ничего не видно. Туда лучше не ходить.');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['login'] != 'CrazyTomato' && $user['login'] != 'Lumenion' && $_GET['locid'] == 510){
		$txt = "Сейчас сюда нельзя.";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Запретная зона','".$txt."','false') ");
		/*echo "<script> parent.mess('Сюда не каждому можно!');</script>";*/
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['population'] < 25000 && $_GET['locid'] == 396){
		$txt = "Ивент закончился.";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Гора Ланейру','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($user['karma'] > -10  && $_GET['locid'] == 149){
		//echo "<script> parent.mess('На данную локацию могут пройти только \"Преступники\"!');</script>";
		$txt = "На данную локацию могут пройти только \"Преступники\"!";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Запретная зона','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");		
	}elseif(info_quest(48,'step') != 3 && $_GET['locid'] == 15){
		echo "<script>parent.mess('Дверь заперта!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	// }elseif(info_quest(1,'step') < 6  && $_GET['locid'] == 24){
	// 	echo "<script> parent.mess('На данную локацию можно пройти, лишь при окончании курса в Академии!');</script>";
	// 	die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	// }elseif(info_quest(1,'step') < 6  && $_GET['locid'] == 69){
	// 	echo "<script> parent.mess('На данную локацию можно пройти, лишь при окончании курса в Академии!');</script>";
	// 	die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	// }elseif(info_quest(1,'step') < 6 && $_GET['locid'] == 8){
	// 	$txt = "На данную локацию можно пройти, лишь при окончании курса в Академии!";
	// 	$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Запретная зона','".$txt."','false') ");
	// 	die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($timeday !== 1 && $_GET['locid'] == 134){
		echo "<script>parent.mess('Фан-клуб работает с 8 до 22 часов!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	/*}elseif(date("l") != 'Wednesday' && $_GET['locid'] == 521){
		echo "<script>parent.mess('Лагерь работает в Среду!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");*/
	}elseif( !item_isset(166,1,$user_id) and $_GET['locid'] == 110){
		echo "<script>parent.mess('Без велосипеда дальше идти нельзя!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif( !item_isset(236,1,$user_id) and $_GET['locid'] == 2270){
		echo "<script>parent.mess('Без горнолыжного снаряжения дальше не пройти!');</script>";
	}elseif( !item_isset(430,1,$user_id) and $_GET['locid'] == 319){
		$txt = "Для прохода в лабориторию необходимо иметь пропуск.";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Проход невозможен','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif( !item_isset(434,1,$user_id) and $_GET['locid'] == 244){
		$txt = "Для прохода, необходимо: иметь водный мотоцикл.";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Проход невозможен','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif( !item_isset(434,1,$user_id) and $_GET['locid'] == 265){
		$txt = "Для прохода, необходимо: иметь водный мотоцикл.";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Проход невозможен','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");	
	}elseif( !item_isset(1134,1,$user_id) and $_GET['locid'] == 1133){
		$txt = "Для прохода, необходимо: иметь Конверт из Джотто .";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Проход невозможен','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");	
	}elseif( !item_isset(4330,1,$user_id) and $_GET['locid'] == 310){
		$txt = "На данный момент вы не можете пройти.";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Проход невозможен','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif( !item_isset(4330,1,$user_id) and $_GET['locid'] == 311){
		$txt = "Для прохода необходимо: иметь абонемент.";
		$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','Проход невозможен','".$txt."','false') ");
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");	
	}elseif( !item_isset(168,1,$user_id) and $_GET['locid'] == 87){
		echo "<script>parent.mess('Без канатной веревки дальше непройти!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 1003  and !item_isset(162,1)){
		echo "<script>parent.mess('Без билета дальше идти нельзя!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 1002  and !item_isset(162,1) ){
		echo "<script>parent.mess('Без билета дальше идти нельзя!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 1104 and !item_isset(192,1)){
		echo "<script>parent.mess('Без билета дальше идти нельзя!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}elseif($_GET['locid'] == 1105 and !item_isset(192,1)){
		echo "<script>parent.mess('Без билета дальше идти нельзя!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");	
// Западное Джото
	}elseif ($_GET['locid'] == 3200 and time() > $user_status1['date1']){
//		$check = $mysqli->query('SELECT * FROM user_status WHERE user_id = '.$_SESSION['user_id'].' AND status1 = 2')->fetch_assoc();
		echo "<script>parent.mess('Очень жарко!');</script>";
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
	if(($_GET['locid'] == 1003 and item_isset(162,1))) { 
	 minus_item(1,162);
     $tmroad = time()+10800;
	 $mysqli->query("UPDATE `users` SET `time_road` = '$tmroad' WHERE `id` = '".$_SESSION['user_id']."'");
	  }
	  if(($_GET['locid'] == 1002 and item_isset(162,1))) { 
	 minus_item(1,162);
     $tmroad = time()+10800;
	 $mysqli->query("UPDATE `users` SET `time_road` = '$tmroad' WHERE `id` = '".$_SESSION['user_id']."'");
	  }
	  if($_GET['locid'] == 1104 and item_isset(192,1)) { 
	 minus_item(1,192);
     $tmroad = time()+7200;
	 $mysqli->query("UPDATE `users` SET `time_road` = '$tmroad' WHERE `id` = '".$_SESSION['user_id']."'");
	 }
	 if($_GET['locid'] == 1105 and item_isset(192,1)) { 
	 minus_item(1,192);
     $tmroad = time()+7200; 
	 $mysqli->query("UPDATE `users` SET `time_road` = '$tmroad' WHERE `id` = '".$_SESSION['user_id']."'");
	 }
	 if($_GET['locid'] == 135 and item_isset(260,1)) { 
	 minus_item(1,260);
     $tmroad = time()+7200;
     $tmroad2 = (time()+7200);
	 $mysqli->query("UPDATE `users` SET `time_safari` = '$tmroad2' WHERE `id` = '".$_SESSION['user_id']."'");
	 }
	 
	$goloc = (int)$_GET['locid'];
	$locgo = $mysqli->query('SELECT * FROM loc_to WHERE loc_id = '.$baseloc['id'])->fetch_assoc();

	if(($locgo['p1'] == $goloc OR $locgo['p2'] == $goloc OR $locgo['p3'] == $goloc OR $locgo['p4'] == $goloc OR $locgo['p5'] == $goloc OR $locgo['p6'] == $goloc OR $locgo['p7'] == $goloc OR $locgo['p8'] == $goloc OR $locgo['p9'] == $goloc OR $locgo['p10'] == $goloc OR $locgo['p11'] == $goloc OR $locgo['p12'] == $goloc OR $locgo['p13'] == $goloc OR $locgo['p14'] == $goloc) and $goloc > 0){
		$mysqli->query("UPDATE users SET location = ".$goloc." WHERE id = ".$_SESSION['user_id']);
		echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
	}else{
		echo "<script>alert('Ошибка');</script>";
		echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
		return;
	}
}
$conquerclan = $mysqli->query("SELECT conquer FROM base_location WHERE id = ".$user['location'])->fetch_assoc();
$clanimg = $mysqli->query("SELECT * FROM base_clans WHERE id = ".$user['clan_id'])->fetch_assoc();
?>
<style>
    .tech {
    position: absolute;
    right: 0px;
    top: 50px;
    width: 200px;
  }

</style>
   <style>
      #zatemnenie {
        background: rgba(102, 102, 102, 0.5);
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: none;
      }
      #frame {
   width: 440px;
   height: 290px;
   border: 1px solid black;
   position: relative;
}
      #okno {
    width: 450px;
    height: 300px;
    text-align: center;
    padding: 15px;
    border: 3px solid #97bde5;
    border-radius: 10px;
    color: #ffffff;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    background: #b8d5f1;
      }
      #zatemnenie:target {display: block;}
      .close {
display: inline-block;
    border-radius: 5px;
    /* border: 1px solid #474747; */
    color: #464646;
    padding: 0 12px;
    margin: 2px;
    text-decoration: none;
    background: #f2f2f2;
    font-size: 13pt;
    cursor: pointer;
      }
      .close:hover {background: #e6e6ff;}
    </style>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html' charset='windows-1251'>
		<LINK REL='Stylesheet' HREF='style.css' TYPE='text/css'>
		<script>
		function lay(ID, Type) {
			eval("document.all." + ID + ".style.visibility = \"" + Type + "\"");
		}
		</script>
	</head>
<BODY ID='tab'>
<span id='txt'>
<table width='100%'>
	    <div id="zatemnenie">
      <div id="okno">
  
        <iframe id="frame"  src="<?=HOME_URL?>/pokloc.php?s=" ></iframe>
        <a href="#" class="close">Закрыть окно</a>
      </div>
    </div>
     

 
    <div id="mess" style="display: none;"></div>
    <tr>
    <!--<img class='tech' src="img/tech.png" >-->
    <?php
    $img = 'img/locs/'.$baseloc['id'].'.jpg';
    if(file_exists($img)){ ?>
    <td valign='top' style=" width: 700px; ">
       
 <a href="#zatemnenie"> <img class="location_logo" src='/<?=$img;?>'></a>
        
    </td>
    <?php } ?>
    <td valign='top'>
        <div align='center' style='font-size:1em;'>
             <a href="#zatemnenie"><img src="img/chat/pokloc.gif" width="21" height="18"></a><b><?=$region;?></b>
            <?php if($baseloc['conquer'] == $conquerclan['conquer']){echo "<img src='/img/clans/".$conquerclan['conquer'].".gif' width=20 height=22 border='0'>";} ?>                <span style='font-size:20px;font-weight:bold;color:#0a57a7'><?=$location;?></span><br>
            (<?php if($baseloc['opasn'] == 1){ echo "не безопасно"; }else{ echo "безопасно"; } ?>)
        </div>
        &nbsp;<br><?=$description;?>
    <p id='txt'>
        <b>Персонажи: </b>
    <?php
    if($baseloc['type'] == 1){
        echo '<a href=game.php?fun=m_npc&npc_id=8&map=1>Сестра Джой</a> ';
    }
    else {
        while($npc = $getnpc->fetch_assoc()) {
            if($npc['id'] == 12 || $npc['id'] == 13 || $npc['id'] == 24 || $npc['id'] == 29 || $npc['id'] == 33 || $npc['id'] == 324 || $npc['id'] == 325 || $npc['id'] == 326 || $npc['id'] == 327 || $npc['id'] == 328 || $npc['id'] == 329 || $npc['id'] == 330 || $npc['id'] == 331 || $npc['id'] == 332 || $npc['id'] == 333 || $npc['id'] == 334 || $npc['id'] == 335 || $npc['id'] == 336 || $npc['id'] == 337 || $npc['id'] == 338 || $npc['id'] == 339 || $npc['id'] == 365 || $npc['id'] == 167){
                $npc_id = 8;
            } else { $npc_id = $npc['id']; }
            if($npc['quest_step'] > 0) {
                if(info_quest($npc['quest_id'],'step') == $npc['quest_step']) {
                    echo '<a href=game.php?fun=m_npc&npc_id='.$npc_id.'&map=1>'.$npc['name'].'</a> ';
                }
            } elseif(!$npc['id']) {
                echo 'нет';
            } else {
                echo '<a href=game.php?fun=m_npc&npc_id='.$npc_id.'&map=1>'.$npc['name'].'</a> ';
            }
        }
    }
    ?>
    <p id='txt'><b>Переходы: </b>
    <?php while($moves = $move->fetch_assoc()) {
        if(!empty($moves['p1'])) {
            $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p1'])->fetch_assoc();
            $b = '<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>';
        } else { $b = false;} print $b;
        if(!empty($moves['p2'])) {
            $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p2'])->fetch_assoc();
            $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>';
        } else { $b = false;} print $b;
        if(!empty($moves['p3'])) {
            $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p3'])->fetch_assoc();
            $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>';
        } else { $b = false;} print $b;
        if(!empty($moves['p4'])) {
            $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p4'])->fetch_assoc();
            $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>';
        } else { $b = false;} print $b;
        if(!empty($moves['p5'])) {
            $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p5'])->fetch_assoc();
            $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>';
        } else { $b = false;} print $b;
		if(!empty($moves['p6'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p6'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
		if(!empty($moves['p7'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p7'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
		if(!empty($moves['p8'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p8'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
		if(!empty($moves['p9'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p9'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
		if(!empty($moves['p10'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p10'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
		if(!empty($moves['p11'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p11'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
		if(!empty($moves['p12'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p12'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
		if(!empty($moves['p13'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p13'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
		if(!empty($moves['p14'])) { $a = $mysqli->query('SELECT id,name FROM base_location WHERE id = '.$moves['p14'])->fetch_assoc(); $b = ' | '.'<a href="game.php?fun=m_location&map=1&locid='.$a['id'].'" target="_work">'.$a['name'].'</a>'; }else{ $b = false;} print $b;
	 } ?>
    <P ID='txt'>
  
      </td>
    </tr>
  </table>

  </BODY>
</HTML>
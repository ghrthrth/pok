<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Райли';

function newPokemon_dr($pok,$user_new) {
   global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
   $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_new."' and `active`='1'");
   $incpk_ = $incpk->num_rows; 
   if($incpk_ == 6){
    $activ = 0;
   }else{
    $activ = 1;
   }
  $shin = "brilliant";
  if($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0){
    $gn = "no";
  }else{
  if(round($pok_base['sex_m']) >= rand(1,100)){ $gn = "male"; }else{ $gn = "female"; }
  }
  $hr = mt_rand(1,26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '".$hr."' ")->fetch_assoc();
      $hg = rand(35,35);
      $ag = rand(35,35);
      $dg = rand(35,35);
      $sg = rand(35,35);
      $sag = rand(35,35);
      $sdg = rand(35,35);
    $s1 = round((($pok_base['hp'] * 2) + $hg) * (1/100) + 10 + 1);
    $s2 = round((($pok_base['atk'] * 2 + $ag) * 1/100 + 5) * $har['atk']);
    $s3 = round((($pok_base['def'] * 2 + $dg) * 1/100 + 5) * $har['def']);
    $s4 = round((($pok_base['spd'] * 2 + $sg) * 1/100 + 5) * $har['speed']);
    $s5 = round((($pok_base['satk'] * 2 + $sag) * 1/100 + 5) * $har['satk']);
    $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1/100 + 5) * $har['sdef']);

    $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = '.$pok)->fetch_assoc();
  if($exp_g['exp_group'] == 1 OR $exp_g['exp_group'] == 2){ // Быстрый
    $nexp_m = 4*pow($myLvl,3)/5;
  }
  if($exp_g['exp_group'] == 3 OR $exp_g['exp_group'] == 4){ // Средний
    $nexp_m = pow($myLvl,3);
  } 
  if($exp_g['exp_group'] == 5){ // Средний медленный
    $nexp_m = 1.2*pow($myLvl,3)-15*pow($myLvl,2)+100*$myLvl-140;
  }
  if($exp_g['exp_group'] == 6 OR $exp_g['exp_group'] == 0){ // Медленный
    $nexp_m = 5*pow($myLvl,3)/4;
  }

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['id']."','".$pok_base['name']."  ','".$hr."','1','".time()."','".$activ."','brilliant','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','".$user_new."','".$user_new."','0','".rand(1,3)."','0','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}

function newPokemon_dr_random($pok,$user_new) {
   global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
   $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_new."' and `active`='1'");
   $incpk_ = $incpk->num_rows; 
   if($incpk_ == 6){
    $activ = 0;
   }else{
    $activ = 1;
   }
  $shin = "brilliant";
  if($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0){
    $gn = "no";
  }else{
  if(round($pok_base['sex_m']) >= rand(1,100)){ $gn = "male"; }else{ $gn = "female"; }
  }
  $hr = mt_rand(1,26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '".$hr."' ")->fetch_assoc();
      $hg = rand(32,35);
      $ag = rand(32,35);
      $dg = rand(32,35);
      $sg = rand(32,35);
      $sag = rand(32,35);
      $sdg = rand(32,35);
    $s1 = round((($pok_base['hp'] * 2) + $hg) * (1/100) + 10 + 1);
    $s2 = round((($pok_base['atk'] * 2 + $ag) * 1/100 + 5) * $har['atk']);
    $s3 = round((($pok_base['def'] * 2 + $dg) * 1/100 + 5) * $har['def']);
    $s4 = round((($pok_base['spd'] * 2 + $sg) * 1/100 + 5) * $har['speed']);
    $s5 = round((($pok_base['satk'] * 2 + $sag) * 1/100 + 5) * $har['satk']);
    $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1/100 + 5) * $har['sdef']);

    $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = '.$pok)->fetch_assoc();
  if($exp_g['exp_group'] == 1 OR $exp_g['exp_group'] == 2){ // Быстрый
    $nexp_m = 4*pow($myLvl,3)/5;
  }
  if($exp_g['exp_group'] == 3 OR $exp_g['exp_group'] == 4){ // Средний
    $nexp_m = pow($myLvl,3);
  } 
  if($exp_g['exp_group'] == 5){ // Средний медленный
    $nexp_m = 1.2*pow($myLvl,3)-15*pow($myLvl,2)+100*$myLvl-140;
  }
  if($exp_g['exp_group'] == 6 OR $exp_g['exp_group'] == 0){ // Медленный
    $nexp_m = 5*pow($myLvl,3)/4;
  }

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,trade,Weight) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['id']."','".$pok_base['name']."  ','".$hr."','1','".time()."','".$activ."','brilliant','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','".$user_new."','".$user_new."','0','".rand(1,3)."','0','1','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}

$randompok = rand(1,123);
        if($randompok == 1){ $pokrand = 1;    }
        if($randompok == 2){ $pokrand = 4;    }
        if($randompok == 3){ $pokrand = 7;    }
        if($randompok == 4){ $pokrand = 79;   }
        if($randompok == 5){ $pokrand = 102;  }
        if($randompok == 6){ $pokrand = 106;  }
        if($randompok == 7){ $pokrand = 123;  }
        if($randompok == 8){ $pokrand = 132;  }
        if($randompok == 9){ $pokrand = 142;  }
        if($randompok == 10){ $pokrand = 144; }
        if($randompok == 11){ $pokrand = 145; }
        if($randompok == 12){ $pokrand = 190; }
        if($randompok == 13){ $pokrand = 200; }
        if($randompok == 14){ $pokrand = 200; }
        if($randompok == 15){ $pokrand = 207; }
        if($randompok == 16){ $pokrand = 214; }
        if($randompok == 17){ $pokrand = 215; }
        if($randompok == 18){ $pokrand = 216; }
        if($randompok == 19){ $pokrand = 227; }
        if($randompok == 20){ $pokrand = 228; }
        if($randompok == 21){ $pokrand = 241; }
        if($randompok == 22){ $pokrand = 243; }
        if($randompok == 23){ $pokrand = 244; }
        if($randompok == 24){ $pokrand = 280; }
        if($randompok == 25){ $pokrand = 290; }
        if($randompok == 26){ $pokrand = 294; }
        if($randompok == 27){ $pokrand = 299; }
        if($randompok == 28){ $pokrand = 318; }
        if($randompok == 29){ $pokrand = 322; }
        if($randompok == 30){ $pokrand = 324; }
        if($randompok == 31){ $pokrand = 327; }
        if($randompok == 32){ $pokrand = 328; }
        if($randompok == 33){ $pokrand = 336; }
        if($randompok == 34){ $pokrand = 338; }
        if($randompok == 35){ $pokrand = 341; }
        if($randompok == 36){ $pokrand = 347; }
        if($randompok == 37){ $pokrand = 353; }
        if($randompok == 38){ $pokrand = 355; }
        if($randompok == 39){ $pokrand = 366; }
        if($randompok == 40){ $pokrand = 378; }
        if($randompok == 41){ $pokrand = 377; }
        if($randompok == 42){ $pokrand = 408; }
        if($randompok == 43){ $pokrand = 410; }
        if($randompok == 44){ $pokrand = 415; }
        if($randompok == 45){ $pokrand = 418; }
        if($randompok == 46){ $pokrand = 425; }
        if($randompok == 47){ $pokrand = 431; }
        if($randompok == 48){ $pokrand = 434; }
        if($randompok == 49){ $pokrand = 436; }
        if($randompok == 50){ $pokrand = 439; }
        if($randompok == 51){ $pokrand = 440; }
        if($randompok == 52){ $pokrand = 441; }
        if($randompok == 53){ $pokrand = 442; }
        if($randompok == 54){ $pokrand = 446; }
        if($randompok == 55){ $pokrand = 447; }
        if($randompok == 56){ $pokrand = 449; }
        if($randompok == 57){ $pokrand = 451; }
        if($randompok == 58){ $pokrand = 453; }
        if($randompok == 59){ $pokrand = 456; }
        if($randompok == 60){ $pokrand = 479; }
        if($randompok == 61){ $pokrand = 480; }
        if($randompok == 62){ $pokrand = 481; }
        if($randompok == 63){ $pokrand = 482; }
        if($randompok == 64){ $pokrand = 489; }
        if($randompok == 65){ $pokrand = 506; }
        if($randompok == 66){ $pokrand = 509; }
        if($randompok == 67){ $pokrand = 511; }
        if($randompok == 68){ $pokrand = 513; }
        if($randompok == 69){ $pokrand = 515; }
        if($randompok == 70){ $pokrand = 517; }
        if($randompok == 71){ $pokrand = 524; }
        if($randompok == 72){ $pokrand = 529; }
        if($randompok == 73){ $pokrand = 532; }
        if($randompok == 74){ $pokrand = 538; }
        if($randompok == 75){ $pokrand = 539; }
        if($randompok == 76){ $pokrand = 543; }
        if($randompok == 77){ $pokrand = 551; }
        if($randompok == 78){ $pokrand = 554; }
        if($randompok == 79){ $pokrand = 557; }
        if($randompok == 80){ $pokrand = 562; }
        if($randompok == 81){ $pokrand = 566; }
        if($randompok == 82){ $pokrand = 570; }
        if($randompok == 83){ $pokrand = 592; }
        if($randompok == 84){ $pokrand = 595; }
        if($randompok == 85){ $pokrand = 610; }
        if($randompok == 86){ $pokrand = 621; }
        if($randompok == 87){ $pokrand = 624; }
        if($randompok == 88){ $pokrand = 622; }
        if($randompok == 89){ $pokrand = 632; }
        if($randompok == 90){ $pokrand = 633; }
        if($randompok == 91){ $pokrand = 636; }
        if($randompok == 92){ $pokrand = 638; }
        if($randompok == 93){ $pokrand = 639; }
        if($randompok == 94){ $pokrand = 640; }
        if($randompok == 95){ $pokrand = 641; }
        if($randompok == 96){ $pokrand = 647; }
        if($randompok == 97){ $pokrand = 659; }
        if($randompok == 98){ $pokrand = 661; }
        if($randompok == 99){ $pokrand = 664; }
        if($randompok == 100){ $pokrand = 667; }
        if($randompok == 101){ $pokrand = 669; }
        if($randompok == 102){ $pokrand = 672; }
        if($randompok == 103){ $pokrand = 677; }
        if($randompok == 104){ $pokrand = 688; }
        if($randompok == 105){ $pokrand = 694; }
        if($randompok == 106){ $pokrand = 704; }
        if($randompok == 107){ $pokrand = 701; }
        if($randompok == 108){ $pokrand = 707; }
        if($randompok == 109){ $pokrand = 708; }
        if($randompok == 110){ $pokrand = 714; }
        if($randompok == 111){ $pokrand = 712; }
        if($randompok == 112){ $pokrand = 710; }
        if($randompok == 113){ $pokrand = 725; }
        if($randompok == 114){ $pokrand = 728; }
        if($randompok == 115){ $pokrand = 722; }
        if($randompok == 116){ $pokrand = 747; }
        if($randompok == 117){ $pokrand = 755; }
        if($randompok == 118){ $pokrand = 769; }
        if($randompok == 119){ $pokrand = 778; }
        if($randompok == 120){ $pokrand = 802; }
        if($randompok == 121){ $pokrand = 491; }
        if($randompok == 122){ $pokrand = 492; }
        if($randompok == 123){ $pokrand = 488; }

if($npc == 177 && empty($answer)){
		$textNPC = 'Приветствую! Готов взять Приз за наборы свечек? Учти, что я так же заберу все остальные что у тебя остались. Если же ты не сдал ни один полный комплект, то не переживай. Для вас приготовили список из 123 покемонов, и у тебя будет шанс получить одного из них! Ну, что, получаем?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я как раз для этого к вам и пришёл!</a></li>';
	}elseif($npc == 177 && $answer == 1 && !info_quest(177,'step') == 2){
		$all_count1 = 0;
		$all_count2 = 0;
		$all_count3 = 0;
		$all_count4 = 0;
		$all_count5 = 0;
		$all_count6 = 0;
		$all_count7 = 0;
		$all_count8 = 0;
		$letter1 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = 1080")->fetch_assoc();
		$letter2 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = 1081")->fetch_assoc();
		$letter3 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = 1082")->fetch_assoc();
		$letter4 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = 1083")->fetch_assoc();
		$letter5 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = 1084")->fetch_assoc();
		$letter6 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = 1085")->fetch_assoc();
		$letter7 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = 1086")->fetch_assoc();
		$letter8 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = 1087")->fetch_assoc();
		$checkline = $mysqli->query("SELECT * FROM `dr_game` WHERE `user` = ".$user_id)->fetch_assoc();
		$pok_base_random = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pokrand."' ")->fetch_assoc();
		if($letter1 OR $letter2 OR $letter3 OR $letter4 OR $letter5 OR $letter6 OR $letter7 OR $letter8){
			$all_count1 = $all_count1 + $letter1['count'];
			$all_count2 = $all_count2 + $letter2['count'];
			$all_count3 = $all_count3 + $letter3['count'];
			$all_count4 = $all_count4 + $letter4['count'];
			$all_count5 = $all_count5 + $letter5['count'];
			$all_count6 = $all_count6 + $letter6['count'];
			$all_count7 = $all_count7 + $letter7['count'];
			$all_count8 = $all_count8 + $letter8['count'];
		}
		if($checkline['count_set'] == 1){
			$random = rand(1,3);
			if($random == 1){ $pok_dr = 133; }
			if($random == 2){ $pok_dr = 175; }
			if($random == 3){ $pok_dr = 207; }
			$pok_base_dr = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok_dr."' ")->fetch_assoc();
			$textNPC = ' Твой приз это - '.$pok_base_dr['name'].'! А еще совершенно случайный покемон из огромного списка - '.$pok_base_random['name'].' ';
            newPokemon_dr($pok_dr,$_SESSION['user_id']);
            newPokemon_dr_random($pokrand,$_SESSION['user_id']);
            if($letter1){ minus_item($letter1['count'],1080); }
            if($letter2){ minus_item($letter2['count'],1081); }
            if($letter3){ minus_item($letter3['count'],1082); }
            if($letter4){ minus_item($letter4['count'],1083); }
            if($letter5){ minus_item($letter5['count'],1084); }
            if($letter6){ minus_item($letter6['count'],1085); }
            if($letter7){ minus_item($letter7['count'],1086); }
            if($letter8){ minus_item($letter8['count'],1087); }
            quest_update(177,2);
		}elseif($checkline['count_set'] == 2){
            $random = rand(1,3);
			if($random == 1){ $pok_dr = 551; }
			if($random == 2){ $pok_dr = 446; }
			if($random == 3){ $pok_dr = 447; }
			$pok_base_dr = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok_dr."' ")->fetch_assoc();
			$textNPC = ' Твой приз это - '.$pok_base_dr['name'].'! А еще совершенно случайный покемон из огромного списка - '.$pok_base_random['name'].' ';
            newPokemon_dr($pok_dr,$_SESSION['user_id']);
            newPokemon_dr_random($pokrand,$_SESSION['user_id']);
            if($letter1){ minus_item($letter1['count'],1080); }
            if($letter2){ minus_item($letter2['count'],1081); }
            if($letter3){ minus_item($letter3['count'],1082); }
            if($letter4){ minus_item($letter4['count'],1083); }
            if($letter5){ minus_item($letter5['count'],1084); }
            if($letter6){ minus_item($letter6['count'],1085); }
            if($letter7){ minus_item($letter7['count'],1086); }
            if($letter8){ minus_item($letter8['count'],1087); }
            quest_update(177,2);
        }elseif($checkline['count_set'] == 3){  
            $random = rand(1,3);
			if($random == 1){ $pok_dr = 243; }
			if($random == 2){ $pok_dr = 244; }
			if($random == 3){ $pok_dr = 245; }
			$pok_base_dr = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok_dr."' ")->fetch_assoc();
			$textNPC = ' Твой приз это - '.$pok_base_dr['name'].'! А еще совершенно случайный покемон из огромного списка - '.$pok_base_random['name'].' ';
            newPokemon_dr($pok_dr,$_SESSION['user_id']);
            newPokemon_dr_random($pokrand,$_SESSION['user_id']);
            if($letter1){ minus_item($letter1['count'],1080); }
            if($letter2){ minus_item($letter2['count'],1081); }
            if($letter3){ minus_item($letter3['count'],1082); }
            if($letter4){ minus_item($letter4['count'],1083); }
            if($letter5){ minus_item($letter5['count'],1084); }
            if($letter6){ minus_item($letter6['count'],1085); }
            if($letter7){ minus_item($letter7['count'],1086); }
            if($letter8){ minus_item($letter8['count'],1087); }
            quest_update(177,2);
        }elseif($checkline['count_set'] >= 4){  
        	$random = rand(1,3);
			if($random == 1){ $pok_dr = 638; }
			if($random == 2){ $pok_dr = 639; }
			if($random == 3){ $pok_dr = 640; }
			$pok_base_dr = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok_dr."' ")->fetch_assoc();
			$textNPC = ' Твой приз это - '.$pok_base_dr['name'].'! А еще совершенно случайный покемон из огромного списка - '.$pok_base_random['name'].' ';
            newPokemon_dr($pok_dr,$_SESSION['user_id']);
            newPokemon_dr_random($pokrand,$_SESSION['user_id']);
            if($letter1){ minus_item($letter1['count'],1080); }
            if($letter2){ minus_item($letter2['count'],1081); }
            if($letter3){ minus_item($letter3['count'],1082); }
            if($letter4){ minus_item($letter4['count'],1083); }
            if($letter5){ minus_item($letter5['count'],1084); }
            if($letter6){ minus_item($letter6['count'],1085); }
            if($letter7){ minus_item($letter7['count'],1086); }
            if($letter8){ minus_item($letter8['count'],1087); }
            quest_update(177,2);
        }elseif($checkline == false){
            $textNPC = 'Ты не принес ни одного полного набор. Ну, чтож, я забираю все буквы и даю тебе покемона из огромного списка - '.$pok_base_random['name'].' !';
            newPokemon_dr_random($pokrand,$_SESSION['user_id']);
            if($letter1){ minus_item($letter1['count'],1080); }
            if($letter2){ minus_item($letter2['count'],1081); }
            if($letter3){ minus_item($letter3['count'],1082); }
            if($letter4){ minus_item($letter4['count'],1083); }
            if($letter5){ minus_item($letter5['count'],1084); }
            if($letter6){ minus_item($letter6['count'],1085); }
            if($letter7){ minus_item($letter7['count'],1086); }
            if($letter8){ minus_item($letter8['count'],1087); }
            quest_update(177,2);

		}else{
				$textNPC = 'У тебя нет с собой букв!';
			}	
			
	}elseif(!item_isset(1080, 1) OR !item_isset(1081, 1) OR !item_isset(1082, 1) OR !item_isset(1083, 1) OR !item_isset(1084, 1) OR !item_isset(1085, 1) OR !item_isset(1086, 1) OR !item_isset(1087, 1)){
     $textNPC = 'У тебя нет с собой букв!';
		
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 
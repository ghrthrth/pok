<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Кондитер';

function newPokemonevent($pok,$user_new) {
   global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
   $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_new."' and `active`='1'");
   $incpk_ = $incpk->num_rows; 
   if($incpk_ == 6){
    $activ = 0;
   }else{
    $activ = 1;
   }
  $shin = "normal";
  if($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0){
    $gn = "no";
  }else{
  if(round($pok_base['sex_m']) >= rand(1,100)){ $gn = "male"; }else{ $gn = "female"; }
  }
  $hr = mt_rand(1,26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '".$hr."' ")->fetch_assoc();
      $hg = rand(29,31);
      $ag = rand(29,31);
      $dg = rand(29,31);
      $sg = rand(29,31);
      $sag = rand(29,31);
      $sdg = rand(29,31);
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

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['id']."','".$pok_base['name']."  ','".$hr."','1','".time()."','".$activ."','normal','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','".$user_new."','".$user_new."','0','".rand(1,3)."','0','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}
$swtichnpc = 2;
$img1 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort1.png' width='470' height='400'>";
$img2 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort2.png' width='470' height='400'>";
$img3 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort3.png' width='470' height='400'>";
$img4 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort4.png' width='470' height='400'>";
$img5 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort5.png' width='470' height='400'>";
$img6 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort6.png' width='470' height='400'>";
$img7 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort7.png' width='470' height='400'>";
$img8 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort8.png' width='470' height='400'>";
$img9 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort9.png' width='470' height='400'>";
$img10 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort10.png' width='470' height='400'>";
$img11 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort11.png' width='470' height='400'>";
$img12 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort12.png' width='470' height='400'>";
$img13 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort13.png' width='470' height='400'>";
$img14 = "<img src='https://oldpokemon.ru/img/dreventcake/Tort14.png' width='470' height='400'>";

if($swtichnpc == 1){
if($npc == 160 && empty($answer)){
    $textNPC = 'Здравствуйте-с, я Чиф Кондитьер. Вы приносить мне осколки торта, и я готовить биг и тести кейк!';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Держите!</a></li>';
    $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Сколько я уже принёс?</a></li>';
    $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Можете показать тортик?</a></li>';
  }elseif($npc == 160 && $answer == 1){
    $all_count = 0;
    $check_cake_item = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '1054'")->fetch_assoc();
    $count_cake_item = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '1054'")->fetch_assoc();
    if($check_cake_item){
      $textNPC = 'Спасибо, неси ещё!';
      $all_count = $all_count + $check_cake_item['count'];
      $mysqli->query("UPDATE users SET cakes = cakes+'".$check_cake_item['count']."' WHERE `id` = '".$user_id."'");
      $mysqli->query("UPDATE base_location SET cakes = cakes+'".$check_cake_item['count']."' WHERE `id` = '395'");
      minus_item($count_cake_item['count'],1054);
    }else{
      if($check_cake_item['count'] == 0) 
        $textNPC = 'У тебя нет осколоков торта! Приходи когда будут!';
      }
    }elseif($npc == 160 && $answer == 2){
        $textNPC = 'Ты принёс уже '.$user['cakes'].' кусочков!';
    }elseif($npc == 160 && $answer == 3){
      $check_all_cakes = $mysqli->query("SELECT * FROM `base_location` WHERE `id` = 395")->fetch_assoc();
      if($check_all_cakes['cakes'] >= 1){ $textNPC = $img1; }
      if($check_all_cakes['cakes'] >= 100){ $textNPC = $img2; }
      if($check_all_cakes['cakes'] >= 150){ $textNPC = $img3; }
      if($check_all_cakes['cakes'] >= 200){ $textNPC = $img4; }
      if($check_all_cakes['cakes'] >= 250){ $textNPC = $img5; }
      if($check_all_cakes['cakes'] >= 300){ $textNPC = $img6; }
      if($check_all_cakes['cakes'] >= 350){ $textNPC = $img7; }
      if($check_all_cakes['cakes'] >= 400){ $textNPC = $img8; }
      if($check_all_cakes['cakes'] >= 450){ $textNPC = $img9; }
      if($check_all_cakes['cakes'] >= 500){ $textNPC = $img10; }
      if($check_all_cakes['cakes'] >= 550){ $textNPC = $img11; }
      if($check_all_cakes['cakes'] >= 600){ $textNPC = $img12; }
      if($check_all_cakes['cakes'] >= 650){ $textNPC = $img13; }
      if($check_all_cakes['cakes'] >= 700){ $textNPC = $img14; }
  }elseif(!item_isset(1054, 1)){ //Итем , кол-в
     $textNPC = 'У тебя нет осколоков торта! Приходи когда будут!';
}else{
   die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
}else{
   if($npc == 160 && empty($answer) && !info_quest(160,'step') == 2){
    $textNPC = 'Здравствуйте-с. Тортик уже готов, заказщик очень доволен вами, тренеры! Держите награду, вы заслужили!';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Давайте награду!</a></li>';
    $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Напомните, сколько я принёс за всё время?</a></li>';
    $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Можете показать тортик?</a></li>';
  }elseif($npc == 160 && $answer == 1 && !info_quest(160,'step') == 2){
    $result25 = 25;
    $result24 = 24;
    $result3 = 3;
    if($user['cakes'] >= $result25){
      $randomawards = rand(1,5);
      if($randomawards == 1){
      $textNPC = 'Твоя награда - #239 Elekid + Электрайзер + ТМ - 19 + Кредит х1500000 + Набор тренировки х10 + Случайная карта х5 + Ванильная конфета х10 + Секретный ключ х1. ';
      newPokemonevent(239,$_SESSION['user_id']);
      plus_item(1,304);
      plus_item(1,1025);
      plus_item(1500000,1);
      plus_item(10,330);
      plus_item(5,1053);
      plus_item(10,309);
      plus_item(1,384);
      quest_update(160,2);
    }
    if($randomawards == 2){
      $textNPC = 'Твоя награда - #240 Magby + Магмарайзер + ТМ - 31 + Кредит х1500000 + Набор тренировки х10 + Случайная карта х5 + Ванильная конфета х10 + Секретный ключ х1. ';
      newPokemonevent(240,$_SESSION['user_id']);
      plus_item(1,305);
      plus_item(1,1015);
      plus_item(1500000,1);
      plus_item(10,330);
      plus_item(5,1053);
      plus_item(10,309);
      plus_item(1,384);
      quest_update(160,2);
    }
    if($randomawards == 3){
      $textNPC = 'Твоя награда - #108 Lickitung + Эвольвер знаний + ТМ - 14 + Кредит х1500000 + Набор тренировки х10 + Случайная карта х5 + Ванильная конфета х10 + Секретный ключ х1. ';
      newPokemonevent(108,$_SESSION['user_id']);
      plus_item(1,295);
      plus_item(1,1005);
      plus_item(1500000,1);
      plus_item(10,330);
      plus_item(5,1053);
      plus_item(10,309);
      plus_item(1,384);
      quest_update(160,2);
    }
    if($randomawards == 4){
      $textNPC = 'Твоя награда - #175 Togepi + Сияющий камень + ТМ - 23 + Кредит х1500000 + Набор тренировки х10 + Случайная карта х5 + Ванильная конфета х10 + Секретный ключ х1.';
      newPokemonevent(175,$_SESSION['user_id']);
      plus_item(1,246);
      plus_item(1,1008);
      plus_item(1500000,1);
      plus_item(10,330);
      plus_item(5,1053);
      plus_item(10,309);
      plus_item(1,384);
      quest_update(160,2);
    }
    if($randomawards == 5){
      $textNPC = 'Твоя награда - #679 Honedge + Камень сумрака + ТМ - 25 + Кредит х1500000 + Набор тренировки х10 + Случайная карта х5 + Ванильная конфета х10 + Секретный ключ х1. ';
      newPokemonevent(679,$_SESSION['user_id']);
      plus_item(1,247);
      plus_item(1,1004);
      plus_item(1500000,1);
      plus_item(10,330);
      plus_item(5,1053);
      plus_item(10,309);
      plus_item(1,384);
      quest_update(160,2);
    }
    }elseif($user['cakes'] <= $result24 and $user['cakes'] >= $result3){
      $textNPC = 'Эх, ты мало нам помог со сбором торта. Ну ладно, держите утешительную награду: Кредиты х150000 и Набор тренировки х3.';
      plus_item(150000,1);
      plus_item(3,330);
      quest_update(160,2);
    }else{
      if($user['cakes'] < $result3) 
        $textNPC = 'Ты не участовал в сборе Торта совсем! Я ничего не могу тебе предложить...';
      quest_update(160,2);
      }
    }elseif($npc == 160 && $answer == 2){
        $textNPC = 'Ты принёс уже '.$user['cakes'].' кусочков!';
    }elseif($npc == 160 && $answer == 3){
      $check_all_cakes = $mysqli->query("SELECT * FROM `base_location` WHERE `id` = 395")->fetch_assoc();
      if($check_all_cakes['cakes'] >= 1){ $textNPC = $img1; }
      if($check_all_cakes['cakes'] >= 100){ $textNPC = $img2; }
      if($check_all_cakes['cakes'] >= 150){ $textNPC = $img3; }
      if($check_all_cakes['cakes'] >= 200){ $textNPC = $img4; }
      if($check_all_cakes['cakes'] >= 250){ $textNPC = $img5; }
      if($check_all_cakes['cakes'] >= 300){ $textNPC = $img6; }
      if($check_all_cakes['cakes'] >= 350){ $textNPC = $img7; }
      if($check_all_cakes['cakes'] >= 400){ $textNPC = $img8; }
      if($check_all_cakes['cakes'] >= 450){ $textNPC = $img9; }
      if($check_all_cakes['cakes'] >= 500){ $textNPC = $img10; }
      if($check_all_cakes['cakes'] >= 550){ $textNPC = $img11; }
      if($check_all_cakes['cakes'] >= 600){ $textNPC = $img12; }
      if($check_all_cakes['cakes'] >= 650){ $textNPC = $img13; }
      if($check_all_cakes['cakes'] >= 700){ $textNPC = $img14; }
  }elseif(!item_isset(1054, 1)){ //Итем , кол-в
     $textNPC = 'У тебя нет осколоков торта! Приходи когда будут!';
    
  
}else{
   die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
}
?> 
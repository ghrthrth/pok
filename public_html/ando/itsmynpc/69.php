<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = "Роботник питомника";
if($npc == 69 && $check['date'] <= time()){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = '*Вы заметили, как работник питомника находится возле вольера с Одишами, которые мирно играют друг с другом, возле ее ноги сидел Гроули и осматривался по сторонам. Вы решили подойти и узнать как можно больше об этом питомнике.*';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1">Привет, ходят слухи, что вы принимаете недавно вылупившихся покемонов?</a></li>';
}else
if($answer == 1){
$textNPC = 'Здравствуйте, все верно, это питомник о.Селена, место где покемоны живут в мирной и спокойной среде обитания. К сожалению покемонов пока не очень много и мы были бы рады если бы ты нам помог.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Хорошо, я готов вам помочь скажите какие покемоны нужны вашему питомнику, я постараюсь принести их как можно быстрее. </a></li>';	
}else
if($answer == 2){ 
$textNPC = 'Я очень рада, что ты мне решил помочь, если я повстречаю много таких же хороших тренеров как ты то, очень скоро питомник станет местом жительства малышей-покемонов. Сейчас мне нужны 5 покемонов 1 уровня Zubat, Poliwag, Cubone, Pinsir, Sneasel .';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Хорошо! Я постараюсь принести вам их как можно скорее.</a></li>';  
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3">Я принес нужных тебе покемонов.</a></li>';	
}else
if($answer == 3){ 
$m1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '41' and `lvl` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m2 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '60' and `lvl` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m3 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '104' and `lvl` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m4 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '127' and `lvl` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m5 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '215' and `lvl` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();

if($m1['id'] > 0 and $m2['id'] > 0 and $m3['id'] > 0 and $m4['id'] > 0 and $m5['id'] > 0){
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m1['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m1['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m1['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m2['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m2['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m2['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m3['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m3['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m3['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m4['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m4['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m4['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m5['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m5['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m5['id']."'");

$r1 = rand(1,2); $c1 = rand(5,8);
$r2 = rand(3,4); $c2 = rand(5,8);
$r3 = rand(5,6); $c3 = rand(5,8);
if($r1 == 1){ $it1 = 10; $in1 = "Йод x".$c1; }
if($r1 == 2){ $it1 = 11; $in1 = "Цинк x".$c1; }
if($r2 == 3){ $it2 = 23; $in2 = "Кальций x".$c2; }
if($r2 == 4){ $it2 = 24; $in2 = "Углеводы x".$c2; }
if($r3 == 5){ $it3 = 39; $in3 = "Железо x".$c3; }
if($r3 == 6){ $it3 = 59; $in3 = "Протеин x".$c3; }
plus_item($c1,$it1,$user_id);
plus_item($c2,$it2,$user_id);
plus_item($c3,$it3,$user_id);
$textNPC = "Спасибо тебе! За твою помощь дам тебе: $in1, $in2, $in3. Надеюсь на твою помощь снова!";
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Конечно!</a></li>'; 
$date_end = time() + 3600;//Ставим отметку в 12 часа
$mysqli->query("INSERT INTO user_status (user_id, status, date) VALUES ('".$_SESSION['user_id']."', '66', '".$date_end."') ");
}else{
$textNPC = 'Ты не принес всех покемонов, что я просила.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извини.</a></li>';  
}
}
?>
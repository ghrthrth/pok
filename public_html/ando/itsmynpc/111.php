<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = "Ведьма";
if($npc == 111){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = 'Кыш-кыш! Кыш отсюда!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1">Не выгоняйте меня! Я хочу поговорить!</a></li>';
}else
if($answer == 1){
$textNPC = 'Уууу! Кыш... Стой, дай ладошку. Не переживай, мне твои гроши не сдались, тут магазинов нет. Твое храброе сердце подсказывает что ты именно тот кто сможет помочь мне принести нужные ингредиенты для моего зелья.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Что за зелье?</a></li>';	
}else
if($answer == 2){ 
$textNPC = 'Это уже не твое дело. Я темная ведьма и раскрывать магию я не собираюсь. Твое дело принести мне #047 Parasect 40-lvl, #332 Cacturne 40-lvl и Веселого #090 Shellder. Советую запастить покеболами, потому что мне нужно много покемо... кхррр.. кхе-кхе... покемонов... кхрррр... Это все в твоих интересах.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Хорошо! Я постараюсь принести вам их как можно скорее.</a></li>';  
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3">Я принес нужных вам покемонов. Вы же не собираетесь их убивать?</a></li>';	
}else
if($answer == 3){ 
$m1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '47' and `lvl` = '40' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m2 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '332' and `lvl` = '40' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();
$m3 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '90' and `character` = '1' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();

if($m1['id'] > 0 and $m2['id'] > 0 and $m3['id'] > 0){
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m1['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m1['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m1['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m2['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m2['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m2['id']."'");
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m3['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m3['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m3['id']."'");


$r1 = rand(1,2); $c1 = rand(1,3);
$r2 = rand(3,4); $c2 = rand(1,1);
$r3 = rand(5,6); $c3 = rand(1,2);
if($r1 == 1){ $it1 = 1033; $in1 = "Тыква x".$c1; }
if($r1 == 2){ $it1 = 1034; $in1 = "Гриб x".$c1; }
if($r2 == 3){ $it2 = 1033; $in2 = "Тыква x".$c2; }
if($r2 == 4){ $it2 = 1034; $in2 = "Гриб x".$c2; }
if($r3 == 5){ $it3 = 1034; $in3 = "Гриб x".$c3; }
if($r3 == 6){ $it3 = 1033; $in3 = "Тыква x".$c3; }
plus_item($c1,$it1,$user_id);
plus_item($c2,$it2,$user_id);
plus_item($c3,$it3,$user_id);
$textNPC = "Нет, что ты :) ! Благодарю! За твою помощь дам тебе: $in1, $in2, $in3. Кхееее... Кхр... Буду ждать новой партии!";
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Конечно!</a></li>';  
}else{
$textNPC = 'ЗАЧЕМ ТЫ МЕНЯ ОБМАНИВАЕШЬ! АААААААААААААААА!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извините.</a></li>';  
}
}
?>
<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = "Жанет";
if($npc == 75){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = 'Привет!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1">Привет! Я по поводу Зелья памяти.</a></li>';
}else
if($answer == 1){
$textNPC = 'И в каких целях ты будешь его использовать?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Извините, но я не могу вам сказать.</a></li>';	
}else
if($answer == 2){ 
$textNPC = 'Ладно, мне все равно. Да, я специалист в этом деле, но тебе нужно найти довольно труднодоступные ингредиенты. Тебе нужно принести Глубоководная чешуя х1, Лечебная трава х35, Суперстимулятор х10, #129 Magikarp с атакой Tackle.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Хорошо, постраюсь все это раздобыть.</a></li>';  
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3">Я принес нужные игредиенты.</a></li>';	
}else
if($answer == 3){ 
$m1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '129' and `user_id` = '".$user_id."' and `master` = '".$user_id."'")->fetch_assoc();

if(item_isset(138, 1)){
$mysqli->query("DELETE FROM `attack_my_pokemons` WHERE `pok_id` = '".$m1['id']."'");
            $mysqli->query("DELETE FROM `mypok_learn` WHERE `pok` = '".$m1['id']."'");
            $mysqli->query("DELETE FROM `user_pokemons` WHERE `id` = '".$m1['id']."'");
			minus_item (1,138);
			minus_item (35,173);
			minus_item (10,51);
			plus_item(1,248);
$textNPC = "Тааак... Это сюда, это нарезать и бросить... Хмм, ааа... Дай мне вон ту штучку... 5 секунд варим... 1.. 2.. 3.. 4.. 5! Держи Зелье памяти х1.";
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Спасибо!</a></li>';  
}else{
$textNPC = 'Тут не все игредиенты.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извини.</a></li>';  
}
}
?>
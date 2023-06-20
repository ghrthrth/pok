<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Пайя';
$img = "<img src='https://oldpokemon.ru/img/169.png'>";
if($npc == 169 && empty($answer)){
	if(info_quest(168,'step') == 3){
	$textNPC = ' '.$img.' Ой, это ты, Линк? А, тренер. Привет! Спасибо что помог моей бабушке. Для меня это очень важно.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да для меня это было расплюнуть! То что я встретил - ни чета для меня!</a></li>';
        }elseif(info_quest(168,'step') == 4 and item_isset(444,10)){
        $textNPC = ''.$img.' Ты уже собрал нужное количество материала для нового шарфа?';
     $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Да, держи!</a></li>';
        }else{
        	$textNPC = ''.$img.' А?';
        }
}elseif($answer == 1) {
	$textNPC = ''.$img.' Но тем не менее, я хотела бы внести свой вклад и помочь ей обрести Новогоднее настроение!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Хмм. И как же я могу тебе помочь?</a></li>';
}elseif($answer == 2) {
	$textNPC = ''.$img.' Думаю, есть один способ. Когда-то давно у бабули был шарф, добротный шарф из особых голубых лент. Но, к сожалению, он пропал. Вот если бы ты принёс мне 10 голубых лент, я мог бы попросить знакомого портного помочь мне с этим!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">А где взять эти ленты? Думаю, я могу оказать тебе помощь с этим.</a></li>';
}elseif($answer == 3) {
	$textNPC = ''.$img.' Бабуля говорила, что этот шарф привёз ей её товарищ из Джото, но это было давным-давно... Более я ничем не могу тебе помочь.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо и на этом, постараюсь найти где его можно раздобыть.</a></li>';
	quest_update(168,4);
}elseif($answer == 4 and item_isset(444,10) and info_quest(168,'step') == 4){
	$textNPC = ''.$img.' Спасибо тебе большое! Я сейчас же отдам это Клайву, что бы он пошил новый шарф. Спасибо еще раз. Ты заслужил награду. У меня для тебя есть: Секретный ключ х2, Набор тренировки х25, Набор ослабления х5, Даркболл х5, Коробка витаминов х5, Ванильная конфета х30, Самодельный сканер х2, Тюбик с краской х3, Самоцвет х100.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Ух, как много всего. Всегда пожалуйста!</a></li>';
	quest_update(168,5);
	minus_item(10,444);
	plus_item(2,384);
	plus_item(25,330);
	plus_item(5,1026);
	plus_item(5,72);
	plus_item(5,1055);
	plus_item(30,309);
	plus_item(2,185);
	plus_item(3,101);
	plus_item(100,437);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 
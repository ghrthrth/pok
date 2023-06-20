<?php  // Софи
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Джози';
if($npc == 161) { }else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }

if(empty($answer)){
	if(!info_quest(161,'step') == 1){
			$textNPC = '*Отрешённо смотрит на мимо проходящих прохожих поглаживая Алола - Мяута*';
	        $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте, у вас что-то случилось, вам плохо?</a></li>';
	    }elseif(info_quest(161,'step') == 1){
        	$textNPC = 'Ты нашёл те камни, о которых я тебя просила?';
        	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=6&map=1">Ага! Держите камушки!</a></li>';
        }elseif(info_quest(161,'step') == 2){
        	$textNPC = 'Пришёл за повышением генокода? Эта услуга стоит 500 000 Кредитов. И так же, покемон может пройти через данную процедуру только один раз. Хорошенько подумай.';
        	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=7&map=1">Я взвесил все "За" и "Против" и решил что моим покемонам нужна эта процедура.</a></li>';
        }
}elseif($answer == 1) {
	$textNPC = 'Ох нет, юноша, я в порядке. Мне просто тоскливо...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Почему? Я могу вам чем-то помочь?</a></li>';
}elseif($answer == 2) {
	$textNPC = 'Цветы. Мои любимые цветы. Раньше, когда я являлась заведующей местного покецентра, мне довольно часто была предоставлена возможность просить тренеров набрать мне камушков для моих цветочков, а сейчас, эх...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Так давайте я раздобуду для вас камушки!</a></li>';
}elseif($answer == 3) {
	$textNPC = 'Это было бы чудесно! Кварц, лазурит, малахит, ониксы, ох, как же красиво они гармонируют с моими цветниками! Но, они нужны мне в довольно большом количестве, ты уверен, что справишься?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Не переживайте, я справлюсь! Где я могу раздобыть эти камни?</a></li>';
}elseif($answer == 4) {
	$textNPC = 'Все эти камни могут быть при себе у диких покемонов в месте под названием Горный перевал. Он далеко отсюда, в регионе Джото.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Хорошо, думаю, я знаю где это место.</a></li>';
}elseif($answer == 5) {
	$textNPC = 'Добро, тогда мне нужно: Кварц х100, Малахит х30, Лазурит х10, Оникс х1.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Я мигом!</a></li>';
	quest_update(161,1);
}elseif($answer == 6){
	if(item_isset(150,100) and item_isset(151,30) and item_isset(152,10) and item_isset(153,1) and info_quest(161,'step') == 1){
        	$textNPC = 'Ох спасибо юноша, выручил старушку! Но и в долгу я не останусь, вот тебе небольшой гостинец: Камни мегаэволюции, Наборы тренировок и 500т Кредитов. А ещё, со времён своей работы в покецентре я до сих пор владею методикой, которая может повысить генокод покемона. Обратись ко мне в следующий раз, и я помогу тебе в этом.';
        	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Я понял, всего хорошего вам!</a></li>';
        	plus_item(500000,1);
        	plus_item(10,330);
        	plus_item(5,1046);
        	minus_item(100,150);
        	minus_item(30,151);
        	minus_item(10,152);
        	minus_item(1,153);
        	quest_update(161,2);
}else{
        	$textNPC = 'У тебя не хватает камушков! Принеси мне все разом! Напоминаю, 100 Кварца, 30 Малахита, 10 Лазурита и 1 Оникс.';
        	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Простите, я думал что мне хватает. Скоро вернусь.</a></li>';
 }
}elseif($answer == 7){
	$textNPC = "Выбери покемона:<br>";
 	$mypok = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
	while ($active = $mypok->fetch_assoc()){ 
 $textNPC = $textNPC."<br><a href='game.php?fun=m_npc&answ_id=8&npc_id=".$npc."&pok=".$active['id']."'>#".numbPok($active['basenum'])." ".$active['name']."</a>";
	}
}elseif($answer == 8){
	if($_GET['pok'] > 0){
	$pok = obTxt($_GET['pok']);
	$pk = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 and id = '.$pok)->fetch_assoc();
	if($pk and $pk['up_gen'] == 0) {
		if(item_isset(1,500000)){
			if(rand(1,100)){
				$randomgenup = rand(1,6);
				$mysqli->query("UPDATE `user_pokemons` SET `spark` = 0 WHERE `id` = '".$pk['id']."'");
				if($randomgenup == 1){
					$mysqli->query("UPDATE `user_pokemons` SET `hp_gen` = `hp_gen` + 11 WHERE `id` = '".$pk['id']."'");
				}
				if($randomgenup == 2){
					$mysqli->query("UPDATE `user_pokemons` SET `atc_gen` = `atc_gen` + 11 WHERE `id` = '".$pk['id']."'");
				}
				if($randomgenup == 3){
					$mysqli->query("UPDATE `user_pokemons` SET `def_gen` = `def_gen` + 11 WHERE `id` = '".$pk['id']."'");
				}
				if($randomgenup == 4){
					$mysqli->query("UPDATE `user_pokemons` SET `speed_gen` = `speed_gen` + 11 WHERE `id` = '".$pk['id']."'");
				}
				if($randomgenup == 5){
					$mysqli->query("UPDATE `user_pokemons` SET `spatc_gen` = `spatc_gen` + 11 WHERE `id` = '".$pk['id']."'");
				}
				if($randomgenup == 6){
					$mysqli->query("UPDATE `user_pokemons` SET `spdef_gen` = `spdef_gen` + 11 WHERE `id` = '".$pk['id']."'");
				}
			}
        $mysqli->query("UPDATE `user_pokemons` SET `up_gen` = '1' WHERE `id` = '".$pk['id']."'");
	$textNPC = 'Готово! У твоего покемона улучшился генокод!'; 
	minus_item(500000,1);
		}else{ $textNPC = 'Извини, но у тебя не хватает денег.'; }
	}else{ $textNPC = 'Извини, но этот покемон уже повышал свой генокод.'; }
}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 

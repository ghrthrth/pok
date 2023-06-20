<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Тест'; // поменять имя если не нравится
$prov_psydak = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 54 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();// тут айди поков, где базнайм
$prov_woper = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 194 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_surs = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 283 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_clam = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 366 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
$prov_basc = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 550 AND lvl = 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
if($npc == 188 && empty($answer)){ // придумать айди нпс
	if(!info_quest(188,'step')){
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Здравствуйте, вы случайно не знакомы с Сарией?</a></li>';
    }elseif(info_quest(188,'step') == 1){
    	$textNPC = '...?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=&map=1">А вот и я! Добрый день, принимайте будущее селекции</a></li>';
			quest_update(188,2);
	}elseif(info_quest(188,'step') == 2){
    	$textNPC = 'Приветствую, благодарю за твою помощь, теперь и мой черёд тебе помочь.
    	О Хо-охе я услышал от одного туриста, который приехал покорять наши регионы в рамках своего кругосветного путешествия. Пересеклись мы как раз неподалёку от
    	Целадона, он заплутал и не мог сообразить как добраться до местного кондитерского городка в котором ему крайне сильно хотелось задержаться. Я помог ему, 
    	подсказав дорогу и сориентировав на местности, завязался разговор в котором он и поведал о своей встрече с каким-то скитальцем Хоэнна, якобы тот знает, где 
    	эта чудо-птица нашла своё пристанище!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=&map=1">Хорошо, значит, сладкий городок говорите?</a></li>';
         quest_update(188,3);
	}elseif(info_quest(188,'step') == 3){
		$textNPC = '????'; // текст после выполнения квеста если с ней снова говорить
	}
}elseif($npc == 188 && $answer == 2){
	if(!info_quest(188,'step')){
		$textNPC = 'О, приветствую! Да-да, юное дарование, что без ума от пернатых? Знакомы, а что?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Она поделилась со мной информацией о Хо-охе и посоветовала обратиться к вам!</a></li>';
	}elseif(info_quest(188,'step') == 2){
		if($prov_psydak['id'] && $prov_woper['id'] && $prov_surs['id'] && $prov_clam['id'] && $prov_basc['id']){
            $textNPC = 'Верно, возможно ты ещё застанешь его там! И, тренер, спасибо тебе за помощь, держи - пригодится (даёт ништяк)
            Всё, далее западный (или восточный) шафран, который сладкий!'; // тут надо дописать какие призы будут
            $moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">....</a></li>';
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_psydak['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_woper['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_surs['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_clam['id']);
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_basc['id']);
			plus_item(30,330); // промежутоные призы я не знаю какие
			plus_item(1,1112);
			plus_item(1,1051); // тут будет айди привязанное на допуск к локе
			plus_item(1,1134);
			quest_update(188,2,2); 
		}else{
			$textNPC = 'Их не хватает! Ты что забыл кто мне нужен? Тогда записывай: Psyduck,Wooper,Surskit,Clamperl и Basculin, но помни что мне нужны именно они и только 1 уровня.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините,я все сделаю правильно.</a></li>';
		}
	}
}elseif($npc == 188 && $answer == 3){
	if(!info_quest(188,'step')){
		$textNPC = 'О Хо-охе говоришь... Ладно, я дам тебе наводку, но сперва ты поможешь мне, согласен?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Выбора нет, чем я могу помочь?</a></li>';
	}
}elseif($npc == 188 && $answer == 4){
	if(!info_quest(188,'step')){
		$textNPC = 'Так вышло, что я увлёкся селекцией и пришёл к гипотезе того, что некоторые уникальные покемоны - результат скрещивания идеальных особей разного вида. Да, знаю, звучит странно, но тем не менее мне нужны: я допишу...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Хорошо, я их принесу! Найдеюсь , это и правда будет что-то интересное.</a></li>';
		quest_update(188,1);
   } 
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>
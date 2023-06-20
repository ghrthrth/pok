<?php #Маленький человечек
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Лора';
$prov_flaf = $mysqli->query('SELECT * FROM user_pokemons WHERE basenum = 180 AND active == 1 AND user_id = '.$_SESSION['user_id'].' LIMIT 1 ')->fetch_assoc();
if($npc == 174 && empty($answer)){
	if(!info_quest(174,'step')){
		$textNPC = 'Привет! У тебя есть #180 Flaaffy? Не хочешь обменять его на моего #524 Roggenrola?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Добрый День! Да, есть. Держи.</a></li>';
	}elseif(info_quest(174,'step') == 1){
		$textNPC = 'Спасибо за Флаафи! ^_^';
	}
}elseif($npc == 174 && $answer == 1){
	if(!info_quest(174,'step')){
		if($prov_flaf['id']){
		$textNPC = 'Спасибо! Держи его. Будь аккуратен!';
        $moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо.</a></li>';
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_flaf['id']);
			newPokemon(524,$_SESSION['user_id']);
			quest_update(174,1);
		}else{
			$textNPC = 'У тебя его нет...';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Сейчас поищу лучше!</a></li>';
		} 
	}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>

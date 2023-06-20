<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Итан';
$oblig = $mysqli->query("SELECT poknbr FROM base_items WHERE id = 1132")->fetch_assoc();
if($npc == 184){
	if(empty($answer)){
		$textNPC = 'Здравствуйте, вы хотите обменять облигацию?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да,все верно!</a></li>';
	}elseif($answer == 1){
    if(item_isset(1132,1)){
        $pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$oblig['poknbr']."' ")->fetch_assoc();
		$textNPC = 'Держи покемона '.$pok_base['name'].' .';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
    newPokemon($oblig['poknbr'],$_SESSION['user_id']);
    minus_item(1,1132);
  }else{
    $textNPC = 'У тебя нет облигации.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Понял, ушел.</a></li>';
  }
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}
?>
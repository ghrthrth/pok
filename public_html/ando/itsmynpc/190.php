<?php
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id', $_GET) ? obr_chis($_GET['npc_id']) : '';
$answer = array_key_exists('answ_id', $_GET) ? obr_chis($_GET['answ_id']) : '';
$npcloc = $mysqli->query("SELECT id, location FROM base_npc WHERE location = " . $user['location'] . "")->fetch_assoc();
$usr = $mysqli->query("SELECT * FROM users WHERE id = " . $_SESSION['user_id'])->fetch_assoc();
$nameNPC = 'Мистер Джой';
if ($npc == 190 && empty($answer)) {
	$textNPC = 'Здравствуйте! Рады вас видеть в нашем возврате, что мы можем для вас сделать?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=' . $npc . '&answ_id=1&map=1">Доступ к старому питомнику Лиги.</a></li>';
} elseif ($npc == 190 && $answer == 1) {
	if ($usr['old_user_id'] > 0) {
		include("190_1.php");
		die();
	} else {
		$textNPC = 'Сначала прочитай инструкцию на главной странице в новости, прежде чем бездумно тыкаться сразу в переносчика.';
	}
} else {
	die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}

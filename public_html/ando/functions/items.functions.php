<?
if (isset($_POST['add']) && isset($_POST['itID'])) {
	$item_id = obr_chis($_POST['itID']);
	$add = obTxt($_POST['add']);

	if ($user['status'] != 'free') {
		echo "<script>alert('При обмене, бое не возможно выполнять действия с предметами!');</script>";
		die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
	}

	$items = $mysqli->query("SELECT * FROM user_items WHERE `id` = '" . $item_id . "'")->fetch_assoc();
	if ($items['user_id'] !== $_SESSION['user_id']) {
		echo "<script>alert('Данный предмет вам не принадлежит!');</script>";
		die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
	}
	$item = $mysqli->query("SELECT * FROM base_items WHERE id = " . $items['item_id'])->fetch_assoc();
	if ($add == 'dr_item') {
		if (empty($_POST['amount'])) {
			echo "<script>alert('Введите коректное количество!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		} elseif ($item['drop'] == 0) {
			echo "<script>alert('Данный предмет нельзя выкинуть!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		} elseif ($items['count'] < $_POST['amount']) {
			echo "<script>alert('Повторите запрос, уменьшив количество!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		}
		$count = obr_chis($_POST['amount']);
		minus_item($count, $items['item_id']);

		die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
	} elseif ($add == 'dress') {
		if ($item['dress'] != 1) {
			echo "<script>alert('Данный предмет нельзя надеть!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		}

		$pok_id = obr_chis($_POST['pokes']);
		$pok = $mysqli->query("SELECT * FROM user_pokemons WHERE id = " . $pok_id)->fetch_assoc();
		if ($pok['user_id'] != $_SESSION['user_id']) {
			echo "<script>alert('Ошибка при выборе покемона!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		}
		if ($pok['item_id'] > 0) {
			echo "<script>alert('Покемон уже держит предмет!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		}
		$mysqli->query("UPDATE user_pokemons SET item_id = " . $items['item_id'] . " WHERE id = " . $pok_id);
		minus_item(1, $items['item_id']);
		echo "<script>alert('Предмет успешно надет!');</script>";
		die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
	} elseif ($add == 'use') {
		$pok_id = obr_chis($_POST['pokes']);
		$pok = $mysqli->query("SELECT * FROM user_pokemons WHERE id = " . $pok_id)->fetch_assoc();
		if ($item['use'] != 1) {
			echo "<script>alert('Данный предмет нельзя использовать!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		} elseif ($pok['master'] != $_SESSION['user_id'] && $item['id'] != 298 && $item['id'] != 384) {
			echo "<script>alert('Вы не хозяин покемона!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		}
		$egg_id = array_key_exists('eggs', $_POST) ? obr_chis($_POST['eggs']) : '';
		if (item_isset($items['item_id'], 1)) {
			include("ando/functions/items.post.php");
			return;
		} else {
			echo "<script>alert('Не достаточное количество для использования!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		}

	} elseif ($add = 'kachestvo'){
	   include("ando/functions/items.post.php");
		return;
	} else {
			echo "<script>alert('Не достаточное количество для использования!');</script>";
			die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
		}
} else {
	die('Ошибка запроса');
}

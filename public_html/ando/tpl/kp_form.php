<?

require ('ando/functions/btl.function.php');
error_reporting(0);
$battle = $mysqli->query("SELECT * FROM battle WHERE `user1` = '".$user_id."' OR `user2` = '".$user_id."' LIMIT 1")->fetch_assoc();

// Проверка того, что есть данные из капчи
if (!$_POST["g-recaptcha-response"]) {
    // Если данных нет, то программа останавливается и выводит ошибку
    exit("Произошла ошибка");
} else { // Иначе создаём запрос для проверки капчи
    // URL куда отправлять запрос для проверки
    $url = "https://www.google.com/recaptcha/api/siteverify";
    // Ключ для сервера
    $key = "6LfdzAggAAAAADJRkoXNsm920LsshJplDjA0QSod";
    // Данные для запроса
    $query = array(
        "secret" => $key, // Ключ для сервера
        "response" => $_POST["g-recaptcha-response"], // Данные от капчи
        "remoteip" => $_SERVER['REMOTE_ADDR'] // Адрес сервера
    );
 
    // Создаём запрос для отправки
    $ch = curl_init();
    // Настраиваем запрос 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query); 
    // отправляет и возвращает данные
    $data = json_decode(curl_exec($ch), $assoc=true); 
    // Закрытие соединения
    curl_close($ch);
 
    // Если нет success то
    if (!$data['success']) {
        // Останавливает программу и выводит "ВЫ РОБОТ"
        exit("ВЫ РОБОТ");
    } else {
        // Иначе выводим логин и Email
        $mysqli->query("UPDATE battle SET kaptcha = '0' WHERE `id` = '".$battle['id']."'");
        echo "<script>location.href='game.php?fun=fight';</script>";
        return;
    }
}

?>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
header('Content-Type: text/html; charset=UTF-8');

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');

$mysqli = new mysqli('localhost', 'f256106q_z', 'huy228303A%', 'f256106q_z');
$mysqli->query('SET NAMES utf8');

const HOME_URL = 'https://claimbe.ru';

date_default_timezone_set('Europe/Moscow');
if (mysqli_connect_errno()) {
    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}
$user = [];
if (isset($_SESSION['user_id'])) {
    $user_id     = $_SESSION['user_id'];
    $query       = $mysqli->query('SELECT * FROM users WHERE id = ' . $user_id);
    $user        = $query->fetch_assoc();
    $login       = $user['login'];
    $base        = $mysqli->query('SELECT * FROM base_location WHERE id = ' . $user['location']);
    $baseloc     = $base->fetch_assoc();
    $location    = $baseloc['name'];
    $description = $baseloc['description'];
    $basereg     = $mysqli->query('SELECT * FROM base_region WHERE id = ' . $baseloc['region']);
    $base_region = $basereg->fetch_assoc();
    $region      = $base_region['name'];
    if (date("G") >= 8 and date("G") <= 20) {
        $timeday = 1;
    } else {
        $timeday = 2;
    }
    if (date("G") >= 6 and date("G") <= 9) {
        $timereitup = 1;
    }
    $usr = $mysqli->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
    if ($usr['time_conquerloc'] <= time() and $usr['time_conquerloc'] != 0) {
        $mysqli->query("UPDATE base_location SET conquer = '" . $usr['clan_id'] . "' WHERE id = '" . $usr['location'] . "' ");
        $mysqli->query("UPDATE users SET time_conquerloc = '0' WHERE id = '" . $usr['id'] . "'");
    }
    $switch_tab = $mysqli->query("SELECT auto_reset_arena FROM switch_tab")->fetch_assoc();
    $date = date("H:i");
    $settimelimit = time();
    if (date("l") == "Sunday" and $switch_tab['auto_reset_arena'] == 0) {
        $mysqli->query("UPDATE `users` SET `jeton` = '0' , `jet_week` = '0' , `plus_jet` = '1', `arena_darkball` = '0' , `arena_oblig` = '0' , `arena_vitbox` = '0'");
        $mysqli->query("UPDATE `switch_tab` SET `auto_reset_arena` = '1'");
        $mysqli->query("INSERT INTO chat(user, text, data, private, to_user, time, klan, time_limit) VALUES ('2', '<font color=#B22222><b>Внимание! Очки арены были сброшены. Удачной недели!<b></font>', '" . $date . "', '0','0', NOW(),'0', '" . $settimelimit . "' )");
    }
    if (date("l") == "Monday" and $switch_tab['auto_reset_arena'] == 1) {
        $mysqli->query("UPDATE `switch_tab` SET `auto_reset_arena` = '0'");
    }
    #Определяет последнее посещение
    function get_last_online_auk($date)
    {
        $date_time_array = getdate($date);
        $string = $date_time_array['year'] . '-' . $date_time_array['mon'] . '-' . $date_time_array['mday'] . ' ' . $date_time_array['hours'] . ':' . $date_time_array['minutes'] . ':' . $date_time_array['seconds'];
        return $string;
    }
    function plus_item_auk($count, $item_id, $user = false)
    {
        global $mysqli;
        if ($user == false) $user = $_SESSION['user_id'];
        $items = $mysqli->query('SELECT * FROM user_items WHERE user_id = ' . $user . ' AND item_id = ' . $item_id . ' AND count > 0 ')->fetch_assoc();
        if ($items) {
            $x = $items['count'] + $count;
            $mysqli->query('UPDATE user_items SET count = "' . $x . '" WHERE item_id = ' . $item_id . ' AND user_id = ' . $user);
        } else {
            $mysqli->query("INSERT INTO user_items (user_id , item_id , count) VALUES ('" . $user . "','" . $item_id . "','" . $count . "') ");
        }
    }

    $lot_bd = $mysqli->query('SELECT * FROM auk  ');
    while ($lt = $lot_bd->fetch_assoc()) {
        if ($lt['time'] <= time()) {
            $mysqli->query("DELETE FROM auk WHERE id = '" . $lt['id'] . "'");
            if ($lt['tipe'] == 1) {
                if ($lt['user_last'] != 0) {
                    plus_item_auk($lt['last_stav'], 1, $lt['user']);
                    $mysqli->query("UPDATE user_pokemons SET user_id = '" . $lt['user_last'] . "' , tipe_otc = '0' , master= '" . $lt['user_last'] . "' , active = '0' WHERE id = " . $lt['id_lot']);
                    $text = "Вы выиграли лот №" . $lt['id'] . " " . $lt['name'] . "!";
                    $text_my = "Ваш лот №" . $lt['id'] . " " . $lt['name'] . " был куплен по истичению времени! Ваш счет пополнен на +" . $lt['last_stav'] . " кр.";
                    $date = get_last_online_auk(time());
                    $mysqli->query("INSERT INTO sends (user_id, user_to, text,subject,date) VALUES ('2','" . $lt['user_last'] . "','" . $text . "','Аукцион','" . $date . "')");
                    $mysqli->query("INSERT INTO toast (user, type, head,text) VALUES ('" . $lt['user_last'] . "','info','Аукцион','Вы выиграли лот!')");
                    $mysqli->query("INSERT INTO sends (user_id, user_to, text,subject,date) VALUES ('2','" . $lt['user'] . "','" . $text_my . "','Аукцион','" . $date . "')");
                    $mysqli->query("INSERT INTO toast (user, type, head,text) VALUES ('" . $lt['user'] . "','info','Аукцион','Ваш лот был возвращен!')");
                } else {
                    $mysqli->query("UPDATE user_pokemons SET user_id = '" . $lt['user'] . "' , tipe_otc = '0' , master= '" . $lt['user'] . "' , active = '0' WHERE id = " . $lt['id_lot']);
                    $text = "Ваш лот №" . $lt['id'] . " " . $lt['name'] . " был возвращен!";
                    $date = get_last_online_auk(time());
                    $mysqli->query("INSERT INTO sends (user_id, user_to, text,subject,date) VALUES ('2','" . $lt['user'] . "','" . $text . "','Аукцион','" . $date . "')");
                    $mysqli->query("INSERT INTO toast (user, type, head,text) VALUES ('" . $lt['user'] . "','info','Аукцион','Ваш лот был возвращен!')");
                }
            } else {
                if ($lt['user_last'] != 0) {
                    plus_item_auk($lt['count'], $lt['id_lot'], $lt['user_last']);
                    plus_item_auk($lt['last_stav'], 1, $lt['user']);
                    $text = "Вы выиграли лот №" . $lt['id'] . " " . $lt['name'] . "!";
                    $text_my = "Ваш лот №" . $lt['id'] . " " . $lt['name'] . " был куплен по истичению времени! Ваш счет пополнен на +" . $lt['last_stav'] . " кр.";
                    $date = get_last_online_auk(time());
                    $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','" . $lt['user_last'] . "','" . $text . "','Аукцион','" . $date . "')");
                    $mysqli->query("INSERT INTO `toast` (`user`, `type`, `head`,`text`) VALUES ('" . $lt['user_last'] . "','info','Аукцион','Вы выиграли лот!')");
                    $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','" . $lt['user'] . "','" . $text_my . "','Аукцион','" . $date . "')");
                    $mysqli->query("INSERT INTO `toast` (`user`, `type`, `head`,`text`) VALUES ('" . $lt['user'] . "','info','Аукцион','Ваш лот был выигран покупателем!')");
                } else {
                    plus_item_auk($lt['count'], $lt['id_lot'], $lt['user']);
                    $text = "Ваш лот №" . $lt['id'] . " " . $lt['name'] . " был возвращен!";
                    $date = get_last_online_auk(time());
                    $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','" . $lt['user'] . "','" . $text . "','Аукцион','" . $date . "')");
                    $mysqli->query("INSERT INTO `toast` (`user`, `type`, `head`,`text`) VALUES ('" . $lt['user'] . "','info','Аукцион','Ваш лот был возвращен!')");
                }
            }
        }
    }

    /*if(date("G") == 10){
        $mysqli->query("TRUNCATE TABLE `log`");
    }*/
}

// wterh 4.05.19
// Более широкий вариант фильтрации
function escapeMe($value)
{
    global $mysqli;
    $pattern = [
        "'", '"', '}', ']', ')', '{', '[', '(', ':', '+', '-', ' +', "'+", '"+',
        "\x27", "\x22", "\x60", "\\t", "\\n", "\\r", "*", "%", "<", ">", "?", "!", "\r\n", '<?', 'php',
        "select", "update", "insert", "drop", "delete", "from", "where",
        "from", "\\", "`", "~", "set", "values",
        "create", "database", "character", "collate", "grant", "show", "describe",
        'select', 'update', 'insert', 'drop', 'delete',
        'alert', 'javascript', 'alert',
        'eval', 'system', 'exec', 'worldofpokemon', 'l-17', 'league17revival', 'league17reborn'
    ];
    $value = str_ireplace($pattern, '', $value);
    $value = $mysqli->real_escape_string($value);
    $value = trim($value);
    $value = preg_replace("/[\r\n]{3,}/i", "\r\n\r\n", $value);
    $value = stripslashes($value);
    return $value;
}


/**
 * absolute logger
 */
$power = 1; // Включатор логгирования

function escapeString($text)
{
    global $mysqli;
    $pattern = [
        "'", '"', '}', '{', "'+", '"+',
        "\x27", "\x22", "\x60", "\\t", "\\n", "\\r", "?>", "\r\n", '<?',
        "select", "update", "insert", "drop", "delete", "from", "where",
        "from", "where", "\\", "`", "~", "set", "values",
        "create", "database", "character", "collate", "grant", "show", "describe", "collate",

        'select', 'update', 'insert', 'drop', 'delete',
        'alert', 'javascript', 'eval', 'system', 'exec', 'worldofpokemon', 'Проект', 'l-17', 'L-17'
    ];
    $text = $mysqli->real_escape_string($text);
    $text = str_replace($pattern, '', $text);
    return $text;
}
foreach ($_POST as $_key => $_value) {
    $_POST[$_key] = escapeString($_value);
}

foreach ($_GET as $_key => $_value) {
    $_GET[$_key] = escapeString($_value);
}
if (isset($_POST) && !empty($_POST) && $power == 1) {
    $file = date('Y.m.d') . '_post.log';
    $path = dirname(__FILE__) . '/loginhorizont/';
    $usr = isset($user['login']) ? $user['login'] : '';
    $string = date('Y.m.d H:i:s') . " {$_SERVER['REQUEST_URI']} | {$usr}";
    foreach ($_POST as $r) {
        $string .= $r . ' | ';
    }
    $string .= PHP_EOL;
    file_put_contents($path . $file, $string, FILE_APPEND);
}

function logger($arqument)
{
    $log_dirname = 'logs';
    if (!file_exists($log_dirname)) {
        mkdir($log_dirname, 0777, true);
    }
    if(is_array($arqument)){
       $arqument = print_r($arqument, true);
    }
    $log_file_data = $log_dirname . '/log_' . date('d-M-Y') . '.log';
    $string = ''; // buffer
    $string .= '['.date('Y.m.d | H:i:s').']'.PHP_EOL.$_SERVER['REQUEST_URI'].PHP_EOL;
    foreach ($_GET as $r) {
        $string .= $r.' | ';
    }
    $string .= PHP_EOL;
    file_put_contents($log_file_data, $arqument . $string, FILE_APPEND);
}
define("LOG_FILENAME", 
       $_SERVER["DOCUMENT_ROOT"].
           "/logs/log.txt");

function AddMessage2Log($sText, $sModule = "", $traceDepth = 6, $bShowArgs = false)
{
    if (defined("LOG_FILENAME") && LOG_FILENAME <> '')
    {
        if(!is_string($sText))
        {
            $sText = var_export($sText, true);
        }
        if ($sText <> '')
        {
            ignore_user_abort(true);
            if ($fp = @fopen(LOG_FILENAME, "ab"))
            {
                if (flock($fp, LOCK_EX))
                {
                    @fwrite($fp, "Host: ".$_SERVER["HTTP_HOST"]."\nDate: ".date("Y-m-d H:i:s")."\nModule: ".$sModule."\n".$sText."\n");
                    $arBacktrace = $bShowArgs ? null : DEBUG_BACKTRACE_IGNORE_ARGS;
                    $strFunctionStack = "";
                    $strFilesStack = "";
                    $firstFrame = (count($arBacktrace) == 1? 0: 1);
                    $iterationsCount = min(count($arBacktrace), $traceDepth);
                    for ($i = $firstFrame; $i < $iterationsCount; $i++)
                    {
                        if ($strFunctionStack <> '')
                            $strFunctionStack .= " < ";

                        if (isset($arBacktrace[$i]["class"]))
                            $strFunctionStack .= $arBacktrace[$i]["class"]."::";

                        $strFunctionStack .= $arBacktrace[$i]["function"];

                        if(isset($arBacktrace[$i]["file"]))
                            $strFilesStack .= "\t".$arBacktrace[$i]["file"].":".$arBacktrace[$i]["line"]."\n";
                        if($bShowArgs && isset($arBacktrace[$i]["args"]))
                        {
                            $strFilesStack .= "\t\t";
                            if (isset($arBacktrace[$i]["class"]))
                                $strFilesStack .= $arBacktrace[$i]["class"]."::";
                            $strFilesStack .= $arBacktrace[$i]["function"];
                            $strFilesStack .= "(\n";
                            foreach($arBacktrace[$i]["args"] as $value)
                                $strFilesStack .= "\t\t\t".$value."\n";
                            $strFilesStack .= "\t\t)\n";

                        }
                    }

                    if ($strFunctionStack <> '')
                    {
                        @fwrite($fp, " ".$strFunctionStack."\n".$strFilesStack);
                    }

                    @fwrite($fp, "----------\n");
                    @fflush($fp);
                    @flock($fp, LOCK_UN);
                    @fclose($fp);
                }
            }
            ignore_user_abort(false);
        }
    }
}
    function dbSelect($star = '', $table = '', $arq = '', $fetch = 0){
        $mysqli = new mysqli('localhost', 'f256106q_z', 'huy228303A%', 'f256106q_z');
        $mysqli->query('SET NAMES utf8');

        if($fetch == 1){
            $result = $mysqli->query('SELECT '.$star.' FROM '.$table.' '.$arq.'');
            return $result;
        }
    
       $result = $mysqli->query('SELECT '.$star.' FROM '.$table.' '.$arq.'')->fetch_assoc();
    
       return $result;
    }

    function dbUpdate($table, $column, $where){
        $mysqli = new mysqli('localhost', 'f256106q_z', 'huy228303A%', 'f256106q_z');
        $mysqli->query('SET NAMES utf8');

        $result = $mysqli->query('UPDATE '.$table.' SET '.$column.' WHERE '.$where.'');

        return $result;
    }
?>

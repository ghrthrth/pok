<?php
ini_set("display_errors",0);
session_start();
header('Content-Type: text/html; charset=utf-8');

$close = 1;
if ($close == 2) {
    die("<center>Регистрация временно закрыта, принимаем меры по борьбе с тараканами.</center>");
}
if (isset($_SESSION['user_id']) && $_SESSION['user_id']) {
    echo "<script>location.href='/game.php?fun=start';</script>";
} else {
    require_once ('ando/bsqldate/dbconsql.php');
    require_once ('ando/functions/game.functions.php');
    $time = time();
    // Добавлена проверка на наличие в массиве соответствеющих значений
    if (isset($_POST) &&                            // пришли ли данные
        array_key_exists('login',$_POST) &&         // есть ли там логин
        array_key_exists('pass',$_POST) &&          // есть ли там пароль
        array_key_exists('double_pass',$_POST) &&   // есть ли там второй пароль
        array_key_exists('mail',$_POST) &&          // есть ли там почта
        array_key_exists('sex',$_POST) &&           // указан ли пол
        array_key_exists('pok',$_POST) &&           // выран ли покемон
        is_string($_POST['login']) &&               // строка ли это
        is_string($_POST['pass']) &&                // строка ли это
        is_string($_POST['double_pass']) &&         // строка ли это
        is_string($_POST['mail']) &&                // строка ли это
        is_string($_POST['sex']) &&                 // строка ли это
        is_string($_POST['pok'])                    // строка ли это
    ) {
        $name         = escapeMe($_POST['login']);       // чистим логин
        $password     = escapeMe($_POST['pass']);        // чистим пароль
        $dbl_password = escapeMe($_POST['double_pass']); // чистим второй пароль
        $mail         = escapeMe($_POST['mail']);        // чистим почту
        $sex          = escapeMe($_POST['sex']);         // чистим пол
        $pok          = escapeMe($_POST['pok']);         // чистим покемона
        //if(preg_match('/\@(.*)/iu',$mail))
        if ($_SESSION['captcha_keystring'] == $_POST['keystring']) {
            // wterh 4.05.19
            /*
                Дальнейшая обработка должна быть тут, в случае если условие срабатывает,
                и сообщение об ошибке в else, если нет
            */
        }
        else {
            echo "<script>alert('Вы не верно ввели код с картинки!');</script>";
            echo "<script>location.href='/reg.php';</script>";
            return;
        }

        if ($dbl_password !== $password) {
            echo "<script>alert('Пароли не совпадают, повторите попытку!');</script>";
            echo "<script>location.href='/reg.php';</script>";
            return;
        }
        else {
            if (!preg_match("|^[а-яa-z_-]+$|iu", $name)) {
                echo "<script>alert('В имени можно использовать только русские или английские буквы!');</script>";
                echo "<script>location.href='/reg.php';</script>";
                return;
            }
            if (strlen($name) > 20) {
                echo "<script>alert('Максимальная длина логина 20 символов!');</script>";
                echo "<script>location.href='/reg.php';</script>";
                return;
            }
            $proverka     = $mysqli->query("SELECT * FROM users WHERE login = '".$name."'");
            $proverkamail = $mysqli->query("SELECT * FROM users WHERE mail = '".$mail."'");
            // if ($proverka->fetch_row() > 0) { wterh - вернее использовать num_rows для получения только числа записей
            if ($proverka->num_rows > 0) {
                echo "<script>alert('Данный логин существует, выберите другой!');</script>";
                echo "<script>location.href='/reg.php';</script>";
                return;
            }
            // elseif ($proverkamail->fetch_row() > 0) { wterh - вернее использовать num_rows для получения только числа записей
            elseif ($proverkamail->num_rows > 0) {
                echo "<script>alert('Данная почта существует, выберите другую!');</script>";
                echo "<script>location.href='/reg.php';</script>";
                return;
            }
            elseif (empty($sex)) {
                echo "<script>alert('Выберите свой пол!');</script>";
                echo "<script>location.href='/reg.php';</script>";
                return;
            }
            elseif (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $mail)) {
                echo "<script>alert('Неверно введена почта!');</script>";
                echo "<script>window.location.href='/reg.php';</script>";
                return;
            }
            else {
                $password = md5($password);
                $timereg = time();
                $date_reg = date("d.m.Y");
                if ($sex == "male") {
                    $avatars = 100;
                }
                else {
                    $avatars = 200;
                }
                $insert = $mysqli->query("INSERT INTO users(login, password, mail, sex, location, groups, avatars, date_reg,ip,timereg) VALUES ('".$name."', '".$password."','".$mail."','".$sex."',6,6,'".$avatars."','".$date_reg."','".$_SERVER["REMOTE_ADDR"]."','".$timereg."') ");
                $query = $mysqli->query("SELECT * FROM users WHERE login = '".$name."'");
                $array = $query->fetch_assoc();
                $update = $mysqli->query("UPDATE users SET online = 1, online_time = ".$time." WHERE id = ".$array['id']);

                #Добавление покемона
                if ($pok == 1 OR
                $pok == 4 OR
                $pok == 7 OR
                $pok == 152 OR
                $pok == 155 OR
                $pok == 158 OR
                $pok == 252 OR
                $pok == 255 OR
                $pok == 258 OR
                $pok == 387 OR
                $pok == 390 OR
                $pok == 393 OR
                $pok == 495 OR
                $pok == 498 OR
                $pok == 501 OR
                $pok == 650 OR
                $pok == 653 OR
                $pok == 656 OR
                $pok == 722 OR
                $pok == 725 OR
                $pok == 728 OR
                $pok == 810 OR
                $pok == 813 OR
                $pok == 816
                ) {
                    // null - и что тут должно быть?
                }
                else {
                    $pok = 1;
                }
                $lvl = '3';
                //Уровень по умолчанию 5
                $genders = mt_rand(1,2);
                //Рандомный пол
                if ($genders == 1) {
                    $gender = 'male';
                } else {
                    $gender = 'female';
                }
                $spark = 0;
                if ($pok['spark'] == 1) {
                    echo "<b>Переадресация...</b>";
                }
        if($pok == 1){ $har = mt_rand(22,22);} //Р
        if($pok == 4){ $har = mt_rand(20,20);} //Р
        if($pok == 7){ $har = mt_rand(22,22);} //Р
	    if($pok == 152){ $har = mt_rand(22,22);} //Р
	    if($pok == 155){ $har = mt_rand(20,20);} //Р
	    if($pok == 158){ $har = mt_rand(12,12);} //Р
	    if($pok == 252){ $har = mt_rand(20,20);} //Р
	    if($pok == 255){ $har = mt_rand(1,1);} //Р
	    if($pok == 258){ $har = mt_rand(12,12);} //Р
	    if($pok == 387){ $har = mt_rand(12,12);} //Р
	    if($pok == 390){ $har = mt_rand(1,1);} //Р
	    if($pok == 393){ $har = mt_rand(22,22);} //Р
	    if($pok == 495){ $har = mt_rand(20,20);} //Р
	    if($pok == 498){ $har = mt_rand(12,12);} //Р
	    if($pok == 501){ $har = mt_rand(12,12);} //Р
	    if($pok == 650){ $har = mt_rand(12,12);} //Р
	    if($pok == 653){ $har = mt_rand(20,20);} //Р
	    if($pok == 656){ $har = mt_rand(20,20);} //Р
	    if($pok == 722){ $har = mt_rand(1,1);} //Р
	    if($pok == 725){ $har = mt_rand(1,1);} //Р
	    if($pok == 728){ $har = mt_rand(22,22);} //Р
        if($pok == 810){ $har = mt_rand(12,12);}
	    if($pok == 813){ $har = mt_rand(11,11);}
	    if($pok == 816){ $har = mt_rand(22,22);} //Р
                //$har = rand(1,26); //Рандомный характер
                $poks = $mysqli->query("SELECT * FROM `base_pokemon` WHERE id = '{$pok}'")->fetch_assoc();
                //Вытаскиваем данные из покедекса
                $pok_name = $poks['name'];
                $user_id  = $array['id'];
                $atk_pok1 = $mysqli->query("SELECT atac_id FROM attack_learn WHERE `poke_base_id` = '".$pok."' and `atc_lvl` < '5' LIMIT 1")->fetch_assoc();
                $atk_pok2 = $mysqli->query("SELECT atac_id FROM attack_learn WHERE `poke_base_id` = '".$pok."' and `atc_lvl` < '5' and `atac_id` != '".$atk_pok1['atac_id']."' LIMIT 1")->fetch_assoc();
                $pp1      = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '".$atk_pok1['atac_id']."' LIMIT 1")->fetch_assoc();
                $pp2      = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '".$atk_pok2['atac_id']."' LIMIT 1")->fetch_assoc();

                $ins      = "INSERT INTO `user_pokemons`(`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`start_pok`,`start_pok_skob`,`type`,`gender`,`starts`,`owner`,`master`,`trade`,`exp_max`,`atk1`,`atk2`,`pp1`,`pp2`,`ev`) VALUES (".$user_id.",".$pok.",".$pok.",'".$pok_name."',".$har.",".$lvl.",'".$time."',1,1,'normal','".$gender."',1,".$user_id.",".$user_id.",'1','1000','".$atk_pok1['atac_id']."','".$atk_pok2['atac_id']."','".$pp1['atac_pp']."','".$pp2['atac_pp']."','6')";

                $mysqli->query($ins);
                $pok_query = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$user_id)->fetch_assoc();
                $hp = stats($pok_query['id'],'hp', $user_id);
                $mysqli->query("UPDATE `user_pokemons` SET `hp` = '".$hp."' WHERE `user_id` = '".$user_id."'");

                $mysqli->query("INSERT INTO user_items (user_id, item_id, count) VALUES ('".$user_id."', '1','300000') ");
                $mysqli->query("INSERT INTO user_items (user_id, item_id, count) VALUES ('".$user_id."', '309','20') ");
                $mysqli->query("INSERT INTO user_items (user_id, item_id, count) VALUES ('".$user_id."', '146','1') ");
                $mysqli->query("INSERT INTO user_items (user_id, item_id, count) VALUES ('".$user_id."', '2','1') ");
                $mysqli->query("INSERT INTO user_items (user_id, item_id, count) VALUES ('".$user_id."', '42','6') ");
                $mysqli->query("INSERT INTO sends (user_id, user_to, text, subject, date, view) VALUES ('2', '".$user_id."','Добро пожаловать в мир Покемонов! За регистрацию по рекламной ссылке вы получаете дополнительный бонус в виде: Кредиты х300000, Скобовое кольцо х3, Ванильная конфета х20, Отличная удочка х1. Приятной игры!','Добро пожаловать!','".$date_reg."', '0') ");
                $mysqli->query("INSERT INTO toast (user, type, head, text, load) VALUES ('".$user_id."', 'info','Новое сообщение','Спасибо за регистрацию! Вы получили бонусы. Подробности на вашей почте.','false') ");


                $_SESSION['user_id'] = $array['id'];
                setcookie('login',$array['login']);
                echo "<script>alert('Вы удачно зарегистрированы!');</script>";
                echo "<script>window.location.href='/game.php?fun=start';</script>";
            }
        }
    }
    unset($_SESSION['captcha_keystring']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8">
<title>POKEZONE > Регистрация</title><link rel="stylesheet" href="style.css" type="text/css">
<style type="text/css">
</style>
</head>

<body leftmargin="0" topmargin="0">
    <table width="1024" border="0" cellspacing="0" class="logo" align="center">
        <tr>
            <td style="background: url('/img/titlelogoop.gif') #A6CAF0 no-repeat top center" class="logo">
                <table width="100%" height="140" border="0" cellspacing="0">
                    <tr>
                        <td rowspan=2 width=250 alight='center'>&nbsp;</td>
                        <td width="420" align="center">
                            <div style="width:100%; text-align:center;">
                                <img src="http://claimbe.ru/img/items/blank.gif" width="1" height="105">
                            </div>
                        </td>
                        <td rowspan=2 width=250 alight=center>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="440" height="23" border="1" align="center" cellspacing="0" background="http://claimbe.ru/img/menu.jpg" style="border:1px solid #FFF;">
                                <tr>
                                    <td>
                                        <div align="center" style='font-size:11px;'>
                                            <a href="http://claimbe.ru/game.php?fun=start">Играть</a>
                                            | <a href="/">Главная</a>
                                            | <a href="reg.php">Регистрация</a>
                                            | <a href="index.php?go=rules">Правила</a>
                                            | <a href="http://claimbe.ru." target="_blank">Новичкам</a>
                                            | <a href="info.php">О нас</a>
                                            | <a href="http://forum.claimbe.ru/" target="_blank">Форум</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <img src="http://claimbe.ru/img/items/blank.gif" width="1" height="120">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td id='n'>
                <center><br><br><br><h1 style="margin-top: -5%;">Регистрация</h1><hr>
                    <br>
                    <center><strong style="color:green;font-size:1.3em;text-shadow:0 0 3px white;">Добро пожаловать на Регистрацию по рекламной ссылке! Зарегистрировавшись по данной ссылке вы получаете дополнительный бонус для лёгкого старта!</strong>
                <style>
                    .signin {
                        display: flex;
                        flex-flow: nowrap row;
                        justify-content: center;
                        align-items: flex-start;
                    }

                    .signin_pokemon {
                        width: 100%;
                        overflow-x: hidden;
                        overflow-y: scroll;
                        height: 580px;
                        border: #7ea4cc 1px solid;
                        box-sizing: border-box;
                    }

                    .signin_info {
                        width: 60%;
                        text-align: left;
                    }

                    .signin_info strong {
                        display: block;
                        text-align: left;
                    }

                    .signin_info input[type="text"],
                    .signin_info input[type="email"],
                    .signin_info input[type="password"] {
                        display: block;
                        text-align: left;
                        width: 260px;
                        padding: 10px 5px;
                        margin:5px 0;
                        box-sizing: border-box;
                        font-size: 12px;
                    }

                    .signin_info label {
                        display:inline-block;
                        width:260px;
                        padding:10px 5px;
                        border:#7ea4cc 1px solid;
                        background:white;
                        box-sizing:border-box;
                        margin:5px 0;
                    }
                    .signin_info label input {
                        width:10px;
                        height:10px;
                    }
                    .signin_info input[type="radio"], {
                        display:block;
                        width:100%
                    }

                    .signin_info input[type="submit"] {
                        width:260px;
                        padding:10px 5px;
                        text-align: center;
                        font-weight: 900;
                        background: #4894e5;
                    }

                    .signin_captcha {
                        width: 260px;
                    }

                    .signin_captcha img {
                        width: 100%;
                        border: #7ea4cc 1px solid;
                        box-sizing: border-box;
                    }
                </style>
                <form name="а1" action="" method="post">
                    <div class="signin">
                        <div class="signin_info">
                            <strong style="color:red;font-size:1.37em;text-shadow:0 0 3px white;">Логин может состоять только из букв !</strong>
                            <input name='login' type='text' size='20' value="" placeholder="Укажите логин..." required>
                            <strong style="color:red;font-size:1.37em;text-shadow:0 0 3px white;">Пароль может состоять только из букв и цифр!</strong>
                            <input name="pass" type="password" size="15" placeholder="Укажите пароль..." required>
                            <input name="double_pass" type="password" size="15" placeholder="Повторите пароль..." required>
                            <input name="mail" type="email" size="15" placeholder="Укажите Ваш email..." required>
                            <label for="sex_female"><input type="radio" id="sex_female" name="sex" value="female" required> Женщина</label>
                            <label for="sex_male"><input type="radio" id="sex_male" name="sex" value="male" checked required> Мужчина</label>
                                <div class="signin_captcha">
                                    <img src="/kp.php">
                                    <input type="text" name="keystring" placeholder="Введите числа с картинки">
                                </div>
                            <input type='submit' value="Зарегистрироваться">
                        </div>
                        <div class="signin_pokemon">
                            <h3><b><u>Выберите стартового покемона:</u></b></h3>
                            <h5>Стартовый покемон получает +3 EV за уровень, и всегда с хорошим характером.</h5>
                            <table align="center">
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="1" checked required><br>#001 Bulbasaur<br><img src="/img/pkmn/normal/001.jpg" alt="pokemon" title="Bulbasaur"></td>
                                    <td><input type="radio" id="pok" name="pok" value="4" required><br>#004 Charmander<br><img src="/img/pkmn/normal/004.jpg" alt="pokemon" title="Charmander"></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="7" required><br>#007 Squirtle<br><img src="/img/pkmn/normal/007.jpg" alt="pokemon" title="Squirtle"></td>
                                    <td><input type="radio" id="pok" name="pok" value="152" required><br>#152 Chikorita<br><img src="/img/pkmn/normal/152.jpg" alt="pokemon" title="Chikorita"></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="155" required><br>#155 Cyndaquil<br><img src="/img/pkmn/normal/155.jpg" alt="pokemon" title="Cyndaquil"></td>
                                    <td><input type="radio" id="pok" name="pok" value="158" required><br>#158 Totodile<br><img src="/img/pkmn/normal/158.jpg" alt="pokemon" title="Totodile"></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="252" required><br>#252 Treecko<br><img src="/img/pkmn/normal/252.jpg" alt="pokemon" title="Treecko"></td>
                                    <td><input type="radio" id="pok" name="pok" value="255" required /><br />#255 Torchic<br /><img src="/img/pkmn/normal/255.jpg" alt="pokemon" title="Torchic"></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="258" required /><br />#258 Mudkip<br /><img src="/img/pkmn/normal/258.jpg" alt="pokemon" title="Mudkip"></td>
                                    <td><input type="radio" id="pok" name="pok" value="387" required /><br />#387 Turtwig<br /><img src="/img/pkmn/normal/387.jpg" alt="pokemon" title="Turtwig"></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="390" required /><br />#390 Chimchar<br /><img src="/img/pkmn/normal/390.jpg" alt="pokemon" title="Chimchar"></td>
                                    <td><input type="radio" id="pok" name="pok" value="393" required /><br />#393 Piplup<br /><img src="/img/pkmn/normal/393.jpg" alt="pokemon" title="Piplup"></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="495" required /><br />#495 Snivy<br /><img src="/img/pkmn/normal/495.jpg" alt="pokemon" title="Shivy"></td>
                                    <td><input type="radio" id="pok" name="pok" value="498" required /><br />#498 Tepig<br /><img src="/img/pkmn/normal/498.jpg" alt="pokemon" title="Tepig"></td>
                                </tr>
                               <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="501" required /><br />#501 Oshawott<br /><img src="/img/pkmn/normal/501.jpg" alt="pokemon" title="Oshawott"></td>
                                    <td><input type="radio" id="pok" name="pok" value="650" required /><br />#650 Chespin<br /><img src="/img/pkmn/normal/650.jpg" alt="pokemon" title="Chespin"></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="653" required /><br />#653 Fennekin<br /><img src="/img/pkmn/normal/653.jpg" alt="pokemon" title="Fennekin"></td>
                                    <td><input type="radio" id="pok" name="pok" value="656" required /><br />#656 Froakie<br /><img src="/img/pkmn/normal/656.jpg" alt="pokemon" title="Froakie"></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="722" required /><br />#722 Rowlet<br /><img src="/img/pkmn/normal/722.jpg" alt="pokemon" title="Rowlet"><hr></td>
                                    <td><input type="radio" id="pok" name="pok" value="725" required /><br />#725 Litten<br /><img src="/img/pkmn/normal/725.jpg" alt="pokemon" title="Litten"><hr></td>
                                </tr>
                                 <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="728" required /><br />#728 Popplio<br /><img src="/img/pkmn/normal/728.jpg" alt="pokemon" title="Popplio"><hr></td>
                                    <td><input type="radio" id="pok" name="pok" value="810" required /><br />#810 Grookey<br /><img src="/img/pkmn/normal/810.jpg" alt="pokemon" title="Grookey"><hr></td>
                                </tr>
                                <tr align="center">
                                    <td><input type="radio" id="pok" name="pok" value="813" required /><br />#813 Scorbunny<br /><img src="/img/pkmn/normal/813.jpg" alt="pokemon" title="Scorbunny"><hr></td>
                                    <td><input type="radio" id="pok" name="pok" value="816" required /><br />#816 Sobble<br /><img src="/img/pkmn/normal/816.jpg" alt="pokemon" title="Sobble"><hr></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </form>
                </center>
            </td>
        </tr>
    </table>
</body>
</html>
<?php } ?>

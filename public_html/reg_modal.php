<?
    require_once ('ando/bsqldate/dbconsql.php');
    require_once ('ando/functions/game.functions.php');
    $time = time();
    AddMessage2Log($_POST);
    // Добавлена проверка на наличие в массиве соответствеющих значений
    if (isset($_POST) &&                            // пришли ли данные
        array_key_exists('name',$_POST) &&         // есть ли там логин
        array_key_exists('password',$_POST) &&          // есть ли там пароль
        array_key_exists('repeat-password',$_POST) &&   // есть ли там второй пароль
        array_key_exists('email',$_POST) &&          // есть ли там почта
        array_key_exists('floor',$_POST) &&           // указан ли пол
        array_key_exists('pok',$_POST) &&           // выран ли покемон
        is_string($_POST['name']) &&               // строка ли это
        is_string($_POST['password']) &&                // строка ли это
        is_string($_POST['repeat-password']) &&         // строка ли это
        is_string($_POST['email']) &&                // строка ли это
        is_string($_POST['floor']) &&                 // строка ли это
        is_string($_POST['pok'])                    // строка ли это
    ) {
        $name         = escapeMe($_POST['name']);       // чистим логин
        $password     = escapeMe($_POST['password']);        // чистим пароль
        $dbl_password = escapeMe($_POST['repeat-password']); // чистим второй пароль
        $mail         = escapeMe($_POST['email']);        // чистим почту
        $sex          = escapeMe($_POST['floor']);         // чистим пол
        $pok          = escapeMe($_POST['pok']);         // чистим покемона
        //if(preg_match('/\@(.*)/iu',$mail))
        // if ($_SESSION['captcha_keystring'] == $_POST['keystring']) {
        //     // wterh 4.05.19
        //     /*
        //         Дальнейшая обработка должна быть тут, в случае если условие срабатывает,
        //         и сообщение об ошибке в else, если нет
        //     */
        // }
        // else {
        //     echo "<script>alert('Код с картинки нужно вводить задом - наперед.');</script>";
        //     echo "<script>location.href='/reg.php';</script>";
        //     return;
        // }

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
                $date_reg = date("d.m.Y");
                if ($sex == "male") {
                    $avatars = 100;
                }
                else {
                    $avatars = 200;
                }
                $insert = $mysqli->query("INSERT INTO users(login, password, mail, sex, location, groups, avatars, date_reg,ip) VALUES ('".$name."', '".$password."','".$mail."','".$sex."',6,6,'".$avatars."','".$date_reg."','".$_SERVER["REMOTE_ADDR"]."') ");
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
	    if($pok == 728){ $har = mt_rand(22,22);}
	    if($pok == 810){ $har = mt_rand(12,12);}
	    if($pok == 813){ $har = mt_rand(11,11);}
	    if($pok == 816){ $har = mt_rand(22,22);} //Р
                //$har = rand(1,26); //Рандомный характер
                $poks = $mysqli->query("SELECT * FROM `base_pokemon` WHERE id = '{$pok}'")->fetch_assoc();
                //Вытаскиваем данные из покедекса
                $pok_name = $poks['name'];
                $user_id  = $array['id'];
                $atk_pok1 = $mysqli->query("SELECT atac_id FROM attack_learn WHERE `poke_base_id` = '".$pok."' and `atc_lvl` < '5 ' LIMIT 1")->fetch_assoc();
                $atk_pok2 = $mysqli->query("SELECT atac_id FROM attack_learn WHERE `poke_base_id` = '".$pok."' and `atc_lvl` < '5' and `atac_id` != '".$atk_pok1['atac_id']."' LIMIT 1")->fetch_assoc();
                $pp1      = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '".$atk_pok1['atac_id']."' LIMIT 1")->fetch_assoc();
                $pp2      = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '".$atk_pok2['atac_id']."' LIMIT 1")->fetch_assoc();

                $ins      = "INSERT INTO `user_pokemons`(`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`start_pok`,`start_pok_skob`,`type`,`gender`,`starts`,`owner`,`master`,`trade`,`exp_max`,`atk1`,`atk2`,`pp1`,`pp2`,`ev`) VALUES (".$user_id.",".$pok.",".$pok.",'".$pok_name."',".$har.",".$lvl.",'".$time."',1,1,'normal','".$gender."',1,".$user_id.",".$user_id.",'1','1000','".$atk_pok1['atac_id']."','".$atk_pok2['atac_id']."','".$pp1['atac_pp']."','".$pp2['atac_pp']."','6')";

                $mysqli->query($ins);
                $pok_query = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$user_id)->fetch_assoc();
                $hp = stats($pok_query['id'],'hp', $user_id);
                $mysqli->query("UPDATE `user_pokemons` SET `hp` = '".$hp."' WHERE `user_id` = '".$user_id."'");

                $mysqli->query("INSERT INTO user_items (user_id, item_id, count) VALUES ('".$user_id."', '1','10000') ");
                $mysqli->query("INSERT INTO user_items (user_id, item_id, count) VALUES ('".$user_id."', '2','1') ");
                $mysqli->query("INSERT INTO user_items (user_id, item_id, count) VALUES ('".$user_id."', '42','6') ");

                $_SESSION['user_id'] = $array['id'];
                setcookie('login',$array['login']);
                echo "<script>alert('Вы удачно зарегистрированы!');</script>";
                echo "<script>window.location.href='/game.php?fun=start';</script>";
            }
        }
    }
    unset($_SESSION['captcha_keystring']);
    ?>
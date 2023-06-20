<?php
if (isset($_POST['ava'])) {
    $ava = obTxt($_POST['ava']);
    if ($user['sex'] == "male") {
        if ($ava == 101 or $ava == 102 or $ava == 103 or $ava == 104 or $ava == 104 or $ava == 111133 or $ava == 105 or $ava == 106 or $ava == 107 or $ava == 108 or $ava == 109 or $ava == 110 or $ava == 111 or $ava == 112 or $ava == 113 or $ava == 114 or $ava == 115 or $ava == 116 or $ava == 117 or $ava == 118 or $ava == 119 or $ava == 120 or $ava == 121) {
        } else {
            $ava = 2;
        }

        if (item_isset(1, 1)) {
            //minus_item(5,500,$_SESSION['user_id']);
            $mysqli->query("UPDATE `users` SET `avatars` = '{$ava}' WHERE `id` = '{$_SESSION['user_id']}'");
            die('Аватар сменен!');
        } else {
            die('Недостаточно жемчуга!');
        }
    } else {
        if ($ava == 201 or $ava == 202 or $ava == 203 or $ava == 204 or $ava == 205 or $ava == 206 or $ava == 207 or $ava == 208 or $ava == 209 or $ava == 210 or $ava == 211 or $ava == 212 or $ava == 213 or $ava == 214 or $ava == 215) {
        } else {
            $ava = 1;
        }

        if (item_isset(1, 1)) {
            //minus_item(5,500,$_SESSION['user_id']);
            $mysqli->query("UPDATE `users` SET `avatars` = '{$ava}' WHERE `id` = '{$_SESSION['user_id']}'");
            die('Аватар сменен!');
        } else {
            die('Недостаточно жемчуга!');
        }
    }
} // 172 174 175 177 178 179 180 181 186 187
if (isset($_POST['avaex'])) {
    $avaex = obTxt($_POST['avaex']);
    if ($user['sex'] == "male") {
        if ($avaex == 301 or $avaex == 302 or $avaex == 303 or $avaex == 304 or $avaex == 305 or $avaex == 306 or $avaex == 307 or $avaex == 308 or $avaex == 309 or $avaex == 310 or $avaex == 311 or $avaex == 312 or $avaex == 313 or $avaex == 314 or $avaex == 315 or $avaex == 316 or $avaex == 317 or $avaex == 318 or $avaex == 319 or $avaex == 320 or $avaex == 321 or $avaex == 322 or $avaex == 323 or $avaex == 324 or $avaex == 325 or $avaex == 326 or $avaex == 327 or $avaex == 328 or $avaex == 329 or $avaex == 330 or $avaex == 331 or $avaex == 332 or $avaex == 333) {
        } else {
            $avaex = 2;
        }

        if (item_isset(1, 1)) {
            //minus_item(10,500,$_SESSION['user_id']);
            $mysqli->query("UPDATE `users` SET `avatars` = '{$avaex}' WHERE `id` = '{$_SESSION['user_id']}'");
            die('Аватар сменен!');
        } else {
            die('Недостаточно жемчуга!');
        }
    } // 173 176 182 183 184 214 215 218 219 221
    else {
        if ($avaex == 401 or $avaex == 402 or $avaex == 403 or $avaex == 404 or $avaex == 405 or $avaex == 406 or $avaex == 407 or $avaex == 408 or $avaex == 409 or $avaex == 410 or $avaex == 411 or $avaex == 412 or $avaex == 413 or $avaex == 414 or $avaex == 415 or $avaex == 416 or $avaex == 417 or $avaex == 418 or $avaex == 419 or $avaex == 420 or $avaex == 421 or $avaex == 422 or $avaex == 423 or $avaex == 424 or $avaex == 425 or $avaex == 426 or $avaex == 427 or $avaex == 428 or $avaex == 429 or $avaex == 430 or $avaex == 431 or $avaex == 432 or $avaex == 433) {
        } else {
            $avaex = 1;
        }

        if (item_isset(1, 1)) {
            //minus_item(10,500,$_SESSION['user_id']);
            $mysqli->query("UPDATE `users` SET `avatars` = '{$avaex}' WHERE `id` = '{$_SESSION['user_id']}'");
            die('Аватар сменен!');
        } else {
            die('Недостаточно жемчуга!');
        }
    }
}
if (isset($_POST['about'])) {
    $about = obTxt($_POST['about']);
    $update = $mysqli->query("UPDATE users SET about = '{$about}' WHERE id = '{$_SESSION['user_id']}'");
}
/*elseif (isset($_POST['leavebattle'])) {
    if($user['status'] == "battle"){
    $mysqli->query("UPDATE users SET status = 'free' WHERE id = '{$_SESSION['user_id']}'");
    $mysqli->query("DELETE FROM `battle` WHERE `user1` = '{$user_id}' and `user2` = '0'");
    $mysqli->query("UPDATE users SET reload = '1' WHERE id = '{$_SESSION['user_id']}'");
    die('Вы свободны!');
   }else{
    die('Вы не в бою!');
  }
}*/ elseif (isset($_POST['color'])) {
    $value = obr_chis($_POST['color']);
    $color = setTextColor($value);
    $update = $mysqli->query("UPDATE users SET color = '{$color}' WHERE id = '{$_SESSION['user_id']}'");
} elseif (isset($_POST['pass0'])) {
    $passOld = obTxt($_POST['pass0']);
    $passOld = md5($passOld);
    $passNew = obTxt($_POST['pass1']);
    $passNew = md5($passNew);
    $passNew2 = obTxt($_POST['pass2']);
    $passNew2 = md5($passNew2);
    if ($user['password'] != $passOld) {
        die('<center>Неверный пароль!</center>');
    } elseif ($passNew != $passNew2) {
        die('<center>Пароли не совпадают!</center>');
    } else {
        $update = $mysqli->query("UPDATE users SET password = '{$passNew}' WHERE id = '{$_SESSION['user_id']}'");
        die('Пароль успешно изменён!');
    }
} elseif (isset($_POST['pok']) and $user['newstart'] == 0 and $user_id == 1573 and $user_id == 1570) {
    $pok = obTxt($_POST['pok']);
    if ($pok == 1 or $pok == 4 or $pok == 7 or $pok == 152 or $pok == 155 or $pok == 158 or $pok == 252 or $pok == 255 or $pok == 258 or $pok == 387 or $pok == 390 or $pok == 393 or $pok == 495 or $pok == 498 or $pok == 501) {
    } else {
        $pok = 152;
    }
    $mysqli->query("DELETE FROM `user_pokemons` WHERE `starts` = '1' and `user_id` = '{$user_id}'");
    $lvl = '3';
    //Уровень по умолчанию 5
    $genders = mt_rand(1, 2);
    //Рандомный пол
    if ($genders == 1) {
        $gender = 'male';
    } else {
        $gender = 'female';
    }
    $time = time();
    $har = rand(1, 26);
    //Рандомный характер
    $poks = $mysqli->query("SELECT * FROM `base_pokemon` WHERE id = '{$pok}'")->fetch_assoc();
    //Вытаскиваем данные из покедекса
    $pok_name = $poks['name'];
    $ins = "INSERT INTO `user_pokemons`(`user_id`,`basenum`,`name`,`character`,`lvl`,`date_get`,`start_pok`,`type`,`gender`,`starts`,`owner`,`master`,`active`) VALUES ('{$user_id}','{$pok}','{$pok_name}','{$har}','{$lvl}','{$time}',0,'normal','{$gender}',1,'{$user_id}','{$user_id}',0)";
    $mysqli->query($ins);
    baseAttackPok($mysqli->insert_id);
    $mysqli->query("UPDATE `users` SET `newstart` = '1' WHERE `id` = '{$user_id}'");
    echo "<script>alert('Вы сменили покемона!'); window.location.href='game.php?fun=profile';</script>";
    return;
}
if (isset($_POST['userj']) and ($user_id == 1573 or $user_id == 1570)) {
    $userj = escapeString($_POST['userj']);
    $iUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$userj}'")->fetch_assoc();
    if ($iUS) {
        plus_item($_POST['jam'], 500, $iUS['id']);
        $text = "Вам начислен жемчуг! Приятной игры!";
        $date = get_last_online(time());
        $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','" . $iUS['id'] . "','" . $text . "','Жемчуг','" . $date . "')");
        $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('" . $iUS['id'] . "','info','Pearljam','Вам начислен жемчуг!','false') ");
        echo "<script>alert('Вы успешно выдали жемчуг!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['usert']) and ($user_id == 1573 or $user_id == 1570)) {
    $usert = escapeString($_POST['usert']);
    $iUS3 = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$usert}'")->fetch_assoc();
    if ($iUS3) {
        plus_item($_POST['trn'], "330", $iUS3['id']);
        echo "<script>alert('Вы успешно выдали Набор тренировки!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['userit']) and ($user_id == 1573 or $user_id == 1570)) {
    $userit  = escapeString($_POST['userit']);
    $userit1 = escapeString($_POST['userit1']);
    $iUS7 = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$userit}'")->fetch_assoc();
    if (!is_numeric($userit1)) {
        $iUS71 = $mysqli->query("SELECT id FROM `base_items` WHERE `name` = '{$userit1}'")->fetch_assoc();
    } else {
        $iUS71 = $mysqli->query("SELECT id FROM `base_items` WHERE `id` = '{$userit1}'")->fetch_assoc();
    }
    if ($iUS7 and $iUS71) {
        if ($iUS71['id'] != '999') {
            plus_item($_POST['itmb'], $iUS71['id'], $iUS7['id']);
            echo "<script>alert('Вы успешно выдали Предмет!'); window.location.href='game.php?fun=profile';</script>";
            return;
        } else {
            $pok = escapeString($_POST['itmb']);
            $poks = $mysqli->query("SELECT * FROM `base_pokemon` WHERE id = '{$pok}'")->fetch_assoc();
            if ($poks) {
                $time = time() + 7 * 3600 * 24;
                $mysqli->query("INSERT INTO user_items (user_id , item_id , count , egg , pok , shiny , hp , atk , def , speed , satk , sdef , reborn) VALUES ('" . $iUS7['id'] . "','999','1','1','" . $pok . "','0','" . rand(25, 30) . "','" . rand(25, 30) . "','" . rand(25, 30) . "','" . rand(25, 30) . "','" . rand(25, 30) . "','" . rand(25, 30) . "','" . $time . "')");
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('" . $iUS7['id'] . "','info','Новый предмет','Вам выдали Яйцо с покемоном!','false') ");
                echo "<script>alert('Вы успешно выдали Яйцо с покемоном с id=" . $pok . "!'); window.location.href='game.php?fun=profile';</script>";
                return;
            }
        }
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['userp']) and ($user_id == 1573 or $user_id == 1570)) {
    $userp = escapeString($_POST['userp']);
    $iUS2 = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$userp}'")->fetch_assoc();
    if ($iUS2) {
        newPokemon($_POST['pokem'], $iUS2['id']);
        echo "<script>alert('Вы успешно выдали покемона!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['userptest']) and ($user_id == 1570 or $user_id == 1573)) {
    $userptest = escapeString($_POST['userptest']);
    $iUS2 = $mysqli->query("SELECT id FROM `users` WHERE `id` = '31'")->fetch_assoc();
    if ($iUS2) {
        newPokemontest($_POST['pokemtest'], $iUS2['id']);
        echo "<script>alert('Вы успешно выдали покемона!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['userm']) and ($user_id == 1573 or $user_id == 1570)) {
    $userm = escapeString($_POST['userm']);
    $iUS1 = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$userm}'")->fetch_assoc();
    if ($iUS1) {
        $date_s = get_last_online(time());
        $text = "Вам выписан штраф на сумму " . $_POST['mon'] . " кр.";
        $user_to = $iUS1['id'];
        $subject = 'Штраф';
        $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('" . $_SESSION['user_id'] . "','" . $user_to . "','" . $text . "','" . $subject . "','" . $date_s . "')");
        $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('" . $user_to . "','info','Новое сообщение','Вам пришло новое личное сообщение!','false') ");
        minus_item($_POST['mon'], 1, $iUS1['id']);
        $date_s = get_last_online(time());
        echo "<script>alert('Штраф успешно выписан!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
    $iUS4 = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$userm}-")->fetch_assoc();
    if ($iUS4) {
        plus_item($_POST['mon'], 1, $iUS4['id']);
        echo "<script>alert('Штраф успешно выписан!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['usermon']) and ($user_id == 1573 or $user_id == 1570)) {
    $usermon = escapeString($_POST['usermon']);
    $iUS5 = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$usermon}'")->fetch_assoc();
    if ($iUS5) {
        plus_item($_POST['mon'], 1, $iUS5['id']);
        echo "<script>alert('Вы успешно выдали кредиты!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useradd']) and ($user_id == 1573 or $user_id == 1570)) {
    $useradd = escapeString($_POST['useradd']);
    $iUS10 = $mysqli->query("SELECT id FROM `location` WHERE `id` = '{$useradd}'")->fetch_assoc();
    if ($iUS10) {
        newPokemon($_POST['add'], 6, $iUS9['id']);
        echo "<script>alert('Вы успешно добавили покемона!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraw']) and (($user_id == 1573))) {
    $aw = escapeString($_POST['useraw']);
    $iUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aw}'")->fetch_assoc();
    if ($iUS) {
        if ($user_id == 1570 or $user_id == 1573) {
            $img = 1075;
            $nam = "Значок Тьмы";
            $des = "Значок, который вручается тренеру, победившему лидера стадиона.";
        }
        if ($user_id == 1570 or $user_id == 1573) {
            $img = 1076;
            $nam = "Значок Стали";
            $des = "Значок, который вручается тренеру, победившему лидера стадиона.";
        }
        if ($user_id == 1570 or $user_id == 1573) {
            $img = 1070;
            $nam = "Значок Дождя";
            $des = "Значок, который вручается тренеру, победившему лидера стадиона.";
        }
        if ($user_id == 1570 or $user_id == 1573) {
            $img = 1071;
            $nam = "Значок Небес";
            $des = "Значок, который вручается тренеру, победившему лидера стадиона.";
        }
        if ($user_id == 1570 or $user_id == 1573) {
            $img = 1073;
            $nam = "Значок Иллюзий";
            $des = "Значок, который вручается тренеру, победившему лидера стадиона.";
        }
        if ($user_id == 1570 or $user_id == 1573) {
            $img = 1072;
            $nam = "Значок Земли";
            $des = "Значок, который вручается тренеру, победившему лидера стадиона.";
        }
        /*if ($user_id == 1570) {
            $img = 209;
            $nam = "Значок Жизни";
            $des = "Значок, который вручается тренеру, победившему лидера стадиона.";
        }
        if ($user_id == 1570) {
            $img = 212;
            $nam = "Значок нормального стадиона";
            $des = "Значок, который вручается тренеру, победившему лидера стадиона.";
        }*/
        if (($user_id == 1573) or ($user_id == 1570)) {
            $img = 316;
            $nam = "Черная метка";
            $des = "Отличительный знак людей побывавших в тюрьме,будьте осторожны с такими людьми при обмене.";
        }
        if (($user_id == 1570 or $user_id == 1573)) {
            $img = 805;
            $nam = "Серебряная медаль";
            $des = "Выдаётся тренеру который занял второе место на официальном турнире для Неопытных или Опытных тренеров от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iUS['id']}','{$img}','{$nam}','{$des}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraaaw']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraaaw']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 804;
            $namm = "Бронзовая медаль";
            $dess = "Выдаётся тренеру который занял третье место на официальном турнире для Неопытных или Опытных тренеров от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraaw']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraaw']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 806;
            $namm = "Золотая медаль";
            $dess = "Выдаётся тренеру который занял первое место на официальном турнире для Неопытных или Опытных тренеров от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_newb_gold']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_newb_gold']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 803;
            $namm = "Золотая медаль";
            $dess = "Выдаётся тренеру который занял первое место на официальном турнире для Новичков от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_newb_silver']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_newb_silver']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 802;
            $namm = "Серебряная медаль";
            $dess = "Выдаётся тренеру который занял второе место на официальном турнире для Новичков от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_newb_bronz']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_newb_bronz']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 801;
            $namm = "Бронзовая медаль";
            $dess = "Выдаётся тренеру который занял третье место на официальном турнире для Новичков от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_elit_gold']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_elit_gold']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 809;
            $namm = "Золотая медаль";
            $dess = "Выдаётся тренеру который занял первое место на официальном турнире для Элитных тренеров от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_elit_silver']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_elit_silver']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 808;
            $namm = "Серебряная медаль";
            $dess = "Выдаётся тренеру который занял второе место на официальном турнире для Элитных тренеров от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_elit_bronz']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_elit_bronz']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 807;
            $namm = "Бронзовая медаль";
            $dess = "Выдаётся тренеру который занял третье место на официальном турнире для Элитных тренеров от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_event_gold']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_event_gold']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 812;
            $namm = "Золотая медаль";
            $dess = "Выдаётся тренеру который занял первое место в открытом или праздничном турнире от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_event_silver']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_event_silver']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 811;
            $namm = "Серебряная медаль";
            $dess = "Выдаётся тренеру который занял второе место в открытом или праздничном турнире от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
if (isset($_POST['useraward_event_bronz']) and (($user_id == 1573) or ($user_id == 1573))) {
    $aaw = obTxt($_POST['useraward_event_bronz']);
    $iaUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aaw}'")->fetch_assoc();
    if ($iaUS) {
        if (($user_id == 1570 or $user_id == 1573)) {
            $imgg = 810;
            $namm = "Бронзовая медаль";
            $dess = "Выдаётся тренеру который занял третье место в открытом или праздничном турнире от администрации.";
        }
        $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iaUS['id']}','{$imgg}','{$namm}','{$dess}') ");
        echo "<script>alert('Вы успешно выдали значок!'); window.location.href='game.php?fun=profile';</script>";
        return;
    } else {
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=profile';</script>";
        return;
    }
}
?>
<table width='100%'>
    <tr>
        <td width=220 valign='top'>
            <img src='img/avas/<?= $user['avatars'];
                                ?>.png' width='215' height='410' alt='' border='0' align='left'>
        </td>
        <td valign='top'>
            <span style='font-weight:bold; font-size:16px; color:<?= colorsUsers(infUsr($_SESSION['user_id'], "groups")) ?>;'><?= infUsr($_SESSION['user_id'], "login") ?></span>
            <?php if (infUsr($_SESSION['user_id'], "online") == 1) {
                $color = '#008000';
                $online = 'онлайн';
            } else {
                $color = '#A60000';
                $online = 'оффлайн';
            }
            ?>
            <br>
            <font color="<?= $color;
                            ?>"><sup><?= $online;
                                        ?></sup></font>
            <?php
            $poks = $mysqli->query("SELECT * FROM user_pokemons WHERE active = 1 AND user_id = '{$_SESSION['user_id']}'");
            $count_pok = $poks->num_rows;
            ?>
            <br>
            <?php while ($pok = $poks->fetch_assoc()) {
                if ($pok['hp'] > 0) {
                    $type = 'slot';
                } elseif ($pok['hp'] == 0) {
                    $type = 'slot_i';
                }
            ?>
                <img src='img/cond/<?= $type ?>.png' class='slot'>
            <?php
            }
            $count = 6 - $count_pok;
            for ($i = 0; $i < $count; $i++) {
            ?>
                <img src='img/cond/slot_n.png' class='slot'>
            <?php
            }
            ?>
            <?php
            $groups = infUsr($_SESSION['user_id'], "groups");
            if ($user['id'] == 1573 or $user['id'] == 1570) {
                $rang = 'Администрация Лиги';
            } elseif ($groups == 6) {
                if (infUsr($_SESSION['user_id'], "btl_count") == 0) {
                    $prc = 0;
                } else {
                    $prc = round((infUsr($_SESSION['user_id'], "win") / infUsr($_SESSION['user_id'], "btl_count")) * 100);
                }
                $rang = population($prc, infUsr($_SESSION['user_id'], "population")) . ' ' . reputation($prc, infUsr($_SESSION['user_id'], "population"));
            } else {
                if (infUsr($user_id, "btl_count") == 0) {
                    $prc = 0;
                } else {
                    $prc = round((infUsr($_SESSION['user_id'], "win") / infUsr($_SESSION['user_id'], "btl_count")) * 100);
                }
                $rang = '<b>' . textGroup(infUsr($_SESSION['user_id'], "groups")) . ',</b> ' . population($prc, infUsr($_SESSION['user_id'], "population")) . ' ' . reputation($prc, infUsr($_SESSION['user_id'], "population"));
            }
            $check = $mysqli->query("SELECT * FROM `user_status` WHERE `user_id` = '" . $_SESSION['user_id'] . "' ORDER BY id DESC")->fetch_assoc();
            $tmneed = $check['date'] - time();
            $min = $tmneed / 60;
            ?>
            <br>
            <font color="<?= colorsUsers(infUsr($_SESSION['user_id'], "groups")) ?>"></font>
            <b><?= $rang ?></b>
            <br>Покедекс: <?= $user['count_pok'] ?>/809

            <br>В Лиге с <?= $user['date_reg'] ?>.
            <br>Послед. вход: <?= get_last_online($user['online_time']) ?>
            <br>
            <form name='user' action='game.php?fun=profile' method='post'>
                О себе: <input name='about' type='text' value='<?= $user['about'] ?>' size=100><input type='submit' value='OK'>
            </form>
            <?php
            if ($user_id == 1573 or $user_id == 1570) {
            ?> <a href=https://claimbe.ru/game.php?fun=police>
                    <font color='red' size='5'>Просмотреть логи. </font>
                </a><br>
            <?php
            }
            if ($user_id == 1573 or $user_id == 1570) {
            ?> <br>
                <form name='jam' action='game.php?fun=profile' method='post'>
                    Выдать жемчуг: <input name='userj' type='text' size=15> <input name='jam' type='text' value='1' size=5><input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573 or $user_id == 1570) {
            ?> <br>
                <form name='pokem' action='game.php?fun=profile' method='post'>
                    Выдать pokemon: <input name='userp' type='text' size=15> <input name='pokem' type='text' value='1' size=5><input type='submit' value='OK'>
                </form>
            <?php
            }
            //if ($user_id == 31) {
            ?>
            <!--<br>
                <form name='pokemtest' action='game.php?fun=profile' method='post'>
                    Выдать pokemon: <input name='userptest' type='8' size=15> <input name='pokemtest' type='text' value='1' size=5><input type='submit' value='OK'>
                </form>-->
            <?php
            //}
            if ($user_id == 1573 or $user_id == 1570) {
            ?> <br>
                <form name='trn' action='game.php?fun=profile' method='post'>
                    Выдать набор тренировки: <input name='usert' type='text' size=15> <input name='trn' type='text' value='1' size=5><input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573 or $user_id == 1570) {
            ?> <br>
                <form name='itmb' action='game.php?fun=profile' method='post'>
                    Выдать предмет: <input name='userit' type='text' value='Логин' size=15> <input name='userit1' type='text' value='ID или Название' size=15> <input name='itmb' type='text' value='Кол-во' size=5><input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573 or $user_id == 1570) {
            ?> <br>
                <form name='mon' action='game.php?fun=profile' method='post'>
                    Выписать штраф: <input name='userm' type='text' size=15> <input name='mon' type='number' value='1' size=5 min="1"><input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573 or $user_id == 1570) {
            ?> <br>
                <form name='trn' action='game.php?fun=profile' method='post'>
                    Выдать кредиты: <input name='usermon' type='text' size=15> <input name="mon" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573 or $user_id == 1570) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать значок: <input name='useraw' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            /*if ($user_id == 1573 or $user['groups'] == 1) {
                ?> <br><form name='award' action='game.php?fun=profile' method='post'>
                    Выдать черную метку: <input name='useraw' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
                <?
            }*/
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать золотую медаль Неоп и Оп: <input name='useraaw' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать серебряную медаль Неоп и Оп: <input name='useraw' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать бронзовую медаль Неоп и Оп: <input name='useraaaw' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать золотую медаль Новички: <input name='useraward_newb_gold' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать серебряную медаль Новички: <input name='useraward_newb_silver' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать бронзовую медаль Новички: <input name='useraward_newb_bronz' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать золотую медаль Элит: <input name='useraward_elit_gold' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать серебряную медаль Элит: <input name='useraward_elit_silver' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать бронзовую медаль Элит: <input name='useraward_elit_bronz' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать золотую медаль Празд: <input name='useraward_event_gold' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать серебряную медаль Празд: <input name='useraward_event_silver' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            if ($user_id == 1573) {
            ?> <br>
                <form name='award' action='game.php?fun=profile' method='post'>
                    Выдать бронзовую медаль Празд: <input name='useraward_event_bronz' placeholder="Логин" type='text' size=15> <input type='submit' value='OK'>
                </form>
            <?php
            }
            ?>
            <form name='user' action='game.php?fun=profile' method='post'>
                <P ID='txt'>Цвет сообщений в чате:&nbsp;
                    <select size='1' name='color'>
                        <option value='1' style='color:#000000' SELECTED>Черный</option>
                        <option value='2' style='color:#D20000'>Красный</option>
                        <option value='3' style='color:#429146'>Зеленый</option>
                        <option value='4' style='color:#747474'>Серый</option>
                        <option value='5' style='color:#B47516'>Оранжевый</option>
                        <option value='6' style='color:#131771'>Темно Синий</option>
                        <option value='7' style='color:#E40797'>Розовый</option>
                    </select> <input type='submit' value='OK'>
            </form>
            <!-- <br><form name='user' action='game.php?fun=profile' method='post'>
                Если застрял в бою: <input name='leavebattle' type='submit' value='OK'> -->
            <!-- </form> -->
            <br>&nbsp;<br>
            <!-- <br><b>Погресс батлпасса:</b> -->
            <br>&nbsp;<br>
            <?
            $progessPoints = 23;

            ?>
            <!-- <div style="width: 600px; height: 15px; background: grey;">
                <div style="width: <?//= $progessPoints ?>%; height: 100%; background: lightgreen;"></div>
            </div> -->
            <br>&nbsp;<br>
            <!--  <big><b><a href='game.php?fun=profile&chava=1#change'>Сменить аватар</a ></b></big> -->
            <br>&nbsp;<br>
            <!-- <big><b><a href="/game.php?fun=transfer">Перенос покемонов</a></b></big><br> -->
            <?php
            if (($user_id == 1573) or ($user_id == 1570)) {
            ?>
                <big><b><a href="/game.php?fun=police">Полицейский участок</a></b></big><br>
                <big><b><a href="/game.php?fun=pokRedact">pokRedact</a></b></big><br>
            
                <big><b><a href="/game.php?fun=pokAtk">pokAtk</a></b></big><br>
                <big><b><a href="/game.php?fun=panelpok">panelpok</a></b></big><br>
                
                
            <?php
            } ?>
            <big><b><a href='game.php?fun=profile&chpass=1'>Сменить пароль</a></b></big><br>
            <big><b><a href='game.php?fun=profile&newava=1'>Сменить аватар</a></b></big><br>
            <big><b><a href='game.php?fun=profile&newavaex=1'>Сменить на особенный аватар</a></b></big><br>
            <?php if ($user['newstart'] == 0 and $user_id == 1570 or $user_id == 1573) {
            ?> <big><b><a href='game.php?fun=profile&newstart=1'>Сменить стартового покемона</a></b></big> <?php
                                                                                                        }
                                                                                                            ?>
            <?php if (isset($_GET['newstart'])) {
            ?>
                <form name="а1" action="" method="POST">
                    <center><input type='submit' value='СМЕНИТЬ'></center>
    <tr align="center">
        <td><input type="radio" id="pok" name="pok" value="1" checked required /><br />#001 Bulbasaur<br /><img src="img/pkmna/001.gif"></td> <!-- Бульбазавр -->
        <td><input type="radio" id="pok" name="pok" value="4" required /><br />#004 Charmander<br /><img src="img/pkmna/004.gif"></td> <!-- Чармандер -->
        <td><input type="radio" id="pok" name="pok" value="7" required /><br />#007 Squirtle<br /><img src="img/pkmna/007.gif"></td> <!-- Сквиртл -->
    </tr>
    <tr align="center">
        <td><input type="radio" id="pok" name="pok" value="152" required /><br />#152 Chikorita<br /><img src="img/pkmna/152.gif"></td>
        <td><input type="radio" id="pok" name="pok" value="155" required /><br />#155 Cyndaquil<br /><img src="img/pkmna/155.gif"></td>
        <td><input type="radio" id="pok" name="pok" value="158" required /><br />#158 Totodile<br /><img src="img/pkmna/158.gif"></td>
    </tr>
    <tr align="center">
        <td><input type="radio" id="pok" name="pok" value="252" required /><br />#252 Treecko<br /><img src="img/pkmna/252.gif"></td>
        <td><input type="radio" id="pok" name="pok" value="255" required /><br />#255 Torchic<br /><img src="img/pkmna/255.gif"></td>
        <td><input type="radio" id="pok" name="pok" value="258" required /><br />#258 Mudkip<br /><img src="img/pkmna/258.gif"></td>
    </tr>
    <tr align="center">
        <td><input type="radio" id="pok" name="pok" value="387" required /><br />#387 Turtwig<br /><img src="img/pkmna/387.gif"></td>
        <td><input type="radio" id="pok" name="pok" value="390" required /><br />#390 Chimchar<br /><img src="img/pkmna/390.gif"></td>
        <td><input type="radio" id="pok" name="pok" value="393" required /><br />#393 Piplup<br /><img src="img/pkmna/393.gif"></td>
    </tr>
    <tr align="center">
        <td><input type="radio" id="pok" name="pok" value="495" required /><br />#495 Snivy<br /><img src="img/pkmna/495.gif"></td>
        <td><input type="radio" id="pok" name="pok" value="498" required /><br />#498 Tepig<br /><img src="img/pkmna/498.gif"></td>
        <td><input type="radio" id="pok" name="pok" value="501" required /><br />#501 Oshawott<br /><img src="img/pkmna/501.gif"></td>
    </tr><br>

    </form>

<?php
            }
?>
<?php if (isset($_GET['chpass'])) {
?>
    <form name='user' action='game.php?fun=profile&chpass=1' method='post'>
        <table class='nonBorder' id='txt'>
            <tr>
                <td>Старый пароль:</td>
                <td><input name='pass0' type='password' required></td>
            </tr>
            <tr>
                <td>Новый пароль:</td>
                <td><input name='pass1' type='password' required></td>
            </tr>
            <tr>
                <td>Новый пароль (повтор):</td>
                <td><input name='pass2' type='password' required></td>
            </tr>
        </table>
        <input type='submit' onclick="user.submit" value='Сохранить'></CENTER>
    </form>
<?php
}
?>
<?php if (isset($_GET['newava'])) {
?>
    <form action="" method="POST">
        <center><b>Стоимость смена аватара - бесплатно.</b></center>
        <table class='nonBorder' id='txt'>
            <?php if ($user['sex'] == "male") {
            ?>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="101" checked required /><br /> <img src="img/avas/101.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="102" required /><br /> <img src="img/avas/102.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="103" required /><br /><br /> <img src="img/avas/103.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="104" /><br /> <img src="img/avas/104.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="105" required /><br /> <img src="img/avas/105.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="106" required /><br /><br /> <img src="img/avas/106.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="107" /><br /> <img src="img/avas/107.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="108" 1required /><br /> <img src="img/avas/108.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="109" required /><br /><br /> <img src="img/avas/109.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="110" /><br /> <img src="img/avas/110.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="111" required /><br /> <img src="img/avas/111.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="112" required /><br /><br /> <img src="img/avas/112.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="113" /><br /> <img src="img/avas/113.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="114" required /><br /> <img src="img/avas/114.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="115" required /><br /><br /> <img src="img/avas/115.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="116" /><br /> <img src="img/avas/116.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="117" required /><br /> <img src="img/avas/117.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="118" required /><br /><br /> <img src="img/avas/118.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="119" /><br /> <img src="img/avas/119.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="120" required /><br /> <img src="img/avas/120.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="121" required /><br /><br /> <img src="img/avas/121.png"></td>
                </tr>
            <?php
            } else {
            ?>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="201" checked required /><br /> <img src="img/avas/201.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="202" required /><br /> <img src="img/avas/202.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="203" required /><br /><br /> <img src="img/avas/204.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="205" /><br /> <img src="img/avas/205.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="206" required /><br /> <img src="img/avas/206.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="207" required /><br /><br /> <img src="img/avas/207.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="208" /><br /> <img src="img/avas/208.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="209" required /><br /> <img src="img/avas/209.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="210" required /><br /><br /> <img src="img/avas/210.png"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="ava" name="ava" value="211" /><br /> <img src="img/avas/211.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="213" required /><br /><br /> <img src="img/avas/213.png"></td>
                    <td><input type="radio" id="ava" name="ava" value="215" required /><br /> <img src="img/avas/215.png"></td>
                </tr>

            <?php
            }
            ?>
        </table>
        <input type='submit' onclick="user.submit" value='Сохранить'></CENTER>
    </form>
<?php
}
?>
<?php if (isset($_GET['newavaex'])) { //172 174 175 177 178 179 180 181 186 187
?>
    <form action="" method="POST">
        <center><b>Стоимость смена аватара - бесплатно.</b></center>
        <table class='nonBorder' id='txt'>
            <?php if ($user['sex'] == "male") {
            ?>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="301" checked required /><br /> <img src="img/avas/301.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="302" required /><br /> <img src="img/avas/302.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="303" required /><br /><br /> <img src="img/avas/303.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="304" /><br /> <img src="img/avas/304.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="305" required /><br /> <img src="img/avas/305.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="306" required /><br /><br /> <img src="img/avas/306.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="307" /><br /> <img src="img/avas/307.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="308" required /><br /> <img src="img/avas/308.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="309" required /><br /><br /> <img src="img/avas/309.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="310" /><br /> <img src="img/avas/310.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="311" required /><br /><br /> <img src="img/avas/311.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="312" required /><br /><br /> <img src="img/avas/312.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="313" /><br /> <img src="img/avas/313.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="314" required /><br /><br /> <img src="img/avas/314.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="315" required /><br /><br /> <img src="img/avas/315.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="316" /><br /> <img src="img/avas/316.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="317" required /><br /><br /> <img src="img/avas/317.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="318" required /><br /><br /> <img src="img/avas/318.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="319" /><br /> <img src="img/avas/319.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="320" required /><br /><br /> <img src="img/avas/320.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="321" required /><br /><br /> <img src="img/avas/321.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="322" /><br /> <img src="img/avas/322.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="323" required /><br /><br /> <img src="img/avas/323.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="324" required /><br /><br /> <img src="img/avas/324.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="325" /><br /> <img src="img/avas/325.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="326" required /><br /><br /> <img src="img/avas/326.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="327" required /><br /><br /> <img src="img/avas/327.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="328" /><br /> <img src="img/avas/328.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="329" required /><br /><br /> <img src="img/avas/329.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="330" required /><br /><br /> <img src="img/avas/330.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="331" /><br /> <img src="img/avas/331.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="332" required /><br /><br /> <img src="img/avas/332.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="333" required /><br /><br /> <img src="img/avas/333.png" width="215" height="410"></td>
                </tr>
            <?php
            } else { // 173 176 182 183 184 214 215 218 219 221
            ?>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="401" checked required /><br /> <img src="img/avas/401.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="402" required /><br /> <img src="img/avas/402.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="403" required /><br /><br /> <img src="img/avas/403.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="404" /><br /> <img src="img/avas/404.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="405" required /><br /> <img src="img/avas/405.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="406" required /><br /><br /> <img src="img/avas/406.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="407" /><br /> <img src="img/avas/407.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="408" required /><br /> <img src="img/avas/408.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="409" required /><br /><br /> <img src="img/avas/409.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="410" /><br /> <img src="img/avas/410.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="411" required /><br /> <img src="img/avas/411.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="412" required /><br /><br /> <img src="img/avas/412.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="413" /><br /> <img src="img/avas/413.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="414" required /><br /> <img src="img/avas/414.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="415" required /><br /><br /> <img src="img/avas/415.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="416" /><br /> <img src="img/avas/416.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="417" required /><br /> <img src="img/avas/417.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="418" required /><br /><br /> <img src="img/avas/418.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="419" /><br /> <img src="img/avas/419.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="420" required /><br /> <img src="img/avas/420.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="421" required /><br /><br /> <img src="img/avas/421.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="422" /><br /> <img src="img/avas/422.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="423" required /><br /> <img src="img/avas/423.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="424" required /><br /><br /> <img src="img/avas/424.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="425" /><br /> <img src="img/avas/425.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="426" required /><br /> <img src="img/avas/426.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="427" required /><br /><br /> <img src="img/avas/427.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="428" /><br /> <img src="img/avas/428.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="429" required /><br /> <img src="img/avas/429.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="430" required /><br /><br /> <img src="img/avas/430.png" width="215" height="410"></td>
                </tr>
                <tr align="center">
                    <td><input type="radio" id="avaex" name="avaex" value="431" /><br /> <img src="img/avas/431.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="432" required /><br /> <img src="img/avas/432.png" width="215" height="410"></td>
                    <td><input type="radio" id="avaex" name="avaex" value="433" required /><br /><br /> <img src="img/avas/433.png" width="215" height="410"></td>
                </tr>

            <?php
            }
            ?>
        </table>
        <input type='submit' onclick="user.submit" value='Сохранить'></CENTER>
    </form>
<?php
}
?>
</td>
</tr>
</table>
<HR>
<table width="100%">
    <tr>
        <td align="right" width=200>
            <b><?= $_SERVER['HTTP_HOST'] ?> || admin@<?= $_SERVER['HTTP_HOST'] ?></b><br>
            © 2009-<?= date('Y') ?>
        </td>
    <tr>
</table>
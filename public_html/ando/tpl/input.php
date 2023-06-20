<?php
if (array_key_exists('gc',$_GET)) { // проверка wterh
    $gc = obr_chis($_GET['gc']);
    if ($gc == '1') {
        $a = '0';
    } else {
        $a = '1';
    }
    $mysqli->query("UPDATE users SET getBattle = ".$a." WHERE id = ".$_SESSION['user_id']);
    echo "<script>parent._input.location='/game.php?fun=m_input&map=1';</script>";
} elseif (array_key_exists('fc',$_GET)) { // проверка wterh
    $gc = obr_chis($_GET['fc']);
    if ($gc == '1') {
        $a = '0';
    } else {
        $a = '1';
    }
    $mysqli->query("UPDATE users SET lookBattle = ".$a." WHERE id = ".$_SESSION['user_id']);
    echo "<script>parent._input.location='/game.php?fun=m_input&map=1';</script>";
} elseif (array_key_exists('telep',$_GET)) { // проверка wterh
    $region = $mysqli->query('SELECT region FROM base_location WHERE id = '.$user['location'])->fetch_assoc();
    if ($region['region'] == 1 and (int)$user['location'] !== 2 and (int)$user['location'] !== 10 and (int)$user['location'] !== 521) {
        $mysqli->query("UPDATE users SET location = 1 WHERE id = ".$_SESSION['user_id']);
    }
    echo "<script>parent.frames._location.location.reload();</script>";
}
if (array_key_exists('hunt',$_GET)) { // проверка wterh
    if ($user['hunt'] == 0) {
        if(time() < $user['timepok']){
            return;
        }
        $rpk = time()+rand(5,16);
        $mysqli->query("UPDATE users SET `hunt` = 1, `timepok`='$rpk' WHERE id = ".$_SESSION['user_id']);

    } else {
        $mysqli->query("UPDATE users SET hunt = 0 WHERE id = ".$_SESSION['user_id']);
    }
    echo "<SCRIPT>location.href='game.php?fun=m_input';</SCRIPT>";
}
if (array_key_exists('txt',$_POST)) {
    $txt = obTxt($_POST['txt']); // Обработка текстовых сообщений чата
    $ses_id = $_SESSION['user_id'];
    $date = date("H:i");
    $blockchat = time() + 1;
    $time_chat_check = $mysqli->query("SELECT time_limit FROM chat WHERE user = ".$user_id." ORDER BY id DESC LIMIT 1")->fetch_assoc();
    if(($time_chat_check['time_limit']+1) > time()){return;}
        if ($txt !== "") {
        $mysqli->query("UPDATE users SET time_chat = ".$blockchat." WHERE id = ".$user_id);
        $to_pers = 0;
        $privat = 0;
        $klan = 0;
        
        if ($txt[0] == "-") {
            $clan = $mysqli->query("SELECT id FROM `users` WHERE `id` = '".$user_id."' AND `clan_id` > '0' ")->fetch_assoc();
            if ($clan['id'] > 0) {
                $klan = 1;
                $txt2 = explode("-",$txt);
                $txt = $txt2[1];
            }
        }
           $kod = explode(' ',$txt);
        if ($kod[0] == "/tp" OR $kod[0] == "/telep") {
            $region = $mysqli->query('SELECT region FROM base_location WHERE id = '.$user['location'])->fetch_assoc();
            if ($region['region'] == 1 and (int)$user['location'] !== 2 and (int)$user['location'] !== 10 and (int)$user['location'] !== 1005 and (int)$user['location'] !== 96 and (int)$user['location'] !== 120 and (int)$user['location'] !== 270 and (int)$user['location'] !== 395 and (int)$user['location'] !== 521 and (int)$user['location'] !== 38 and (int)$user['location'] !== 143 and (int)$user['location'] !== 523) {
                $mysqli->query("UPDATE users SET location = 1,reload = 1 WHERE id = ".$_SESSION['user_id']);
            } elseif ($region['region'] == 2 and (int)$user['location'] !== 6 and (int)$user['location'] !== 7) {
                $mysqli->query("UPDATE users SET location = 69,reload = 1 WHERE id = ".$_SESSION['user_id']);
            } elseif ($region['region'] == 3) {
                $mysqli->query("UPDATE users SET location = 200,reload = 1 WHERE id = ".$_SESSION['user_id']);
            }
            return;
        }
         $kod = explode(' ',$txt);
        if ($kod[0] == "/tpgym" and $user['groups'] == 5.1 || $user['groups'] == 5.2 || $user['groups'] == 5.3 || $user['groups'] == 5.4 || $user['groups'] == 5.5 || $user['groups'] == 5.6) {
            $region = $mysqli->query('SELECT region FROM base_location WHERE id = '.$user['location'])->fetch_assoc();
            if ($region['region'] == 1 and (int)$user['location'] !== 2 and (int)$user['location'] !== 10 and (int)$user['location'] !== 1005 and (int)$user['location'] !== 521 and (int)$user['location'] !== 96 and (int)$user['location'] !== 120 and (int)$user['location'] !== 38 and (int)$user['location'] !== 143) {
                $mysqli->query("UPDATE users SET location = 902,reload = 1 WHERE id = ".$_SESSION['user_id']);
            } elseif ($region['region'] == 2) {
                $mysqli->query("UPDATE users SET location = 903,reload = 1 WHERE id = ".$_SESSION['user_id']);
            } elseif ($region['region'] == 3) {
                $mysqli->query("UPDATE users SET location = 904,reload = 1 WHERE id = ".$_SESSION['user_id']);
            }
            return;
        }
         $kod = explode(' ',$txt);
        if ($kod[0] == "/tp_og" and $user['id'] == 1) {
              $bans = time(9999)+9999 + $ban*60;
                        $mysqli->query("UPDATE users SET `fetig`='".$bans."' WHERE id='".$user['id']."'");
            $region = $mysqli->query('SELECT region FROM base_location WHERE id = '.$user['location'])->fetch_assoc();
            if ($region['region'] == 1 and (int)$user['location'] !== 2 and (int)$user['location'] !== 10 and (int)$user['location'] !== 1005) {
                $mysqli->query("UPDATE users SET location = 143,reload = 1 WHERE id = ".$_SESSION['user_id']);
            } elseif ($region['region'] == 2) {
                $mysqli->query("UPDATE users SET location = 143,reload = 1 WHERE id = ".$_SESSION['user_id']);
            } elseif ($region['region'] == 3) {
                $mysqli->query("UPDATE users SET location = 143,reload = 1 WHERE id = ".$_SESSION['user_id']);
            }
            return;
        }
        
        $kod = explode(' ',$txt);
        if ($kod[0] == "/telep_1" and $user['groups'] == 1) {
            $ban = $kod[1];
            $bans = time() + $ban*0;
            $region = $mysqli->query('SELECT region FROM base_location WHERE id = '.$user['location'])->fetch_assoc();
            if ($region['region'] !== 999999) {
                $mysqli->query("UPDATE users SET location = '".$bans."',reload = 1 WHERE id = ".$_SESSION['user_id']);
            }
            return;
        }

        
                $kod = explode(' ',$txt);
        if ($kod[0] == "/telep_2" and $user['groups'] == 1) {
            $region = $mysqli->query('SELECT region FROM base_location WHERE id = '.$user['location'])->fetch_assoc();
            if ($region['region'] !== 999999) {
                $mysqli->query("UPDATE users SET location = 69,reload = 1 WHERE id = ".$_SESSION['user_id']);
            }
            return;
        }
        
        if ($kod[0] == "/c_fond") {
            $clan = $mysqli->query("SELECT groups,login,clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' and `clan_id` > '0'")->fetch_assoc();
            if ($clan and $kod[1] > 0 and item_isset(1,$kod[1])) {
                $date_ = '<tt><font color="green">['.date("H:i").']</font></tt> ';
                $log_ = $date_.'<span style="color:'.colorsUsers($clan['groups']).'; text-decoration:underline;">'.$clan['login'].'</span> <font color="#6b89a8"> внес в клановый фонд '.price($kod[1]).'кр.</font>';
                $fn = (int)$kod[1];
                $mysqli->query("INSERT INTO clan_log (clan, log) VALUES (".$clan['clan_id'].", '".$log_."')");
                $mysqli->query("UPDATE `base_clans` SET `fond`=`fond`+'".$fn."' WHERE `id`='".$clan['clan_id']."'");
                $txt = "Вы внесли ".price($kod[1])." в клан-фонд.";
                minus_item($kod[1],1);
                $to_pers = $user_id;
                $privat = 1;
            } elseif (!$clan) {
                $txt = "Вы не состоите в клане.";
                $to_pers = $user_id;
                $privat = 1;
            } elseif (!item_isset(1,$kod[1])) {
                $txt = "Вам не хватает денег.";
                $to_pers = $user_id;
                $privat = 1;
            } else {
                $txt = "Ошибка";
                $to_pers = $user_id;
                $privat = 1;
            }
        }
        if ($kod[0] == "/c_take") {
            $clan = $mysqli->query("SELECT groups,login,clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' and `clan_admin` > '0'")->fetch_assoc();
            $clan_b = $mysqli->query("SELECT fond FROM `base_clans` WHERE `id` = '".$clan['clan_id']."'")->fetch_assoc();
            if ($clan and $kod[1] > 0 and $clan_b['fond'] >= $kod[1]) {
                $date_ = '<tt><font color="green">['.date("H:i").']</font></tt> ';
                $log_ = $date_.'<span style="color:'.colorsUsers($clan['groups']).'; text-decoration:underline;">'.$clan['login'].'</span> <font color="#6b89a8"> снял деньги из клан-фонда  -'.price($kod[1]).'кр.</font>';
                $fn = (int)$kod[1];
                $mysqli->query("INSERT INTO clan_log (clan, log) VALUES (".$clan['clan_id'].", '".$log_."')");
                $mysqli->query("UPDATE `base_clans` SET `fond`=`fond`-'".$fn."' WHERE `id`='".$clan['clan_id']."'");
                $txt = "Вы взяли ".price($kod[1])." из клан-фонда.";
                plus_item($kod[1],1);
                $to_pers = $user_id;
                $privat = 1;
            } elseif (!$clan) {
                $txt = "Вы не состоите в клане.";
                $to_pers = $user_id;
                $privat = 1;
            } elseif ($clan_b['fond'] >= $kod[1]) {
                $txt = "В фонде нет столько денег.";
                $to_pers = $user_id;
                $privat = 1;
            } else {
                $txt = "Ошибка";
                $to_pers = $user_id;
                $privat = 1;
            }
        }
        if (array_key_exists('ToName',$_POST) && $_POST['ToName'] !== "") { // проверка wterh
            $to_form = escapeMe($_POST['ToName']);
            $to_user = $mysqli->query("SELECT id,login FROM users WHERE login = '".$to_form."'")->fetch_assoc();
            if ($to_user['login'] !== "") {
                $to_pers = $to_user['id'];
                if ($txt[0] == "=") {
                    $privat = 1;
                    $txt2 = explode("=",$txt);
                    $txt = $txt2[1];
                }
                if ($user['groups'] == 1 || $user['groups'] == 2) {
                    $kod = explode(' ',$txt);
                    if ($kod[0] == "/krolpollolo225") {
                        minus_item($kod[1],$to_user['id']);
                        $prc = round($kod[1]/100*5);
                        $mn = $kod[1];
                        minus_item($prc,1);
                        $text2 = explode(":",$txt);
                        $prich = $text2[1];
                        $txt = "<i>Тренер $to_form оштрафован на $mn кр. Причина: $prich</i>";
                    }
                    if ($user['groups'] == 1 || $user['groups'] == 2 || $user['groups'] == 2.1) {
                        $kod = explode(' ',$txt);
                        if ($kod[0] == "/arest") {
                            $tim = $kod[1];
                            $arest = time() + $tim*60*60*24;
                            $mysqli->query("UPDATE users SET `groups`='7',`location`='2', `reload` = '1', `arest` = '".$arest."' WHERE id='".$to_pers."'");
                            $text2 = explode(":",$txt);
                            $prich = $text2[1];
                            $txt = "<i>Тренер $to_form заключен под стражу на $tim дн. Причина: $prich</i>";
                            $date_s = get_last_online(time());
                            $text = "Вы заключены под стражу на $tim дн. Причина: $prich";
                            $user_to = $to_pers;
                            $subject = 'Арест';
                            
                            $aw = escapeString($_POST['useraw']);
                            $iUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aw}'")->fetch_assoc();
                            $img = 316;
                            
                            $nam = "Черная метка";
                            $des = "Отличительный знак людей побывавших в тюрьме,будьте осторожны с такими людьми при обмене.";
                            
                            $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iUS['id']}','{$img}','{$nam}','{$des}') ");
                            $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('".$_SESSION['user_id']."','".$user_to."','".$text."','".$subject."','".$date_s."')");
                            $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$user_to."','info','Новое сообщение','Вам пришло новое личное сообщение!','false') ");
                        }
                    }
                        $kod = explode(' ',$txt);
                        if ($kod[0] == "/fakearest") {
                            $tim = $kod[1];
                            //$arest = time() + $tim*60*60*24;
                            //$mysqli->query("UPDATE users SET `groups`='7',`location`='2', `reload` = '1', `arest` = '".$arest."' WHERE id='".$to_pers."'");
                            $text2 = explode(":",$txt);
                            $prich = $text2[1];
                            $txt = "<i>Тренер $to_form заключен под стражу на $tim дн. Причина: $prich</i>";
                            $date_s = get_last_online(time());
                            $text = "Вы заключены под стражу на $tim дн. Причина: $prich";
                            $user_to = $to_pers;
                            $subject = 'Арест';
                            
                            $aw = escapeString($_POST['useraw']);
                            $iUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aw}'")->fetch_assoc();
                            $img = 316;
                            
                            $nam = "Черная метка";
                            $des = "Отличительный знак людей побывавших в тюрьме,будьте осторожны с такими людьми при обмене.";
                            
                            //$mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iUS['id']}','{$img}','{$nam}','{$des}') ");
                            //$mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('".$_SESSION['user_id']."','".$user_to."','".$text."','".$subject."','".$date_s."')");
                            $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$user_to."','info','Арест','Вы заключены под стражу!','false') ");
                        }
                        $kod = explode(' ',$txt);
                        if ($kod[0] == "/transferpok") {
                            $tim = $kod[1];
                            $whopokkod = $kod[2];
                            $whopok = $whopokkod;
                            //$arest = time() + $tim*60*60*24;
                            //$mysqli->query("UPDATE users SET `groups`='7',`location`='2', `reload` = '1', `arest` = '".$arest."' WHERE id='".$to_pers."'");
                            //$selectpok = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$tim."'")->fetch_assoc();
                            //$selectlogin = $mysqli->query("SELECT * FROM users WHERE `id` = '".$whopok."'")->fetch_assoc();
                            $mysqli->query("UPDATE user_pokemons SET `user_id` = '".$whopok."', `owner` = '".$whopok."', `master` = '".$whopok."' WHERE id = '".$tim."'");
                            $text2 = explode(":",$txt);
                            //$prich = $text2[1];
                            $txt = "<i>Покемон под ID: $tim перенесён тренеру под ID: $whopok .</i>";
                            $date_s = get_last_online(time());
                            $text = "Ваш покемон под ID: $tim конфискован или перенесён. Обращайтесь к Полиции или Администрации.";
                            $user_to = $to_pers;
                            $subject = 'Перенос покемона.';
                            
                            /*$aw = escapeString($_POST['useraw']);
                            $iUS = $mysqli->query("SELECT id FROM `users` WHERE `login` = '{$aw}'")->fetch_assoc();
                            $img = 316;*
                            
                            $nam = "Черная метка";
                            $des = "Отличительный знак людей побывавших в тюрьме,будьте осторожны с такими людьми при обмене.";*/
                            
                            //$mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$iUS['id']}','{$img}','{$nam}','{$des}') ");
                            $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('".$_SESSION['user_id']."','".$user_to."','".$text."','".$subject."','".$date_s."')");
                            $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$user_to."','info','Перенос покемона','Ваш покемон был перенесён или конфискован. Подробности смотрите в Почте.','false') ");
                        }
                        if ($kod[0] == "/tptren") {
                            $nameLoc = $mysqli->query('SELECT name FROM base_location WHERE id = '.$kod[1])->fetch_assoc();
                            $whotrenkod = $kod[1];
                            $whotren = $whotrenkod;
                            //$arest = time() + $tim*60*60*24;
                            //$mysqli->query("UPDATE users SET `groups`='7',`location`='2', `reload` = '1', `arest` = '".$arest."' WHERE id='".$to_pers."'");
                            //$selectpok = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$tim."'")->fetch_assoc();
                            //$selectlogin = $mysqli->query("SELECT * FROM users WHERE `id` = '".$whopok."'")->fetch_assoc();
                            $mysqli->query("UPDATE users SET `location` = '".$whotren."', `reload` = 1 WHERE login = '".$to_form."'");
                            $text2 = explode(":",$txt);
                            //$prich = $text2[1];
                            $txt = "<i>Вы перенесены на локацию $nameLoc[name] .</i>";
                            $date_s = get_last_online(time());
                            $user_to = $to_pers;
                            $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$user_to."','info','Телепортация','Вы были перенесены на другую локацию.','false') ");
                        }
                    if ($kod[0] == "/fetig") {
                        $ban = $kod[1];
                        $bans = time() + $ban*60;
                        $text2 = explode(":",$txt);
                        $prich = $text2[1];
                        $txt = "<i>Тренер $to_form обессилен на $ban мин. Причина: $prich</i>";
                        $mysqli->query("UPDATE users SET `fetig`='".$bans."' WHERE id='".$to_pers."'");
                    }
}

                if ($user['groups'] == 1 || $user['groups'] == 2 || $user['groups'] == 3 || $user['groups'] == 3.1 || $user['groups'] == 2.1) {
                    $kod = explode(' ',$txt);
                    if ($kod[0] == "/free") {
                        $mysqli->query("UPDATE users SET `silent`='0' WHERE id='".$to_pers."'");
                        return;
                    }
                    if ($kod[0] == "/silent") {
                        $ban = $kod[1];
                        $bans = time() + $ban*60;
                        $text2 = explode(":",$txt);
                        $prich = $text2[1];
                        $txt = "<i>Тренер $to_form будет молчать $ban мин. Причина: $prich</i>";
                        $mysqli->query("UPDATE users SET `silent`='".$bans."' WHERE id='".$to_pers."'");
                    }
                }
                #Дать описание в клане
                $kod = explode(' ',$txt);
                if ($kod[0] == "/c_status") {
                    $clan = $mysqli->query("SELECT clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' AND `clan_admin` = '1'")->fetch_assoc();
                    $clan_to = $mysqli->query("SELECT groups,login FROM `users` WHERE `id` = '".$to_pers."' AND `clan_id` = '".$clan['clan_id']."'")->fetch_assoc();
                    if ($clan && $clan_to) {
                        $date_ = '<tt><font color="green">['.date("H:i").']</font></tt> ';
                        $log_ = $date_.'<span style="color:'.colorsUsers($clan_to['groups']).'; text-decoration:underline;">'.$clan_to['login'].'</span> <font color="#6b89a8"> было присвоено звание - '.$kod[1].'.</font>';
                        $mysqli->query("INSERT INTO `clan_log` (`clan`, `log`) VALUES (".$clan['clan_id'].", '".$log_."')");
                        $mysqli->query("UPDATE `users` SET `clan_status`='".$kod[1]."' WHERE `id`='".$to_pers."'");
                        $txt = "Описание изменено";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan) {
                        $txt = "Вы не состоите в клане!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan_to) {
                        $txt = "Тренер не состоит в клане";
                        $to_pers = $user_id;
                        $privat = 1;
                    } else {
                        $txt = "Ошибка";
                        $to_pers = $user_id;
                        $privat = 1;
                    }
                }

                if ($kod[0] == "/c_leader") {
                    $clan = $mysqli->query("SELECT clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' AND `clan_admin` = '1'")->fetch_assoc();
                    $clan_to = $mysqli->query("SELECT groups,login FROM `users` WHERE `id` = '".$to_pers."' AND `clan_id` = '".$clan['clan_id']."'")->fetch_assoc();
                    if ($clan && $clan_to) {
                        $date_ = '<tt><font color="green">['.date("H:i").']</font></tt> ';
                        $log_ = $date_.'<span style="color:'.colorsUsers($clan_to['groups']).'; text-decoration:underline;">'.$clan_to['login'].'</span> <font color="#6b89a8"> назначен лидером.</font>';
                        $mysqli->query("INSERT INTO `clan_log` (`clan`, `log`) VALUES (".$clan['clan_id'].", '".$log_."')");
                        $mysqli->query("UPDATE `users` SET `clan_admin`='1' WHERE `id`='".$to_pers."'");
                        $txt = "Успешно";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan) {
                        $txt = "Вы не состоите в клане!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan_to) {
                        $txt = "Тренер не состоит в клане";
                        $to_pers = $user_id;
                        $privat = 1;
                    } else {
                        $txt = "Ошибка";
                        $to_pers = $user_id;
                        $privat = 1;
                    }
                }
                if ($kod[0] == "/c_unleader") {
                    $clan = $mysqli->query("SELECT clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' AND `clan_admin` = '1'")->fetch_assoc();
                    $clanadm = $mysqli->query("SELECT * FROM `base_clans` WHERE `admin_id` = '".$_SESSION['user_id']."' and `admin_id` != '".$to_pers."' AND `id` = '".$clan['clan_id']."'")->fetch_assoc();
                    $clan_to = $mysqli->query("SELECT groups,login FROM `users` WHERE `id` = '".$to_pers."' AND `clan_id` = '".$clan['clan_id']."'")->fetch_assoc();
                    if ($clan and $clan_to and $clanadm) {
                        $date_ = '<tt><font color="green">['.date("H:i").']</font></tt> ';
                        $log_ = $date_.'<span style="color:'.colorsUsers($clan_to['groups']).'; text-decoration:underline;">'.$clan_to['login'].'</span> <font color="#6b89a8"> снят со звания лидера.</font>';
                        $mysqli->query("INSERT INTO `clan_log` (`clan`, `log`) VALUES (".$clan['clan_id'].", '".$log_."')");
                        $mysqli->query("UPDATE `users` SET `clan_admin`='0' WHERE `id`='".$to_pers."'");
                        $txt = "Успешно";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan) {
                        $txt = "Вы не состоите в клане!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan_to) {
                        $txt = "Тренер не состоит в клане";
                        $to_pers = $user_id;
                        $privat = 1;
                    } else {
                        $txt = "Ошибка";
                        $to_pers = $user_id;
                        $privat = 1;
                    }
                }
                #Выйти из клана
                if ($kod[0] == "/c_leave") {
                    $clan = $mysqli->query("SELECT groups,login,clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
                    if ($clan) {
                        $date_ = '<tt><font color="green">['.date("H:i").']</font></tt> ';
                        $log_ = $date_.'<span style="color:'.colorsUsers($clan['groups']).'; text-decoration:underline;">'.$clan['login'].'</span> <font color="#6b89a8"> покинул клан.</font>';
                        $mysqli->query("INSERT INTO clan_log (clan, log) VALUES (".$clan['clan_id'].", '".$log_."')");
                        $mysqli->query("UPDATE `users` SET `clan_status`='0',`clan_id`='0',`clan_admin`='0',`clan_rating` = '0' WHERE `id`='".$_SESSION['user_id']."'");
                        $txt = "Вы успешно покинули клан";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan) {
                        $txt = "Вы не состоите в клане!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } else {
                        $txt = "Ошибка";
                        $to_pers = $user_id;
                        $privat = 1;
                    }
                }

                #Добавить тренера в клан
                if ($kod[0] == "/c_add") {
                    $clan = $mysqli->query("SELECT groups,login,clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' AND `clan_admin` = '1'")->fetch_assoc();
                    $clan_to = $mysqli->query("SELECT groups,login FROM `users` WHERE `id` = '".$to_pers."' AND `clan_id` = '0'")->fetch_assoc();
                    $clan_emb = $mysqli->query("SELECT * FROM `base_clans` WHERE `emblem_count` > '0' and `id` = '".$clan['clan_id']."'")->fetch_assoc();
                    if ($clan && $clan_to && $clan_emb) {
                        $date_ = '<tt><font color="green">['.date("H:i").']</font></tt> ';
                        $log_ = $date_.'<span style="color:'.colorsUsers($clan_to['groups']).'; text-decoration:underline;">'.$clan_to['login'].'</span> <font color="#6b89a8"> был принят в клан.</font>';
                        $mysqli->query("INSERT INTO clan_log (clan, log) VALUES (".$clan['clan_id'].", '".$log_."')");

                        $mysqli->query("UPDATE `users` SET `clan_id`='".$clan['clan_id']."' WHERE `id`='".$to_pers."'");
                        $mysqli->query("UPDATE `base_clans` SET `emblem_count`= `emblem_count`-'1' WHERE `id`='".$clan['clan_id']."'");
                        $txt = "Тренер добавлен  клан";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan) {
                        $txt = "Вы не состоите в клане!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan_to) {
                        $txt = "Тренер уже состоит в клане";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan_emb) {
                        $txt = "У вас нет эмблем!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } else {
                        $txt = "Ошибка";
                        $to_pers = $user_id;
                        $privat = 1;
                    }
                }
                #Дань в клан
                if ($kod[0] == "/c_tax_on") {
                $clan = $mysqli->query("SELECT groups,login,clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' AND `clan_admin` = '1'")->fetch_assoc();
                $taxon = $mysqli->query("SELECT * FROM `base_clans` WHERE `id` = '".$clan['clan_id']."'")->fetch_assoc();
                $mysqli->query("UPDATE `base_clans` SET `tax`='1' WHERE `id`='".$clan['clan_id']."'");
                        $txt = "Сбор налогов включен.";
                        $to_pers = $user_id;
                        $privat = 1;
                    }
                #Выкл Дани в клан
                if ($kod[0] == "/c_tax_off") {
                $clan = $mysqli->query("SELECT groups,login,clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' AND `clan_admin` = '1'")->fetch_assoc();
                $taxon = $mysqli->query("SELECT * FROM `base_clans` WHERE `id` = '".$clan['clan_id']."'")->fetch_assoc();
                $mysqli->query("UPDATE `base_clans` SET `tax`='0' WHERE `id`='".$clan['clan_id']."'");
                        $txt = "Сбор налогов выключен.";
                        $to_pers = $user_id;
                        $privat = 1;
                    }
                #Удалить тренера из клана
                if ($kod[0] == "/c_kick") {
                    $clan = $mysqli->query("SELECT groups,login,clan_id FROM `users` WHERE `id` = '".$_SESSION['user_id']."' AND `clan_admin` = '1'")->fetch_assoc();
                    $clan_to = $mysqli->query("SELECT login,groups FROM `users` WHERE `id` = '".$to_pers."' AND `clan_id` = '".$clan['clan_id']."'")->fetch_assoc();
                    $clanadm = $mysqli->query("SELECT * FROM `base_clans` WHERE `admin_id` = '".$to_pers."' AND `id` = '".$clan['clan_id']."'")->fetch_assoc();

                    if ($clan and $clan_to and !$clanadm) {
                        $date_ = '<tt><font color="green">['.date("H:i").']</font></tt> ';
                        $log_ = $date_.'<span style="color:'.colorsUsers($clan_to['groups']).'; text-decoration:underline;">'.$clan_to['login'].'</span> <font color="#6b89a8"> был исключен из клана.</font>';
                        $mysqli->query("INSERT INTO clan_log (clan, log) VALUES (".$clan['clan_id'].", '".$log_."')");
                        $mysqli->query("UPDATE users SET `clan_status`='0',`clan_id`='0',`clan_admin`='0',`clan_rating` = '0'  WHERE `id`='".$to_pers."'");
                        $txt = "Тренер удален!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan) {
                        $txt = "Вы не состоите в клане!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif (!$clan_to) {
                        $txt = "Тренер не состоит в вашем клане";
                        $to_pers = $user_id;
                        $privat = 1;
                    } elseif ($clanadm) {
                        $txt = "Основатель не может покинуть клан!";
                        $to_pers = $user_id;
                        $privat = 1;
                    } else {
                        $txt = "Ошибка";
                        $to_pers = $user_id;
                        $privat = 1;
                    }
                }
            }
        }

        if ($user['groups'] == 1 || $user['groups'] == 2 || $user['groups'] == 2.5 || $user['groups'] == 3 || $user['groups'] == 3.1 || $user['groups'] == 4 || $user['groups'] == 2.1) {
            /* Жирный */            $txt = str_replace("[b]", "<b>",$txt);
            $txt = str_replace("[/b]", "</b>",$txt);
            $txt = str_replace("[nast]", "<b><font color=#8B008B>",$txt);
            $txt = str_replace("[/nast]", "</font></b>",$txt);
            /* Наклонный */         $txt = str_replace("[i]", "<i>",$txt);
            $txt = str_replace("[/i]", "</i>",$txt);
            /* Предупреждение */    $txt = str_replace("/note", "<b><font color=#B22222>Предупреждение!</font></b>",$txt);
            /* Внимание */          $txt = str_replace("/attn", "<b><font color=#B22222>Внимание!</font></b>",$txt);
        }
        if ($user['groups'] == 1) {
            /* Изображение */       $txt = str_replace("[img]", "<img src=",$txt);
            $txt = str_replace("[/img]", ">",$txt);
            $txt = str_replace("/adm_attn", "<b><font size=550 color=#FF0000>Внимание!</font></b>",$txt);

        }
        if ($user['groups'] == 2.5) {
            $txt = str_replace("/adm_attn", "<b><font size=350 color=#FF0000>Внимание!</font></b>",$txt);

        }
        if ($user['groups'] == 1 || $user['groups'] == 2 || $user['groups'] == 2.5 || $user['groups'] == 3 || $user['groups'] == 3.1 || $user['groups'] == 5.6 || $user['groups'] == 2.1 || $user['groups'] == 5.8 || $user['groups'] == 5.9 || $user['groups'] == 5.4 || $user['groups'] == 5.1 || $user['groups'] == 5.2 || $user['groups'] == 5.3 || $user['groups'] == 4 || $user['groups'] == 5 || $user['groups'] == 6 || $user['groups'] == 7 || $user['groups'] == 8 || $user['groups'] == 9 || $user['groups'] == 10 || $user['groups'] == 11 || $user['groups'] == 15) {
            /* Жирный */            $txt = str_replace("/trade", "<b>",$txt);
            $txt = str_replace("[/b]", "</b>",$txt);
        }
        if ($user['silent'] > time()) {
            $molc = ceil(($user['silent']-time())/60);
            $txt = "Вы будете молчать ещё $molc мин.";
            $to_pers = $user_id;
            $privat = 1;
        }
        /*if ($user['time_chat'] > time() and $privat !== 1) {
            $txt = "Нельзя отправлять сообщения чаще чем раз в 3 секунды.";
            $to_pers = 2;
            $privat = 1;
        }*/

        if ($user['location'] == 2/* OR $user['location'] == 6 OR $user['location'] == 7*/) {
            $txt = "Начальник....";
            $to_pers = $user_id;
            $privat = 1;
            $to_pers = "Начальник....";
         
                    
                
        }
        
        if (item_isset(375, 1)) {
          if ($kod[0] == "/снежок") {
              if(rand(1,10) == 1){
               $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $mysqli->query("UPDATE `users` SET `snow` = `snow`+'1' WHERE `id` = '".$user_id."'");
                        $txt = "<font color=#ffffff><i>Попадание прямо в голову тренеру $to_form! Попаданий: $snow</i> </font>";
                        minus_item(1,375);
              }elseif(rand(1,10) == 2){
                $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $mysqli->query("UPDATE `users` SET `snow` = `snow`+'1' WHERE `id` = '".$user_id."'");
                        $txt = "<font color=#ffffff><i>Вы попали в $to_form снежком! Хм... а что будет если бросить покебол? Попаданий: $snow</i> </font>";
                        minus_item(1,375);   
              }elseif(rand(1,10) == 3){
                $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $mysqli->query("UPDATE `users` SET `snow` = `snow`+'1' WHERE `id` = '".$user_id."'");
                        $txt = "<font color=#ffffff><i>А что будет если попасть снежком в глаз? Уффф... Попаданий: $snow</i> </font>";
                        minus_item(1,375);     
              }elseif(rand(1,10) == 4){
                $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $mysqli->query("UPDATE `users` SET `snow` = `snow`+'1' WHERE `id` = '".$user_id."'");
                        $txt = "<font color=#ffffff><i>Попадание в яблочко! Кому то стоит попробовать сыиграть в лотерею. Попаданий: $snow</i> </font>";
                        minus_item(1,375);     
              }elseif(rand(1,10) == 5){
                $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $mysqli->query("UPDATE `users` SET `snow` = `snow`+'1' WHERE `id` = '".$user_id."'");
                        $txt = "<font color=#ffffff><i>Твердый комочек снега встретился с задницей $to_form! Попаданий: $snow</i> </font>";
                        minus_item(1,375);   
              }elseif(rand(1,10) == 6){  
                $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $txt = "<font color=#ffffff><i>Снежок летит мимо и попадает в ничего не подозревающего Пиджи! Попаданий: $snow</i> </font>";
                        minus_item(1,375);   
              }elseif(rand(1,10) == 7){  
                $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $txt = "<font color=#ffffff><i>Снежок летит прямо в голову, но $to_form резко уклонился! Попаданий: $snow</i> </font>";
                        minus_item(1,375); 
              }elseif(rand(1,10) == 8){  
                $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $txt = "<font color=#ffffff><i>Снежок летит прямо в цель, но перед $to_form телепортировалась Абра! Бедный покемон! Попаданий: $snow</i> </font>";
                        minus_item(1,375); 
              }elseif(rand(1,10) == 9){  
                $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $txt = "<font color=#ffffff><i>Снежок летит... Эй, а куда он пропал?! Попаданий: $snow</i> </font>";
                        minus_item(1,375);           
              }else{
            $snow = infUsr($user_id,"snow");
                        $ban = $kod[1];
                        $txt = "<font color=#ffffff><i>Снежок даже не долетает до ног $to_form! Вам определенно нужно потренировать меткость. Попаданий: $snow</i> </font>";
                        minus_item(1,375);      
              
        }
        }
        }
        if (item_isset(1061, 1)) {
          if ($kod[0] == "/тыква") {
            $randjeck = rand(1,85);
              if($randjeck >= 1 and $randjeck <= 25){
                        $ban = $kod[1];
                        $bans = time() + 3*60;
                        $mysqli->query("UPDATE users SET `silent`='".$bans."' WHERE id='".$to_pers."'");
                        $txt = "<font color=#2F4F4F><i>Тыква попала прям в лицо $to_form! Заклятие пришило рот на 3 минуты!</i> </font>";
                        minus_item(1,1061);
                    }
             if($randjeck >= 26 and $randjeck <= 60){
                        $ban = $kod[1];
                        $bans = time() + 3*60;
                        $mysqli->query("UPDATE users SET `fetig`='".$bans."' WHERE id='".$to_pers."'");
                        $txt = "<font color=#2F4F4F><i>$to_form почти увернулся, но Лампа Джека таки настигла ноги тренера! Ноги стали ватными и вялыми на целых 3 минуты!</i> </font>";
                        minus_item(1,1061);  
                        } 
             if($randjeck >= 61 and $randjeck <= 85){
                        $ban = $kod[1];
                        $bans = time() + 5*60;
                        $mysqli->query("UPDATE users SET `timepok`='".$bans."' WHERE id='".$to_pers."'");
                        $txt = "<font color=#2F4F4F><i>Вас так взбесила улыбка $to_form что руки сами потянулись за Лампой Джека. Ехидно ухмыляясь, вы подкрались сзади и надели лампу прямо на голову сопреника! Дикие покемоны даже не подойдут к $to_form в течении 5 минут.</i> </font>";
                        minus_item(1,1061);
                        }   
             /*if($randjeck >= 86 and $randjeck <= 100){
                $checkjeck = $mysqli->query("SELECT img FROM awards WHERE user = '".$to_user['id']."'")->fetch_assoc();
                if($checkjeck['img'] == 1062){
                           $ban = $kod[1];
                        $txt = "<font color=#2F4F4F><i>Это мог бы быть отличный бросок тыквы, но $to_form неожиданно развернулся и поймал летящий в него объект. Отлично! Но у него уже есть такой сувенир... Но и ладно, за то как эффектно он поймал!</i></font>";
                        minus_item(1,1061);
                        }else{
                            $img = 1062;
                            $nam = "Лампа Джека";
                            $des = "Сувенир из празднования Хеллоуина 2020!";
                            
                            $mysqli->query("INSERT INTO awards (user,img,name,descript) VALUES ('{$to_pers}','{$img}','{$nam}','{$des}') ");
                        $ban = $kod[1];
                        $txt = "<font color=#2F4F4F><i>Это мог бы быть отличный бросок тыквы, но $to_form неожиданно развернулся и поймал летящий в него объект. Отлично! Будет сувенир на память. </i></font>";
                        minus_item(1,1061);
                        }      
              
        }*/
        }
        }

        if ($to_pers == 2) {
            $ans = $mysqli->query("SELECT ans FROM game")->fetch_assoc();
            $vik = $mysqli->query("SELECT answer FROM viktorina WHERE id = '".$ans['ans']."'")->fetch_assoc();

            if (mb_strtoupper($vik['answer']) === mb_strtoupper($txt)) {
                $pts = infUsr($_SESSION['user_id'],"viktorina")+1;
                $txt = infUsr($_SESSION['user_id'],"login").' дал верный ответ - "'.$vik['answer'].'". К-во очков у тренера - '.$pts;
                $mysqli->query("UPDATE users SET viktorina = '$pts' WHERE `id` = '".$_SESSION['user_id']."'");
                $mysqli->query("UPDATE game SET ans = '0' WHERE `if` = '1'");
                $ses_id = 2;
                $to_pers = $_SESSION['user_id'];
                $privat = 0;
                $klan = 0;
            }
        }
        $settimelimit = time();
        $mysqli->query("INSERT INTO chat(user, text, data, private, to_user, time, klan, time_limit) VALUES (".$ses_id.", '".$txt."', '".$date."', '".$privat."','".$to_pers."', NOW(),'".$klan."', '".$settimelimit."' )");
    }
}
?>
<html>
    <head>
        <meta http-equiv=content-type content=text/html;charset=windows-1251>
            <link rel='stylesheet' href='style.css' type='text/css'>
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery.form.js"></script>
            <script language="javascript" type="text/javascript">
                $(document).ready(function() {
                    $('#formchat').ajaxForm(function() {
                        $('#message').val('');
                    });
                });
            </script>
            <script>
                lh = <?=date("H");?>;
                lm = <?=date("i");?>;
                ls = <?=date("s");?>;
                dat = new Date;
                h = dat.getHours();
                m = dat.getMinutes();
                s = dat.getSeconds();
                nh = lh-h;
                nm = lm-m;
                ns = ls-s;
                dot = " ";
                function f_clock () {
                    dat = new Date;
                    h = dat.getHours()+nh;
                    m = dat.getMinutes()+nm;
                    s = dat.getSeconds()+ns;
                    if (s >= 60) {
                        m++; s -= 60;
                    }
                    if (m >= 60) {
                        h++; m -= 60;
                    }
                    if (h >= 24) h = 0;
                    if (s < 0) {
                        m--; s += 60;
                    }
                    if (m < 0) {
                        h--; m += 60;
                    }
                    if (h < 0) h = 23;

                    if (dot == " ") {
                        dot = ":";
                    } else {
                        dot = " ";
                    }
                    t = ((h < 10) ? "0": "")+h;
                    t += ((m < 10) ? dot+"0": dot) + m;
                    document.getElementById("clock").innerHTML = t;
                    setTimeout("f_clock()", 500);
                }
                function clearChat() {
                    parent._chat.document.getElementById('message_box').innerHTML = '';
                }
            </script>
        </head>
        <body style="margin: 5 5 5 5;" onload="f_clock()">
            <form id="formchat" action="game.php?fun=m_input" method="POST">
                <table id='text_type' border=0 width=100%>
                    <TD width="130">
                        to: <input name="ToName" id="ToName" type="text" value="" placeholder="Кому..." style="color:#1E3955; border:none; background-color:#AFD0F1; width:90px; font-weight:bold"> <small><A HREF=# onclick="parent.priv_m('','');">x</A></small>
                    </td>
                    <td>
                        <input name="txt" type="text" id="message" MAXLENGTH="1000" style="display:inline; width:100%" placeholder="Введите сообщение..." autocomplete="off">
                    </td>
                    <td width="130">
                        <input type="image" src="img/chat/ok.gif" id="send-btn" width=21 height=18 alt="Отправить сообщение" title="Отправить сообщение" style='border:none'>
                        <img src="img/chat/smile.gif" width="21" height="18" alt="Смайлики" title="Смайлики" style="cursor:pointer;" onclick='parent._online.document.getElementById("divSmiles").style.display="block"; return false'>
                        <img src="img/chat/clear.gif" width="21" height="18" alt="Очистить чат" title="Очистить чат" title="Очистить чат" style="cursor:pointer;" onclick="clearChat();">
                    </td>
                    <td width="400" align='right'>
                       <!--  <a onclick="window.open('/pokloc.php?s=', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes')" style="cursor: pointer;"><img src="img/chat/pokloc.gif" width="21" height="18" alt="Поклок" title="Поклок" border="0"></a> -->
                        <a onclick="window.open('/attackdex.php?s=', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes')" style="cursor: pointer;"><img src="img/chat/adex.gif" width="21" height="18" alt="Атакдекс" title="Атакдекс" border="0"></a>
                        <a onclick="window.open('/pokedex.php?s=', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes')" style="cursor: pointer;"><img src="img/chat/dex.png" width="70" height="18" alt="Покедекс" title="Покедекс" border="0"></a>
                        <a href="#" onclick="parent._work.location='game.php?fun=m_location&newto='+document.getElementById('ToName').value"><img src="img/chat/trade.gif" width=49 height=18 alt="Обмен" title="Обмен" border=0></a>
                        <a href="#" onclick="parent._location.location='game.php?fun=m_breed&map=1&to='+document.getElementById('ToName').value"><img src="img/chat/breed.gif" width=21 height=18 alt="Разведение" title="Разведение" border=0></a>
                        <?php if ($user['hunt'] == 0) { ?>
                            <a href="game.php?fun=m_input&hunt=1"><img src="img/chat/w_1.gif" width=70 height=18 alt="Режим ловли" title="Режим ловли" style="cursor:pointer" name=wild></a>
                        <?php } else { ?>
                            <a href="game.php?fun=m_input&hunt=1"><img src="img/chat/w_2.gif" width=70 height=18 alt="Режим ловли" title="Режим ловли" style="cursor:pointer" name=wild></a>
                        <?php } ?>
                        <a href="game.php?fun=m_input&map=1&gc=<?=$user['getBattle']?>"><img src="img/chat/c_<?=$user['getBattle']?>.gif" width='87' height='18' border='0' alt="Принимать вызовы" title="Принимать вызовы"></a>
                        <a href="game.php?fun=m_input&map=1&fc=<?=$user['lookBattle']?>"><img src="/img/chat/fc_<?=$user['lookBattle']?>.gif" width='21' height='18' border='0' alt="Просмотр битв" title="Просмотр битв"></a>
                    </td><td width=50 align='right'>
                        <tt><span id='clock'></span></tt>
                    </td>
                </table>
            </form>
        </body>
    </html>
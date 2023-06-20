<?

function startRound($battle)
{
    global $mysqli;
    if ($battle['tip'] == 1) {
        $table1 = "user_pokemons";
        $table2 = "pokem_vs";
    } else {
        $table1 = "user_pokemons";
        $table2 = "user_pokemons";
    }

    $checkwrap_1_1_1 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok1'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();

    $checkwrap_2_2_2 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok2'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();

    if ($battle['atk1'] == 999) {
        if ($checkwrap_1_1_1['status'] != 20) {
            $pk1 = $mysqli->query("SELECT * FROM $table1 WHERE `id` = '" . $battle['zm1'] . "'")->fetch_assoc();
        } else {
            $pk1 = $mysqli->query("SELECT * FROM $table1 WHERE `id` = '" . $battle['pok1'] . "'")->fetch_assoc();
        }
    } else {
        $pk1 = $mysqli->query("SELECT * FROM $table1 WHERE `id` = '" . $battle['pok1'] . "'")->fetch_assoc();
    }

    if ($battle['atk2'] == 999) {
        if ($checkwrap_2_2_2['status'] != 20) {
            $pk2 = $mysqli->query("SELECT * FROM $table2 WHERE `id` = '" . $battle['zm2'] . "'")->fetch_assoc();
        } else {
            $pk2 = $mysqli->query("SELECT * FROM $table2 WHERE `id` = '" . $battle['pok2'] . "'")->fetch_assoc();
        }
    } else {
        $pk2 = $mysqli->query("SELECT * FROM $table2 WHERE `id` = '" . $battle['pok2'] . "'")->fetch_assoc();
    }
    $ai1 = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = '" . $battle['atk1'] . "'")->fetch_assoc();
    $ai2 = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = '" . $battle['atk2'] . "'")->fetch_assoc();




    $modpk1pl['speed'] = 0;
    $modpk1mn['speed'] = 0;
    $modpk2pl['speed'] = 0;
    $modpk2mn['speed'] = 0;



    $modpk1pl = $mysqli->query("SELECT speed FROM changes WHERE `speed` > '0' and `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk1['id'] . "' and `type` = '1'")->fetch_assoc();
    $modpk1mn = $mysqli->query("SELECT speed FROM changes WHERE `speed` > '0' and  `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk1['id'] . "' and `type` = '2'")->fetch_assoc();
    $modpk2pl = $mysqli->query("SELECT speed FROM changes WHERE `speed` > '0' and  `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk2['id'] . "' and `type` = '1'")->fetch_assoc();
    $modpk2mn = $mysqli->query("SELECT speed FROM changes WHERE `speed` > '0' and  `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk2['id'] . "' and `type` = '2'")->fetch_assoc();
    $pk1['speed'] = $pk1['speed'] * ((2 + $modpk1pl['speed']) / (2 + $modpk1mn['speed']));
    $pk2['speed'] = $pk2['speed'] * ((2 + $modpk2pl['speed']) / (2 + $modpk2mn['speed']));

    if ($ai1['priorety'] !== $ai2['priorety']) {
        if ($ai1['priorety'] > $ai2['priorety']) {
            $pk1['speed'] = 10000;
        } else {
            $pk2['speed'] = 10000;
        }
    }




    if (array_key_exists('item_id', $pk1) && $pk1['item_id'] == 14 && rand(1, 100) <= 24) {
        $pk1['speed'] = $pk1['speed'] * 15;
    } //коготь
    elseif (array_key_exists('item_id', $pk2) && $pk2['item_id'] == 14 && rand(1, 100) <= 24) {
        $pk2['speed'] = $pk1['speed'] * 15;
    } //коготь

    if (array_key_exists('item_id', $pk1) && $pk1['item_id'] == 27) {
        $pk1['speed'] = $pk1['speed'] / 2;
        $dop_zm1 =  $pk1['speed'];
        $rt['log'] = "Скоба";
    }
    //скоба

    if (array_key_exists('item_id', $pk2) && $pk2['item_id'] == 27) {
        $pk2['speed'] = $pk2['speed'] / 2;
        $dop_zm1 = $pk2['speed'];
        $rt['log'] = "Скоба";
    } //скоба

    if (array_key_exists('item_id', $pk1) && $pk1['item_id'] == 232) {
        $dm1['dm'] = $dm1['dm'] * 0;
        $dop_zm1 = " <i>Покемон приходит в бешенство от сферы ярости</i><br>";
        $rt['log'] = " Скорость -2";
    }
    //сфера ярости

    if (array_key_exists('item_id', $pk2) && $pk2['item_id'] == 232) {
        $dm2['dm'] = $dm2['dm'] * 0;
        $dop_zm1 = " <i>Скорость покемона -2</i><br>";
        $rt['log'] = " Скорость -2";
    } //сфера ярости
    // Какая то фигня со статусами статус
    $status1 = $mysqli->query("SELECT * FROM status WHERE `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk1['id'] . "' and `status` <= '19' ")->fetch_assoc();
    $status1_ = $mysqli->query("SELECT * FROM status WHERE `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk1['id'] . "' and `status` > '5' ")->fetch_assoc();
    $status2 = $mysqli->query("SELECT * FROM status WHERE `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk2['id'] . "' and `status` <= '19' ")->fetch_assoc();
    $status2_ = $mysqli->query("SELECT * FROM status WHERE `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk2['id'] . "' and `status` > '5' ")->fetch_assoc();
    if ($status1['endr'] <= ($battle['turn'] + 1)) {
        $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $status1['id'] . "'");
        $status1 = "";
    }
    if ($status1_['endr'] <= ($battle['turn'] + 1)) {
        $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $status1_['id'] . "'");
        $status1_ = "";
    }
    if ($status2['endr'] <= ($battle['turn'] + 1)) {
        $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $status2['id'] . "'");
        $status2 = "";
    }
    if ($status2_['endr'] <= ($battle['turn'] + 1)) {
        $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $status2_['id'] . "'");
        $status2_ = "";
    }
    // paralazed
    if (isset($status1['status']) && $status1['status'] == 4) {
        $pk1['speed'] = round($pk1['speed'] / 4);
    }
    if (isset($status2['status']) && $status2['status'] == 4) {
        $pk2['speed'] = round($pk2['speed'] / 4);
    }

    if ($battle['atk1'] == 999 or $battle['atk1'] == 888) {
        $pk1['speed'] = 20000;
    }
    if ($battle['atk2'] == 999 or $battle['atk2'] == 888) {
        $pk2['speed'] = 20000;
    }
    $dm1['dm'] = 0;
    $dm2['dm'] = 0;
    if ($pk1['speed'] >= $pk2['speed']) {
        if ($battle['atk1'] == 498) { // ----- замена покемона
            $mysqli->query("DELETE FROM `changes` WHERE `pok` = '" . $battle['pok2'] . "'");
        }
        /*if($battle['atk1'] == 114){ // ----- замена покемона
            $mysqli->query("DELETE FROM `changes` WHERE `pok` = '".$battle['pok2']."'");
            $mysqli->query("DELETE FROM `changes` WHERE `pok` = '".$battle['pok1']."'");
             }*/
        if ($battle['atk2'] == 498) { // ----- замена покемона
            $mysqli->query("DELETE FROM `changes` WHERE `pok` = '" . $battle['pok2'] . "'");
        }
        /*if($battle['atk2'] == 114){ // ----- замена покемона
           $mysqli->query("DELETE FROM `changes` WHERE `pok` = '".$battle['pok2']."'");
             $mysqli->query("DELETE FROM `changes` WHERE `pok` = '".$battle['pok1']."'");
             }*/




        if ($battle['atk1'] == 999) { // ----- замена покемона
            $checkwrap_1 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok1'] . "' AND bid = '" . $battle['id'] . "'")->fetch_assoc();
            if ($checkwrap_1['status'] != 20) {
                $mysqli->query("DELETE FROM `changes` WHERE `pok` = '" . $battle['pok1'] . "'");
                $mysqli->query("UPDATE battle SET `zm1`='0',`pok1`='" . $battle['zm1'] . "' WHERE id='" . $battle['id'] . "'");
                $mysqli->query("UPDATE status SET `toxic` = '0' WHERE `pok` = '" . $battle['pok1'] . "' and `status` = '8' ");
            } else {
            }
            if ($battle['spikes1'] > 0) { // Шипы
                $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                if ($pok_base1['type'] == "flying" or $pok_base1['type_two'] == "flying") {
                    // ни ху я
                } else {
                    if ($battle['spikes1'] == 1) {
                        $dl = 8;
                    }
                    if ($battle['spikes1'] == 2) {
                        $dl = 6;
                    }
                    if ($battle['spikes1'] == 3) {
                        $dl = 4;
                    }
                    $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / $dl);
                    if ($pk1['hp'] < 0) {
                        $pk1['hp'] = 0;
                    }
                    $dop_zm1 = "<i>Покемон терпит ранения от шипов.</i><br>";
                }
            }







            if ($battle['tspikes1'] == 1) { // Отравленные шипы
                $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                if (
                    $pok_base1['type'] == "flying" or
                    $pok_base1['type_two'] == "flying" or
                    $pok_base1['type'] == "steel" or
                    $pok_base1['type_two'] == "steel" or
                    $pok_base1['type'] == "poison" or
                    $pok_base1['type_two'] == "poison" or
                    $status1['status'] == 1 or
                    $status1['status'] == 2 or
                    $status1['status'] == 3 or
                    $status1['status'] == 4 or
                    $status1['status'] == 8
                ) {
                    // ни ху я
                } else {
                    $plus = plusStatus($battle['id'], $pk1['id'], 1, 9999);
                    if ($plus == "fall") {
                        $dop_zm1 = $dop_zm1 . "";
                    } else {
                        $mysqli->query($plus);
                        $dop_zm1 = $dop_zm1 . " <i>Покемон отравлен</i><br>";
                    }
                }
            }
            if ($battle['tspikes1'] == 2) { // Отравленные шипы
                $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                if (
                    $pok_base1['type'] == "flying" or
                    $pok_base1['type_two'] == "flying" or
                    $pok_base1['type'] == "steel" or
                    $pok_base1['type_two'] == "steel" or
                    $pok_base1['type'] == "poison" or
                    $pok_base1['type_two'] == "poison" or
                    $status1['status'] == 1 or
                    $status1['status'] == 2 or
                    $status1['status'] == 3 or
                    $status1['status'] == 4 or
                    $status1['status'] == 8
                ) {
                    // ни ху я
                } else {
                    $plus = plusStatus($battle['id'], $pk1['id'], 8, 9999);
                    if ($plus == "fall") {
                        $dop_zm1 = $dop_zm1 . "";
                    } else {
                        $mysqli->query($plus);
                        $dop_zm1 = $dop_zm1 . " <i>Покемон отравлен</i><br>";
                    }
                }
            }
            if ($battle['spide1'] > 0) { // Паутина 
                $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                if ($pok_base1['type'] == "flying" or $pok_base1['type_two'] == "flying") {
                    // ни ху я
                } else {
                    $plus = plusChanges($battle['id'], $pk1['id'], 2, 1, "speed");
                    if ($plus !== "fall") {
                        $mysqli->query($plus);
                        $dop_zm1 = " <i>Скорость противника -1</i><br>";
                    } else {
                        $dop_zm1 = " <i>Но ничего не вышло</i><br>";
                    }
                }
            }
            if ($battle['lig1'] > 0) { // Паутина  $damager['item_id'] == 293

                // --- Toxic
                $damage = 0;
            }


            if ($damager['item_id'] == 293) { // Паутина 
                $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                if ($pok_base1['type'] == "flying" or $pok_base1['type_two'] == "flying") {
                    // ни ху я
                } else {
                    $plus = plusChanges($battle['id'], $pk1['id'], 2, 2, "speed");
                    if ($plus !== "fall") {
                        $mysqli->query($plus);
                        $dop_zm1 = " <i>Скорость противника -1</i><br>";
                    } else {
                        $dop_zm1 = " <i>Но ничего не вышло</i><br>";
                    }
                }
            }

            if ($battle['rock1'] > 0) { // Каменная ловушка 
                $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                $tip_eff = tip("rock", $pok_base1['type']) * tip("rock", $pok_base1['type_two']);
                if ($tip_eff == 0.25) {
                    $dl = 32;
                }
                if ($tip_eff == 0.5) {
                    $dl = 16;
                }
                if ($tip_eff == 1) {
                    $dl = 8;
                }
                if ($tip_eff == 2) {
                    $dl = 4;
                }
                if ($tip_eff == 4) {
                    $dl = 2;
                }
                $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / $dl);
                if ($pk1['hp'] < 0) {
                    $pk1['hp'] = 0;
                }
                $dop_zm1 = "<i>Покемон терпит ранения от ловушки.</i><br>";
            }


            $reg13333 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 1 and location <= 68  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
            if ($reg13333) { // Каменная ловушка 
                $weather13122 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 5 and id = 1')->fetch_assoc();
                if ($weather13122) {
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    $tip_eff = tip("ice", $pok_base1['type']) * tip("ice", $pok_base1['type_two']);
                    if ($pok_base1['type'] == "ice" or $pok_base1['type_two'] == "ice") {
                    } else {
                        $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / 16);
                        if ($pk1['hp'] < 0) {
                            $pk1['hp'] = 0;
                        }
                        $dop_zm1 = "<i>Покемон терпит ранения от града.</i><br>";
                    }
                }
            }


            $reg133333 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 69 and location <= 135  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
            if ($reg133333) { // Каменная ловушка 
                $weather131222 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 5 and id = 2')->fetch_assoc();
                if ($weather131222) {
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    $tip_eff = tip("ice", $pok_base1['type']) * tip("ice", $pok_base1['type_two']);
                    if ($pok_base1['type'] == "ice" or $pok_base1['type_two'] == "ice") {
                    } else {
                        $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / 16);
                        if ($pk1['hp'] < 0) {
                            $pk1['hp'] = 0;
                        }
                        $dop_zm1 = "<i>Покемон терпит ранения от града.</i><br>";
                    }
                }
            }




            $reg1333 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 200 and location <= 266  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
            if ($reg1333) { // Каменная ловушка 
                $weather1312 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 5 and id = 3')->fetch_assoc();
                if ($weather1312) {
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    $tip_eff = tip("ice", $pok_base1['type']) * tip("ice", $pok_base1['type_two']);
                    if ($pok_base1['type'] == "ice" or $pok_base1['type_two'] == "ice") {
                    } else {
                        $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / 16);
                        if ($pk1['hp'] < 0) {
                            $pk1['hp'] = 0;
                        }
                        $dop_zm1 = "<i>Покемон терпит ранения от града.</i><br>";
                    }
                }
            }


            if ($battle['norm1'] > 0) { // Каменная ловушка 
                $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                $tip_eff = tip("rock", $pok_base1['type']) * tip("rock", $pok_base1['type_two']);
                if ($tip_eff == 0.25) {
                    $dl = 32;
                }
                if ($tip_eff == 0.5) {
                    $dl = 16;
                }
                if ($tip_eff == 1) {
                    $dl = 8;
                }
                if ($tip_eff == 2) {
                    $dl = 4;
                }
                if ($tip_eff == 4) {
                    $dl = 2;
                }
                $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / $dl);
                if ($pk1['hp'] < 0) {
                    $pk1['hp'] = 0;
                }
                $dop_zm1 = "<i>Покемон терпит ранения от ловушки.</i><br>";
            }
        } elseif ($battle['atk1'] == 888) {
            //item
        } else {
            if ($ai1['atac_categori'] == 0 or $ai1['atac_categori'] > 2) { // ----- особая атака
                $os1 = OsobCategory($battle['atk1'], $pk1, $pk2, $battle['id']);
                if (isset($os1['mysql']) and $os1['mysql'] !== "fall") {
                    if (isset($os1['mos']) && $os1['mos'] > 0) {
                        for ($i = 1; $i <= $os1['mos']; $i++) {
                            if ($os1['mysql'][$i] !== "fall") {
                                if ($os1['mysql'][$i] == "plus_hp") {
                                    $pk1['hp'] = $os1['hp_p'][$i];
                                } elseif ($os1['mysql'][$i] == "minus_hp") {
                                    $pk1['hp'] = $os1['hp_m'][$i];
                                } else {
                                    $mysqli->query($os1['mysql'][$i]);
                                }
                            }
                        }
                    } else {
                        if ($os1['mysql'] == "plus_hp") {
                            $pk1['hp'] = $os1['hp_p'];
                        } elseif ($os1['mysql'] == "minus_hp") {
                            $pk1['hp'] = $os1['hp_m'];
                        } else {
                            $mysqli->query($os1['mysql']);
                        }
                    }
                }
                $os1['log'] = isset($os1['log']) ? $os1['log'] : '';
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log1_osob = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>" . $os1['log'] . "<br>";
            } else { // ----- обычная атака
                //             if($battle['atk1'] == 82) { $dm1['dm'] = 40; } // dragon rage 
                //               if($battle['atk1'] == 101) { $dm1['dm'] = $pk1['lvl']; } // Night Shade
                if ($battle['atk1'] == 999999999999) {
                    $dm1['dm'] = 40;
                } else {
                    $dm1 = Damage($battle['atk1'], $pk1, $pk2, $battle['id']);
                    if (isset($dm1['att_you']) && $dm1['att_you'] > 0) {
                        $pk1['hp'] = $pk1['hp'] - round(($pk1['hp_max'] / 100) * $dm1['att_you']);
                    }
                    if ($battle['atk1'] == 153 or $battle['atk1'] == 120) {
                        $dm1['dm'] = $dm1['dm'];
                        $pk1['hp'] = 0;
                    }
                    if ($battle['atk1'] == 515) {
                        $dm1['dm'] = $pk1['hp'];
                        $pk1['hp'] = 0;
                    }
                    if ($battle['atk1'] == 82) {
                        $dm1['dm'] = 40;
                    }
                    if ($battle['atk1'] == 49) {
                        $dm1['dm'] = 20;
                    }
                    if ($battle['atk1'] == 214) {
                        $dm1['dm'] = 20;
                    }
                }
            }
        }
        $checkwrap_1_1_1_1 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok1'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();
        if ($battle['atk1'] == 999 and $pk1['nn'] = 1) {
            if ($checkwrap_1_1_1_1['status'] != 20) {
                $dop_zm1 = isset($dop_zm1) ? $dop_zm1 : '';
                $log1 = "<b>" . infUsr($battle['user1'], "login") . ": <img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b>, выбираю тебя!<br>" . $dop_zm1;
            } else {
                $dop_zm1 = isset($dop_zm1) ? $dop_zm1 : '';
                $log1 = "<b>" . infUsr($battle['user1'], "login") . ": Хотел поменять покемона, но покемон не может покинуть битву!<br>" . $dop_zm1;
            }
        } elseif ($battle['atk1'] == 888) {
            $infUSIT1 = useITEM($battle, 1);
            $log1 = isset($infUSIT1['log']) ? $infUSIT1['log'] : '';
            $dm1['dm'] = isset($infUSIT1['dmg']) ? $infUSIT1['dmg'] : '';
            $pk1['hp'] = $pk1['hp'] + (isset($infUSIT1['plus_hp']) ? $infUSIT1['plus_hp'] : '');
            if ($pk1['hp'] > $pk1['hp_max']) {
                $pk1['hp'] = $pk1['hp_max'];
            }
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            if ($battle['atk1'] == 10000) { // Blast Burn
                $dm1['dm'] = 0;
                $dm1['cri'] = "Подготавливается к атаке...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=307","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "Blast Burn";
            } elseif ($battle['atk1'] == 10003) { // Dig
                $dm1['dm'] = 0;
                $dm1['cri'] = "Закапывается под землю...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=91","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "Dig";
            } elseif ($battle['atk1'] == 10009) { // Bounce
                $dm1['dm'] = 0;
                $dm1['cri'] = "Взлетает высоко в воздух...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=340","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "Bounce";
            } elseif ($battle['atk1'] == 100039) { // Blast Burn
                $dm1['dm'] = $dm1['dm'];
                $dm1['cri'] = "Укрепляет тело";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=91","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "Skull Bash";
            } elseif ($battle['atk1'] == 10004) { // Blast Burn
                $dm1['dm'] = 0;
                $dm1['cri'] = "Взлетает высоко в воздух...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=143","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "Sky Attack";
            } elseif ($battle['atk1'] == 10005) { // Blast Burn
                $dm1['dm'] = 0;
                $dm1['cri'] = "Покемон накапливает солнечную энергию...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=76","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "SolarBeam";
            } elseif ($battle['atk1'] == 10006) { // Blast Burn
                $dm1['dm'] = 0;
                $dm1['cri'] = "Покемон зивает во весь рот...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=281","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "Yawn";
            } elseif ($battle['atk1'] == 10050) { //  phantom
                $dm1['dm'] = 0;
                $dm1['cri'] = "Покемон накапливает силу...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=1024","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "Phantom Force";
            } elseif ($battle['atk1'] == 10051) { //  Future Sight
                $dm1['dm'] = 0;
                $dm1['cri'] = "Покемон cсмотри в будущее..";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=248","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai1['attac_name_eng'] = "Future Sight";
            }
            if ($battle['atk1'] == 10001) { // Hyper Beam
                $dm1['dm'] = 0;
                $nLog_1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name'] . "</b> отдыхает после проведенной атаки.<br>";
            } elseif ($battle['atk1'] == 10008) { // Hyper Beam
                $dm1['dm'] = $dm1['dm'];
                $nLog_1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . " <br>";
            } elseif ($battle['atk1'] == 100038) { // Hyper Beam
                $dm1['dm'] = $dm1['dm'];
                $nLog_1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . " <br>";
            } elseif ($battle['atk1'] == 10010) { // Hyper Beam
                $dm1['dm'] = $dm1['dm'];
                $nLog_1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . " <br>";
            } elseif ($battle['atk1'] == 10011) { // Hyper Beam
                $dm1['dm'] = $dm1['dm'];
                $nLog_1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . " <br>";
            } elseif ($battle['atk1'] == 10007) { // Hyper Beam
                $dm1['dm'] = $dm1['dm'];
                $nLog_1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . " <br>";
            } elseif ($battle['atk1'] == '') { // Hyper Beam
                $dm1['dm'] = $dm1['dm'];
                $nLog_1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . " <br>";
            }
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . " <br>";
            if (!empty($nLog_1)) {
                $log1 = $nLog_1;
            }
        }
        $rHP2 = $pk2['hp'] - $dm1['dm'];
        if ($rHP2 > 0) {
            if ($battle['atk2'] == 999) { // ----- замена покемона
                $checkwrap_2 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok2'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();
                if ($checkwrap_2['status'] != 20) {
                    $mysqli->query("DELETE FROM `changes` WHERE `pok` = '" . $battle['pok2'] . "'");
                    $mysqli->query("UPDATE battle SET `zm2`='0',`pok2`='" . $battle['zm2'] . "' WHERE id='" . $battle['id'] . "'");
                    $mysqli->query("UPDATE status SET `toxic` = '0' WHERE `pok` = '" . $battle['pok2'] . "' and `status` = '8' ");
                } else {
                }
                if ($battle['spikes2'] > 0) {
                    $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                    if ($pok_base2['type'] == "flying" or $pok_base2['type_two'] == "flying") {
                    } else {
                        if ($battle['spikes2'] == 1) {
                            $dl = 8;
                        }
                        if ($battle['spikes2'] == 2) {
                            $dl = 6;
                        }
                        if ($battle['spikes2'] == 3) {
                            $dl = 4;
                        }
                        $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / $dl);
                        if ($pk2['hp'] < 0) {
                            $pk2['hp'] = 0;
                        }
                        $dop_zm2 = "<i>Покемон терпит ранения от шипов.</i>";
                    }
                }



                if ($battle['tspikes2'] == 1) { // Отравленные шипы
                    $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                    if (
                        $pok_base2['type'] == "flying" or
                        $pok_base2['type_two'] == "flying" or
                        $pok_base2['type'] == "steel" or
                        $pok_base2['type_two'] == "steel" or
                        $pok_base2['type'] == "poison" or
                        $pok_base2['type_two'] == "poison" or
                        $status2['status'] == 1 or
                        $status2['status'] == 2 or
                        $status2['status'] == 3 or
                        $status2['status'] == 4 or
                        $status2['status'] == 8
                    ) {
                        // null
                    } else {
                        $plus = plusStatus($battle['id'], $pk2['id'], 1, 9999);
                        if ($plus == "fall") {
                            $dop_zm2 = $dop_zm2 . "";
                        } else {
                            $mysqli->query($plus);
                            $dop_zm2 = $dop_zm2 . " <i>Покемон отравлен</i><br>";
                        }
                    }
                }
                if ($battle['tspikes2'] == 2) { // Отравленные шипы
                    $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                    if (
                        $pok_base2['type'] == "flying" or
                        $pok_base2['type_two'] == "flying" or
                        $pok_base2['type'] == "steel" or
                        $pok_base2['type_two'] == "steel" or
                        $pok_base2['type'] == "poison" or
                        $pok_base2['type_two'] == "poison" or
                        $status2['status'] == 1 or
                        $status2['status'] == 2 or
                        $status2['status'] == 3 or
                        $status2['status'] == 4 or
                        $status2['status'] == 8
                    ) {
                        // null
                    } else {
                        $plus = plusStatus($battle['id'], $pk2['id'], 8, 9999);
                        if ($plus == "fall") {
                            $dop_zm2 = $dop_zm2 . "";
                        } else {
                            $mysqli->query($plus);
                            $dop_zm2 = $dop_zm2 . " <i>Покемон отравлен</i><br>";
                        }
                    }
                }


                if ($battle['spide2'] > 0) { // Паутина 
                    $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                    if ($pok_base2['type'] == "flying" or $pok_base2['type_two'] == "flying") {
                        // null
                    } else {
                        $plus = plusChanges($battle['id'], $pk2['id'], 2, 1, "speed");
                        if ($plus !== "fall") {
                            $mysqli->query($plus);
                            $dop_zm2 = " <i>Скорость противника -1</i><br>";
                        } else {
                            $dop_zm2 = " <i>Но ничего не вышло</i><br>";
                        }
                    }
                }
                if ($battle['lig2'] > 0) { // Паутина 
                    $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                    if ($pok_base2['type'] == "flying" or $pok_base2['type_two'] == "flying") {
                        // null
                    } else {
                        $plus = plusChanges($battle['id'], $pk2['id'], 2, 1, "speed");
                        if ($plus !== "fall") {
                            $mysqli->query($plus);
                            $dop_zm2 = " <i>Скорость противника -1</i><br>";
                        } else {
                            $dop_zm2 = " <i>Но ничего не вышло</i><br>";
                        }
                    }
                }





                if ($damager['item_id'] == 293) { // Паутина 
                    $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();

                    // null
                    {
                        $plus = plusChanges($battle['id'], $pk1['id'], 2, 2, "speed");
                        if ($plus !== "fall") {
                            $mysqli->query($plus);
                            $dop_zm2 = " <i>Скорость противника -1</i><br>";
                        } else {
                            $dop_zm2 = " <i>Но ничего не вышло</i><br>";
                        }
                    }
                }

                if ($battle['rock2'] > 0) { // Каменная ловушка 
                    $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                    $tip_eff = tip("rock", $pok_base2['type']) * tip("rock", $pok_base2['type_two']);
                    if ($tip_eff == 0.25) {
                        $dl = 32;
                    }
                    if ($tip_eff == 0.5) {
                        $dl = 16;
                    }
                    if ($tip_eff == 1) {
                        $dl = 8;
                    }
                    if ($tip_eff == 2) {
                        $dl = 4;
                    }
                    if ($tip_eff == 4) {
                        $dl = 2;
                    }
                    $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / $dl);
                    if ($pk2['hp'] < 0) {
                        $pk2['hp'] = 0;
                    }
                    $dop_zm2 = "<i>Покемон терпит ранения от ловушки.</i><br>";
                }




                $reg133331 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 1 and location <= 68  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
                if ($reg133331) { // Каменная ловушка 
                    $weather131221 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 5 and id = 1')->fetch_assoc();
                    if ($weather131221) {
                        $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                        $tip_eff = tip("ice", $pok_base2['type']) * tip("ice", $pok_base2['type_two']);
                        if ($pok_base2['type'] == "ice" or $pok_base2['type_two'] == "ice") {
                        } else {
                            $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / 16);
                            if ($pk2['hp'] < 0) {
                                $pk2['hp'] = 0;
                            }
                            $dop_zm2 = "<i>Покемон терпит ранения от града.</i><br>";
                        }
                    }
                }


                $reg13333311 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 69 and location <= 135  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
                if ($reg13333311) { // Каменная ловушка 
                    $weather13122211 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 5 and id = 2')->fetch_assoc();
                    if ($weather13122211) {
                        $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                        $tip_eff = tip("ice", $pok_base2['type']) * tip("ice", $pok_base2['type_two']);
                        if ($pok_base2['type'] == "ice" or $pok_base2['type_two'] == "ice") {
                        } else {
                            $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / 16);
                            if ($pk2['hp'] < 0) {
                                $pk2['hp'] = 0;
                            }
                            $dop_zm2 = "<i>Покемон терпит ранения от града.</i><br>";
                        }
                    }
                }




                $reg1333111 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 200 and location <= 266  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
                if ($reg1333111) { // Каменная ловушка 
                    $weather1312111 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 5 and id = 3')->fetch_assoc();
                    if ($weather1312111) {
                        $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                        $tip_eff = tip("ice", $pok_base2['type']) * tip("ice", $pok_base2['type_two']);
                        if ($pok_base2['type'] == "ice" or $pok_base2['type_two'] == "ice") {
                        } else {
                            $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / 16);
                            if ($pk2['hp'] < 0) {
                                $pk2['hp'] = 0;
                            }
                            $dop_zm2 = "<i>Покемон терпит ранения от града.</i><br>";
                        }
                    }
                }



                if ($battle['norm2'] > 0) { // Каменная ловушка 
                    $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                    $tip_eff = tip("rock", $pok_base2['type']) * tip("rock", $pok_base2['type_two']);
                    if ($tip_eff == 0.25) {
                        $dl = 32;
                    }
                    if ($tip_eff == 0.5) {
                        $dl = 16;
                    }
                    if ($tip_eff == 1) {
                        $dl = 8;
                    }
                    if ($tip_eff == 2) {
                        $dl = 4;
                    }
                    if ($tip_eff == 4) {
                        $dl = 2;
                    }
                    $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / $dl);
                    if ($pk2['hp'] < 0) {
                        $pk2['hp'] = 0;
                    }
                    $dop_zm2 = "<i>Покемон терпит ранения от ловушки.</i><br>";
                }
            } elseif ($battle['atk2'] == 888) {
                //item
            } else {
                if ($ai2['atac_categori'] == 0 or $ai2['atac_categori'] > 2) { // ----- особая атака
                    $os2 = OsobCategory($battle['atk2'], $pk2, $pk1, $battle['id']);
                    if (isset($os2['mysql']) and $os2['mysql'] !== "fall") {
                        if (isset($os2['mos']) && $os2['mos'] > 0) {
                            for ($i = 1; $i <= $os2['mos']; $i++) {
                                if ($os2['mysql'][$i] !== "fall") {
                                    if ($os2['mysql'][$i] == "plus_hp") {
                                        $pk2['hp'] = $os2['hp_p'][$i];
                                    } elseif ($os2['mysql'][$i] == "minus_hp") {
                                        $pk2['hp'] = $os2['hp_m'][$i];
                                    } else {
                                        $mysqli->query($os2['mysql'][$i]);
                                    }
                                }
                            }
                        } else {
                            if ($os2['mysql'] == "plus_hp") {
                                $pk2['hp'] = $os2['hp_p'];
                            } elseif ($os2['mysql'] == "minus_hp") {
                                $pk2['hp'] = $os2['hp_m'];
                            } else {
                                $mysqli->query($os2['mysql']);
                            }
                        }
                    }

                    $infMv2 = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                    $log2_osob = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv2 . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
                } else { // ----- обычная атака
                    //                if($battle['atk2'] == 82) { $dm2['dm'] = 40; } // dragon rage 
                    //                  if($battle['atk2'] == 101) { $dm2['dm'] = $pk2['lvl']; } // Night Shade
                    if ($battle['atk2'] == 99999999999999) {
                        $dm2['dm'] = 40;
                    } else {
                        $dm2 = Damage($battle['atk2'], $pk2, $pk1, $battle['id']);
                        if (isset($dm2['att_you']) && $dm2['att_you'] > 0) {
                            $pk2['hp'] = $pk2['hp'] - round(($pk2['hp_max'] / 100) * $dm2['att_you']);
                        }
                        if ($battle['atk2'] == 153 or $battle['atk2'] == 120) {
                            $pk2['hp'] = 0;
                        }
                    }
                }
                if ($ai1['atac_accuracy'] == 0) {
                    $ai1['atac_accuracy'] = 100;
                }
                if ($ai2['atac_accuracy'] == 0) {
                    $ai2['atac_accuracy'] = 100;
                }
            }
            $checkwrap_2_2_2_2 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok2'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();
            if ($battle['atk2'] == 999) {
                if ($checkwrap_2_2_2_2['status'] != 20) {
                    $log2 = "<b>" . infUsr($battle['user2'], "login") . ": <img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0>" . $pk2['name'] . "</b>, выбираю тебя!<br>" . $dop_zm2;
                } else {
                    $log2 = "<b>" . infUsr($battle['user2'], "login") . ": Хотел сменить покемона, но покемон не может покинуть битву!<br>" . $dop_zm2;
                }
            } elseif ($battle['atk2'] == 888) {
                $infUSIT2 = useITEM($battle, 2);
                $log2 = isset($infUSIT2['log']) ? $infUSIT2['log'] : '';
                $dm2['dm'] = isset($infUSIT2['dmg']) ? $infUSIT2['dmg'] : '';
                $pk2['hp'] = $pk2['hp'] + (isset($infUSIT2['plus_hp']) ? $infUSIT2['plus_hp'] : '');
                if ($pk2['hp'] > $pk2['hp_max']) {
                    $pk2['hp'] = $pk2['hp_max'];
                }
            } else {
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            }
        }
    } else {
        if ($battle['atk2'] == 999) { // ----- замена покемона
            $checkwrap_2_2 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok2'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();
            if ($checkwrap_2_2['status'] != 20) {
                $mysqli->query("DELETE FROM `changes` WHERE `pok` = '" . $battle['pok2'] . "'");
                $mysqli->query("UPDATE battle SET `zm2`='0',`pok2`='" . $battle['zm2'] . "' WHERE id='" . $battle['id'] . "'");
                $mysqli->query("UPDATE status SET `toxic` = '0' WHERE `pok` = '" . $battle['pok2'] . "' and `status` = '8' ");
            } else {
            }
            if ($battle['spikes2'] > 0) {
                $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                if ($pok_base2['type'] == "flying" or $pok_base2['type_two'] == "flying") {
                    // null
                } else {
                    if ($battle['spikes2'] == 1) {
                        $dl = 8;
                    }
                    if ($battle['spikes2'] == 2) {
                        $dl = 6;
                    }
                    if ($battle['spikes2'] == 3) {
                        $dl = 4;
                    }
                    $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / $dl);
                    if ($pk2['hp'] < 0) {
                        $pk2['hp'] = 0;
                    }
                    $dop_zm2 = "<i>Покемон терпит ранения от шипов.</i>";
                }
            }

            if ($battle['tspikes2'] == 1) { // Отравленные шипы
                $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                if (
                    $pok_base2['type'] == "flying" or
                    $pok_base2['type_two'] == "flying" or
                    $pok_base2['type'] == "steel" or
                    $pok_base2['type_two'] == "steel" or
                    $pok_base2['type'] == "poison" or
                    $pok_base2['type_two'] == "poison" or
                    $status2['status'] == 1 or
                    $status2['status'] == 2 or
                    $status2['status'] == 3 or
                    $status2['status'] == 4 or
                    $status2['status'] == 8
                ) {
                    // null
                } else {
                    $plus = plusStatus($battle['id'], $pk2['id'], 1, 9999);
                    if ($plus == "fall") {
                        $dop_zm2 = $dop_zm2 . "";
                    } else {
                        $mysqli->query($plus);
                        $dop_zm2 = $dop_zm2 . " <i>Покемон  отравлен</i><br>";
                    }
                }
            }

            if ($battle['tspikes2'] == 2) { // Отравленные шипы
                $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                if (
                    $pok_base2['type'] == "flying" or
                    $pok_base2['type_two'] == "flying" or
                    $pok_base2['type'] == "steel" or
                    $pok_base2['type_two'] == "steel" or
                    $pok_base2['type'] == "poison" or
                    $pok_base2['type_two'] == "poison" or
                    $status2['status'] == 1 or
                    $status2['status'] == 2 or
                    $status2['status'] == 3 or
                    $status2['status'] == 4 or
                    $status2['status'] == 8
                ) {
                    // null
                } else {
                    $plus = plusStatus($battle['id'], $pk2['id'], 8, 9999);
                    if ($plus == "fall") {
                        $dop_zm2 = $dop_zm2 . "";
                    } else {
                        $mysqli->query($plus);
                        $dop_zm2 = $dop_zm2 . " <i>Покемон  отравлен</i><br>";
                    }
                }
            }


            if ($battle['spide2'] > 0) { // Паутина 
                $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                if ($pok_base2['type'] == "flying" or $pok_base2['type_two'] == "flying") {
                    // null
                } else {
                    $plus = plusChanges($battle['id'], $pk2['id'], 2, 1, "speed");
                    if ($plus !== "fall") {
                        $mysqli->query($plus);
                        $dop_zm2 = " <i>Скорость противника -1</i><br>";
                    } else {
                        $dop_zm2 = " <i>Но ничего не вышло</i><br>";
                    }
                }
            }


            if ($damager['item_id'] == 293) { // Паутина 
                $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                if ($pok_base2['type'] == "flying" or $pok_base2['type_two'] == "flying") {
                    // null
                } else {
                    $plus = plusChanges($battle['id'], $pk2['id'], 2, 1, "speed");
                    if ($plus !== "fall") {
                        $mysqli->query($plus);
                        $dop_zm2 = " <i>Скорость противника -1</i><br>";
                    } else {
                        $dop_zm2 = " <i>Но ничего не вышло</i><br>";
                    }
                }
            }

            if ($battle['rock2'] > 0) { // Каменная ловушка 
                $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                $tip_eff = tip("rock", $pok_base2['type']) * tip("rock", $pok_base2['type_two']);
                if ($tip_eff == 0.25) {
                    $dl = 32;
                }
                if ($tip_eff == 0.5) {
                    $dl = 16;
                }
                if ($tip_eff == 1) {
                    $dl = 8;
                }
                if ($tip_eff == 2) {
                    $dl = 4;
                }
                if ($tip_eff == 4) {
                    $dl = 2;
                }
                $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / $dl);
                if ($pk2['hp'] < 0) {
                    $pk2['hp'] = 0;
                }
                $dop_zm2 = "<i>Покемон терпит ранения от ловушки.</i><br>";
            }
            if ($battle['norm2'] > 0) { // Каменная ловушка 
                $pok_base2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk2['basenum'] . "' ")->fetch_assoc();
                $tip_eff = tip("rock", $pok_base2['type']) * tip("rock", $pok_base2['type_two']);
                if ($tip_eff == 0.25) {
                    $dl = 32;
                }
                if ($tip_eff == 0.5) {
                    $dl = 16;
                }
                if ($tip_eff == 1) {
                    $dl = 8;
                }
                if ($tip_eff == 2) {
                    $dl = 4;
                }
                if ($tip_eff == 4) {
                    $dl = 2;
                }
                $pk2['hp'] = $pk2['hp'] - round($pk2['hp_max'] / $dl);
                if ($pk2['hp'] < 0) {
                    $pk2['hp'] = 0;
                }
                $dop_zm2 = "<i>Покемон терпит ранения от ловушки.</i><br>";
            }
        } elseif ($battle['atk2'] == 888) {
            //item
        } else {
            $ai2 = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = '" . $battle['atk2'] . "'")->fetch_assoc();
            if ($ai2['atac_categori'] == 0 or $ai2['atac_categori'] > 2) { // ----- особая атака
                $os2 = OsobCategory($battle['atk2'], $pk2, $pk1, $battle['id']);
                if (isset($os2['mysql']) and $os2['mysql'] !== "fall") {
                    if (isset($os2['mos']) && $os2['mos'] > 0) {
                        for ($i = 1; $i <= $os2['mos']; $i++) {
                            if ($os2['mysql'][$i] !== "fall") {
                                if ($os2['mysql'][$i] == "plus_hp") {
                                    $pk2['hp'] = $os2['hp_p'][$i];
                                } elseif ($os2['mysql'][$i] == "minus_hp") {
                                    $pk2['hp'] = $os2['hp_m'][$i];
                                } else {
                                    $mysqli->query($os2['mysql'][$i]);
                                }
                            }
                        }
                    } else {
                        if ($os2['mysql'] == "plus_hp") {
                            $pk2['hp'] = $os2['hp_p'];
                        } elseif ($os2['mysql'] == "minus_hp") {
                            $pk2['hp'] = $os2['hp_m'];
                        } else {
                            $mysqli->query($os2['mysql']);
                        }
                    }
                }
                $infMv2 = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log2_osob = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv2 . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>" . $os2['log'] . "<br>";
            } else { // ----- обычная атака
                if ($battle['atk2'] == 82) {
                    $dm2['dm'] = 40;
                } // dragon rage 
                else {
                    $dm2 = Damage($battle['atk2'], $pk2, $pk1, $battle['id']);
                    if (isset($dm2['att_you']) && $dm2['att_you'] > 0) {
                        $pk2['hp'] = $pk2['hp'] - round(($pk2['hp_max'] / 100) * $dm2['att_you']);
                    }
                    if ($battle['atk2'] == 153 or $battle['atk2'] == 120) {
                        $pk2['hp'] = 0;
                    }
                    if ($battle['atk1'] == 419 and $dm2['dm'] > 0) { //Лавина
                        $dm1['dm'] = $dm1['dm'] * 2;
                    }
                }
            }
            if ($ai1['atac_accuracy'] == 0) {
                $ai1['atac_accuracy'] = 100;
            }
            if ($ai2['atac_accuracy'] == 0) {
                $ai2['atac_accuracy'] = 100;
            }
        }
        $checkwrap_2_2_2_2 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok2'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();
        if ($battle['atk2'] == 999) {
            if ($checkwrap_2_2_2_2['status'] != 20) {
                $log2 = "<b>" . infUsr($battle['user2'], "login") . ": <img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0>" . $pk2['name'] . "</b>, выбираю тебя!<br>" . $dop_zm2;
            } else {
                $log2 = "<b>" . infUsr($battle['user2'], "login") . ": Хотел сменить покемона, но покемон не может покинуть битву!<br>" . $dop_zm2;
            }
        } elseif ($battle['atk2'] == 888) {
            $infUSIT2 = useITEM($battle, 2);
            $log2 = isset($infUSIT2['log']) ? $infUSIT2['log'] : '';
            $dm2['dm'] = isset($infUSIT2['dmg']) ? $infUSIT2['dmg'] : '';
            $pk2['hp'] = $pk2['hp'] + (isset($infUSIT2['plus_hp']) ? $infUSIT2['plus_hp'] : '');
            if ($pk2['hp'] > $pk2['hp_max']) {
                $pk2['hp'] = $pk2['hp_max'];
            }
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            if ($battle['atk2'] == 10000) { // Blast Burn
                $dm2['dm'] = 0;
                $dm2['cri'] = "Подготавливается к атаке...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=307","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "Blast Burn";
            } elseif ($battle['atk2'] == 10003) { // Dig
                $dm2['dm'] = 0;
                $dm2['cri'] = "Закапывается под землю...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=91","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "Dig";
            } elseif ($battle['atk2'] == 10009) { // Bounce
                $dm2['dm'] = 0;
                $dm2['cri'] = "Взлетает высоко в воздух...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=340","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "Bounce";
            } elseif ($battle['atk2'] == 100039) { // Blast Burn
                $dm2['dm'] = $dm2['dm'];
                $dm2['cri'] = "Укрепляет тело";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=91","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "Skull Bash";
            } elseif ($battle['atk2'] == 10004) { // Blast Burn
                $dm2['dm'] = 0;
                $dm2['cri'] = "Взлетает высоко в воздух...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=143","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "Sky Attack";
            } elseif ($battle['atk2'] == 10005) { // Blast Burn
                $dm2['dm'] = 0;
                $dm2['cri'] = "Покемон накапливает солнечную энергию...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=76","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "SolarBeam";
            } elseif ($battle['atk2'] == 10006) { // Blast Burn
                $dm2['dm'] = 0;
                $dm2['cri'] = "Зивает во весь рот...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=281","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "Yawn";
            } elseif ($battle['atk2'] == 10050) { // phantom
                $dm2['dm'] = 0;
                $dm2['cri'] = "Покемон накапливает энергию...";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=1024","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "Phantom Force";
            } elseif ($battle['atk2'] == 10051) { //  Future Sight
                $dm2['dm'] = 0;
                $dm2['cri'] = "Покемон cсмотри в будущее..";
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=248","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $ai2['attac_name_eng'] = "Future Sight";
            }
            if ($battle['atk2'] == 10001) { // Hyper Beam
                $dm2['dm'] = 0;
                $nLog_2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name'] . "</b> отдыхает после проведенной атаки.<br>";
            } elseif ($battle['atk2'] == 10008) { // Hyper Beam
                $dm2['dm'] = $dm2['dm'];
                $nLog_2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            } elseif ($battle['atk2'] == 100038) { // Hyper Beam
                $dm2['dm'] = $dm2['dm'];
                $nLog_2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            } elseif ($battle['atk2'] == 10010) { // Hyper Beam
                $dm2['dm'] = $dm2['dm'];
                $nLog_2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            } elseif ($battle['atk2'] == 10011) { // Hyper Beam
                $dm2['dm'] = $dm2['dm'];
                $nLog_2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            } elseif ($battle['atk2'] == 10007) { // Hyper Beam
                $dm2['dm'] = $dm2['dm'];
                $nLog_2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            } elseif ($battle['atk2'] == '') { // Hyper Beam
                $dm2['dm'] = $dm2['dm'];
                $nLog_2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            }
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            if (!empty($nLog_2)) {
                $log2 = $nLog_2;
            }
        }
        $rHP1 = $pk1['hp'] - $dm2['dm'];
        if ($rHP1 > 0) {
            if ($battle['atk1'] == 498) { // ----- замена покемона
                $mysqli->query("DELETE FROM `changes` WHERE `pok` = '" . $battle['pok2'] . "'");
            }
            /*if($battle['atk1'] == 114){ // ----- замена покемона
            $mysqli->query("DELETE FROM `changes` WHERE `pok` = '".$battle['pok2']."'");
            $mysqli->query("DELETE FROM `changes` WHERE `pok` = '".$battle['pok1']."'");
             }*/
            if ($battle['atk2'] == 498) { // ----- замена покемона
                $mysqli->query("DELETE FROM `changes` WHERE `pok` = '" . $battle['pok2'] . "'");
            }
            /*if($battle['atk2'] == 114){ // ----- замена покемона
            $mysqli->query("DELETE FROM `changes` WHERE `pok` = '".$battle['pok2']."'");
            $mysqli->query("DELETE FROM `changes` WHERE `pok` = '".$battle['pok1']."'");
             }*/
            if ($battle['atk1'] == 999) { // ----- замена покемона
                $checkwrap_1_1 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok1'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();
                if ($checkwrap_1_1['status'] != 20) {
                    $mysqli->query("DELETE FROM `changes` WHERE `pok` = '" . $battle['pok1'] . "'");
                    $mysqli->query("UPDATE battle SET `zm1`='0',`pok1`='" . $battle['zm1'] . "' WHERE id='" . $battle['id'] . "'");
                    $mysqli->query("UPDATE status SET `toxic` = '0' WHERE `pok` = '" . $battle['pok1'] . "' and `status` = '8' ");
                } else {
                }
                if ($battle['spikes1'] > 0) {
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    if ($pok_base1['type'] == "flying" or $pok_base1['type_two'] == "flying") {
                    } else {
                        if ($battle['spikes1'] == 1) {
                            $dl = 8;
                        }
                        if ($battle['spikes1'] == 2) {
                            $dl = 6;
                        }
                        if ($battle['spikes1'] == 3) {
                            $dl = 4;
                        }
                        $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / $dl);
                        if ($pk1['hp'] < 0) {
                            $pk1['hp'] = 0;
                        }
                        $dop_zm1 = "<i>Покемон терпит ранения от шипов.</i>";
                    }
                }
                if ($battle['tspikes1'] == 1) { // Отравленные шипы
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    if (
                        $pok_base1['type'] == "flying" or
                        $pok_base1['type_two'] == "flying" or
                        $pok_base1['type'] == "steel" or
                        $pok_base1['type_two'] == "steel" or
                        $pok_base1['type'] == "poison" or
                        $pok_base1['type_two'] == "poison" or
                        $status1['status'] == 1 or
                        $status1['status'] == 2 or
                        $status1['status'] == 3 or
                        $status1['status'] == 4 or
                        $status1['status'] == 8
                    ) {
                        // null
                    } else {
                        $plus = plusStatus($battle['id'], $pk1['id'], 1, 9999);
                        if ($plus == "fall") {
                            $dop_zm1 = $dop_zm1 . "";
                        } else {
                            $mysqli->query($plus);
                            $dop_zm1 = $dop_zm1 . " <i>Покемон отравлен</i><br>";
                        }
                    }
                }


                if ($battle['tspikes1'] == 2) { // Отравленные шипы
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    if (
                        $pok_base1['type'] == "flying" or
                        $pok_base1['type_two'] == "flying" or
                        $pok_base1['type'] == "steel" or
                        $pok_base1['type_two'] == "steel" or
                        $pok_base1['type'] == "poison" or
                        $pok_base1['type_two'] == "poison" or
                        $status1['status'] == 1 or
                        $status1['status'] == 2 or
                        $status1['status'] == 3 or
                        $status1['status'] == 4 or
                        $status1['status'] == 8
                    ) {
                        // null
                    } else {
                        $plus = plusStatus($battle['id'], $pk1['id'], 8, 9999);
                        if ($plus == "fall") {
                            $dop_zm1 = $dop_zm1 . "";
                        } else {
                            $mysqli->query($plus);
                            $dop_zm1 = $dop_zm1 . " <i>Покемон отравлен</i><br>";
                        }
                    }
                }

                if ($battle['spide1'] > 0) { // Паутина  $damager['item_id'] == 293
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    if ($pok_base1['type'] == "flying" or $pok_base1['type_two'] == "flying") {
                        // null
                    } else {
                        $plus = plusChanges($battle['id'], $pk1['id'], 2, 1, "speed");
                        if ($plus !== "fall") {
                            $mysqli->query($plus);
                            $dop_zm1 = " <i>Скорость противника -1</i><br>";
                        } else {
                            $dop_zm1 = " <i>Но ничего не вышло</i><br>";
                        }
                    }
                }
                if ($battle['lig1'] > 0) { // Паутина  $damager['item_id'] == 293

                    $damage = 0;
                }

                if ($damager['item_id'] == 293) { // Паутина  $damager['item_id'] == 293
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    if ($pok_base1['type'] == "flying" or $pok_base1['type_two'] == "flying") {
                        // null
                    } else {
                        $plus = plusChanges($battle['id'], $pk1['id'], 2, 2, "speed");
                        if ($plus !== "fall") {
                            $mysqli->query($plus);
                            $dop_zm1 = " <i>Скорость противника -1</i><br>";
                        } else {
                            $dop_zm1 = " <i>Но ничего не вышло</i><br>";
                        }
                    }
                }

                if ($battle['rock1'] > 0) { // Каменная ловушка 
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    $tip_eff = tip("rock", $pok_base1['type']) * tip("rock", $pok_base1['type_two']);
                    if ($tip_eff == 0.25) {
                        $dl = 32;
                    }
                    if ($tip_eff == 0.5) {
                        $dl = 16;
                    }
                    if ($tip_eff == 1) {
                        $dl = 8;
                    }
                    if ($tip_eff == 2) {
                        $dl = 4;
                    }
                    if ($tip_eff == 4) {
                        $dl = 2;
                    }
                    $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / $dl);
                    if ($pk1['hp'] < 0) {
                        $pk1['hp'] = 0;
                    }
                    $dop_zm1 = "<i>Покемон терпит ранения от ловушки.</i><br>";
                }
                if ($battle['norm1'] > 0) { // Каменная ловушка 
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "' ")->fetch_assoc();
                    $tip_eff = tip("rock", $pok_base1['type']) * tip("rock", $pok_base1['type_two']);
                    if ($tip_eff == 0.25) {
                        $dl = 32;
                    }
                    if ($tip_eff == 0.5) {
                        $dl = 16;
                    }
                    if ($tip_eff == 1) {
                        $dl = 8;
                    }
                    if ($tip_eff == 2) {
                        $dl = 4;
                    }
                    if ($tip_eff == 4) {
                        $dl = 2;
                    }
                    $pk1['hp'] = $pk1['hp'] - round($pk1['hp_max'] / $dl);
                    if ($pk1['hp'] < 0) {
                        $pk1['hp'] = 0;
                    }
                    $dop_zm1 = "<i>Покемон терпит ранения от ловушки.</i><br>";
                }
            } elseif ($battle['atk1'] == 888) {
                //item
            } else {
                $ai1 = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = '" . $battle['atk1'] . "'")->fetch_assoc();
                if ($ai1['atac_categori'] == 0 or $ai1['atac_categori'] > 2) { // ----- особая атака
                    $os1 = OsobCategory($battle['atk1'], $pk1, $pk2, $battle['id']);
                    if (isset($os1['mysql']) and $os1['mysql'] !== "fall") {
                        if (isset($os1['mos']) && $os1['mos'] > 0) {
                            for ($i = 1; $i <= $os1['mos']; $i++) {
                                if ($os1['mysql'][$i] !== "fall") {
                                    if ($os1['mysql'][$i] == "plus_hp") {
                                        $pk1['hp'] = $os1['hp_p'][$i];
                                    } elseif ($os1['mysql'][$i] == "minus_hp") {
                                        $pk1['hp'] = $os1['hp_m'][$i];
                                    } else {
                                        $mysqli->query($os1['mysql'][$i]);
                                    }
                                }
                            }
                        } else {
                            if ($os1['mysql'] == "plus_hp") {
                                $pk1['hp'] = $os1['hp_p'];
                            } elseif ($os1['mysql'] == "minus_hp") {
                                $pk1['hp'] = $os1['hp_m'];
                            } else {
                                $mysqli->query($os1['mysql']);
                            }
                        }
                    }
                    $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                    $log1_osob = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>" . $os1['log'] . "<br>";
                } else { // ----- обычная атака
                    if ($battle['atk1'] == 82) {
                        $dm1['dm'] = 40;
                    } // dragon rage 
                    else {
                        $dm1 = Damage($battle['atk1'], $pk1, $pk2, $battle['id']);
                        if (isset($dm1['att_you']) && $dm1['att_you'] > 0) {
                            $pk1['hp'] = $pk1['hp'] - round(($pk1['hp_max'] / 100) * $dm1['att_you']);
                        }
                        if ($battle['atk1'] == 153 or $battle['atk1'] == 120) {
                            $pk1['hp'] = 0;
                        }
                    }
                }
            }
            $checkwrap_1_1_1_1 = $mysqli->query("SELECT * FROM status WHERE pok = '" . $battle['pok1'] . "' AND bid = '" . $battle['id'] . "' ")->fetch_assoc();
            if ($battle['atk1'] == 999) {
                if ($checkwrap_1_1_1_1['status'] != 20) {
                    $log1 = "<b>" . infUsr($battle['user1'], "login") . ": <img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0>" . $pk1['name_new'] . ".gif border=0>" . $pk1['name'] . "</b>, выбираю тебя!<br>" . $dop_zm1;
                } else {
                    $log1 = "<b>" . infUsr($battle['user1'], "login") . ": Хотел поменять покемона, но покемон не может покинуть битву!<br>" . $dop_zm1;
                }
            } elseif ($battle['atk1'] == 888) {
                $infUSIT1 = useITEM($battle, 1);
                $log1 = isset($infUSIT1['log']) ? $infUSIT1['log'] : '';
                $dm1['dm'] = isset($infUSIT1['dmg']) ? $infUSIT1['dmg'] : '';
                $pk1['hp'] = $pk1['hp'] + (isset($infUSIT1['plus_hp']) ? $infUSIT1['plus_hp'] : '');
                if ($pk1['hp'] > $pk1['hp_max']) {
                    $pk1['hp'] = $pk1['hp_max'];
                }
            } else {
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . " <br>";
            }
        }
    }
    if (isset($log1_osob) && $log1_osob) {
        $log1 = $log1_osob;
    }
    if (isset($log2_osob) && $log2_osob) {
        $log2 = $log2_osob;
    }
    if (isset($pk1['item_id']) && $pk1['item_id'] == 26) { // объедки
        $pk1['hp'] = $pk1['hp'] + ($pk1['hp_max'] / 16);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
            $log1 = $log1 . " Объедки восстанавливают жизненные силы покемона.<br>";
        }
    }
    if (isset($pk2['item_id']) && $pk2['item_id'] == 26) { // объедки
        $pk2['hp'] = $pk2['hp'] + ($pk2['hp_max'] / 16);
        if ($pk2['hp'] > $pk2['hp_max']) {
            $pk2['hp'] = $pk2['hp_max'];
            $log2 = $log2 . " Объедки восстанавливают жизненные силы покемона.<br>";
        }
    }
    if (isset($status1['status']) && $status1['status'] == 3  and $status1['endr'] > $battle['turn']) { // в огне
        $log1 = $log1 . " <i>Покемон терпит ранения от огня</i><br>";
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 8);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
    }

    if (isset($status1_['status']) && $status1_['status'] == 9) { // семена
        $log1 = $log1 . " <i>Покемон теряет жизненые силы</i><br>";
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 16);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $pk2['hp'] = $pk2['hp'] + ($pk1['hp_max'] / 16);
        if ($pk2['hp'] > $pk2['hp_max']) {
            $pk2['hp'] = $pk2['hp_max'];
        }
    }


    if (($battle['atk1'] == 202)) { // семена
        $log1 = $log1 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk1['hp'] = $pk1['hp'] + ($dm1['dm'] / 2);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }
    }

    if (($battle['atk2'] == 202)) { // семена
        $log2 = $log2 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk2['hp'] = $pk2['hp'] + ($dm2['dm'] / 2);
        if ($pk2['hp'] > $pk2['hp_max']) {
            $pk2['hp'] = $pk2['hp_max'];
        }
    }



    /*if($battle['atk1'] == 217){  // --- Present
          $mainrandpresent = mt_rand(1,2);
          if($mainrandpresent == 1){
           $atkpresent = rand(1,3);
           if($atkpresent == 1){ $aInf['atac_power'] = 40; $dopLog = "1 бомба "; }
           if($atkpresent == 2){ $aInf['atac_power'] = 80; $dopLog = "2 бомба "; }
           if($atkpresent == 3){ $aInf['atac_power'] = 120; $dopLog = "3 бомба"; }
          }else{
        $log1 = $log1." Соперник открыл подарок, и там была целебная мазь!<br>";
        $pk2['hp']+($pk1['hp_max']/4); 
        if($pk2['hp'] > $pk2['hp_max']){ $pk2['hp'] = $pk2['hp_max']; }
             $dopLog = "Тип хилл";
          }
        }
        if($battle['atk2'] == 217){  // --- Present
          $mainrandpresent = mt_rand(1,2);
          if($mainrandpresent == 1){
           $atkpresent = rand(1,3);
           if($atkpresent == 1){ $aInf['atac_power'] = 40; $dopLog = "1 бомба "; }
           if($atkpresent == 2){ $aInf['atac_power'] = 80; $dopLog = "2 бомба "; }
           if($atkpresent == 3){ $aInf['atac_power'] = 120; $dopLog = "3 бомба"; }
          }else{
        $log2 = $log2." Соперник открыл подарок, и там была целебная мазь!<br>";
       $pk1['hp']+($pk1['hp_max']/4); 
        if($pk1['hp'] > $pk1['hp_max']){ $pk1['hp'] = $pk1['hp_max']; }
             $dopLog = "Тип хилл";
          }
        }*/

    if (($battle['atk1'] == 217)) {
        $aInf = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = '" . $atk . "'")->fetch_assoc();
        $randomatk = mt_rand(1, 2);
        if ($randomatk == 2) {
            $atkpower = mt_rand(1, 3);
            if ($atkpower == 1) {
                $aInf['atac_power'] = 40;
                $dopLog = "1 бомба ";
            }
            if ($atkpower == 2) {
                $aInf['atac_power'] = 80;
                $dopLog = "2 бомба ";
            }
            if ($atkpower == 3) {
                $aInf['atac_power'] = 120;
                $dopLog = "3 бомба";
            }
        } else {
            $log1 = $log1 . " Соперник открыл подарок, и там была целебная мазь!<br>";
            $pk2['hp'] = $pk2['hp'] + ($pk1['hp_max'] / 4);
            if ($pk2['hp'] > $pk2['hp_max']) {
                $pk2['hp'] = $pk2['hp_max'];
            }
        }
    }
    if (($battle['atk2'] == 217)) {
        $aInf = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = '" . $atk . "'")->fetch_assoc();
        $randomatk = mt_rand(1, 2);
        if ($randomatk == 2) {
            $atkpower = mt_rand(1, 3);
            if ($atkpower == 1) {
                $aInf['atac_power'] = 40;
                $dopLog = "1 бомба ";
            }
            if ($atkpower == 2) {
                $aInf['atac_power'] = 80;
                $dopLog = "2 бомба ";
            }
            if ($atkpower == 3) {
                $aInf['atac_power'] = 120;
                $dopLog = "3 бомба";
            }
        } else {
            $log2 = $log2 . " Соперник открыл подарок, и там была целебная мазь!<br>";
            $pk1['hp'] = $pk1['hp'] + ($pk1['hp_max'] / 4);
            if ($pk1['hp'] > $pk1['hp_max']) {
                $pk1['hp'] = $pk1['hp_max'];
            }
        }
    }


    if (($battle['atk1'] == 71)) { // семена
        $log1 = $log1 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk1['hp'] = $pk1['hp'] + ($dm1['dm'] / 2);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }
    }
    if (($battle['atk2'] == 71)) { // семена
        $log2 = $log2 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk2['hp'] = $pk2['hp'] + ($dm2['dm'] / 2);
        if ($pk2['hp'] > $pk2['hp_max']) {
            $pk2['hp'] = $pk2['hp_max'];
        }
    }
    if (($battle['atk1'] == 1028)) { // семена
        $log1 = $log1 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk1['hp'] = $pk1['hp'] + ($dm1['dm'] / 1.25);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }
    }
    if (($battle['atk2'] == 1028)) { // семена
        $log2 = $log2 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk2['hp'] = $pk2['hp'] + ($dm2['dm'] / 1.25);
        if ($pk2['hp'] > $pk2['hp_max']) {
            $pk2['hp'] = $pk2['hp_max'];
        }
    }
    if (($battle['atk1'] == 72)) { // семена
        $log1 = $log1 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk1['hp'] = $pk1['hp'] + ($dm1['dm'] / 2);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }
    }
    if (($battle['atk2'] == 72)) { // семена
        $log2 = $log2 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk2['hp'] = $pk2['hp'] + ($dm2['dm'] / 2);
        if ($pk2['hp'] > $pk2['hp_max']) {
            $pk2['hp'] = $pk2['hp_max'];
        }
    }

    if (($battle['atk1'] == 1011)) { // семена
        $log1 = $log1 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk1['hp'] = $pk1['hp'] + (($dm1['dm'] / 2) * 1.5);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }
    }
    if (($battle['atk2'] == 1011)) { // семена
        $log2 = $log2 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk2['hp'] = $pk2['hp'] + (($dm2['dm'] / 2) * 1.5);
        if ($pk2['hp'] > $pk2['hp_max']) {
            $pk2['hp'] = $pk2['hp_max'];
        }
    }


    /*if(($battle['atk1'] == 38) ){ // Double - Edge
        $log1 = $log1." <i>Покемон терпит отдачу от атаки</i><br>";
        $pk1['hp'] = $pk1['hp']-($dm1['dm']/4);
        if($pk1['hp'] > $pk1['hp_max']){ $pk1['hp'] = $pk1['hp_max']; }
    }*/

    /*  if(($battle['atk1'] == 413) ){ // Brave Bird
        $log1 = $log1." <i>Покемон терпит отдачу от атаки</i><br>";
        $pk1['hp'] = $pk1['hp']-($dm1['dm']/3);
        if($pk1['hp'] > $pk1['hp_max']){ $pk1['hp'] = $pk1['hp_max']; }
    }*/

    /*if(($battle['atk1'] == 36) ){ // Take Down
        $log1 = $log1." <i>Покемон терпит отдачу от атаки</i><br>";
        $pk1['hp'] = $pk1['hp']-($dm1['dm']/4);
        if($pk1['hp'] > $pk1['hp_max']){ $pk1['hp'] = $pk1['hp_max']; }
    }*/

    /*if(($battle['atk1'] == 452) ){ // Take Down
        $log1 = $log1." <i>Покемон терпит отдачу от атаки</i><br>";
        $pk1['hp'] = $pk1['hp']-($dm1['dm']/3);
        if($pk1['hp'] > $pk1['hp_max']){ $pk1['hp'] = $pk1['hp_max']; }
    }

    /*if(($battle['atk1'] == 394) ){ // Take Down
        $log1 = $log1." <i>Покемон терпит отдачу от атаки</i><br>";
        $pk1['hp'] = $pk1['hp']-($dm1['dm']/3);
        if($pk1['hp'] < $pk1['hp_max']/2){ $pk1['hp'] = $pk1['hp_max']; }
    }*/

    if (($battle['atk1'] == 409)) { // Drain Punch
        $log1 = $log1 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk1['hp'] = $pk1['hp'] + ($dm1['dm'] / 2);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }
    }



    if (($battle['atk1'] == 532)) { // семена
        $log1 = $log1 . " <i>Покемон восстанавливает жизненые силы</i><br>";
        $pk1['hp'] = $pk1['hp'] + ($dm1['dm'] / 1.5);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }
    }



    if ($battle['atk1'] == 138) { // Dream Eater
        if ($status2['status'] == 2) {
            $log1 = $log1 . " <i>Покемон восстанавливает жизненые силы</i><br>";
            $pk1['hp'] = $pk1['hp'] + ($dm1['dm'] / 2);
            $dm1['dm'] = $dm1['dm'];
            if ($pk1['hp'] > $pk1['hp_max']) {
                $pk1['hp'] = $pk1['hp_max'];
            }
        } else {
            $dm1['dm'] = 0;
            $log1 = $log1 . " <i>Покемон противника не спит! </i><br>";
        }
    }

    if ($battle['atk2'] == 138) { // Dream Eater
        if ($status1['status'] == 2) {
            $log2 = $log2 . " <i>Покемон восстанавливает жизненые силы</i><br>";
            $pk2['hp'] = $pk2['hp'] + ($dm2['dm'] / 2);
            $dm2['dm'] = $dm2['dm'];

            if ($pk2['hp'] > $pk2['hp_max']) {
                $pk2['hp'] = $pk2['hp_max'];
            }
        } else {
            $dm2['dm'] = 0;
            $log2 = $log2 . " <i>Покемон противника не спит! </i><br>";
        }
    }



    if (isset($status2['status']) && $status2['status'] == 14 and $status2['endr'] > $battle['turn']) { // отравлен
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 5);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от сильного отравления</i><br>";
    }
    if (isset($status2['status']) && $status2['status'] == 18 and $status2['endr'] > $battle['turn']) { // nightmare
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 4);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от сильного отравления</i><br>";
    }

    if (isset($status2['status']) && $status2['status'] == 3 and $status2['endr'] > $battle['turn']) { // в огне
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 8);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от огня</i><br>";
    }
    if (isset($status2_['status']) && $status2_['status'] == 9) { // семена
        $log2 = $log2 . " <i>Покемон теряет жизненые силы</i><br>";
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 16);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $pk1['hp'] = $pk1['hp'] + ($pk2['hp_max'] / 16);
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }
    }



    if (isset($status2['status']) and $status2['status'] == 8 and $status2['endr'] > $battle['turn'] and $status2['toxic'] == 0) { // toxic
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 16);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 1 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk2['id']);
    }
    if (isset($status2['status']) and $status2['status'] == 8 and $status2['endr'] > $battle['turn'] and $status2['toxic'] == 1) {
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 8);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 2 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk2['id']);
    }
    if (isset($status2['status']) and $status2['status'] == 8 and $status2['endr'] > $battle['turn'] and $status2['toxic'] == 2) {
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 4);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 3 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk2['id']);
    }
    if (isset($status2['status']) and $status2['status'] == 8 and $status2['endr'] > $battle['turn'] and $status2['toxic'] == 3) {
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 2);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 4 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk2['id']);
    }
    if (isset($status2['status']) and $status2['status'] == 8 and $status2['endr'] > $battle['turn'] and $status2['toxic'] == 4) {
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 1);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 5 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk2['id']);
    }
    if (isset($status2['status']) and $status2['status'] == 8 and $status2['endr'] > $battle['turn'] and $status2['toxic'] == 5) {
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 1);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 6 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk2['id']);
    }
    if($battle['atk1'] != 999){
    if ($pk1['item_id'] == 232) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 10);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . $battle['atk1'];
        $log1 = $log1 . " <i>Покемон теряет здоровье от безумства</i><br>";
    }
    }
    if($battle['atk2'] != 999){
    if ($pk2['item_id'] == 232) { // toxic
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 10);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log1 = $log1 . $battle['atk1'];
        $log2 = $log2 . " <i>Покемон теряет здоровье от безумства</i><br>";
    }
    }



    if (isset($status2['status']) && $status2['status'] == 1 and $status2['endr'] > $battle['turn']) { // toxic
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 8);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от отравления</i><br>";
    }

    if ($battle['atk1'] == 100037) {
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 2);
    }
    if ($battle['atk1'] == 166) {
        $mysqli->query("UPDATE user_pokemons SET atk4 = '" . $battle['atk2'] . "', pp4 = '30' WHERE id = '" . $pk1['id'] . "'");
    }
    if ($battle['atk2'] == 100037) {
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 2);
    }
    if (isset($status2['status']) && $status2['status'] == 7 and $status2['endr'] > $battle['turn']) { // toxic
        $pk2['hp'] = $pk2['hp'] - ($pk2['hp_max'] / 4);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от проклятья</i><br>";
    }
    if (isset($status1['status']) and $status1['status'] == 8 and $status1['endr'] > $battle['turn'] and $status1['toxic'] == 0) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 16);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 1 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk1['id']);
    }
    if (isset($status1['status']) and $status1['status'] == 8 and $status1['endr'] > $battle['turn'] and $status1['toxic'] == 1) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 8);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 2 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk1['id']);
    }
    if (isset($status1['status']) and $status1['status'] == 8 and $status1['endr'] > $battle['turn'] and $status1['toxic'] == 2) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 4);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 3 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk1['id']);
    }
    if (isset($status1['status']) and $status1['status'] == 8 and $status1['endr'] > $battle['turn'] and $status1['toxic'] == 3) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 2);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 4 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk1['id']);
    }
    if (isset($status1['status']) and $status1['status'] == 8 and $status1['endr'] > $battle['turn'] and $status1['toxic'] == 4) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 1);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 5 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk1['id']);
    }
    if (isset($status1['status']) and $status1['status'] == 8 and $status1['endr'] > $battle['turn'] and $status1['toxic'] == 5) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 1);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . " <i>Покемон терпит ранения от яда</i><br>";
        $mysqli->query('UPDATE status SET toxic = 6 WHERE bid = ' . $battle['id'] . ' and pok = ' . $pk1['id']);
    }

    if (isset($status1['status']) && $status1['status'] == 7 and $status1['endr'] > $battle['turn']) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 4);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . " <i>Покемон терпит ранения от проклятья</i><br>";
    }
    if (isset($status1['status']) && $status1['status'] == 1 and $status1['endr'] > $battle['turn']) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 8);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от отравления</i><br>";
    }
    if (isset($status1['status']) && $status1['status'] == 14 and $status1['endr'] > $battle['turn']) { // toxic
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 5);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от сильного отравления</i><br>";
    }

    if (isset($status1['status']) && $status1['status'] == 18 and $status1['endr'] > $battle['turn']) { // Nightmare
        $pk1['hp'] = $pk1['hp'] - ($pk1['hp_max'] / 4);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log2 = $log2 . " <i>Покемон терпит ранения от сильного отравления</i><br>";
    }

    if (isset($status1['status']) && $status1['status'] == 17 and $status1['endr'] > $battle['turn']) { // Aqua Ring
        $pk1['hp'] = $pk1['hp'] + ($pk1['hp_max'] / 16);
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log2 = $log2 . " <i>Водяная оболчка исцеляет покемона</i><br>";
    }

    if (isset($status2['status']) && $status2['status'] == 17 and $status2['endr'] > $battle['turn']) { // Aqua Ring
        $pk2['hp'] = $pk2['hp'] + ($pk2['hp_max'] / 16);
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . " <i>Водяная оболчка исцеляет покемона</i><br>";
    }


    if (isset($status1['status']) && $status1['status'] == 15 and $status1['endr'] > $battle['turn']) {
        $pk1['speed'] = round($pk1['speed'] * 2); // доделай Tailwind
        $log2 = $log2 . " <i>Покемон ускоряется ветром.</i><br>";
    }

    if (isset($status2['status']) && $status2['status'] == 15 and $status1['endr'] > $battle['turn']) {
        $pk1['speed'] = round($pk1['speed'] * 2); // доделай Tailwind
        $log2 = $log2 . " <i>Покемон ускоряется ветром.</i><br>";
    }

    if (isset($status1['status']) && $status1['status'] == 16 and $status1['endr'] > $battle['turn']) {
        $pk1['speed'] = round($pk1['speed'] * 2); // доделай Roost
        $log2 = $log2 . " <i>Покемон ускоряется ветром.</i><br>";
    }

    if (isset($status2['status']) && $status2['status'] == 16 and $status1['endr'] > $battle['turn']) {
        $pk1['speed'] = round($pk1['speed'] * 2); // доделай Roost
        $log2 = $log2 . " <i>Покемон ускоряется ветром.</i><br>";
    }

    if (isset($pk1['item_id']) && $pk1['item_id'] == 45) {
        $pls1 = $dm1['dm'] / 8;
        $pk1['hp'] = $pk1['hp'] + $pls1;
        if ($pk1['hp'] > $pk1['hp_max']) {
            $pk1['hp'] = $pk1['hp_max'];
        }  // колокол
        if ($dm1['dm'] > 0) {
            $log1 = $log1 . " Колокольчик восстанавливает жизненные силы покемона.<br>";
        }
    }
    if (isset($pk2['item_id']) && $pk2['item_id'] == 45) {
        $pls2 = $dm2['dm'] / 8;
        $pk2['hp'] = $pk2['hp'] + $pls2;
        if ($pk2['hp'] > $pk2['hp_max']) {
            $pk2['hp'] = $pk2['hp_max'];
        }  // колокол
        if ($dm2['dm'] > 0) {
            $log2 = $log2 . " Колокольчик восстанавливает жизненные силы покемона.<br>";
        }
    }

    if ($battle['atk1'] == 394) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 33);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 394) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 33);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 38) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 38) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 528) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 528) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 452) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 33);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 452) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 33);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 457) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 50);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 457) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 50);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 543) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 543) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 344) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 344) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 66) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 66) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 29) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 29) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 413) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 413) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 36) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 36) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    if ($battle['atk1'] == 66) {
        if (($pk2['hp'] - $dm1['dm']) < 0) {
            $otn1 = $pk2['hp'];
        } else {
            $otn1 = $dm1['dm'];
        }
        $otd = round($otn1 / 100 * 25);
        $pk1['hp'] = $pk1['hp'] - $otd;
        if ($pk1['hp'] < 0) {
            $pk1['hp'] = 0;
        }
        $log1 = $log1 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Flare Blitz
    if ($battle['atk2'] == 66) {
        if (($pk1['hp'] - $dm2['dm']) < 0) {
            $otn2 = $pk1['hp'];
        } else {
            $otn2 = $dm2['dm'];
        }
        $otd = round($otn2 / 100 * 25);
        $pk2['hp'] = $pk2['hp'] - $otd;
        if ($pk2['hp'] < 0) {
            $pk2['hp'] = 0;
        }
        $log2 = $log2 . "<i>Покемон получает урон от отдачи.</i><br>";
    } // Head Smash
    /*if($battle['atk1'] == 457) {
        
        $battle['prt2'] == 0;
        if( ($pk2['hp'] - $dm1['dm']) < 0 ){ $otn1 = $pk2['hp']; }
        else{ $otn1 = $dm1['dm']; }
        
        $otd = round($otn1/100*50); $pk1['hp'] = $pk1['hp'] - $otd;
        if($pk1['hp'] < 0){ $pk1['hp'] = 0;}
   }// Head Smash
   if($battle['atk2'] == 457) {
       
       if( ($pk1['hp'] - $dm2['dm']) < 0 ){ $otn2 = $pk1['hp']; }
        else{ $otn2 = $dm2['dm']; }
       $rPRT = 0;
        $otd = round($dm2['dm']/100*50); $pk2['hp'] = $pk2['hp'] - $otd;
        if($pk2['hp'] < 0){ $pk2['hp'] = 0;}
        
    
    }// Flare Blitz */
    /*if($battle['atk1'] == 413) {
        if( ($pk2['hp'] - $dm1['dm']) < 0 ){ $otn1 = $pk2['hp']; }
        else{ $otn1 = $dm1['dm']; }
       $otd = round($otn1/100*33); $pk1['hp'] = $pk1['hp'] - $otd;
       if($dm1['dm'] > (round($pk2['hp_max']/4))){ $ostatok = $pk2['hp_max']/4; $result = $pk1['hp'] - $ostatok; $pk1['hp'] = $result; }
        if($pk1['hp'] < 0){ $pk1['hp'] = 0;}
    }// Brave Bird
        /*elseif($battle['atk1'] == 543) {
        if( ($pk2['hp'] - $dm1['dm']) < 0 ){ $otn1 = $pk2['hp']; }
        else{ $otn1 = $dm1['dm']; }
        $otd = round($otn1/100*33); $pk1['hp'] = $pk1['hp'] - $otd;
        if($pk1['hp'] < 0){ $pk1['hp'] = 0;}
       }// Wood Hammer
        /*elseif($battle['atk1'] == 452) {
        if( ($pk2['hp'] - $dm1['dm']) < 0 ){ $otn1 = $pk2['hp']; }
        else{ $otn1 = $dm1['dm']; }
        $otd = round($otn1/100*33); $pk1['hp'] = $pk1['hp'] - $otd;
        if($pk1['hp'] < 0){ $pk1['hp'] = 0;}
    }// Head Charge*/
    /* if($battle['atk2'] == 413) {
        if( ($pk1['hp'] - $dm2['dm']) < 0 ){ $otn2 = $pk1['hp']; }
        else{ $otn2 = $dm2['dm']; }
        $otd = round($dm2['dm']/100*33); $pk2['hp'] = $pk2['hp'] - $otd;
        if($pk2['hp'] < 0){ $pk2['hp'] = 0;}
   }// Brave Bird
        /*elseif($battle['atk2'] == 543) {
        if( ($pk1['hp'] - $dm2['dm']) < 0 ){ $otn2 = $pk1['hp']; }
        else{ $otn2 = $dm2['dm']; }
        $otd = round($dm2['dm']/100*33); $pk2['hp'] = $pk2['hp'] - $otd;
        if($pk2['hp'] < 0){ $pk2['hp'] = 0;}
   }// Wood Hammer
        /*elseif($battle['atk2'] == 452) {
       if( ($pk1['hp'] - $dm2['dm']) < 0 ){ $otn2 = $pk1['hp']; }
        else{ $otn2 = $dm2['dm']; }
        $otd = round($dm2['dm']/100*33); $pk2['hp'] = $pk2['hp'] - $otd;
        if($pk2['hp'] < 0){ $pk2['hp'] = 0;}
    }// Head Charge*/
    if ($battle['atk1'] == 46 or $battle['atk1'] == 525 or $battle['atk1'] == 18) { // Roar
        $check_status1 = $mysqli->query("SELECT * FROM status WHERE `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk1['id'] . "'")->fetch_assoc();
        $cRoar1 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $battle['user2'] . "' and `active`='1' and `hp` > '0'");
        $cRo1 = $cRoar1->num_rows;
        if ($cRo1 >= 2 and $status1['status'] != 2 and $check_status1['status'] != 2 and $check_status1['status'] != 10 and $check_status1['status'] != 5 and $check_status1['status'] != 6 and $check_status1['status'] != 4 and $check_status1['status'] != 13) {
            if (isset($status1['status']) and $status1['status'] != 2 and $status1['status'] != 10 and $status1['endr'] > $battle['turn']) {
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Громкое рычание заставляет сменить покемона.<br>";
            }
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ.<br>";
        }
    }
    if ($battle['atk2'] == 46 or $battle['atk2'] == 525 or $battle['atk2'] == 18) { // Roar
        $check_status2 = $mysqli->query("SELECT * FROM status WHERE `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk2['id'] . "'")->fetch_assoc();
        $cRoar2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $battle['user1'] . "' and `active`='1' and `hp` > '0'");
        $cRo2 = $cRoar2->num_rows;
        if ($cRo2 >= 2 and $status2['status'] != 10 and $check_status2['status'] != 2 and $check_status2['status'] != 4 and $check_status2['status'] != 10 and $check_status2['status'] != 5 and $check_status2['status'] != 6 and $check_status2['status'] != 13) {
            if (isset($status2['status']) and $status2['status'] != 2 and $status2['status'] != 10 and $status2['endr'] > $battle['turn']) {
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Громкое рычание заставляет сменить покемона.<br>";
            }
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ.<br>";
        }
    }
    /* if($battle['atk1'] == 274){ // Assist
        $assistrandatk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$battle['user1']."' and `active`='1' and `hp` > '0' and `atk1` > '0' and `atk2` > '0' and `atk3` > '0' and `atk4` > '0'");
        $cRo1 = $cRoar1->num_rows;
        if($cRo1 >= 2){
            if(isset($status1['status']) && $status1['status'] !== 10 and $status1['endr'] > $battle['turn']){
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID='.$ai1['atac_id'].'","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/".numbPok($pk1['basenum']).".gif border=0> <b>".$pk1['name_new']."(".$pk1['name'].")</b> использует ".$infMv." <u>".$ai1['attac_name_eng']."</u>.<br>Громкое рычание заставляет сменить покемона.<br>";
        }}
        else{
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID='.$ai1['atac_id'].'","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/".numbPok($pk1['basenum']).".gif border=0> <b>".$pk1['name_new']."(".$pk1['name'].")</b> использует ".$infMv." <u>".$ai1['attac_name_eng']."</u>.<br>ПОВАЛ.<br>";
        }
    }*/
    if ($battle['atk1'] == 182 or $battle['atk1'] == 197 or $battle['atk1'] == 1108) { //Protect or Detect
        $dm1['dm'] = 0;
        $rPRT = 1;
        if ($battle['prt1'] == 1) {
            $rPRT = rand(1, 2);
        }
        if ($rPRT == 1 and $pk1['speed'] >= $pk2['speed']) {
            $dm2['dm'] = 0;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Защищает себя барьером.<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    }


    if ($battle['atk1'] == 194) { //Protect or Detect
        $dm1['dm'] = 0;
        if ($dm2['dm'] >= $pk1['hp'] and $pk1['speed'] >= $pk2['speed']) {
            $pk2['hp'] = 0;
            $pk1['hp'] = 0;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Связал судьбы.<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    }

    if ($battle['atk1'] == 243) { //Mirror Coat
        $checkcategory_atk2 = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = " . $battle['atk2'])->fetch_assoc();
        if ($checkcategory_atk2['atac_categori'] == 2) {
            $dm1['dm'] = ($dm2['dm'] * 2);
            $rPRT = -5;
            if ($battle['prt1'] == -5) {
                $rPRT = rand(1, 2);
            }
            if ($rPRT == -5) {
                $dm2['dm'] = $dm2['dm'];
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Ожидает удара противника и бьет с двойной силой.<br></u><br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . "<br>";
            } else {
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
            }
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ! Атака была не специальная!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        }
    }

    if ($battle['atk2'] == 243) { //Mirror Coat
        $checkcategory_atk1 = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = " . $battle['atk1'])->fetch_assoc();
        if ($checkcategory_atk1['atac_categori'] == 2) {
            $dm2['dm'] = ($dm1['dm'] * 2);
            $rPRT = -5;
            if ($battle['prt1'] == -5) {
                $rPRT = rand(1, 2);
            }
            if ($rPRT == -5) {
                $dm1['dm'] = $dm1['dm'];
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Ожидает удара противника и бьет с двойной силой.<br></u><br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            } else {
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
            }
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ! Атака была не специальная!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        }
    }

    if ($battle['atk1'] == 68) { //Mirror Coat
        $checkcategory_atk2 = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = " . $battle['atk2'])->fetch_assoc();
        if ($checkcategory_atk2['atac_categori'] == 1) {
            $dm1['dm'] = ($dm2['dm'] * 2);
            $rPRT = -5;
            if ($battle['prt1'] == -5) {
                $rPRT = rand(1, 2);
            }
            if ($rPRT == -5) {
                $dm2['dm'] = $dm2['dm'];
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Ожидает удара противника и бьет с двойной силой.<br></u><br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . "<br>";
            } else {
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
            }
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ! Атака была не физическая!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        }
    }

    if ($battle['atk2'] == 68) { //Mirror Coat
        $checkcategory_atk1 = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = " . $battle['atk1'])->fetch_assoc();
        if ($checkcategory_atk1['atac_categori'] == 1) {
            $dm2['dm'] = ($dm1['dm'] * 2);
            $rPRT = -5;
            if ($battle['prt1'] == -5) {
                $rPRT = rand(1, 2);
            }
            if ($rPRT == -5) {
                $dm1['dm'] = $dm1['dm'];
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Ожидает удара противника и бьет с двойной силой.<br></u><br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
            } else {
                $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
                $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
            }
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ! Атака была не физическая!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        }
    }

    if ($battle['atk1'] == 279) { //Mirror Coat
        $dm1['dm'] = ($dm2['dm'] * 2);
        $rPRT = -5;
        if ($battle['prt1'] == -5) {
            $rPRT = rand(1, 2);
        }
        if ($rPRT == -5) {
            $dm2['dm'] = $dm2['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Ожидает удара противника и бьет с двойной силой.<br></u><br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . "<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        }
    }
    if (isset($status2['status']) and ($status2['status'] == 8 or $status2['status'] == 1) and $battle['atk1'] == 474) { //Protect or Detect
        $dm1['dm'] = ($dm1['dm'] * 2);
        $rPRT = 0;
        if ($rPRT == 0) {
            $dm2['dm'] = $dm2['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Покемон наносит двойнойые повреждения.<br></u><br>УРОН: <FONT color=red>" . $dm1['dm'] . "</FONT> " . (isset($dm1['cri']) ? $dm1['cri'] : '') . "<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        }
    }

    if (isset($status1['status']) and ($status1['status'] == 8 or $status1['status'] == 1) and $battle['atk2'] == 474) { //Protect or Detect
        $dm2['dm'] = ($dm2['dm'] * 2);
        $rPRT = 0;
        if ($rPRT == 0) {
            $dm1['dm'] = $dm1['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Покемон наносит двойнойые повреждения.<br></u><br>УРОН: <FONT color=red>" . $dm2['dm'] . "</FONT> " . (isset($dm2['cri']) ? $dm2['cri'] : '') . "<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>" . (isset($os1['log']) ? $os1['log'] : '') . "<br>";
        }
    } elseif ($battle['atk1'] == 10003) { //Protect or Detect
        $dm1['dm'] = 0;
        $rPRT = 1;
        if ($battle['atk2'] == 89) {
            $dm2['dm'] = $dm2['dm'] * 2;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Землетресение бьет по покемону с двойной силой.<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        } elseif ($battle['atk1'] == 222) {
            $dm2['dm'] = $dm2['dm'] * 1;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Атака достигает цели.<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        } elseif ($battle['atk1'] == 90) {
            $dm2['dm'] = 9999999;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Атака достигает цели.<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        } elseif ($battle['prt1'] == 1) {
            $rPRT = rand(1, 2);
        } elseif ($rPRT == 1 and $pk1['speed'] >= $pk2['speed']) {
            $dm2['dm'] = 0;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Окапывается в землю.<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk1'] == 10004) { //Protect or Detect
        $dm1['dm'] = 0;
        $rPRT = 0;
        //   if($battle['prt1'] == 1){ $rPRT = rand(1,2); }
        // if($rPRT == 1 and $pk1['speed'] >= $pk2['speed']) {
        if ($pk1['speed'] >= $pk2['speed']) {
            $dm2['dm'] = 0;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Взлетает высоко в воздух....<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk1'] == 100039) { //Protect or Detect
        $dm1['dm'] = 0;
        $rPRT = 1;
        if ($battle['prt1'] == 1) {
            $rPRT = rand(1, 2);
        }
        if ($battle['atk1'] == 100039) {
            $dm2['dm'] = $dm2['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Укрепляет свое тело....<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk1'] == 10005) { //Protect or Detect
        $dm1['dm'] = 0;
        $rPRT = 0;
        if ($rPRT == 0 and $pk1['speed'] >= $pk2['speed']) {
            $dm2['dm'] = $dm2['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Покемон накапливает солнечную энергию...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk1'] == 10050) { //phantom
        $dm1['dm'] = 0;
        $rPRT = 0;
        if ($rPRT == 0 and $pk1['speed'] = $pk2['speed']) {
            $dm2['dm'] = $dm2['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Покемон накапливает 'энергию...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk1'] == 10051) { //fut
        $dm1['dm'] = 0;
        $rPRT = 0;
        if ($rPRT == 0 and $pk1['speed'] = $pk2['speed']) {
            $dm2['dm'] = $dm2['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Покемон накапливает 'энергию...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk1'] == 10006) { //Protect or Detect
        $dm1['dm'] = 0;
        $rPRT = 0;
        if ($rPRT == 0 and $pk1['speed'] >= $pk2['speed']) {
            $dm2['dm'] = $dm2['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Покемон зивает во весь рот...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    }
    if ($battle['atk2'] == 182 or $battle['atk2'] == 197 or $battle['atk1'] == 1108) { //Protect or Detect
        $dm2['dm'] = 0;
        $rPRT = 1;
        if ($battle['prt2'] == 1) {
            $rPRT = rand(1, 2);
        }
        if ($rPRT == 1 and $pk2['speed'] >= $pk1['speed']) {
            $dm1['dm'] = 0;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Защищает себя барьером.<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk2'] == 10003) { //Protect or Detect
        $dm2['dm'] = 0;
        $rPRT = 1;
        if ($battle['atk1'] == 89) {
            $dm1['dm'] = $dm1['dm'] * 2;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Землетресение бьет по покемону с двойной силой.<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        } elseif ($battle['atk1'] == 222) {
            $dm1['dm'] = $dm1['dm'] * 1;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Атака достигает цели.<br>" . (isset($os2['log']) ? $os2['log'] : '') . "<br>";
        } elseif ($battle['atk1'] == 90) {
            $dm1['dm'] = 9999999;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Атака достигает цели.<br>";
        } elseif ($battle['prt2'] == 1) {
            $rPRT = rand(1, 2);
        } elseif ($rPRT == 1 and $pk2['speed'] >= $pk1['speed']) {
            $dm1['dm'] = 0;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Закапывается под землю...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk2'] == 10004) { //Protect or Detect
        $dm2['dm'] = 0;
        $rPRT = 0;
        //    if($battle['prt2'] == 1){ $rPRT = rand(1,1); }
        //   if($rPRT == 1 and $pk2['speed'] >= $pk1['speed']) {
        if ($pk2['speed'] >= $pk1['speed']) {
            $dm1['dm'] = 0;
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Покемон взлетает высоко в воздух...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk2'] == 100039) { //Protect or Detect
        $dm2['dm'] = 0;
        $rPRT = 1;
        if ($battle['prt2'] == 1) {
            $rPRT = rand(1, 1);
        }
        if ($battle['atk2'] == 100039) {
            $dm1['dm'] = $dm1['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Покемон укрепляет свое тело...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk2'] == 10005) { //Protect or Detect
        $dm2['dm'] = 0;
        $rPRT = 0;
        if ($rPRT == 0 and $pk2['speed'] >= $pk1['speed']) {
            $dm1['dm'] =  $dm1['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Покемон накапливает солнечную энергию...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk2'] == 10050) { //phantom
        $dm2['dm'] = 0;
        $rPRT = 0;
        if ($rPRT == 0 and $pk2['speed'] = $pk1['speed']) {
            $dm1['dm'] =  $dm1['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Покемон накапливает призрачную энергию...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk2'] == 10051) { //fut
        $dm2['dm'] = 0;
        $rPRT = 0;
        if ($rPRT == 0 and $pk2['speed'] = $pk1['speed']) {
            $dm1['dm'] =  $dm1['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Покемон накапливает энергию...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    } elseif ($battle['atk2'] == 10006) { //Protect or Detect
        $dm2['dm'] = 0;
        $rPRT = 0;
        if ($rPRT == 0 and $pk2['speed'] >= $pk1['speed']) {
            $dm1['dm'] =  $dm1['dm'];
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name'] . "</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Покемон зевает во весь рот...<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name'] . "</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    }
    if ($battle['atk1'] == 203) { // Endure
        $rPRT = 1;
        if ($battle['prt1'] == 1) {
            $rPRT = rand(1, 2);
        }
        if ($rPRT == 1 and $pk1['speed'] >= $pk2['speed']) {
            if ($dm2['dm'] >= $pk1['hp']) {
                $dm2['dm'] = $pk1['hp'] - 1;
            }
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>Покемон принимает защитную стойку.<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai1['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log1 = "<img src=/img/pkmna/" . numbPok($pk1['basenum']) . ".gif border=0> <b>" . $pk1['name_new'] . "(" . $pk1['name'] . ")</b> использует " . $infMv . " <u>" . $ai1['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    }
    if ($battle['atk2'] == 203) { // Endure
        $rPRT = 1;
        if ($battle['prt2'] == 1) {
            $rPRT = rand(1, 2);
        }
        if ($rPRT == 1 and $pk2['speed'] >= $pk1['speed']) {
            if ($dm1['dm'] >= $pk2['hp']) {
                $dm1['dm'] = $pk2['hp'] - 1;
            }
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>Покемон принимает защитную стойку.<br>";
        } else {
            $infMv = '<a HREF=javascript: onClick=win1=window.open("at_view.php?AttackID=' . $ai2['atac_id'] . '","at","width=500,height=230");> <img src=img/question.gif alt=Инфо border=0></a>';
            $log2 = "<img src=/img/pkmna/" . numbPok($pk2['basenum']) . ".gif border=0> <b>" . $pk2['name_new'] . "(" . $pk2['name'] . ")</b> использует " . $infMv . " <u>" . $ai2['attac_name_eng'] . "</u>.<br>ПРОВАЛ!<br>";
        }
    }






    $rHP1 = $pk1['hp'];
    $rHP2 = $pk2['hp'];
    if ($pk1['speed'] >= $pk2['speed']) {
        $rHP2 = $pk2['hp'] - $dm1['dm'];
        if ($battle['atk1'] == 206 and $rHP2 <= 0) {
            $rHP2 = 1;
        }
        if ($rHP2 <= 0) {
            $rHP2 = 0;
            $log2 = "<font color=red><b>" . $pk2['name'] . "</b> не может продолжать битву.</font><br>";

            $eff = $mysqli->query('SELECT effort FROM dex_exp WHERE nom = ' . $pk2['basenum'])->fetch_assoc();
            $vsLvl = $pk2['lvl'];
            if ($battle['tip'] == 1) {
                $tren = 1;
            } else {
                $tren = 1.5;
            }
            $lucky = 2;
            if ($pk1['lvl'] >= 20) {
                $eff['effort'] = $eff['effort'] * 2;
            }
            $event = 3.0; // рейт дропа опыта
            $exp = round(($tren * $eff['effort'] * $lucky * $vsLvl * 10 * $event) / 7);

            if (isset($pk1['item_id']) && $pk1['item_id'] == 161 or $battle['loc'] == 10 or $battle['loc'] == 38 or $battle['loc'] == 96 or $battle['loc'] == 521 or $battle['loc'] == 120 or $battle['loc'] == 143 or $battle['loc'] == 145 or $battle['loc'] == 267 or $battle['loc'] == 146 or $battle['loc'] == 33 or $battle['loc'] == 73 or $battle['loc'] == 54 or $battle['loc'] == 147) {
                $exp = 0;
            }
            $exShare = $mysqli->query("SELECT id,lvl FROM `user_pokemons` WHERE `active` = '1' and `user_id` = '" . $pk1['user_id'] . "' and `item_id` = '74'");
            while ($ex = $exShare->fetch_assoc()) {
                if ($ex['lvl'] < 70) {
                    $exd = round($exp / 3);
                    $mysqli->query("UPDATE user_pokemons SET exp = exp+'" . $exd . "' WHERE `id` = '" . $ex['id'] . "'");
                }
            }
            if ($pk1['lvl'] < 100) {
                $mysqli->query("UPDATE user_pokemons SET exp = exp+'" . $exp . "' WHERE `id` = '" . $pk1['id'] . "'");
            }
            ReturnExp();
        } else {
            $rHP1 = $pk1['hp'] - $dm2['dm'];
            if ($battle['atk2'] == 206 and $rHP1 <= 0) {
                $rHP1 = 1;
            }
            if ($rHP1 <= 0) {
                $rHP1 = 0;
                $log2 = $log2 . " <font color=red><b>" . $pk1['name'] . "</b> не может продолжать битву.</font><br>";

                $eff = $mysqli->query('SELECT effort FROM dex_exp WHERE nom = ' . $pk1['basenum'])->fetch_assoc();
                $vsLvl = $pk1['lvl'];
                if ($battle['tip'] == 1) {
                    $tren = 1;
                } else {
                    $tren = 1.5;
                }
                $lucky = 2;
                if ($pk2['lvl'] >= 30) {
                    $eff['effort'] = $eff['effort'] * 2;
                }
                $event = 3.0; // рейт дропа опыта
                $exp = round(($tren * $eff['effort'] * $lucky * $vsLvl * 10 * $event) / 7);

                if (isset($pk2['item_id']) && $pk2['item_id'] == 161 or $battle['loc'] == 10 or $battle['loc'] == 38 or $battle['loc'] == 96 or $battle['loc'] == 521 or $battle['loc'] == 120 or $battle['loc'] == 143 or $battle['loc'] == 145 or $battle['loc'] == 267 or $battle['loc'] == 146 or $battle['loc'] == 33 or $battle['loc'] == 73 or $battle['loc'] == 54 or $battle['loc'] == 147) {
                    $exp = 0;
                }
                $exShare = $mysqli->query("SELECT id,lvl FROM `user_pokemons` WHERE `active` = '1' and `user_id` = '" . $pk2['user_id'] . "' and `item_id` = '74'");
                while ($ex = $exShare->fetch_assoc()) {
                    if ($ex['lvl'] < 70) {
                        $exd = round($exp / 2);
                        $mysqli->query("UPDATE user_pokemons SET exp = exp+'" . $exd . "' WHERE `id` = '" . $ex['id'] . "'");
                    }
                }
                if ($pk2['lvl'] < 100) {
                    $mysqli->query("UPDATE user_pokemons SET exp = exp+'" . $exp . "' WHERE `id` = '" . $pk2['id'] . "'");
                }
                ReturnExp();
            }
        }
    } else {
        $rHP1 = $pk1['hp'] - $dm2['dm'];
        if ($battle['atk2'] == 206 and $rHP1 <= 0) {
            $rHP1 = 1;
        }
        if ($rHP1 <= 0) {
            $rHP1 = 0;
            $log1 = "<font color=red><b>" . $pk1['name'] . "</b> не может продолжать битву.</font><br>";

            $eff = $mysqli->query('SELECT effort FROM dex_exp WHERE nom = ' . $pk1['basenum'])->fetch_assoc();
            $vsLvl = $pk1['lvl'];
            if ($battle['tip'] == 1) {
                $tren = 1;
            } else {
                $tren = 1.5;
            }
            $lucky = 2;
            if ($pk2['lvl'] >= 30) {
                $eff['effort'] = $eff['effort'] * 2;
            }
            $event = 3.0; // рейт дропа опыта
            $exp = round(($tren * $eff['effort'] * $lucky * $vsLvl * 10 * $event) / 7);

            if (isset($pk2['item_id']) && $pk2['item_id'] == 161 or $battle['loc'] == 10 or $battle['loc'] == 38 or $battle['loc'] == 96  or $battle['loc'] == 521 or $battle['loc'] == 120 or $battle['loc'] == 143 or $battle['loc'] == 145 or $battle['loc'] == 267 or $battle['loc'] == 146 or $battle['loc'] == 33 or $battle['loc'] == 73 or $battle['loc'] == 54 or $battle['loc'] == 147) {
                $exp = 0;
            }
            $user_idsql = isset($pk['user_id']) ? "and `user_id = '{$pk2['user_id']}'" : ''; // fucking game engine ... wterh
            $exShare = $mysqli->query("SELECT id,lvl FROM `user_pokemons` WHERE `active` = '1' {$user_idsql} and `item_id` = '74'");
            while ($ex = $exShare->fetch_assoc()) {
                if ($ex['lvl'] < 70) {
                    $exd = round($exp / 3);
                    $mysqli->query("UPDATE user_pokemons SET exp = exp+'" . $exd . "' WHERE `id` = '" . $ex['id'] . "'");
                }
            }
            if ($pk2['lvl'] < 100) {
                $mysqli->query("UPDATE user_pokemons SET exp = exp+'" . $exp . "' WHERE `id` = '" . $pk2['id'] . "'");
            }
            ReturnExp();
        } else {
            $rHP2 = $pk2['hp'] - $dm1['dm'];
            if ($battle['atk1'] == 206 and $rHP2 <= 0) {
                $rHP2 = 1;
            }
            if ($rHP2 <= 0) {
                $rHP2 = 0;
                $log1 = $log1 . " <font color=red><b>" . $pk2['name'] . "</b> не может продолжать битву.</font><br>";
                $eff = $mysqli->query('SELECT effort FROM dex_exp WHERE nom = ' . $pk2['basenum'])->fetch_assoc();
                $vsLvl = $pk2['lvl'];
                if ($battle['tip'] == 1) {
                    $tren = 1;
                } else {
                    $tren = 1.5;
                }
                $lucky = 2;
                if ($pk1['lvl'] >= 30) {
                    $eff['effort'] = $eff['effort'] * 2;
                }
                $event = 3.0; // рейт дропа опыта
                $exp = round(($tren * $eff['effort'] * $lucky * $vsLvl * 10 * $event) / 7);

                if (isset($pk1['item_id']) && $pk1['item_id'] == 161 or $battle['loc'] == 10 or $battle['loc'] == 38 or $battle['loc'] == 96 or $battle['loc'] == 521 or $battle['loc'] == 120 or $battle['loc'] == 143 or $battle['loc'] == 145 or $battle['loc'] == 267 or $battle['loc'] == 146 or $battle['loc'] == 33 or $battle['loc'] == 73 or $battle['loc'] == 54 or $battle['loc'] == 147) {
                    $exp = 0;
                }
                $exShare = $mysqli->query("SELECT id,lvl FROM `user_pokemons` WHERE `active` = '1' and `user_id` = '" . $pk1['user_id'] . "' and `item_id` = '74'");
                while ($ex = $exShare->fetch_assoc()) {
                    if ($ex['lvl'] < 70) {
                        $exd = round($exp / 3);
                        $mysqli->query("UPDATE user_pokemons SET exp = exp+'" . $exd . "' WHERE `id` = '" . $ex['id'] . "'");
                    }
                }
                if ($pk1['lvl'] < 100) {
                    $mysqli->query("UPDATE user_pokemons SET exp = exp+'" . $exp . "' WHERE `id` = '" . $pk1['id'] . "'");
                }
                ReturnExp();
            }
        }
    }




    if ($pk1['speed'] >= $pk2['speed']) {
        $log = $log1 . "<br>" . $log2 . "<br>";
    } else {
        $log = $log2 . "<br>" . $log1 . "<br>";
    }

    $mysqli->query("INSERT INTO log (battle_id , raund , text) VALUES ('" . $battle['id'] . "','" . $battle['turn'] . "','" . $log . "') ");
    $mysqli->query("UPDATE $table1 SET `hp`='$rHP1'  WHERE id='" . $pk1['id'] . "'");
    $mysqli->query("UPDATE $table2 SET `hp`='$rHP2'  WHERE id='" . $pk2['id'] . "'");
    $mysqli->query("UPDATE battle SET `atk1`='0',`atk2`='0'  WHERE id='" . $battle['id'] . "'");
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk1'] == 63 or $battle['atk1'] == 416)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk1`='10001' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk1'] == 200)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk1`='10008' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk1'] == 80)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk1`='100038' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk1'] == 46 or $battle['atk1'] == 525 or $battle['atk1'] == 18)) { // ... Hyper Beam or Giga Impact
        if ($status1['status'] != 2 and $check_status1['status'] != 2 and $check_status1['status'] != 10 and $check_status1['status'] != 5 and $check_status1['status'] != 6 and $check_status1['status'] != 4 and $check_status1['status'] != 13) {
            $mysqli->query("UPDATE battle SET `atk1`='10010' WHERE id='" . $battle['id'] . "'");
            $nPok1 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $battle['user2'] . "' and `active`='1' and `hp` > '0' and `id` != '" . $battle['pok2'] . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
            $mysqli->query("UPDATE battle SET `atk2` = '999' , `zm2`='" . $nPok1['id'] . "'  WHERE id='" . $battle['id'] . "'");
        }
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk1'] == 37)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk1`='10007' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk1'] == 227)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk2`='' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk1["atk1"] > 0 and $pk1["atk2"] > 0 and $pk1["atk3"] > 0 and $pk1["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk1["atk1"] > 0 and $pk1["atk2"] > 0 and $pk1["atk3"] > 0 and $pk1["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk1["atk1"] > 0 and $pk1["atk2"] > 0 and $pk1["atk3"] == 0 and $pk1["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk1["atk1"] > 0 and $pk1["atk2"] == 0 and $pk1["atk3"] == 0 and $pk1["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk1[$whr];
            $mysqli->query("UPDATE battle SET atk1 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk2'] == 227)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk1`='' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk1["atk1"] > 0 and $pk1["atk2"] > 0 and $pk1["atk3"] > 0 and $pk1["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk1["atk1"] > 0 and $pk1["atk2"] > 0 and $pk1["atk3"] > 0 and $pk1["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk1["atk1"] > 0 and $pk1["atk2"] > 0 and $pk1["atk3"] == 0 and $pk1["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk1["atk1"] > 0 and $pk1["atk2"] == 0 and $pk1["atk3"] == 0 and $pk1["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk1[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    }



    if ($battle['atk1'] == 10000 and $rHP1 > 0) { // ... Blast Burn
        $mysqli->query("UPDATE battle SET `atk1`='307' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    } elseif ($battle['atk1'] == 10003 and $rHP1 > 0) { // ... dig
        $mysqli->query("UPDATE battle SET `atk1`='91' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    } elseif ($battle['atk1'] == 10009 and $rHP1 > 0) { // ... Bounce
        $mysqli->query("UPDATE battle SET `atk1`='340' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    } elseif ($battle['atk1'] == 100039 and $rHP1 > 0) { // ... dig
        $mysqli->query("UPDATE battle SET `atk1`='130' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    } elseif ($battle['atk1'] == 10004 and $rHP1 > 0) { // ... sky attack
        $mysqli->query("UPDATE battle SET `atk1`='143' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    } elseif ($battle['atk1'] == 10005 and $rHP1 > 0) { // ... sky attack
        $mysqli->query("UPDATE battle SET `atk1`='76' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    } elseif ($battle['atk1'] == 10006 and $rHP1 > 0) { // ... sky attack
        $mysqli->query("UPDATE battle SET `atk1`='281' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    } elseif ($battle['atk1'] == 10050 and $rHP1 > 0) { // ... pha
        $mysqli->query("UPDATE battle SET `atk1`='1024' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    } elseif ($battle['atk1'] == 10051 and $rHP1 > 0) { // ... fut
        $mysqli->query("UPDATE battle SET `atk1`='248' WHERE id='" . $battle['id'] . "'");
        if ($battle['tip'] == 1) {
            if ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] > 0) {
                $dRand = 4;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] > 0 and $pk2["atk4"] == 0) {
                $dRand = 3;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] > 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 2;
            } elseif ($pk2["atk1"] > 0 and $pk2["atk2"] == 0 and $pk2["atk3"] == 0 and $pk2["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1, $dRand);
            $whr = "atk" . $nRnd;
            $atkDK = $pk2[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '" . $atkDK . "' WHERE `id` = '" . $battle['id'] . "'");
        }
    }
    if ($battle['atk2'] == 10000 and $rHP2 > 0) { // ... Blast Burn
        $mysqli->query("UPDATE battle SET `atk2`='307' WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10003 and $rHP2 > 0) { // ... Dig
        $mysqli->query("UPDATE battle SET `atk2`='91' WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10009 and $rHP2 > 0) { // ... Bounce
        $mysqli->query("UPDATE battle SET `atk2`='340' WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 100039 and $rHP2 > 0) { // ... Blast Burn
        $mysqli->query("UPDATE battle SET `atk2`='130' WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10004 and $rHP2 > 0) { // ... Blast Burn
        $mysqli->query("UPDATE battle SET `atk2`='143' WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10005  and $rHP2 > 0) { // ... Blast Burn
        $mysqli->query("UPDATE battle SET `atk2`='76' WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10006  and $rHP2 > 0) { // ... Blast Burn
        $mysqli->query("UPDATE battle SET `atk2`='281' WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10050  and $rHP2 > 0) { // ... Blast Burn
        $mysqli->query("UPDATE battle SET `atk2`='1024' WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10051 and $rHP2 > 0) { // ... Blast Burn
        $mysqli->query("UPDATE battle SET `atk2`='248' WHERE id='" . $battle['id'] . "'");
    }




    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk2'] == 63 or $battle['atk2'] == 416)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk2`='10001' WHERE id='" . $battle['id'] . "'");
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk2'] == 200)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk2`='10008' WHERE id='" . $battle['id'] . "'");
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk2'] == 80)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk2`='100038' WHERE id='" . $battle['id'] . "'");
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk2'] == 46 or $battle['atk2'] == 525 or $battle['atk1'] == 18)) { // ... Hyper Beam or Giga Impact
        if ($status2['status'] != 10 and $check_status2['status'] != 2 and $check_status2['status'] != 4 and $check_status2['status'] != 10 and $check_status2['status'] != 5 and $check_status2['status'] != 6 and $check_status2['status'] != 13) {
            $mysqli->query("UPDATE battle SET `atk2`='10010' WHERE id='" . $battle['id'] . "'");
            $nPok2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $battle['user1'] . "' and `active`='1' and `hp` > '0' and `id` != '" . $battle['pok1'] . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
            $mysqli->query("UPDATE battle SET `atk1` = '999', `zm1`='" . $nPok2['id'] . "'  WHERE id='" . $battle['id'] . "'");
        }
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk2'] == 37)) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk2`='10007' WHERE id='" . $battle['id'] . "'");
    }
    if (($rHP1 > 0 and $rHP2 > 0) and ($battle['atk2'] == '')) { // ... Hyper Beam or Giga Impact
        $mysqli->query("UPDATE battle SET `atk2`='' WHERE id='" . $battle['id'] . "'");
    }
    $mysqli->query("UPDATE battle SET `time1`='120',`time2`='120',`prt1`='0',`prt2`='0'  WHERE id='" . $battle['id'] . "'");
    $mysqli->query("UPDATE battle SET `turn`=`turn`+'1'  WHERE id='" . $battle['id'] . "'");
    $mysqli->query("UPDATE battle SET `rload1`='1',`rload2`='1'  WHERE id='" . $battle['id'] . "'");

    if ($battle['atk1'] == 182 or $battle['atk1'] == 197 or $battle['atk1'] == 1108) { // Protect or Detect
        $mysqli->query("UPDATE battle SET `prt1`='1'  WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk1'] == 10003) { // Protect or Detect ..  Dig
        $mysqli->query("UPDATE battle SET `prt1`='1'  WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk1'] == 10009) { // Protect or Detect .. Bounce
        $mysqli->query("UPDATE battle SET `prt1`='1'  WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk1'] == 100039) { // Protect or Detect
        $mysqli->query("UPDATE battle SET `prt1`='1'  WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk1'] == 10004) { // Protect or Detect
        $mysqli->query("UPDATE battle SET `prt1`='1'  WHERE id='" . $battle['id'] . "'");
    }
    if ($battle['atk2'] == 182 or $battle['atk2'] == 197 or $battle['atk1'] == 1108) { // Protect or Detect
        $mysqli->query("UPDATE battle SET `prt2`='1'  WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10003) { // Protect or Detect .. Dig
        $mysqli->query("UPDATE battle SET `prt2`='1'  WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10009) { // Protect or Detect .. Bounce
        $mysqli->query("UPDATE battle SET `prt2`='1'  WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 100039) { // Protect or Detect
        $mysqli->query("UPDATE battle SET `prt2`='1'  WHERE id='" . $battle['id'] . "'");
    } elseif ($battle['atk2'] == 10004) { // Protect or Detect
        $mysqli->query("UPDATE battle SET `prt2`='1'  WHERE id='" . $battle['id'] . "'");
    }



    if ($battle['atk1'] == 46 or $battle['atk1'] == 18 and $rHP1 > 0 and $checkstatus1['status'] != 2) { //Roar
        $checkstatus1 = $mysqli->query("SELECT * FROM status WHERE `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk1['id'] . "'")->fetch_assoc();
        $cRoar1 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $battle['user2'] . "' and `active`='1' and `hp` > '0'");
        $cRo1 = $cRoar1->num_rows;
        if ($cRo1 >= 2 and $checkstatus1['status'] != 2 and $checkstatus1['status'] != 4 and $checkstatus1['status'] != 5 and $checkstatus1['status'] != 6 and $checkstatus1['status'] != 13 and $checkstatus1['status'] != 10) {
            $nPok1 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $battle['user2'] . "' and `active`='1' and `hp` > '0' and `id` != '" . $battle['pok2'] . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
            $mysqli->query("UPDATE battle SET `atk2` = '999' , `zm2`='" . $nPok1['id'] . "'  WHERE id='" . $battle['id'] . "'");
        }
    }



    if ($battle['atk2'] == 46 or $battle['atk2'] == 18 and $rHP2 > 0 and $checkstatus2['status'] != 2) { //Roar

        $checkstatus2 = $mysqli->query("SELECT * FROM status WHERE `bid` = '" . $battle['id'] . "' and `pok` = '" . $pk2['id'] . "'")->fetch_assoc();
        $cRoar2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $battle['user1'] . "' and `active`='1' and `hp` > '0'");
        $cRo2 = $cRoar2->num_rows;
        if ($cRo2 >= 2 and $checkstatus2['status'] != 2 and $checkstatus2['status'] != 4 and $checkstatus2['status'] != 5 and $checkstatus2['status'] != 6 and $checkstatus2['status'] != 13 and $checkstatus2['status'] != 10) {
            $nPok2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $battle['user1'] . "' and `active`='1' and `hp` > '0' and `id` != '" . $battle['pok1'] . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
            $mysqli->query("UPDATE battle SET `atk1` = '999', `zm1`='" . $nPok2['id'] . "'  WHERE id='" . $battle['id'] . "'");
        }
    }
}

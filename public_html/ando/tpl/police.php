<?php
// pok info: https://oldpokemon.ru/game.php?fun=pokeinf&p_id=1806
if ($user['groups'] == 2 || $user['groups'] == 1) {
    $curr_date = date('Y-m-d'); // СЕГОДНЯШНЕЕ ЧИСЛО В ФОРМАТЕ: ГГГГ-ММ-ДД
    $count = $mysqli->query("SELECT COUNT(id) FROM `police_trade` WHERE `date` = '{$curr_date}'")->fetch_assoc(); // Считаем кол-во трейдов за сутки
    $list_date = '';
    $year_month = date('Y-m');
    $d = 0;
    for ($i = 1; $i <= date('t'); $i++) {
        $d++;
        if ($i == date('j')) {
            $d = $d < 10 ? '0' . $d : $d;
            $list_date .= '<option value="' . $year_month . '-' . $d . '" selected>' . $year_month . '-' . $i . '</option>';
        } else if ($i <= date('j')) {
            $d = $d < 10 ? '0' . $d : $d;
            $list_date .= '<option value="' . $year_month . '-' . $d . '">' . $year_month . '-' . $i . '</option>';
        }
    }
?>
    <h1>Полицейский участок</h1>
    <script>
        function defPosition(event) {
            // координаты мыши
            var x = y = 0;
            if (document.attachEvent != null) {
                x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
                y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
            } else if (!document.attachEvent && document.addEventListener) {
                x = event.clientX + window.scrollX;
                y = event.clientY + window.scrollY;
            } else {
                // Do nothing
            }
            return {
                x: x,
                y: y
            };
        }

        page = 0;
        invType = 0;

        function tip(event, ID) {
            if (event) {
                document.getElementById('divTip').style.left = defPosition(event).x + 15;
                document.getElementById('divTip').style.top = defPosition(event).y + 10;
                document.getElementById('divTip').innerHTML = ID;
                document.getElementById('divTip').style.visibility = 'visible';
            } else document.getElementById('divTip').style.visibility = 'hidden';
        }

        function pic(ID, sitID, am, uw, dr, idd) {
            for (s = 0; s < document.images.length; s++)
                document.images[s].style.border = '1px solid #aecff1';
            document.getElementById("pic" + ID).style.border = '1px solid black';
            document.getElementById('formit')['itID'].value = sitID;
            document.getElementById('formit')['amount'].value = am;
            document.getElementById('formit')['but1'].style.display = (uw ? 'inline' : 'none');
            document.getElementById('formit')['but2'].style.display = (dr ? 'inline' : 'none');
            if (idd == 298) {
                document.getElementById('formit')['eggs'].style.display = (uw || dr ? 'block' : 'none');
                document.getElementById('formit')['pokes'].style.display = 'none';
            } else {
                document.getElementById('formit')['pokes'].style.display = (uw || dr ? 'block' : 'none');
            }
            eval("CURpic.src=pic" + ID + ".src");
            CURname.innerHTML = document.getElementById('divTip').innerHTML;
        }

        function formatnum(str) {
            str = str + '';
            var retstr = '';
            var now = 0;
            for (j = str.length - 1; j >= 0; j--) {
                if (now < 3) {
                    now++;
                    retstr = str.charAt(j) + retstr;
                } else {
                    now = 1;
                    retstr = str.charAt(j) + '.' + retstr;
                }
            }
            return retstr;
        }
        <?php
        $cMyItm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id`='" . $user_id . "'");
        $ami = $cMyItm->num_rows;
        ?>
        itemsamount = <?= $ami;
                        ?>;
        i = new Array(<?= $ami;
                        ?>);
        <?php
        $i = -1;
        $allMyIT = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id`='" . $user_id . "'");
        while ($allM = $allMyIT->fetch_assoc()) {
            $i = $i + 1;
            $base = $mysqli->query('SELECT * FROM base_items WHERE id = ' . $allM['item_id'])->fetch_assoc();
            if ($allM['egg'] == 1) {
                $egg = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $allM['pok'] . "' LIMIT 1")->fetch_assoc();
                $base["name"] = $egg["name"];
                $reb = round(($allM['reborn'] - time()) / 86400);
                $reb = " [До вылупления " . $reb . " дн. Генокод: H" . $allM['hp'] . "A" . $allM['atk'] . "D" . $allM['def'] . "S" . $allM['speed'] . "SA" . $allM['satk'] . "SD" . $allM['sdef'] . "]";
                $base['about'] = $reb;
            }
        ?>
            i[<?= $i;
                ?>] = new Array(<?= $allM['id'];
                                ?>, <?= $allM['item_id'];
                    ?>, <?= $allM['count'];
                    ?>, 1, '<?= $base["name"];
                        ?>', <?= $base['dress'];
                        ?>, 'Вес:<?= $base["weight"];
                            ?><br><?= $base['about'];
                        ?>', <?= $base['use'];
                        ?>, 0);
        <?php
        }
        ?>

        function fillupinv() {
            p = page * 40;
            content = "";
            prints = 1;
            while (prints <= 40 && i[p]) {
                if (invType == 0 || i[p][8] == invType) {
                    picF = i[p][1] + '.gif';
                    i[p][15] = i[p][4] + ' <b><small>x</small>' + formatnum(i[p][2]) + '</b>';
                    if (i[p][6]) i[p][15] += '<br><span class=itemdescr>' + i[p][6] + '</span>';
                    content += "<div class=item><img class='item' ID=\"pic" + p + "\" src=\"/img/items/" + picF + "\" onClick=\"pic(" + p + "," + i[p][0] + "," + i[p][2] + "," + i[p][3] + "," + i[p][5] + "," + i[p][1] + ")\" onMouseMove=\"tip(event," + p + ");\" onMouseOut=\"tip(0); \"></div>";
                    prints++;
                }
                p++;
            }
            for (k = prints; k <= 40; k++) content += "<div class=item><img src='/img/items/blank.gif'></div>";
            document.getElementById('inv').innerHTML = content;
            if (page > 0) {
                document.getElementById('divprev').innerHTML = "<a href='javascript:' onclick='page--;fillupinv();'><<</a>";
            } else {
                document.getElementById('divprev').innerHTML = "<span style='color:#92b1dd'>&lt;&lt;</span>";
            }
            if (itemsamount > p) {
                document.getElementById('divnext').innerHTML = "<a href='javascript:' onclick='page++;fillupinv();'>>></a>";
            } else {
                document.getElementById('divnext').innerHTML = "<span style='color:#92b1dd'>&gt;&gt;</span>";
            }
        }

        function use_item(tip) {
            $('#add').val(tip);
            $('#formit').submit();
        }
    </script>
    <style>
        .trade_wrapper {
            width: 100%;
            border: 1px solid #333;
        }

        .trade_select {
            padding: 10px 15px;
        }

        .trade_select form {
            display: inline-block;
            float: right;
            margin: 0 0 10px;
        }

        .trade_select form:after {
            content: '';
            display: block;
            clear: both;
        }

        .trade_select select {
            padding: 2px 5px;
            background: white;
            border: 1px solid #333;
        }

        .trade_select input {
            padding: 3px 5px;
            background: white;
            border: 1px solid #333;
        }

        .trade_header {
            display: flex;
            flex-flow: nowrap row;
            width: 100%;
            box-sizing: border-box;
            border-top: 1px solid #333;
            border-bottom: 1px solid #333;
            font-size: 1em;
            font-weight: 900;
            justify-content: space-between;
            background: #dee2fd;
        }

        .trade_header td {
            padding: 5px 10px;
        }

        table,
        tr,
        td {
            box-sizing: border-box;
        }

        .trade_body {
            height: 480px;
            overflow: auto;
        }

        .trade_logs {
            width: 100%;
            border-collapse: collapse;
        }

        .trade_logs tr {
            padding: 5px 10px;
            font-size: 1em;
        }

        .trade_logs td {
            width: 114px;
            padding: 5px 10px;
        }

        .trade_logs tr:nth-child(even) {
            background: #dee2fd;
        }
    </style>
    <div id="divTip"></div>
    <div class="trade_wrapper">
        <div class="trade_select">
            Операция за сегодня: <b><?= $count['COUNT(id)'] ?></b>
            <form action="" method="post">
                <select name="calend">
                    <?= $list_date ?>
                </select>
                <input type="submit" value="Ок">
            </form>
        </div>
        <div class="trade_header">
            <!--id,trade,item,count,pok,egg,type,user,user_to-->
            <table class="trade_logs">
                <tr>
                    <td>Трейд</td>
                    <td>Дата</td>
                    <td>Время</td>
                    <td>Предмет</td>
                    <td>Кол-во</td>
                    <td>Покемон</td>
                    <td>Яйцо</td>
                    <td>Тип</td>
                    <td>Кому</td>
                </tr>
            </table>
        </div>
        <?php
        if (isset($_POST['calend'])) {
            //print_r($_POST);
            $trade_logs = "SELECT * FROM `police_trade` WHERE `date` = '{$_POST['calend']}' ORDER BY `date` DESC,`time` DESC";
            $trade_logs = $mysqli->query($trade_logs);
        } else {
            $trade_logs = "SELECT * FROM `police_trade` WHERE `date` = '{$curr_date}' ORDER BY `date` DESC,`time` DESC";
            $trade_logs = $mysqli->query($trade_logs);
        }
        ?>
        <div class="trade_body">
            <table class="trade_logs">
                <?
                while ($row = $trade_logs->fetch_assoc()) {
                    $how_to = $mysqli->query("SELECT login FROM users WHERE id = '{$row['user_to']}'")->fetch_assoc();
                    $how_out = $mysqli->query("SELECT login FROM users WHERE id = '{$row['user']}'")->fetch_assoc();
                    $date = explode('-', $row['date']);
                    $date = $date[2] . '.' . $date[1] . '.' . $date[0];

                    if ($row['egg'] > 0) {
                        $egg = $mysqli->query("SELECT * FROM user_items WHERE `id` = '{$row['egg']}' LIMIT 1")->fetch_assoc();
                        $poke = $mysqli->query("SELECT * FROM `base_pokemon` WHERE `id` = '{$egg['pok']}' LIMIT 1")->fetch_assoc();
                        $row['item_type'] = 'items';
                        $item_desc = $pok['name'];
                        $reb = round(($poke['reborn'] - time()) / 86400);
                        $row['item'] = '999';
                        $row['egg'] = '<u>' . $poke['name'] . '</u>';
                        //print_r($poke);
                    } else {
                        $item_desc = '';
                    }
                    if ($row['pok'] > 0) {
                        $trade_pokemons = $mysqli->query("SELECT basenum FROM user_pokemons WHERE id = '{$row['pok']}'");
                        $row['item_type'] = 'pkmna';
                        if ($trade_pokemons->num_rows > 0) {
                            while ($pok = $trade_pokemons->fetch_assoc()) {
                                if ($pok['basenum'] < 100) {
                                    $row['item'] = '0' . $pok['basenum'];
                                } else if ($pok['basenum'] < 10) {
                                    $row['item'] = '00' . $pok['basenum'];
                                } else {
                                    $row['item'] = $pok['basenum'];
                                }
                            }
                        }
                        // else {
                        //     $row['pok']++;
                        //     $trade_pokemons = $mysqli->query("SELECT basenum FROM user_pokemons WHERE id = '{$row['pok']}'");
                        //     while ($pok = $trade_pokemons->fetch_assoc()) {
                        //         if ($pok['basenum'] < 100) {
                        //             $row['item'] = '0'.$pok['basenum'];
                        //         }
                        //         else if ($pok['basenum'] < 10) {
                        //             $row['item'] = '00'.$pok['basenum'];
                        //         }
                        //         else {
                        //             $row['item'] = $pok['basenum'];
                        //         }
                        //     }
                        // }
                    }
                    if ($row['pok'] == 0 && $row['egg'] == 0) {
                        $row['item_type'] = 'items';
                        //$row['item'] = $row['item'];
                    }
                    if ($row['item'] >= 1000) {
                        $tma = $mysqli->query("SELECT name FROM base_items WHERE id = {$row['item']}")->fetch_assoc();
                        $item_desc = $tma['name'];
                    }
                    if ($row['type'] == 0 && $row['pok'] > 0) {
                        $row['type'] = '<font color="red">Временная</font>';
                        $row['pok'] = '<u><a href=\'javascript:\' title=\'Информация\' onclick=\'window.open("game.php?fun=pokeinf&police_id=' . $row['pok'] . '&groups=' . $user['groups'] . '","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");\'>' . $row['pok'] . '</a></u>';
                    }
                    if ($row['type'] == 1 && $row['pok'] > 0) {
                        $row['type'] = 'Постоянная';
                        $row['pok'] = '<u><a href=\'javascript:\' title=\'Информация\' onclick=\'window.open("game.php?fun=pokeinf&police_id=' . $row['pok'] . '&groups=' . $user['groups'] . '","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");\'>' . $row['pok'] . '</a></u>';
                    }
                ?>
                    <tr>
                        <td class="trade_1">№ <?= $row['trade'] ?></td>
                        <td class="trade_2"><?= $date ?></td>
                        <td class="trade_3"><?= $row['time'] ?></td>
                        <td class="trade_4"><img src="/img/<?= $row['item_type'] ?>/<?= $row['item'] ?>.gif" title="<?= $item_desc ?>"></td>
                        <td class="trade_5"><?= $row['count'] ?></td>
                        <td class="trade_6"><?= $row['pok'] ?></td>
                        <td class="trade_7"><?= $row['egg'] ?></td>
                        <td class="trade_8"><?= $row['type'] ?></td>
                        <td class="trade_9"><?= $how_out['login'] . ' > ' . $how_to['login'] ?></td>
                    </tr>
                <?
                }
                ?>
            </table>
        </div>
    </div>
<?
} else {
    header('Location: /game.php');
}

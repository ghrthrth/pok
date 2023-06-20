<?php
session_start();
require_once('ando/bsqldate/dbconsql.php');
require_once('ando/functions/game.functions.php');
$titl = "OldPokemon";
if (isset($_GET['go']) && is_string($_GET['go']) && ($_GET['go'] != false)) {
    $go = escapeMe($_GET['go']);
    if (isset($go) && $go == 'rules') {
        $titl = "Правила";
        $includFiles = 'ando/tpl/rules.php';
    }
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?167"></script>
    <style>
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgb(100, 123, 148);
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: #898c87;
            -webkit-box-shadow: inset 0 0 6px rgb(77, 162, 253);
        }

        .news_block {
            background-color: #CBE0F6;
            /* padding: 3em; */
        }
    </style>
    <meta name="yandex-verification" content="f269e59215b791ee" />
    <meta HTTP-EQUIV="Content-Type" content="text/html; Charset=Utf-8">
    <title><?= $titl; ?></title>
    <meta name="description" content="OldPokemon - Браузерная онлайн игра по миру покемонов!" />
    <meta name="keywords" content="pokemon, pok, league17, l17, league18, league-17, браузерная игра покемон, онлайн покемоны, онлайн, покемоны, играть, Лига 17" />
    <meta name="CatCutde0c9cc782" content="78A360E4ß9BA5ACF49C97A6F5B3D7ED56Y6241" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <?php if (date('m') == 12 || date('m') == 1 || date('m') == 2) { ?>
    <?php } ?>
</head>
<!--<script src="js/snowscript.js"></script>-->

<body leftmargin="0" topmargin="0">
    <!-- VK Widget -->
    <div id="vk_community_messages"></div>
    <script type="text/javascript">
        VK.Widgets.CommunityMessages("vk_community_messages", 164378292, {
            widgetPosition: "left",
            disableExpandChatSound: "1",
            tooltipButtonText: "Есть вопрос? Задай!"
        });
    </script>
    <table width="1024" border="0" cellspacing="0" class="logo" align="center">
        <tr>
            <td style="background: url('img/summerlogo.png') #A6CAF0 no-repeat top center" class="logo">
                <table width="100%" height="140" border="0" cellspacing="0">
                    <tr>
                        <td rowspan='2' width='250' alight='center'>&nbsp;</td>
                        <td width="420" align="center">
                            <div style="width:100%; text-align:center;">
                                <img src="img/items/blank.gif" width="1" height="105">
                            </div>
                        </td>
                        <td rowspan='2' width='250' alight='center'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="440" height="23" border="1" align="center" cellspacing="0" background="img/menu.jpg" style="border:1px solid #FFF;">
                                <tr>
                                    <td>
                                        <div align="center" style='font-size:11px;'>
                                            <a href="reg.php">Играть</a>
                                            | <a href="/">Главная</a>
                                            | <a href="reg.php">Регистрация</a>
                                            | <a href="index.php?go=rules">Правила</a>
                                            | <a href="" target="_blank">Новичкам</a>
                                            | <a href="info.php">О нас</a>
                                            | <a href="http://forum.oldpokemon.ru/" target="_blank">Форум</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <img src="img/items/blank.gif" width="1" height="120">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td id='n'>
                <table width="100%" border="0" cellspacing="0">
                    <tr>
                        <td valign="top">
                            <?php if (isset($_GET['go']) && is_string($_GET['go']) && $_GET['go'] == 'news' or empty($_GET['go'])) { ?>
                                <table width='95%'>
                                    <tr>
                                        <td>
                                            <p id='txt'>
                                                <font size="4"><b>Новости:</b></font>
                                            </p>
                                            <?php

                                           // $newsblock = $mysqli->query("SELECT * FROM news ORDER BY id DESC LIMIT 20");




                                            $newsesresult = dbSelect('*', 'news', 'ORDER BY id DESC LIMIT 20', 1);

                                            while ($news = $newsesresult->fetch_assoc()) {
                                                //$author_id = $author['id']; не понял что это, но нотайс скрыл
                                            ?>
                                                <div class="news_block">
                                                    <b><?= $news['date']; ?> </b>
                                                    <br>
                                                    <!-- | <a href='/game.php?fun=treninf&to_id=<?= $author_id; ?>' onclick="window.open('/game.php?fun=treninf&to_id=1', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;">
                                        <img src='/img/question.gif' border=0>
                                    </a><?= $news['author']; ?>
                                    </b><br>-->
                                                    <?= $news['text']; ?>
                                                    <?php if (!empty($news['href'])) { ?>
                                                        <p id='txt'>
                                                        <div align='right'>
                                                            <a href='<?= $news['href']; ?>' target='_blank'>комментарии...</a>
                                                        </div>
                                                    <?php } ?>
                                                    <hr>
                                                <?php } ?>
                                                </div>
                                        </td>
                                    </tr>
                                </table>
                            <?php } else {
                                if (is_string($_GET['go']) && $_GET['go'] == 'rules') require_once($includFiles);
                                else die("Error");
                            } ?>
                        </td>
                        <td width="1" valign="top">
                            <table width="250" cellspacing="0" align="center" style="margin-top: -40%;">
                                <tr>
                                    <td align="center">
                                        <img src="img/items/blank.gif" height="100px;"><br>
                                        <br>&nbsp;
                                    </td>
                                </tr>
                                <tr>

                                    <td class="title" style="text-align:center;"><b>Вход</b></td>
                                </tr>
                                <?php if (!isset($_SESSION['user_id'])) { ?>
                                    <tr>
                                        <td>
                                            <P ID='txt'><b>Введите свой логин и пароль.</b>
                                            <form name="а1" action="login.php" method="post">
                                                <table border="0">
                                                    <tr>
                                                        <td>Логин:</td>
                                                        <td><input name='name' type='text' size='15' value=""><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Пароль:</td>
                                                        <td>
                                                            <input name="password" type="password" size="15">
                                                            <a href="index.php?go=askpass"><img src="img/ask.gif" alt="Забыли Пароль?" border="0" width="9" height="10"></a><br>
                                                        </td>
                                                    </tr>
                                                    </P>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td align="center">
                                                            <input type=submit value="   Вход   "><br><a href="reg.php">[регистрация]</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                            <br>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td>
                                            Вы авторизованы.
                                            <br /><a href="/game.php?fun=pokemons">Играть >></a><br><br>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td class="title" style="text-align:center;"><b>Статистика</b></td>
                                </tr>
                                <tr>
                                    <?php
                                    $online = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE online = 1')->fetch_assoc();
                                    $dat = time() - (3600 * 24);
                                    $data = time() + (3600 * 24);
                                    $onlinetoday = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE online_time > ' . $dat . ' AND online_time < ' . $data)->fetch_assoc();
                                    ?>
                                    <td>
                                        <p>
                                            Людей в игре:
                                            <?= $online['counts']; ?><br>
                                            Всего за день:
                                            <?= $online['counts']; ?>
                                            <!-- HotLog -->
                                            <span id="hotlog_counter"></span>
                                            <span id="hotlog_dyn"></span>
                                            <!--script type="text/javascript"> var hot_s = document.createElement('script');
hot_s.type = 'text/javascript'; hot_s.async = true;
hot_s.src = '//js.hotlog.ru/dcounter/2582265.js';
hot_d = document.getElementById('hotlog_dyn');
hot_d.appendChild(hot_s);
</script>
<noscript>
<a href="//click.hotlog.ru/?2582265" target="_blank">
<img src="//hit5.hotlog.ru/cgi-bin/hotlog/count?s=2582265&im=73" border="0"
title="HotLog" alt="HotLog"></a>
</noscript-->
                                            <!-- /HotLog -->
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title" style="text-align:center;"><b>Информация</b></td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <?= $titl ?> - Браузерная онлайн-игра по мотивам покемонов.
                                        <br>
                                        <a href="https://vk.com/mmorpgpokemon" target="_blank"><img src='https://oldpokemon.ru/img/iconvk.png' border='0'></a>
                                        <a href="https://www.youtube.com/channel/UCNdVH2FegN280ci6ZtCHZ3A" target="_blank"><img src='https://oldpokemon.ru/img/iconyoutube.png' border='0'></a>
                                        <a href="https://discord.gg/bfQKbyM" target="_blank"><img src='https://oldpokemon.ru/img/icondis.png' border='0'></a>
                                        <a href="https://t.me/oldpokemon" target="_blank"><img src='https://oldpokemon.ru/img/teleg.png' border='0'></a>
                                    </td>
                                </tr>
                                <!-- <tr>
                                <td class="title" style="text-align:center;"><b>События</b></td>
                            </tr>
                            <tr>
                                <td align='center'>
                                    <p><strong><a href="http://forum.oldpokemon.ru/viewforum.php?f=3" target="_blank">Официальные турниры </a></strong></p>
                                    <p><b>Неофициальный турнир: Предновогоднее настроение! Успей урвать первые праздничные подарки.</b><strong><a href="http://forum.oldpokemon.ru/viewtopic.php?f=6&t=178" target="_blank"> Подробнее </a></strong></p> 
                                    <p><b>Кокурс Тутт-Фрутти 11.05.2020 по 30.05.2020</b><strong><a href="http://forum.oldpokemon.ru/viewtopic.php?f=37&t=41" target="_blank"> Подробнее </a></strong></p> 
                                </td>
                            </tr>-->
                                <tr>
                                    <td class="title" style="text-align:center;">
                                        <font color="Red"><b>Little News</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        $nms = $mysqli->query("SELECT * FROM `news_mini` ORDER BY id DESC LIMIT 15 ");
                                        while ($nm = $nms->fetch_assoc()) {
                                            $usr = $mysqli->query("SELECT login FROM `users` WHERE  `id` = '" . $nm['user'] . "'")->fetch_assoc();
                                            //$text = $mysqli->query("SELECT name FROM `base_location` WHERE  `id` = '".$cl['loc']."'")->fetch_assoc();
                                        ?>
                                            <tt>
                                                <font color=green>[<?= $nm['date']; ?>]</font>
                                            </tt>
                                            </a><?= $nm['text']; ?><br>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title" style="text-align:center;"><b>Полезное</b></td>
                                </tr>
                                <tr>
                                    <td align='center'>
                                        <!--
                                        <a href="http://wiki.league17.ru/" target="_blank">Лигапедия - энциклопедия тренера</a>
                                        <a href="http://forum.league17.ru/viewforum.php?f=23" target="_blank">Лига Чемпионов</a>
                                    -->
                                        <b><a href="https://vk.com/mmorpgpokemon" target="_blank"><?= $titl ?>
                                                в VK</a></b>
                                        <br>
                                        <b><a href="https://discord.gg/bfQKbyM" target="_blank"><?= $titl ?>
                                                в Discord</a></b>
                                        <br>
                                        <b><a href="https://forum.oldpokemon.ru/viewtopic.php?f=5&p=2399&sid=8ede3f73a88fc47354d4f30b92942441#p2399" target="_blank"><?= $titl ?> Турнир для новичков августа</a></b>
                                        <br>
                                        <b><a href="https://forum.oldpokemon.ru/viewtopic.php?f=5&t=1226" target="_blank"><?= $titl ?> Турнир для неопытных августа</a></b>
                                        <br>
                                        <b><a href="https://forum.oldpokemon.ru/viewtopic.php?f=5&t=1224" target="_blank"><?= $titl ?> Открытый турнир августа</a></b>
                                        <!--
                                        <a href="/forum/viewforum.php?f=252" target="_blank">Вестник <?= $titl ?></a>
                                    <a class=rednote href=/forum/viewtopic.php?f=3&t=42876 target=_blank>Важное замечание по безопасности</a>
                                    -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title" style="text-align:center;"><b>Рейтинги</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p id='txt'>
                                            <b>ТОП 5 Тренеры - Ранг:</b>
                                        <table width='100%'>
                                            <?php
                                            $rang = $mysqli->query("SELECT * FROM users WHERE population > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY population DESC limit 5");
                                            while ($rangs = $rang->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td width='10'>&nbsp;</td>
                                                    <td class='bottom_dot'>
                                                        <a href='/game.php?fun=treninf&to_id=<?= $rangs['id']; ?>' onclick="window.open('/game.php?fun=treninf&to_id=<?= $rangs['id']; ?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><? if ($rangs['sex'] == 'male') { ?><img src='http://oldpokemon.ru/img/question.gif' border='0'><? } else { ?><img src='http://oldpokemon.ru/img/question_fem.gif' border='0'><? } ?></a>
                                                        <font color="<?= colorsUsers($rangs['groups']); ?>"><?= $rangs['login']; ?></font>
                                                    </td>
                                                    <td align='right' class='bottom_dot'><?= $rangs['population']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        <p id='txt'>
                                            <b>ТОП 5 Тренеры - Покедекс:</b>
                                        <table width='100%'>
                                            <?php
                                            $topPoks = $mysqli->query("SELECT * FROM users WHERE count_pok > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY count_pok DESC limit 5");
                                            while ($topPok = $topPoks->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td width='10'>&nbsp;</td>
                                                    <td class='bottom_dot'>
                                                        <a href='/game.php?fun=treninf&to_id=<?= $topPok['id']; ?>' onclick="window.open('/game.php?fun=treninf&to_id=<?= $topPok['id']; ?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><? if ($topPok['sex'] == 'male') { ?><img src='http://oldpokemon.ru/img/question.gif' border='0'><? } else { ?><img src='http://oldpokemon.ru/img/question_fem.gif' border='0'><? } ?></a></a>
                                                        <font color="<?= colorsUsers($topPok['groups']); ?>"><?= $topPok['login']; ?></font>
                                                    </td>
                                                    <td align='right' class='bottom_dot'><?= $topPok['count_pok']; ?></td>
                                                </tr>
                                            <?php } ?>

                                        </table>
                                        </p>
                                        <p id='txt'>
                                            <b>ТОП 5 Тренеры - Шайнидекс:</b>
                                        <table width='100%'>
                                            <?php
                                            $topShinePoks = $mysqli->query("SELECT * FROM users WHERE count_shine_pok > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY count_shine_pok DESC limit 5");
                                            while ($topShinePok = $topShinePoks->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td width='10'>&nbsp;</td>
                                                    <td class='bottom_dot'>
                                                        <a href='/game.php?fun=treninf&to_id=<?= $topShinePok['id']; ?>' onclick="window.open('/game.php?fun=treninf&to_id=<?= $topShinePok['id']; ?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><? if ($topShinePok['sex'] == 'male') { ?><img src='http://oldpokemon.ru/img/question.gif' border='0'><? } else { ?><img src='http://oldpokemon.ru/img/question_fem.gif' border='0'><? } ?></a></a>
                                                        <font color="<?= colorsUsers($topShinePok['groups']); ?>"><?= $topShinePok['login']; ?></font>
                                                    </td>
                                                    <td align='right' class='bottom_dot'><?= $topShinePok['count_shine_pok']; ?></td>
                                                </tr>
                                            <?php } ?>

                                        </table>
                                        </p>
                                        <p id=txt>
                                            <b>ТОП 5 Тренеры - Арена:</b>
                                        <table width=100%>
                                            <?php
                                            $topArena = $mysqli->query("SELECT * FROM users WHERE jeton > 0 AND groups != 7 AND groups != 99 ORDER BY jeton DESC limit 5");
                                            while ($ta = $topArena->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td width='10'>&nbsp;</td>
                                                    <td class='bottom_dot'>
                                                        <a href='/game.php?fun=treninf&to_id=<?= $ta['id']; ?>' onclick="window.open('/game.php?fun=treninf&to_id=<?= $ta['id']; ?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><? if ($ta['sex'] == 'male') { ?><img src='http://oldpokemon.ru/img/question.gif' border='0'><? } else { ?><img src='http://oldpokemon.ru/img/question_fem.gif' border='0'><? } ?></a></a>
                                                        <font color="<?= colorsUsers($ta['groups']); ?>"><?= $ta['login']; ?></font>
                                                    </td>
                                                    <td align='right' class='bottom_dot'><?= $ta['jeton']; ?></td>
                                                </tr>
                                            <?php } ?>

                                        </table>
                                        </p>
                                        <p id=txt>
                                            <b>ТОП 5 Кланов:</b>
                                        <table width=100%>
                                            <?php
                                            $topArena = $mysqli->query("SELECT * FROM base_clans WHERE rating > 0 AND id != 1 ORDER BY rating DESC LIMIT 5");
                                            while ($ta = $topArena->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td width='10'>&nbsp;</td>
                                                    <td class='bottom_dot'>
                                                        <a href='/game.php?fun=clans$clan_id<?= $ta['id']; ?>' onclick="window.open('/game.php?fun=claninf&clan_id=<?= $ta['id']; ?>', 'claninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src='/img/clans/<?= $ta['id']; ?>.gif' width=32 height=32 border='0'></a>
                                                        <font color="<?= colorsUsers($ta['groups']); ?>"><?= $ta['name']; ?></font>
                                                    </td>
                                                    <td align='right' class='bottom_dot'><?= $ta['rating']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        </p>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title" style="text-align:center;"><b><a href="/forum/viewtopic.php?f=13&t=32" target="_blank">Захваты локации</a></b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        $cls = $mysqli->query("SELECT * FROM `conquerlog` ORDER BY id DESC LIMIT 10 ");
                                        while ($cl = $cls->fetch_assoc()) {
                                            $usr = $mysqli->query("SELECT login FROM `users` WHERE  `id` = '" . $cl['user'] . "'")->fetch_assoc();
                                            $nam = $mysqli->query("SELECT name FROM `base_location` WHERE  `id` = '" . $cl['loc'] . "'")->fetch_assoc();
                                            if ($cl['type'] == 1) {
                                                $textconq = 'активировал ордер на локации';
                                            } else {
                                                $textconq = 'захватил локацию ';
                                            }
                                        ?>
                                            <tt>
                                                <font color=green>[<?= $cl['date']; ?>]</font>
                                            </tt>
                                            <a href='/game.php?fun=treninf&to_id=<?= $cl["user"]; ?>' onclick="window.open('game.php?fun=treninf&to_id=<?= $cl["user"]; ?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src='/img/question.gif' border=0></a>
                                            <b><?= $usr['login']; ?></b>
                                            </a><?= $textconq; ?> <?= $nam['name']; ?><br>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title" style="text-align:center;"><b><a href="/forum/viewtopic.php?f=13&t=32" target="_blank">Антикварный дом</a></b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Последние 20 выйгрышей:</b><br><br>
                                        <?php
                                        $cls = $mysqli->query("SELECT * FROM `antikvar` ORDER BY id DESC LIMIT 20 ");
                                        while ($cl = $cls->fetch_assoc()) {
                                            $usr = $mysqli->query("SELECT login,sex FROM `users` WHERE  `id` = '" . $cl['user'] . "'")->fetch_assoc();
                                            $nam = $mysqli->query("SELECT name FROM `base_pokemon` WHERE  `id` = '" . $cl['pok'] . "'")->fetch_assoc();
                                        ?>
                                            <tt>
                                                <font color=green>[<?= $cl['data']; ?>]</font>
                                            </tt>
                                            <a href='/game.php?fun=treninf&to_id=<?= $cl["user"]; ?>' onclick="window.open('game.php?fun=treninf&to_id=<?= $cl["user"]; ?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><? if ($usr['sex'] == 'male') { ?><img src='http://oldpokemon.ru/img/question.gif' border='0'><? } else { ?><img src='http://oldpokemon.ru/img/question_fem.gif' border='0'><? } ?></a></a>
                                            <b><?= $usr['login']; ?></b>:
                                            <a href=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?= $cl['pok']; ?>","dex","width=600,height=600,scrollbars=yes");><img src=/img/pokedex.gif alt=Покедекс title=Покедекс border=0></a>#<?= numbPok($cl['pok']); ?> <?= $nam['name']; ?><br>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="title" style="text-align:center;">Погода</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width='100%'>
                                            <?php
                                            $weathers = $mysqli->query('SELECT * FROM base_region WHERE  id != 10 AND id != 11 AND id != 13 AND id != 12 AND id != 7 AND id != 8 AND id != 14 AND id != 9');
                                            while ($weather = $weathers->fetch_assoc()) {
                                                $weather_id = $mysqli->query('SELECT * FROM weather WHERE id = ' . $weather['weather'])->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <td class='bottom_dot'><b><?= $weather['name']; ?></b></td>
                                                    <td align='right' class='bottom_dot'><?= $weather_id['name']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        <br>&nbsp;
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <HR>
                <table width="100%">
                    <tr>
                        <td align="left" width=200>
                            <br> <a href="//showstreams.tv/"><img src="//www.free-kassa.ru/img/fk_btn/13.png" title="Бесплатный видеохостинг"></a>
                        </td>
                        <td align="right" width=200>
                            <b><?= $_SERVER['HTTP_HOST'] ?> || admin@<?= $_SERVER['HTTP_HOST'] ?></b><br>
                            © 2019-<?= date('Y') ?>
                        </td>
                    <tr>
                </table>
</body>

</html>
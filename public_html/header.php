<?php
session_start();
require_once('ando/bsqldate/dbconsql.php');
require_once('ando/functions/game.functions.php');
$titl = "Pokezone";
if (isset($_GET['go']) && is_string($_GET['go']) && ($_GET['go'] != false)) {
    $go = escapeMe($_GET['go']);
    if (isset($go) && $go == 'rules') {
        $titl = "Правила";
        $includFiles = 'ando/tpl/rules.php';
    }
}
$online = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE online = 1')->fetch_assoc();
$dat = time() - (3600 * 24);
$data = time() + (3600 * 24);
$onlinetoday = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE online_time > ' . $dat . ' AND online_time < ' . $data)->fetch_assoc();
$newsesresult = dbSelect('*', 'news', 'ORDER BY id DESC LIMIT 20', 1);
$rang = $mysqli->query("SELECT * FROM users WHERE population > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY population DESC limit 5");
$topPoks = $mysqli->query("SELECT * FROM users WHERE count_pok > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY count_pok DESC limit 5");
$topShinePoks = $mysqli->query("SELECT * FROM users WHERE count_shine_pok > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY count_shine_pok DESC limit 5");
$randAnim = rand(0,3);
$arrPokemon = [ 
    ["info__inner--charizard","offer__inner--charizard"], 
    ["info__inner--incineroar","offer__inner--incineroar"], 
    ["info__inner--mewtwo","offer__inner--mewtwo"], 
    ["info__inner--ivysaur","offer__inner--ivysaur"] 
    ];
?>

<!doctype html>

<html class="page" lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Pokezone - браузерная онлайн игра про Покемонов</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Abraklion">
    <meta name="keywords" content="pokemon, pok, league17, l17, league18, league-17, браузерная игра покемон, онлайн покемоны, онлайн, покемоны, играть, Лига 17" />
    <meta name="description" content="Pokezone - Бесплатная браузерная игра по мотивам мира Покемонов. Стань тренером лови и тренируй покемонов. Сражайся с другими тренерами покемонов. Игра не требует установки!">

    <link rel="stylesheet" href="assets/css/style.min.css">

    <!-- favIcon -->
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="icon" href="favicon.svg" type="image/svg+xml">
    <link rel="manifest" href="site.webmanifest">
    <meta name="theme-color" content="#ffffff">
    <!-- favIcon -->
</head>

<body class="page__body">

    <div class="page__main">

        <!-- Шапка -->
        <header class="header">
            <div class="container">

                <div class="header__inner">

                    <a href="" class="header__logo logo">
                        <picture>
                            <source media="(min-width: 576px)" srcset="assets/img/icon-logo-sm.svg" type="image/svg+xml">
                            <img class="logo__img" src="assets/img/icon-logo.svg" width="50" height="38" alt="Логотип Pokezone">
                        </picture>
                    </a>
                    <!--/.logo-->

                    <nav class="header__navigation">

                        <button class="header__burger js-burger" type="button">
                            <span class="visually-hidden">Открыть меню</span>
                        </button>
                        <!--/.burger-->

                        <ul class="header__menu menu js-menu">
                            <li class="menu__item">
                                <a href="" class="menu__link">Главная</a>
                            </li>
                            <li class="menu__item">
                                <a href="" class="menu__link">Покедекс</a>
                            </li>
                            <li class="menu__item">
                                <a href="" class="menu__link">База знаний</a>
                            </li>
                            <li class="menu__item">
                                <a href="" class="menu__link">Правила</a>
                            </li>
                            <li class="menu__item">
                                <a href="" class="menu__link">Форум</a>
                            </li>
                        </ul>
                        <!--/.menu-->

                    </nav>
                    <!--/.header__navigation-->

                    <button class="header__button button js-enterBtn" type="button" aria-label="Открыть окно с формой входа в игру">Войти в игру</button>

                </div>
                <!--/.header__inner-->

            </div>
            <!--/.container-->
        </header>
        <!--/.header-->
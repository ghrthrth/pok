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
$online = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE online = 1')->fetch_assoc();
$dat = time() - (3600 * 24);
$data = time() + (3600 * 24);
$onlinetoday = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE online_time > ' . $dat . ' AND online_time < ' . $data)->fetch_assoc();
$newsesresult = dbSelect('*', 'news', 'ORDER BY id DESC LIMIT 20', 1);
$rang = $mysqli->query("SELECT * FROM users WHERE population > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY population DESC limit 5");
$topPoks = $mysqli->query("SELECT * FROM users WHERE count_pok > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY count_pok DESC limit 5");
$topShinePoks = $mysqli->query("SELECT * FROM users WHERE count_shine_pok > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY count_shine_pok DESC limit 5");
?>

<!doctype html>

<html class="page" lang="ru">

<head>
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?167"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>OldPokemon - браузерная онлайн игра про Покемонов</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Abraklion">
    <meta name="keywords" content="pokemon, pok, league17, l17, league18, league-17, браузерная игра покемон, онлайн покемоны, онлайн, покемоны, играть, Лига 17" />
    <meta name="description" content="OldPokemon - Бесплатная браузерная игра по мотивам мира Покемонов. Стань тренером лови и тренируй покемонов. Сражайся с другими тренерами покемонов. Игра не требует установки!">

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
                            <img class="logo__img" src="assets/img/icon-logo.svg" width="50" height="38" alt="Логотип OldPokemon">
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

        <main class="page__content">

            <h1 class="visually-hidden">OldPokemon - браузерная онлайн игра про Покемонов</h1>

            <!-- Первый экран -->
            <section class="info">
                <div class="container">

                    <div class="info__inner info__inner--charizard js-info__inner">

                        <div class="info__wrapper-text">

                            <p class="info__subtitle">Онлайн игра про Покемонов</p>
                            <h2 class="info__title">Готовы <span>ли вы,</span> стать тренером<span> Покемонов</span>?</h2>
                            <p class="info__description">Начни свой путь в мире Покемонов, развивай своих питомцев, улучшай их навыки. <span>Выполняй увлекательные задания, побеждай на турнирах, лови редких Покемонов.</span> Стань настоящим тренером карманных монстров!</p>

                            <ul class="info__count">
                                <li class="info__count-item">Сейчас в игре: <?= $online['counts']; ?></li>
                                <li class="info__count-item">Игроков за день: <?= $online['counts']; ?></li>
                            </ul>

                            <button class="info__button button js-reg" type="button" aria-label="Открыть окно с формой регистрации">Стать Тренером</button>

                        </div>
                        <!--/.info__wrapper-text-->

                    </div>
                    <!--/.info__inner-->

                </div>
                <!--/.container-->
            </section>
            <!--/.info-->

            <div class="container container--fluid">

                <div class="page__inner">

                    <!-- Новости -->
                    <section class="news js-news">

                        <h2 class="news__title">Новости</h2>

                        <ul class="news__list">

                            <? while ($news = $newsesresult->fetch_assoc()) { ?>


                            <li class="news__item js-news__item">

                                <article class="article">

                                    <div class="article__img-wrapper">
                                        <figure class="article__img">
                                            <img src="assets/img/plug.svg" width="100" height="110" loading="lazy" alt="">
                                        </figure>
                                    </div>

                                    <header class="article__header">
                                        <h3 class="article__title">Заголовок</h3>
                                    </header>

                                    <div class="article__content__wrapper">
                                        <div class="article__content"><?=$news['text'] ?></div>
                                    </div>

                                    <footer class="article__footer">
                                        <ul class="article__list">
                                            <li class="article__item">
                                                <svg class="article__item-svg" width="12" height="12" aria-label="Автор">
                                                    <use xlink:href="assets/img/sprite.svg#user" />
                                                </svg>
                                                <?= $news['author']; ?>
                                            </li>
                                            <li class="article__item">
                                                <svg class="article__item-svg" width="12" height="12" aria-label="Дата статьи">
                                                    <use xlink:href="assets/img/sprite.svg#time" />
                                                </svg>
                                                <?= $news['date']; ?>
                                            </li>
                                        </ul>
                                        <a href="" class="article__button js-full_article">подробнее</a>
                                    </footer>

                                </article>
                                <!--/.article-->

                            </li>
                            <!--/.news__item-->
                            <? } ?>

                        </ul>
                        <!--/.news__list-->

                        <div class="news__button-wrapper">
                            <button class="news__button button js-news__button" type="button">Старые новости</button>
                        </div>

                    </section>
                    <!--/.news-->

                    <!-- События -->
                    <aside class="events">
                        <h2 class="events__title">События</h2>

                        <ul class="events__grid">

                            <!--  Игровые события  -->
                            <li class="events__row">
                                <h3 class="events__heading">Игровые события</h3>

                                <ul class="events__list">

                                    <li class="events__item">

                                        <div class="events__header">
                                            <h4 class="events__headline">
                                                <a href="" target="_blank" rel="noopener">Турнир в честь Зимних праздников на 100 ур. для тренеров категории А #22 Турнир в честь Зимних праздников на 100 ур. для тренеров категории А #22</a>
                                            </h4>
                                            <p class="event__date">
                                                <svg class="events__svg" width="12" height="12" aria-label="Дата статьи">
                                                    <use xlink:href="assets/img/sprite.svg#time" />
                                                </svg>
                                                12.11.2021
                                            </p>
                                        </div>
                                        <div class="events__img">
                                            <a href="" target="_blank" class="events__img-link">
                                                <img src="assets/img/sword.svg" width="24" height="24" alt="Иконка события">
                                            </a>
                                        </div>

                                    </li>
                                    <!--/.events__item-->

                                    <li class="events__item">

                                        <div class="events__header">
                                            <h4 class="events__headline">
                                                <a href="" target="_blank" rel="noopener">Турнир в честь Зимних праздников на 100 ур. для тренеров категории А #22 Турнир в честь Зимних праздников на 100 ур. для тренеров категории А #22</a>
                                            </h4>
                                            <p class="event__date">
                                                <svg class="events__svg" width="12" height="12" aria-label="Дата статьи">
                                                    <use xlink:href="assets/img/sprite.svg#time" />
                                                </svg>
                                                12.11.2021
                                            </p>
                                        </div>
                                        <div class="events__img">
                                            <a href="" target="_blank" class="events__img-link">
                                                <img src="assets/img/sword.svg" width="24" height="24" alt="Иконка события">
                                            </a>
                                        </div>

                                    </li>
                                    <!--/.events__item-->

                                </ul>
                                <!--/.events__list-->

                            </li>
                            <!--/.events__block-item-->

                            <!--  Антикварный дом  -->
                            <li class="events__row">
                                <h3 class="events__heading">Антикварный дом</h3>

                                <ul class="events__list">

                                <?php
                                        $cls = $mysqli->query("SELECT * FROM `antikvar` ORDER BY id DESC LIMIT 6 ");
                                        while ($cl = $cls->fetch_assoc()) {
                                            $usr = $mysqli->query("SELECT login,sex FROM `users` WHERE  `id` = '" . $cl['user'] . "'")->fetch_assoc();
                                            $nam = $mysqli->query("SELECT name FROM `base_pokemon` WHERE  `id` = '" . $cl['pok'] . "'")->fetch_assoc();
                                        ?>

                                    <li class="events__item">

                                        <div class="events__header">
                                            <h4 class="events__trainer">Тренер: <span><?= $usr['login']; ?></span></h4>
                                            <h5 class="events__pokemon">Покемон: <a href="">#<?= numbPok($cl['pok']); ?> <?= $nam['name']; ?></a></h5>
                                            <p class="event__date">
                                                <svg class="events__svg" width="12" height="12" aria-label="Дата статьи">
                                                    <use xlink:href="assets/img/sprite.svg#time" />
                                                </svg>
                                                <?= $cl['data']; ?>
                                            </p>
                                        </div>
                                        <div class="events__img events__img--pokemon">
                                            <a href="" class="events__img-link">
                                                <img src="/img/pkmna/<?=numbPok($cl['pok']);?>.gif" width="30" height="30" loading="lazy" alt="Фото <?= $nam['name']; ?>">
                                            </a>
                                        </div>

                                    </li>
                                    <!--/.events__item-->

                                </ul>
                                <!--/.events__list-->

                            </li>
                            <!--/.events__block-item-->
                            <?php } ?>
                        </ul>
                        <!--/.events__block-list-->

                    </aside>
                    <!--/.events-->

                </div><!-- /.page__inner -->

            </div>

            <!-- Рейтинг -->
            <section class="rating">
                <div class="container container--fluid">

                    <div class="rating__inner">

                        <h2 class="rating__title">Рейтинг игроков</h2>

                        <ul class="rating__row">

                            <li class="rating__column">
                                <h3 class="rating__heading">Ранг</h3>

                                <ul class="rating__list">

                                <? while ($rangs = $rang->fetch_assoc()) { ?>

                                    <li class="rating__item">
                                        <svg class="rating__item-svg" width="18" height="18" aria-label="Имя игрока">
                                            <use xlink:href="assets/img/sprite.svg#user" />
                                        </svg>
                                        <?= $rangs['login']; ?>
                                        <span class="rating__check"><?= $rangs['population']; ?></span>
                                    </li>
                                    <? } ?>

                                </ul>
                                <!--/.rating__list-->
                            </li>

                            <li class="rating__column">
                                <h3 class="rating__heading">Покедекс</h3>

                                <ul class="rating__list">

                                <? while ($topPok = $topPoks->fetch_assoc()) { ?>

                                    <li class="rating__item">
                                        <svg class="rating__item-svg" width="18" height="18" aria-label="Имя игрока">
                                            <use xlink:href="assets/img/sprite.svg#user" />
                                        </svg>
                                        <?= $topPok['login']; ?>
                                        <span class="rating__check"><?= $topPok['count_pok']; ?></span>
                                    </li>
                                    <? } ?>

                                </ul>
                                <!--/.rating__list-->
                            </li>

                            <li class="rating__column">
                                <h3 class="rating__heading">Шайнидекс</h3>

                                <ul class="rating__list">

                                <? while ($topShinePok = $topShinePoks->fetch_assoc()) { ?>

                                    <li class="rating__item">
                                        <svg class="rating__item-svg" width="18" height="18" aria-label="Имя игрока">
                                            <use xlink:href="assets/img/sprite.svg#user" />
                                        </svg>
                                        <?= $topShinePok['login']; ?>
                                        <span class="rating__check"><?= $topShinePok['count_shine_pok']; ?></span>
                                    </li>

                                    <? } ?>

                                </ul>
                                <!--/.rating__list-->
                            </li>

                        </ul>
                        <!--/.rating__block-->

                    </div>
                    <!--/.rating__inner-->

                </div>
                <!--/.container-->
            </section>
            <!--/.rating-->

            <!-- Предложения -->
            <aside class="offer">
                <div class="container">

                    <div class="offer__inner offer__inner--charizard" data-animations="0">

                        <h2 class="visually-hidden">Предложение стать тренером</h2>

                        <div class="offer__title">Готов стать тренером?</div>
                        <div class="offer__subtitle">Собери своих редких эксклюзивных Покемонов, и получи признания других тренеров</div>
                        <button class="offer__button button button--offer js-reg" type="button" aria-label="Открыть окно с формой регистрации">Присоединяйся к вселенной покемонов сейчас</button>

                    </div>
                    <!--/.offer__inner-->

                </div>
                <!--/.container-->
            </aside>
            <!--/.offer-->

            <!-- Социальные сети -->
            <section class="social">
                <div class="container container--fluid">

                    <div class="social__inner">

                        <h2 class="social__title">Сообщество тренеров Покемонов</h2>
                        <p class="social__subtitle">Присоединяйтесь к нашему дружному сообществу</p>

                        <ul class="social__list">

                            <li class="social__item">
                                <a href="https://vk.com/mmorpgpokemon" target="_blank" class="social__link" rel="noopener">
                                    <svg class="social__svg" width="34" height="34" aria-hidden="true">
                                        <use xlink:href="assets/img/sprite.svg#icon-vk" />
                                    </svg>
                                    <span>Vkontakte</span>
                                </a>
                            </li>

                            <li class="social__item">
                                <a href="https://discord.com/invite/bfQKbyM" target="_blank" class="social__link" rel="noopener">
                                    <svg class="social__svg" width="34" height="34" aria-hidden="true">
                                        <use xlink:href="assets/img/sprite.svg#icon-discord" />
                                    </svg>
                                    <span>Discord</span>
                                </a>
                            </li>

                            <li class="social__item">
                                <a href="https://t.me/oldpokemon" target="_blank" class="social__link" rel="noopener">
                                    <svg class="social__svg" width="34" height="34" aria-hidden="true">
                                        <use xlink:href="assets/img/sprite.svg#icon-telegram" />
                                    </svg>
                                    <span>Telegram</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!--/.social__inner-->

                </div>
                <!--/.container-->
            </section>
            <!--/.social-->

        </main><!-- /.page__content -->

        <!-- Подвал -->
        <footer class="footer">
            <div class="container">

                <div class="footer__inner">

                    <div class="footer__wrapper-logo">

                        <a href="" class="footer__logo logo logo--footer">
                            <img class="logo__img" src="assets/img/icon-logo-footer.svg" width="155" height="48" loading="lazy" alt="Логотип OldPokemon">
                        </a>

                        <p class="footer__copyright">© 2019-2021</p>

                    </div>
                    <!--/.footer__wrapper-logo-->

                    <ul class="footer__list">

                        <li class="footer__item">
                            <img src="assets/img/icon-information.svg" width="18" height="18" loading="lazy" alt="">
                            <a href="" class="footer__item-link">Правовая информация</a>
                        </li>

                        <li class="footer__item">
                            <img src="assets/img/icon-support.svg" width="18" height="18" loading="lazy" alt="">
                            <a href="" class="footer__item-link">Служба поддержки</a>
                        </li>

                    </ul>
                    <!--/.footer__list-->

                </div>
                <!--/.footer__inner-->

            </div>
            <!--/.container-->
        </footer>
        <!--/.footer-->

        <!-- VK Widget -->
        <div id="vk_community_messages"></div>
        <script type="text/javascript">
            VK.Widgets.CommunityMessages("vk_community_messages", 164378292, {
                widgetPosition: "left",
                disableExpandChatSound: "1",
                tooltipButtonText: "Есть вопрос? Задай!"
            });
        </script>

    </div><!-- /.page__main -->

    <!-- Модальное окно регистрации -->
    <section class="modal js-registration">
        <div class="container">

            <div class="modal__inner modal__inner--fixed_reg" role="dialog" aria-labelledby="modal__title--registration" aria-modal="true">

                <h2 class="modal__title" id="modal__title--registration">Регистрация тренера</h2>

                <form class="modal__form form form--columns_2 js-form" name="registration" action="reg_modal.php" method="POST" data-name="registration">

                    <div class="form__element">
                        <label class="form__name" for="name">Имя тренера</label>
                        <input class="form__input" id="name" type="text" name="name" data-length="ok" data-symbol="ok" minlength="3" maxlength="20" placeholder="Логин только из букв, без пробелов" autocomplete="off" required>
                    </div>

                    <div class="form__element">
                        <label class="form__name" for="male" aria-label="Пол Мужской">Пол</label>
                        <div class="form__radio-inner">
                            <input class="form__radio visually-hidden" id="male" type="radio" name="floor" value="male" checked>
                            <label class="form__floor" for="male">Мужской</label>
                            <input class="form__radio visually-hidden" id="female" type="radio" name="floor" value="female">
                            <label class="form__floor" for="female">Женский</label>
                        </div>
                    </div>

                    <div class="form__element">
                        <label class="form__name" for="password">Пароль</label>
                        <input class="form__input" id="password" type="password" name="password" data-length="ok" data-parent="ok" minlength="3" maxlength="20" placeholder="Пароль длиною максимум 20 символов" required>
                    </div>

                    <div class="form__element">
                        <label class="form__name" for="repeat-password">Повторите пароль</label>
                        <input class="form__input" id="repeat-password" type="password" name="repeat-password" data-comparisons="ok" minlength="3" maxlength="20" placeholder="Повторите придуманный вами пароль" required>
                    </div>

                    <div class="form__element">
                        <label class="form__name" for="email">Почта</label>
                        <input class="form__input" id="email" type="email" name="email" data-length="ok" data-email="ok" minlength="3" maxlength="30" placeholder="Адрес вашей электронной почты" autocomplete="off" required>
                    </div>

                    <div class="form__element">
                        <div class="form__checkbox-inner">
                            <input class="form__checkbox visually-hidden" id="regulations" type="checkbox" name="regulations" checked required>
                            <label class="form__regulations" for="regulations">Я принимаю <a href="" target="_blank">пользовательское соглашение</a>, <a href="" target="_blank">политику конфиденциальности</a>.</label>
                        </div>
                        <button class="form__button button" type="submit" name="btn-reg">Создать персонажа</button>
                    </div>

                </form>
                <!--/.form-->

                <button class="modal__button js-close" type="button">
                    <span class="visually-hidden">Закрыть окно регистрации</span>
                </button>

            </div>
            <!--/.modal__inner-->

        </div>
        <!--/.container-->
    </section>
    <!--/.modal-->

    <!-- Модальное окно входа -->
    <section class="modal js-enter">
        <div class="container">

            <div class="modal__inner modal__inner--fixed_width" role="dialog" aria-labelledby="modal__title--enter" aria-modal="true">

                <h2 class="modal__title" id="modal__title--enter">Войти в игру</h2>

                <form class="modal__form form js-form" name="enter" action="login.php" method="POST" data-name="enter">

                    <div class="form__element">
                        <label class="visually-hidden" for="name-enter" aria-label="Логин">Логин</label>
                        <input class="form__input" id="name-enter" type="text" name="name" data-length="ok" minlength="3" maxlength="20" placeholder="Логин" required>
                    </div>

                    <div class="form__element">
                        <label class="visually-hidden" for="password-enter">Пароль</label>
                        <input class="form__input" id="password-enter" type="password" name="password" data-length="ok" minlength="3" maxlength="20" placeholder="Пароль" required>
                    </div>

                    <div class="form__element">
                        <button class="form__button button" type="submit" name="btn-enter">Войти</button>
                    </div>

                </form>
                <!--/.form-->

                <div class="modal__info">
                    <a href="" class="modal__info-link js-reg">Регистрация</a>
                    <a href="" class="modal__info-link js-rec">Забыли пароль?</a>
                </div>
                <!--/.modal__info-->

                <button class="modal__button js-close" type="button">
                    <span class="visually-hidden">Закрыть окно входа в игру</span>
                </button>

            </div>
            <!--/.modal__inner-->

        </div>
        <!--/.container-->
    </section>
    <!--/.modal-->

    <!-- Модальное восстановления пароля -->
    <section class="modal js-recovery">
        <div class="container">

            <div class="modal__inner modal__inner--fixed_width modal__inner--padding_top" role="dialog" aria-labelledby="modal__title--recovery" aria-modal="true">

                <h2 class="modal__title" id="modal__title--recovery">Восстановить пароль</h2>

                <form class="modal__form form js-form" name="recovery" action="/" method="POST" data-name="recovery">

                    <div class="form__element">
                        <label class="visually-hidden" for="email-recovery">Почта</label>
                        <input class="form__input" id="email-recovery" type="email" name="email" data-length="ok" data-email="ok" minlength="3" maxlength="30" placeholder="Адрес вашей электронной почты" autocomplete="off" required>
                    </div>

                    <div class="form__element">
                        <button class="form__button button" type="submit" name="btn-recovery">Восстановить</button>
                    </div>

                </form>
                <!--/.form-->

                <button class="modal__button js-close" type="button">
                    <span class="visually-hidden">Закрыть окно восстановления пароля</span>
                </button>

            </div>
            <!--/.modal__inner-->

        </div>
        <!--/.container-->
    </section>
    <!--/.modal-->

    <!-- Модальное придумайте новый пароль -->
    <section class="modal js-newPassword">
        <div class="container">

            <div class="modal__inner modal__inner--fixed_width modal__inner--padding_top" role="dialog" aria-labelledby="modal__title--newPassword" aria-modal="true">

                <h2 class="visually-hidden" id="modal__title--newPassword">Изменения пароля</h2>

                <div class="modal__title">Восстановить пароль</div>

                <form class="modal__form form js-form" name="newPassword" action="/" method="POST" data-name="newPassword">

                    <div class="form__element">
                        <label class="visually-hidden" for="password-new">Пароль</label>
                        <input class="form__input" id="password-new" type="password" name="password" data-length="ok" data-parent="ok" minlength="3" maxlength="20" placeholder="Придумайте новый пароль только из букв и цифр" required>
                    </div>

                    <div class="form__element">
                        <label class="visually-hidden" for="repeat-password-new">Повторите пароль</label>
                        <input class="form__input" id="repeat-password-new" type="password" name="repeat-password" data-comparisons="ok" minlength="3" maxlength="20" placeholder="Повторите придуманный вами новый пароль" required>
                    </div>

                    <div class="form__element">
                        <button class="form__button button" type="submit" name="btn-newPassword">Изменить пароль</button>
                    </div>

                </form>
                <!--/.form-->

                <button class="modal__button js-close" type="button">
                    <span class="visually-hidden">Закрыть окно изменения пароля</span>
                </button>

            </div>
            <!--/.modal__inner-->

        </div>
        <!--/.container-->
    </section>
    <!--/.modal-->

    <!-- Прокрутить вверх -->
    <div class="up js-up">
        <button class="up__button">
            <span class="visually-hidden">Прокрутить наверх</span>
        </button>
    </div>

    <!-- Предупреждения что JavaScript отключен-->
    <noscript>

        <div class="modal modal--active">
            <div class="container">
                <div class="inform inform--img inform--noscript">Приложения работает некорректно, пожалуйста включите JavaScript.</div>
            </div>
        </div>

    </noscript>

    <script defer src="assets/js/app.min.js"></script>

</body>

</html>
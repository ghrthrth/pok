<? include('header.php') ?>

<?php
echo $_SERVER['DOCUMENT_ROOT'];

?>
        <main class="page__content">

            <h1 class="visually-hidden">OldPokemon - браузерная онлайн игра про Покемонов</h1>

            <!-- Первый экран -->
            <section class="info">
                <div class="container">

                    <div class="info__inner <?=$arrPokemon[$randAnim][0]?> js-info__inner">

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
                                                <img src="/img/pokemon_gif/<?=numbPok($cl['pok']);?>.gif" width="30" height="30" loading="lazy" alt="Фото <?= $nam['name']; ?>">
                                            </a>
                                        </div>

                                    </li>
                                    <!--/.events__item-->
                                    <?php } ?>

                                </ul>
                                <!--/.events__list-->

                            </li>
                            <!--/.events__block-item-->
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
<? include('footer.php') ?>

            <!-- Предложения -->
            <aside class="offer">
                <div class="container">

                    <div class="offer__inner <?=$arrPokemon[$randAnim][1]?>" data-animations="<?=$randAnim?>">

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
                                <a href="https://t.me/Pokezone" target="_blank" class="social__link" rel="noopener">
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
                            <img class="logo__img" src="assets/img/icon-logo-footer.svg" width="155" height="48" loading="lazy" alt="Логотип Pokezone">
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
                            <a href="https://vk.com/im?sel=-164378292" target="_blank" class="footer__item-link">Служба поддержки</a>
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
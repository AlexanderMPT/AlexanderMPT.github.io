<!DOCTYPE html>
<html>

<head>
    <title>Видео как фон</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'marlodatabase');

    $password = $_POST['pas'] ?? null;
    $login = $_POST['log'] ?? null;

    if (!empty($login) && !empty($password)) {

        $check_user = "SELECT * FROM marlomba WHERE login_user = ?";
        $stmt = mysqli_prepare($connect, $check_user);
        mysqli_stmt_bind_param($stmt, "s", $login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $info_user = mysqli_fetch_assoc($result);

        if ($info_user) {
            if (password_verify($password, $info_user['password_user'])) {
                if ($info_user['status'] === 'admin') {
                    echo 'Вы админ!';
                } else if ($info_user['status'] === 'user') {
                    echo 'Вы юзер!';
                }
                // дополнительный код для перенаправления или выполнения других действий
            } else {
                echo 'Неправильный пароль';
            }
        } else {
            echo 'Неправильный логин или пароль';
        }
    }


    $name = $_POST['name_us'] ?? null;
    $surname = $_POST['surname_us'] ?? null;
    $email = $_POST['email_us'] ?? null;
    $pass = $_POST['pass_us'] ?? null;
    $confpass = $_POST['confpass_us'] ?? null;
    $log = $_POST['login_us'] ?? null;

    if (!empty($log) && !empty($pass) && !empty($email) && !empty($name) && !empty($surname)) {
        if ($pass == $confpass && strlen($pass) >= 6) {
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

            $reg_user = "INSERT INTO marlomba (login_user, password_user, email_user, name_user, surname_user) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connect, $reg_user);
            mysqli_stmt_bind_param($stmt, "sssss", $log, $hashedPass, $email, $name, $surname);

            $result_reg = mysqli_stmt_execute($stmt);
            if ($result_reg) {
                echo 'Access!';
            } else {
                echo 'Ошибка при регистрации';
            }
        } else {
            echo 'Пароли не совпадают или слишком короткий пароль';
        }
    }
    ?>

    <section class="section__one" id="section__one">
        <div class="container">
            <header class="header">
                <nav class="header__nav">
                    <img class="header__nav-logo" src="img/logo.svg" alt="logotype">

                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a class="header__nav-link main" href="">Главная</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link price" href="">О нас</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link messages" href="">Тарифы</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link contacts" href="">Контакты</a>
                        </li>
                    </ul>

                    <div class="header__nav-wrap">
                        <img class="header__nav-cart" id="product__cart" src="img/cart.svg" alt="cart">
                        <button class="button__open" id="button__open">
                            <img class="header__nav-user" src="img/user.svg" alt="user">
                        </button>

                    </div>

                </nav>
            </header>



            <div class="section__one-wrapper">
                <div class="section__one-left">
                    <div class="section__one-top">
                        <h1 class="section__one-title">Присоединяйся к новой молодежной соцсети</h1>
                        <p class="section__one-text">Новая молодежная социальная сеть Marlo приглашает всех в новое
                            уникальное мультиэпп приложение.</p>
                        <div class="section__one-inner">
                            <a class="section__one-start" href="#">Начать</a>
                            <a class="section__one-more" href="#">Подробнее</a>
                        </div>
                    </div>
                    <div class="section__one-bottom">
                        <h3 class="section__one-subtitle">Бета-тест уже доступен!</h3>
                        <p class="section__one-subtext">Стань одним из первых тестировщиков приложения и получи
                            пожизненный VIP-аккаунт в соцсети.</p>
                        <a class="section__one-go" href="#">Вперед</a>
                    </div>
                </div>

                <div class="section__one-right">
                    <img class="video-ramka" src="img/phone.png" alt="">
                    <video autoplay muted loop class="myVideo">
                        <source class="vid" src="video/Marlo.MP4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>

    <section class="section__two" id="section__two">
        <div class="container">
            <div class="section__two-inner">
                <h2 class="section__two-title">О нас</h2>
                <p class="section__two-text">Мы молодая команда стартаперов, которые создали новую уникальную соцсеть
                    Marlo. Буквально за 2 года мы создали рабочую бета-версию нашего приложения и несравненно хотим
                    поделиться этим счастьем с вами!</p>
                <a class="section__two-link" href="#">Тарифы</a>
            </div>
        </div>
    </section>

    <section class="section__three" id="section__three">
        <div class="container">
            <div class="section__three-inner">
                <h2 class="section__three-title">Тарифы</h2>
                <p class="section__three-text">На нашем сайте вы можете приобрести платные функции нашего приложения.
                    Приобретя функции здесь, все данные функции через несколько минут станут доступны в вашем профиле
                    Marlo.</p>
                <div class="section__three-bottom">
                    <div class="section__three-wrapper">
                        <h4 class="section__three-subtitle">Музыка</h4>
                        <div class="section__three-card">
                            <div class="section__three-box">
                                <p class="section__three-price">500 руб / мес</p>
                            </div>
                            <img class="section__three-image" src="img/music.svg" alt="music">
                            <div class="section__three-items">
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Безлимитная музыка</p>
                                </div>
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Новые исполнители</p>
                                </div>
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Билеты на концерты</p>
                                </div>
                            </div>
                        </div>

                        <div class="section__three-operations">
                            <a class="section__three-cart music_option" href="#">
                                <form class="popup__cart" method="post" action="add_to_cart.php">
                                    <input type="hidden" name="service" value="Музыка">
                                    <input type="hidden" name="image" value="img/music.svg">
                                    <button type="submit" class="add_tovar" name="add_to_cart">В корзину</button>
                                </form>
                            </a>
                            <!-- <a class="section__three-del" href="#">Удалить</a> -->
                        </div>
                    </div>

                    <div class="section__three-wrapper">
                        <h4 class="section__three-subtitle">Кино & Сериалы</h4>
                        <div class="section__three-card">
                            <div class="section__three-box">
                                <p class="section__three-price">550 руб / мес</p>
                            </div>
                            <img class="section__three-image" src="img/tv.svg" alt="tv">
                            <div class="section__three-items">
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Безлимитный просмотр</p>
                                </div>
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Премьеры фильмов</p>
                                </div>
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Свежие обзоры</p>
                                </div>
                            </div>
                        </div>

                        <div class="section__three-operations">
                            <a class="section__three-cart film_option" href="#">
                                <form class="popup__cart" method="post" action="add_to_cart.php">
                                    <input type="hidden" name="service" value="Фильмы">
                                    <input type="hidden" name="image" value="img/film.svg">
                                    <button type="submit" class="add_tovar" name="add_to_cart">В корзину</button>
                                </form>
                            </a>
                            <!-- <a class="section__three-del" href="#">Удалить</a> -->
                        </div>
                    </div>

                    <div class="section__three-wrapper">
                        <h4 class="section__three-subtitle">Чат GPT</h4>
                        <div class="section__three-card">
                            <div class="section__three-box">
                                <p class="section__three-price">400 руб / мес</p>
                            </div>
                            <img class="section__three-image" src="img/chat.svg" alt="chat">
                            <div class="section__three-items">
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Безлимитный чат</p>
                                </div>
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Настройки бота</p>
                                </div>
                                <div class="section__three-item">
                                    <img class="section__three-icon" src="img/icon.svg" alt="icon">
                                    <p class="section__three-about">Новейшая версия GPT4</p>
                                </div>
                            </div>
                        </div>

                        <div class="section__three-operations">
                            <a class="section__three-cart chat_option" href="#">
                                <form class="popup__cart" method="post" action="add_to_cart.php">
                                    <input type="hidden" name="service" value="Чат GPT">
                                    <input type="hidden" name="image" value="img/chat.svg">
                                    <button type="submit" class="add_tovar" name="add_to_cart">В корзину</button>
                                </form>
                            </a>
                            <!-- <a class="section__three-del" href="#">Удалить</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer" id="footer">
        <div class="container">
            <div class="footer__wrapper">
                <h2 class="footer__title">Контакты</h2>
                <div class="footer__inner">
                    <div class="footer__inner-box">
                        <a class="footer__inner-social" href="#">Наш Телеграмм</a>
                        <img class="footer__inner-image" src="img/telegram.svg" alt="telegram">
                    </div>
                    <div class="footer__inner-column">
                        <h4 class="footer__inner-title">Телефон и почта</h4>
                        <p class="footer__inner-text">Горячая линия: <span class="footer__inner-span">+7 993 244 24 42</span></p>
                        <p class="footer__inner-text">Почта: <span class="footer__inner-span">openstudio@gmail.ru</span></p>
                    </div>
                    <div class="footer__inner-column">
                        <h4 class="footer__inner-title">Адрес</h4>
                        <p class="footer__inner-text">Россия, г. Москва, ул. Ваежная, д.1, Бизнес-Центр «Marlo»</p>
                    </div>
                </div>
                <div class="footer__line">
                    <img class="footer__line-delimetr" src="img/line.svg" alt="line">
                    <div class="footer__line-technical">
                        <p class="footer__line-copiright">© 2023-2024 ООО «Openstudio». Все права защищены</p>
                        <a class="footer__line-politika" href="#">Политика конфиденциальности</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Стрелка для прокрутки страницы вверх -->
    <button class="back-to-top-button">
        <img class="back-to-top-arrow" src="img/Arrow.svg" alt="Arrow">
    </button>

    <div class="popup one" id="reg__popup">
        <form class="popup__form" action="index.php" method="POST">
            <h2 class="popup__title">Регистрация</h2>
            <!-- <button class="popup__btn">Отправить</button> -->
            <p class="already__have-account">Уже есть аккаунт? Тогда <span class="auto">войдите</span></p>
            <img class="popup__close" src="img/close-svgrepo-com.svg" alt="">
            <label class="popup_label" for="name">Имя:</label>
            <input class="popup_input" type="text" id="name" name="name_us" required>
            <label class="popup_label" for="surname">Фамилия:</label>
            <input class="popup_input" type="text" id="surname" name="surname_us" required>
            <label class="popup_label" for="email">Почта:</label>
            <input class="popup_input" type="email" id="email" name="email_us" required>
            <label class="popup_label" for="login">Логин:</label>
            <input class="popup_input" type="text" id="login" name="login_us" required>
            <label class="popup_label" for="pass">Пароль:</label>
            <input class="popup_input" type="password" id="password" name="pass_us" required>
            <label class="popup_label" for="confirmpass">Подтвердите пароль:</label>
            <input class="popup_input" type="password" id="confirmpass" name="confpass_us" required>
            <button class="popup_submit" type="submit">Зарегистрироваться</button>
        </form>
    </div>

    <div class="popup two" id="auto__popup">
        <form action="index.php" method="POST">
            <h2 class="popup__title">Авторизация</h2>
            <p class="not__have-account">Еще нет аккаунта? Тогда <span class="reg">зарегистрируйтесь</span></p>
            <img class="popup__close" src="img/close-svgrepo-com.svg" alt="">
            <label class="popup_label" for="login">Логин:</label>
            <input class="popup_input" type="text" id="login" name="log" required>
            <label class="popup_label" for="password">Пароль:</label>
            <input class="popup_input" type="password" id="password" name="pas" required>
            <button class="popup_submit" type="submit">Вход</button>
        </form>
    </div>


    <script src="js/script.js"></script>
</body>

</html>
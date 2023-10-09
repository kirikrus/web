<!DOCTYPE html>
<html id="html" style="overflow: hidden hidden;">

<head>
    <title>Профиль</title>
    <link rel="stylesheet" href="../css/letoile.css">
    <link rel="stylesheet" href="../css/effects.css">
    <link rel="stylesheet" href="../css/modals.css">
    <link rel="stylesheet" href="../css/profilePage.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="../js/some.js"></script>
    <script src="../js/modal.js"></script>
</head>

<body class="text">
    <span id="profileLine"></span>

    <div id="blackOut"></div>

    <div id="productModal" class="product text">
        <img src="../css/img/pngwing.com (2).png">
        <div>
            <b>GUCCI QUALITY</b>
            <p>7899₽</p>
        </div>
        <button style="grid-area: confirm; background: var(--main-color)" class="baseButton _zoomIn"
            onclick="close_modal(2)">купить</button>
    </div>

    <div id="mainPageProfile">

        <div id="userCard">
            <span style="display: block;height: 200px; width: 200px; border-radius: 50%; background: gray;"></span>
            <p class="textHightlight" style="color: var(--white-color); font-size: 40px;">Кирилл</p>
            <p style="font-size: 32px; font-weight: 300;">Очки: 789</p>
            <p></p>
            <p>Адрес доставки:<br />Омск, ул. Ленина, 1, кв 3</p>
            <p style="place-self: normal;">Телефон:<br />8(977)303-95-29</p>
        </div>

        <div id="navBarProfile" style="grid-area: nav;">
            <a onclick="profileNav(1)">Корзина</a>
            <a onclick="profileNav(2)">Избранное</a>
            <a onclick="profileNav(3)">Настройки</a>
            <a href="../index.php">Главная</a>
        </div>

        <div id="profilePageName" style="grid-area: pageName; place-self: center; color: var(--white-color);"
            class="textHightlight">Корзина
        </div>

        <div id="bagPageProfile">
            <div class="buyPage">
                <div class="product text">
                    <button class="_zoomIn text">
                        <p style="margin: -6px 0 0 0;">-</p>
                    </button>
                    <div id="productBlock" onclick="open_modal(2)">
                        <img src="../css/img/pngwing.com (2).png">
                        <div>
                            <b>GUCCI QUALITY</b>
                            <p>7899₽</p>
                        </div>
                    </div>
                </div>
                <div class="product text">
                    <button class="_zoomIn text">
                        <p style="margin: -6px 0 0 0;">-</p>
                    </button>
                    <div id="productBlock" onclick="open_modal(2)">
                        <img src="../css/img/pngwing.com (2).png">
                        <div>
                            <b>GUCCI QUALITY</b>
                            <p>7899₽</p>
                        </div>
                    </div>
                </div>
                <div class="product text">
                    <button class="_zoomIn text">
                        <p style="margin: -6px 0 0 0;">-</p>
                    </button>
                    <div id="productBlock" onclick="open_modal(2)">
                        <img src="../css/img/pngwing.com (2).png">
                        <div>
                            <b>GUCCI QUALITY</b>
                            <p>7899₽</p>
                        </div>
                    </div>
                </div>
                <div class="product text">
                    <button class="_zoomIn text">
                        <p style="margin: -6px 0 0 0;">-</p>
                    </button>
                    <div id="productBlock" onclick="open_modal(2)">
                        <img src="../css/img/pngwing.com (2).png">
                        <div>
                            <b>GUCCI QUALITY</b>
                            <p>7899₽</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="costBuyPage">
                <p>Итоговая цена:</p>
                <p>17 800₽</p>
            </div>
        </div>

        <div id="likePageProfile" style="display: none;">
            <div class="buyPage">
                <div class="product text">
                    <button class="_zoomIn text">
                        <p style="margin: -6px 0 0 0;">-</p>
                    </button>
                    <div id="productBlock" onclick="open_modal(2)">
                        <img src="../css/img/pngwing.com (2).png">
                        <div>
                            <b>GUCCI QUALITY</b>
                            <p>7899₽</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="settingPageProfile" style="display: none;">
            <div id="setting">
                <p>Имя</p>
                <input type="text" placeholder="Кирилл" />
            </div>
            <div id="setting">
                <p>Пароль</p>
                <input type="password" placeholder="*******************" />
            </div>
            <div id="setting">
                <p>Почта</p>
                <input type="email" placeholder="kirill.04@mail.tu" />
            </div>
            <div id="setting">
                <p>Адрес</p>
                <input type="text" placeholder="Омск, ул. Ленина, 1, кв 3" />
            </div>
            <div id="setting">
                <p>Телефон</p>
                <input type="tel" placeholder="8(977)303-95-29" />
            </div>
            <div id="setting">
                <p>Оформление</p>
                <div id="settingColorPanel">
                    <div onclick="changeColor('#76417A')" class="themeColor _focus _zoomIn" style="background: #76417A;"></div>
                    <div onclick="changeColor('#417A51')" class="themeColor _focus _zoomIn" style="background: #417A51;"></div>
                    <div onclick="changeColor('#7A4141')" class="themeColor _focus _zoomIn" style="background: #7A4141;"></div>
                    <div onclick="changeColor('#414E7A')" class="themeColor _focus _zoomIn" style="background: #414E7A;"></div>
                </div>
            </div>
            <div id="setting">
                <button class="baseButton _focus _zoomIn">Выйти</button>
                <button class="baseButton _focus _zoomIn" style="justify-self: end;">Удалить аккаунт</button>
            </div>
        </div>

        <button id="profilePageConfirm" class="baseButton text bgMain _focus _zoomIn"
            style="font-weight: 400; justify-self: center;">Оплатить</button>
    </div>
</body>

</html>
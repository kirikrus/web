<!DOCTYPE html>
<html id="html" style="overflow: hidden hidden;">

<head>
    <title>Профиль</title>
    <link rel="stylesheet" href="css/letoile.css">
    <link rel="stylesheet" href="css/effects.css">
    <link rel="stylesheet" href="css/modals.css">
    <link rel="stylesheet" href="css/profilePage.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="js/some.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/data.js"></script>
</head>

<body class="text" onload="updateProfile()">
    <span id="profileLine"></span>

    <div id="blackOut"></div>

    <div id="commentCard" class="text" style="display: none;">
        <div id="commentCardFlex"
            style="display: flex;flex-direction: column;align-content: center;align-items: center; overflow-y: scroll;">

        </div>
        <div style="display: grid; grid-template-rows: 30px 110px 30px; grid-template-areas: '1''2''3'; background: #404040;border-radius: 0px 0px 50px 50px;
    ">
            <div style="display: grid;grid-template-areas: '1 2 3 4 5'; width: min-content; margin-left: 30px;">
                <span>⭐</span>
                <span>⭐</span>
                <span>⭐</span>
                <span>⭐</span>
                <span>⭐</span>
            </div>
            <textarea class="text" type="text" style="width: 288px;
    height: 109px; place-self: center; "></textarea>
            <button class="baseButton _focus _zoomIn"
                style="place-self: end;width: 50px; border-radius: 100%; background: var(--main-color); font-weight: 700; font-size: 30px;">↑</button>
        </div>
    </div>

    <div id="productModal" class="product text"></div>

    <div id="loader"></div>

    <div id="mainPageProfile">

        <div id="userCard"></div>

        <div id="navBarProfile" style="grid-area: nav;">
            <a onclick="profileNav(1)">Корзина</a>
            <a onclick="profileNav(2)">Избранное</a>
            <a onclick="profileNav(3)">Настройки</a>
            <a href="index.php">Главная</a>
        </div>

        <div id="profilePageName" style="grid-area: pageName; place-self: center; color: var(--white-color);"
            class="textHightlight">Корзина
        </div>

        <div id="bagPageProfile">
            <div class="buyPage" id="orderPage">
                <script>orderProduct(null, 'get')</script>
            </div>
            <div id="costBuyPage">
                <p>Итоговая цена:</p>
                <p id="totalCost">17 800₽</p>
            </div>
        </div>

        <div id="likePageProfile" style="display: none;">
            <div class="buyPage" id="favoritesPage"> </div>
            <script>favoriteProduct(null, 'get')</script>
        </div>

        <div id="settingPageProfile" style="display: none;">
            <div id="setting">
                <p>Имя</p>
                <input name="change" type="text" placeholder="Имя" />
            </div>
            <div id="setting">
                <p>Пароль</p>
                <input name="change" type="password" placeholder="************" />
            </div>
            <div id="setting">
                <p>Адрес</p>
                <input name="change" type="text" placeholder="г. Город, ул. Улица, д. Дом" />
            </div>
            <div id="setting">
                <p>Телефон</p>
                <input name="change" type="tel" placeholder="8(987)6543210" />
            </div>
            <div id="setting">
                <p>Оформление</p>
                <div id="settingColorPanel">
                    <div onclick="changeColor('#76417A')" class="themeColor _focus _zoomIn"
                        style="background: #76417A;"></div>
                    <div onclick="changeColor('#417A51')" class="themeColor _focus _zoomIn"
                        style="background: #417A51;"></div>
                    <div onclick="changeColor('#7A4141')" class="themeColor _focus _zoomIn"
                        style="background: #7A4141;"></div>
                    <div onclick="changeColor('#414E7A')" class="themeColor _focus _zoomIn"
                        style="background: #414E7A;"></div>
                </div>
            </div>
            <div id="setting">
                <button class="baseButton _focus _zoomIn" onclick="getOut()">Выйти</button>
                <script>
                    function getOut() {
                        sessionStorage.entry = 0;
                        sessionStorage.id = 0;
                        window.location.href = "index.php";
                    }
                </script>
                <button id="deleteUserBt" class="baseButton _focus _zoomIn" style="justify-self: end;">Удалить
                    аккаунт</button>
            </div>
        </div>

        <button id="profilePageConfirm" class="baseButton text bgMain _focus _zoomIn"
            style="font-weight: 400; justify-self: center;">Заказать</button>
    </div>
</body>

</html>
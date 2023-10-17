<html id="html" style="width: 1700px;" onmousemove="getPositionMove(event)">

<head>
  <title>Летуаль 2.0</title>
  <link rel="stylesheet" href="css/letoile.css">
  <link rel="stylesheet" href="css/effects.css">
  <link rel="stylesheet" href="css/modals.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <script src="js/some.js"></script>
  <script src="js/modal.js"></script>
  <script src="js/data.js"></script>
</head>

<body onscroll="getPositionScroll(event)" onload="reload()">

  <form id="reg" method="POST">
    <p style="grid-area: exit; justify-self: start;font-size: 100px;transform: rotate(45deg);  font-weight: 200; color: lightgrey; margin: -30px 0 0 0; cursor: pointer;"
      onclick="close_modal(1)">+</p>
    <p class="text"
      style="grid-area: label;font-weight: 600; font-size: 40px; color: var(--main-color); margin: 50px 0 0 0;">
      Регистрация
    </p>
    <input style=" grid-area: name" name="username" placeholder="Имя" class="baseButton">
    <input style=" grid-area: email" name="email" placeholder="Email@email" type="email" class="baseButton">
    <input style=" grid-area: password" name="password" placeholder="Пароль" type="password" class="baseButton">
    <button style=" grid-area: confirm; background: var(--main-color)" class="baseButton _zoomIn"
      type="submit">Подтвердить</button>
  </form>

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

  <span id="mousePoint"></span>

  <div id="blackOut"></div>

  <div id="mainPage">

    <table border="0" style="width:1500; height:250px;">
      <tr id="navBar">
        <td class="vatop" width="150" style=" padding-top: 20px">
          <img id="labelImage" src="\css\img\30.png" />
        </td>
        <td class="vatop pdtop50 " style="width: 50px;">
        </td>
        <td class="vatop pdtop50 _zoomOut">
          <p>Главная</p>
        </td>
        <td class="vatop pdtop50 _zoomOut">
          <p>Парфюмерия</p>
        </td>
        <td class="vatop pdtop50 _zoomOut">
          <p>Косметика</p>
        </td>
        <td width="290px">

          <table id="navReg" align="center" style="z-index: 2; position: relative;">
            <tr>
              <td>
                <input id="emailEntry" class="baseButton" type="text" placeholder="Почта" />
              </td>
            </tr>
            <tr>
              <td style="padding-top: 10px">
                <input id="passwordEntry" class="baseButton" type="password" placeholder="Пароль" />
              </td>
            </tr>
            <tr>
              <td align="center" style="padding-top: 10px">
                <button class="baseButton _zoomIn " style="
                      background: var(--main-color);
                      width: 114px;
                      height: 50px;
                    " onclick="userEntry()">
                  Вход
                </button>
              </td>
            </tr>
            <tr align="center">
              <td>
                <button style="color: var(--grey-text); background: none; border: none;" onclick="open_modal(1)">нет
                  аккаунта?</button>
              </td>
            </tr>
          </table>

          <table id="navIcons" align="center"
            style="display: none;z-index: 2; position: relative; margin: -85px 0 0 110px;">
            <tr>
              <td class="_zoomOut" style="width: 80px;">
                <a style="width: 55px; display: block;" href=""><img src="css/img/bag_icon.png"></a>
              </td>
              <td class="_zoomOut">
                <a style="width: 55px; display: block;" href="pages/profile.php"><img
                    src="css/img/profile_icon.png"></a>
              </td>
            </tr>
          </table>

        </td>
      </tr>
    </table>

    <table style="border-spacing: 0; margin-top: -50px" border="0" width="1500" cellpadding="0" align="center">
      <tr>
        <td>
          <img src="css/img/model.png" align="left" style="z-index: 99; position: relative; pointer-events: none;" />
          <span id="cyrcle"></span>
          <span id="mainImgShadow"></span>
          <div class="pdtop50" style="width: 100%; position: absolute; margin-left: 400px;">
            <span class="textHightlightBig">cosmetics</span>
            <span class="textHightlightBig"
              style="color: var(--main-color); z-index: 0; -webkit-text-stroke: 18px var(--main-color);">cosmetics</span>
            <span class="textHightlightBig" style="top:250px;transform: scale(0.9,1);"> store</span>
            <span class="textHightlightBig"
              style="color: var(--main-color); z-index: 0; -webkit-text-stroke: 18px var(--main-color); top:250px; transform: scale(0.9,1);">
              store</span>
            <div id="mainText" class="text">
              - это не просто бренд, это история вашей неповторимой красоты,
              воплощенная в ароматах и текстурах, макияже и уходе. Мы -
              путеводители по бескрайним просторам мира косметики и
              парфюмерии, предлагая вам непередаваемый опыт собственной
              трансформации и самовыражения.
            </div>
          </div>

          <div style="margin-top: 600px; height: 740px;padding-top: 70px;">
            <span class="bgImgBlur"
              style="margin-top: -70px; filter: grayscale(1) brightness(1) invert(1) blur(1px); opacity: 0.2;"><img
                src="css/img/карта_фон.png" style=" width: 1496px; " />
            </span>

            <div id="mapFrame">
              <table width="100%" height="600px" style=" padding: 50px;">
                <tr>
                  <td width="100%">
                    <table align="center" cellspacing="40px" class="text"
                      style="color: var(--main-color); font-size: 26px; font-weight: 500;    -webkit-border-horizontal-spacing: 20px;">
                      <tr>
                        <td>Пн</td>
                        <td rowspan="5" style="font-weight: 700;;">8<sup>00</sup> - 20<sup>00</sup></td>
                      </tr>
                      <tr>
                        <td>ВТ</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>СР</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>ЧТ</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>ПТ</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>СБ</td>
                        <td rowspan="2" style="font-weight: 700;">6<sup>00</sup> - 21<sup>00</sup></td>
                      </tr>
                      <tr>
                        <td>ВС</td>
                        <td></td>
                      </tr>
                    </table>
                  </td>
                  <td align="right" style=" filter: grayscale(1) brightness(1) invert(1);">
                    <script style="display: block; width: 600px;height: 600px;" type="text/javascript" charset="utf-8"
                      async
                      src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae9d19015764125494abab00ab33d505ae9734fc39b5972a7b6e6e35f06b91289&amp;width=600&amp;height=600&amp;lang=ru_RU&amp;scroll=true">
                      </script>
                </tr>
              </table>
              <span class="text"
                style="position: absolute; color: var(--main-color); font-weight: 700; left: 1100px;">(2023)</span>
            </div>
          </div>

          <table class="text" width="100%" height="900px" style="margin-top: 30px;">
            <tbody>
              <tr>
                <td colspan="3"
                  style="text-transform: uppercase; font-weight: 500; font-size: 32px;line-height: 90%; letter-spacing: 13px;">
                  the most beautiful story begins here</td>
              </tr>
              <tr height="600px">
                <td align="center">
                  <div class="photoCard">
                    <img src="css/img/gucci_model.png" style="width: 400; padding: 16px;" />
                    <p>- GUCCI -<br />2006</p>
                  </div>
                </td>
                <td align="center">
                  <div class="photoCard" style="background: white; color: var(--main-color);">
                    <img src="css/img/chanel_model.png" style="width: 400; padding: 16px;" />
                    <p>- CHANEL -<br />2011</p>
                  </div>
                </td>
                <td align="center">
                  <div class="photoCard" style="background: var(--main-color); color: black;">
                    <img src="css/img/lacoste_model.png" style="width: 400; padding: 16px" />
                    <p>- LACOSTE -<br />2020</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="3" align="center"
                  style="color: var(--main-color);font-weight: 200;font-size: 48px;letter-spacing: 13px;">
                  Nobody’s perfect, but you.</td>
              </tr>
              <tr>
                <td colspan="3" align="center" style="font-weight: 500;font-size: 32pxs;">enjoy yourself</td>
              </tr>
            </tbody>
          </table>

          <table width="100%" class="pdtop50 text">
            <tr>
              <td class="search" colspan="6">
                <form onsubmit="search(event)">
                  <button class="baseButton _focus" type="submit">Поиск</button>
                  <input class="baseButton" type="search" id="searchInput" placeholder="GUCCI Bloo..." />
                </form>
              </td>
            </tr>
            <tr style="font-size: 26px; text-align: center;">
              <td width="230px"></td>
              <td width="250px" onclick="searchSortOpenClose(1)">сортировка <img src="/css/img/list.png"></td>
              <td width="250px" onclick="searchSortOpenClose(2)">категории <img src="/css/img/list.png"></td>
              <td width="250px" onclick="searchSortOpenClose(3)">оценки <img src="/css/img/list.png"></td>
              <td width="250px" onclick="searchSortOpenClose(4)">стоимость <img src="/css/img/list.png"></td>
              <td></td>
            </tr>
          </table>

          <div id="searchTb" width="auto" class="text" style="margin-top: -36px;">
            <div class="searchCard" style="grid-area: '1';">
              <b onclick="searchSortOpenClose(1,1)">сортировка <img src="/css/img/list.png"></b>
              <p onclick="searchSort(event,1)">по стоимости min</p>
              <p onclick="searchSort(event,1)">по стоимости max</p>
              <p onclick="searchSort(event,1)">по алфавиту A->Z</p>
              <p onclick="searchSort(event,1)">по алфавиту Z->A</p>
              <p onclick="searchSort(event,1)">по рейтингу</p>
            </div>
            <div class="searchCard" style="grid-area: '2';">
              <b onclick="searchSortOpenClose(2,1)">категории <img src="/css/img/list.png"></b>
              <p onclick="searchSort(event)">духи</p>
              <p onclick="searchSort(event)">косметика</p>
            </div>
            <div class="searchCard" style="grid-area: '3';">
              <b onclick="searchSortOpenClose(3,1)">оценки <img src="/css/img/list.png"></b>
              <p onclick="searchSort(event)">⭐</p>
              <p onclick="searchSort(event)">⭐⭐</p>
              <p onclick="searchSort(event)">⭐⭐⭐</p>
              <p onclick="searchSort(event)">⭐⭐⭐⭐</p>
              <p onclick="searchSort(event)">⭐⭐⭐⭐⭐</p>
            </div>
            <div class="searchCard" style="grid-area: '4';">
              <b onclick="searchSortOpenClose(4,1)">стоимость <img src="/css/img/list.png"></b>
              <i>от</i>
              <input name="serchCardCostInput" style="width: 223px; height: 40px; background: lightgray;"
                placeholder="1000"></input>
              <i>до</i>
              <input name="serchCardCostInput"
                style="width: 223px; height: 40px; background: lightgray; margin-bottom: 30px;"
                placeholder="5000"></input>
            </div>
          </div>

        </td>
      </tr>
    </table>

    <div id="buyPage" class="buyPage">
      <?php
      $conn = mysqli_connect("localhost", "root", "", "bd");
      if (!$conn) {
        die("Ошибка: " . mysqli_connect_error());
      }
      $sql = "SELECT * FROM product";
      if ($result = mysqli_query($conn, $sql)) {

        foreach ($result as $row) {
          echo "<div class='product text' onclick='open_modal(2," . $row["id"] . ")'>";
          echo "<img src='css/img/" . $row["image"];
          echo "'>";
          echo "<div>";
          echo '<b style="text-transform: uppercase;">' . $row["name"] . "</b>";
          echo "<p>" . $row["price"] . "₽</p>";
          echo "</div>";
          echo "</div>";
        }
        mysqli_free_result($result);
      } else {
        echo "Ошибка: " . mysqli_error($conn);
      }
      mysqli_close($conn);
      ?>
    </div>
  </div>
</body>

<footer>
  <table align="center" height="150px" width="1500px">
    <tr>
      <td></td>
      <td>© Все права защищены</td>
      <td align="right" style="padding-right: 50px;">+7(977)303-95-29</td>
    </tr>
  </table>
</footer>

</html>
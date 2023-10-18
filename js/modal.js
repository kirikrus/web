function open_modal(key, productId = null) {
    document.getElementById('blackOut').style.display = 'block';
    document.getElementById('html').style.overflow = 'hidden hidden';
    switch (key) {
        case 1:
            document.getElementById('reg').style.display = 'grid';
            break;
        case 2:
            document.getElementById('commentCardFlex').innerHTML = '';

            var modal = document.getElementById('productModal');

            //XMLHttpRequest для отправки запроса на сервак
            var xhr = new XMLHttpRequest();

            document.querySelector('#loader').style.display = 'block';

            //обработка ответа
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.querySelector('#loader').style.display = 'none';
                    var productData = JSON.parse(xhr.responseText);//ответ сервака

                    modal.innerHTML = '<p style="grid-area: exit; justify-self: start;font-size: 100px;transform: rotate(45deg);  font-weight: 200; color: lightgrey; margin: 30px 0 0 30px; cursor: pointer;" onclick="close_modal(2)">+</p>'
                        +
                        '<img src="css/img/' + productData.image + '" style="grid-area: photo;margin-top: -30px;">'
                        +
                        '<div style="grid-area: name;">'
                        +
                        '<b style="text-transform: uppercase;line-height: 95%;">' + productData.name + '</b>'
                        +
                        '<p style="margin:15px">' + productData.price + '₽</p>'
                        +
                        '<p id="productCardMidRating" style="margin-top: -7px;color: #bababa;font-size: 16px;font-weight: 300;">' + productData.rating + ' ⭐</p>'
                        +
                        '</div>'
                        +
                        '<p style="grid-area: text; text-align: left;">' + productData.description + '</p>'
                        +
                        '<button style="grid-area: comment; background: transparent; border: 1px solid white; place-self: center" class="baseButton _zoomIn" onclick="open_modal(3)">отзывы</button>'
                        +
                        '<button style="grid-area: buy ;justify-self: left; align-self: center; width: 300px; background: ' + productData.color + ';" class="baseButton _zoomIn" onclick="orderProduct(' + productData.id + ',' + "'add'" + ')">купить</button>'
                        +
                        '<img src="css/img/heart.png" id="heart" class="_zoomIn" onclick="favoriteProduct(' + productData.id + ',' + "'add'" + ')"  style="grid-area: like;width: 50px; height: 50px; place-self: center; pointer-events: all;">';
                    modal.style.display = 'grid';

                    commentUpdate(productId);
                }
            };

            xhr.open('GET', 'base/getProduct.php?id=' + productId, true);
            xhr.send();
            break;
        case 3:
            what = document.getElementById('commentCard');
            if (what.style.display == 'grid')
                close_modal(3);
            else
                what.style.display = 'grid';
    }
}

function close_modal(key) {
    if (key != 3) {
        document.getElementById('blackOut').style.display = 'none';
        document.getElementById('html').style.overflow = 'hidden overlay';
    }
    switch (key) {
        case 1:
            document.getElementById('reg').style.display = 'none';
            if (sessionStorage.getItem('entry') == 1) {
                document.getElementById('navReg').style.display = 'none';
                document.getElementById('navIcons').style.display = 'block';
            }
            break;
        case 2:
            document.getElementById('productModal').style.display = 'none';
            close_modal(3);
            break;
        case 3:
            document.getElementById('commentCard').style.display = 'none';
    }
}

function searchSortOpenClose(index, close = 0) {
    divElements = document.querySelectorAll('#searchTb .searchCard');
    targetElement = divElements[index - 1];

    if (!close) {
        targetElement.style.height = 'fit-content';
        targetElement.style.overflow = 'visible';
        targetElement.style.border = "0.5px solid lightgrey"
    }
    else {
        targetElement.style.height = '0';
        targetElement.style.overflow = 'hidden';
        targetElement.style.border = "none"
    }
}






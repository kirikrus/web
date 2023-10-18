let styleOld = 0;
let which = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

function searchSort(event, key = 0) {
    if (styleOld && key) {
        styleOld.style.background = "";
        styleOld.style.color = "";
    }
    if (key) styleOld = event.currentTarget;

    action = event.currentTarget.innerText;

    if (event.currentTarget.style.color != "white") {
        event.currentTarget.style.background = "var(--main-color)";
        event.currentTarget.style.color = "white";
    }
    else {
        event.currentTarget.style.background = "";
        event.currentTarget.style.color = "";
    }

    switch (action) {
        case "по стоимости min":
            which[0] = 0;
            break;
        case "по стоимости max":
            which[0] = 1;
            break;
        case "по алфавиту A->Z":
            which[0] = 2;
            break;
        case "по алфавиту Z->A":
            which[0] = 3;
            break;
        case "по рейтингу":
            which[0] = 4;
            break;
        case "духи":
            if (which[1] == 1) which[1] = 0;
            else which[1] = 1;
            break;
        case "косметика":
            if (which[2] == 1) which[2] = 0;
            else which[2] = 1;
            break;
        case "⭐":
            if (which[3] == 1) which[3] = 0;
            else which[3] = 1;
            break;
        case "⭐⭐":
            if (which[4] == 1) which[4] = 0;
            else which[4] = 1;
            break;
        case "⭐⭐⭐":
            if (which[5] == 1) which[5] = 0;
            else which[5] = 1;
            break;
        case "⭐⭐⭐⭐":
            if (which[6] == 1) which[6] = 0;
            else which[6] = 1;
            break;
        case "⭐⭐⭐⭐⭐":
            if (which[7] == 1) which[7] = 0;
            else which[7] = 1;
            break;
    }
}

function commentUpdate(productId) {
    var modal = document.getElementById('commentCardFlex');
    var xhr = new XMLHttpRequest();
    document.querySelector('#loader').style.display = 'block';

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.querySelector('#loader').style.display = 'none';
            var commentData = JSON.parse(xhr.responseText);//ответ сервака

            midRating = 0;
            i = 0;

            commentData.forEach(commentData => {
                midRating += parseFloat(commentData.rating);
                i++;
                modal.innerHTML +=
                    '<div class="commentMsg">'
                    +
                    '<b style="grid-area: name;">' + commentData.user_name + '</b>'
                    +
                    '<p style="grid-area: star; margin-top: 3px;">' + commentData.rating + '⭐</p>'
                    +
                    '<p style="grid-area: text; margin-bottom: 0;">' + commentData.text + '</p>'
                    +
                    '</div>'
            });
            if (i != 0)
                document.getElementById('productCardMidRating').innerHTML = midRating / i + '⭐';
        }
    };

    xhr.open('GET', 'base/getComment.php?id=' + productId, true);
    xhr.send();
}

function search(event) {
    event.preventDefault();

    which[8] = "$" + document.getElementsByName('serchCardCostInput')[0].value + "$";
    which[9] = "$" + document.getElementsByName('serchCardCostInput')[1].value + "$";

    which[10] = document.getElementById('searchInput').value;

    var modal = document.getElementById('buyPage');
    var xhr = new XMLHttpRequest();
    document.querySelector('#loader').style.display = 'block';

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.querySelector('#loader').style.display = 'none';
            modal.innerHTML = '';

            var Data = JSON.parse(xhr.responseText);//ответ сервака
            Data.forEach(Data => {
                modal.innerHTML +=
                    "<div class='product text' onclick='open_modal(2," + Data.id + ")'>"
                    +
                    "<img src='css/img/" + Data.image + "'>"
                    +
                    "<div>"
                    +
                    '<b style="text-transform: uppercase;">' + Data.name + "</b>"
                    +
                    "<p>" + Data.price + "₽</p>"
                    +
                    "</div>"
                    +
                    "</div>"
            });
        };
    }
    xhr.open('GET', 'base/search.php?which=' + which, true);
    xhr.send();
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("reg").addEventListener("submit", function (e) {

        e.preventDefault();

        if (
            document.getElementsByName('username')[0].value != ''
            &&
            document.getElementsByName('email')[0].value != ''
            &&
            document.getElementsByName('password')[0].value != ''
        ) {

            document.getElementsByName("username")[0].style.background = 'white';
            document.getElementsByName("email")[0].style.background = 'white';
            document.getElementsByName('password')[0].style.background = 'white';

            const formData = new FormData(this);

            fetch("base/registration.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        sessionStorage.entry = 1;
                        sessionStorage.id = data.result.id;
                        close_modal(1);
                    } else {
                        document.getElementsByName("username")[0].style.background = 'rgb(241, 150, 150)';
                        document.getElementsByName("email")[0].style.background = 'rgb(241, 150, 150)';
                    }
                });
        }
        else {
            document.getElementsByName("username")[0].style.background = 'rgb(241, 150, 150)';
            document.getElementsByName("email")[0].style.background = 'rgb(241, 150, 150)';
            document.getElementsByName('password')[0].style.background = 'rgb(241, 150, 150)';
        }
    });
});

function userEntry() {
    var email = document.getElementById('emailEntry');
    var password = document.getElementById('passwordEntry');
    if (
        email.value != ''
        &&
        password.value != ''
    ) {

        email.style.background = 'white';
        password.style.background = 'white';

        fetch("base/authorization.php", {
            method: "POST",
            body: JSON.stringify({
                email: email.value,
                password: password.value
            }),
            headers: { "Content-Type": "application/json" },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    sessionStorage.entry = 1;
                    sessionStorage.id = data.userData.id;
                    close_modal(1);
                } else {
                    email.style.background = 'rgb(241, 150, 150)';
                    password.style.background = 'rgb(241, 150, 150)';
                }
            });
    }
    else {
        email.style.background = 'rgb(241, 150, 150)';
        password.style.background = 'rgb(241, 150, 150)';
    }
}

function updateProfile() {
    html.style.setProperty('--main-color', localStorage.getItem("color"));
    var modal = document.getElementById('userCard');
    modal.innerHTML = '';

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var user = JSON.parse(xhr.responseText);//ответ сервака
            var adress_ = user.adress == null ? 'нужно добавить!' : user.adress;
            var tel_ = user.tel == null ? 'нужно добавить!' : user.tel;
            modal.innerHTML =
                '<span style="display: block;height: 200px; width: 200px; border-radius: 50%; background: gray;"></span>'
                +
                '<p class="textHightlight" style="color: var(--white-color); font-size: 40px;">' + user.name + '</p>'
                +
                '<p style="font-size: 32px; font-weight: 300;">Баллы: ' + user.rating + '</p>'
                +
                '<p></p>'
                +
                '<p>Адрес доставки:<br />' + adress_ + '</p>'
                +
                '<p style="place-self: normal;">Телефон:<br />' + tel_ + '</p>';
            modal.style.display = 'grid';

        }
    };

    xhr.open('GET', 'base/getUser.php?id=' + sessionStorage.id, true);
    xhr.send();
}

function changeUserInfo() {
    var changes = document.getElementsByName('change');

    fetch("base/changeUserInfo.php", {
        method: "POST",
        body: JSON.stringify({
            id: sessionStorage.id,
            name: changes[0].value,
            password: changes[1].value,
            adress: changes[2].value,
            tel: changes[3].value
        }),
        headers: { "Content-Type": "application/json" },
    })
        .then(response => response.json())
        .then(data => {
            if (data.tel) {
                changes[3].style.background = 'rgb(241, 150, 150)';
            }
            else {
                window.location.reload();
            }
        });
}

document.addEventListener("DOMContentLoaded", function () {
    var bt = document.getElementById('deleteUserBt');
    var redValue = 0;
    var key = 0;
    bt.onmousedown = function () {
        key = 1;
        if (key) {
            interval = setInterval(function () {
                bt.style.background = 'rgb(' + redValue + ',0,0)';
                redValue += 5;
                if (redValue >= 255) {
                    clearInterval(interval);
                }
            }, 100);
        }
    };

    bt.onmouseup = function () {
        clearInterval(interval);
        key = 0;
        if (redValue >= 255) {
            fetch("base/deleteUser.php", {
                method: "POST",
                body: JSON.stringify({
                    id: sessionStorage.id,
                }),
                headers: { "Content-Type": "application/json" },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        sessionStorage.entry = 0;
                        sessionStorage.id = 0;
                        window.location.href = "index.php";
                    }
                });
        }
        redValue = 0;
        bt.style.background = '';
    };
});

function favoriteProduct(productID, action) {
    if (sessionStorage.entry != 0)
        switch (action) {
            case 'get':
                fetch("base/favorites.php", {
                    method: "POST",
                    body: JSON.stringify({
                        key: action,
                        userID: sessionStorage.id,
                        producrID: productID,
                    }),
                    headers: { "Content-Type": "application/json" },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            var page = document.getElementById('favoritesPage');
                            page.innerHTML = '';

                            var data_ = data.favorites;
                            data_.forEach(data_ => {
                                page.innerHTML +=
                                    '<div class="product text">'
                                    +
                                    '<button class="_zoomIn text">'
                                    +
                                    '<p style="margin: -6px 0 0 0;" onclick="favoriteProduct(' + data_.id + ',' + "'delete')" + '"' + '>-</p>'
                                    +
                                    '</button>'
                                    +
                                    '<div id="productBlock" onclick="open_modal(2,' + data_.id + ')">'
                                    +
                                    '<img src="css/img/' + data_.image + '" style="height:170px">'
                                    +
                                    '<div style="line-height: 10px;margin-top: -16px;">'
                                    +
                                    '<b style="text-transform: uppercase;" class="limited-text">' + data_.name + "</b>"
                                    +
                                    "<p>" + data_.price + "₽</p>"
                                    +
                                    '</div>'
                                    +
                                    '</div>'
                                    +
                                    '</div>'
                            });
                        }
                    });
                break;
            case 'add':
                fetch("base/favorites.php", {
                    method: "POST",
                    body: JSON.stringify({
                        key: action,
                        userID: sessionStorage.id,
                        productID: productID,
                    }),
                    headers: { "Content-Type": "application/json" },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('heart').style.filter = 'sepia(1) hue-rotate(282deg) saturate(3)';
                        }
                    });
                break;
            case 'delete':
                fetch("base/favorites.php", {
                    method: "POST",
                    body: JSON.stringify({
                        key: action,
                        userID: sessionStorage.id,
                        productID: productID,
                    }),
                    headers: { "Content-Type": "application/json" },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        }
                    });
                break;
        }
}

function orderProduct(productID, action) {
    if (sessionStorage.entry != 0)
        switch (action) {
            case 'get':
                fetch("base/order.php", {
                    method: "POST",
                    body: JSON.stringify({
                        key: action,
                        userID: sessionStorage.id,
                        producrID: productID,
                    }),
                    headers: { "Content-Type": "application/json" },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            var page = document.getElementById('orderPage');
                            page.innerHTML = '';

                            var totalCost = 0;

                            var data_ = data.order;
                            data_.forEach(data_ => {
                                page.innerHTML +=
                                    '<div class="product text">'
                                    +
                                    '<button class="_zoomIn text">'
                                    +
                                    '<p style="margin: -6px 0 0 0;" onclick="orderProduct(' + data_.id + ',' + "'delete')" + '"' + '>-</p>'
                                    +
                                    '</button>'
                                    +
                                    '<div id="productBlock" onclick="open_modal(2,' + data_.id + ')">'
                                    +
                                    '<img src="css/img/' + data_.image + '" style="height:170px">'
                                    +
                                    '<div style="line-height: 10px;margin-top: -16px;">'
                                    +
                                    '<b style="text-transform: uppercase;" class="limited-text">' + data_.count + "x " + data_.name + "</b>"
                                    +
                                    "<p>" + data_.price + "₽</p>"
                                    +
                                    '</div>'
                                    +
                                    '</div>'
                                    +
                                    '</div>';
                                totalCost += parseInt(data_.price) * parseInt(data_.count);
                            });
                            document.getElementById('totalCost').innerHTML = totalCost + '₽';
                        }
                    });
                break;
            case 'add':
                fetch("base/order.php", {
                    method: "POST",
                    body: JSON.stringify({
                        key: action,
                        userID: sessionStorage.id,
                        productID: productID,
                    }),
                    headers: { "Content-Type": "application/json" },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            close_modal(2);
                        }
                    });
                break;
            case 'delete':
                fetch("base/order.php", {
                    method: "POST",
                    body: JSON.stringify({
                        key: action,
                        userID: sessionStorage.id,
                        productID: productID,
                    }),
                    headers: { "Content-Type": "application/json" },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        }
                    });
                break;
        }

}
let styleOld = 0;
let which = [];

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

    var word = document.getElementById('searchInput').value;

    which[8] = word;

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
let styleOld = 0;

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
            break;
        case "по стоимости max":
            break;
        case "по алфавиту A->Z":
            break;
        case "по алфавиту Z->A":
            break;
        case "по новизне":
            break;
        case "по рейтингу":
            break;
        case "духи":
            break;
        case "парфюм":
            break;
        case "⭐":
            break;
        case "⭐⭐":
            break;
        case "⭐⭐⭐":
            break;
        case "⭐⭐⭐⭐":
            break;
        case "⭐⭐⭐⭐⭐":
            break;
    }
}

function commentUpdate(productId){
    var modal = document.getElementById('commentCardFlex');
    var xhr = new XMLHttpRequest();
    document.querySelector('#loader').style.display = 'block';

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.querySelector('#loader').style.display = 'none';
            var commentData = JSON.parse(xhr.responseText);//ответ сервака
            
            commentData.forEach(commentData => {
                modal.innerHTML += 
                '<div class="commentMsg">'
                +
                '<b style="grid-area: name;">'+ commentData.user_name +'</b>'
                +
                '<p style="grid-area: star; margin-top: 3px;">'+ commentData.rating +'⭐</p>'
                +
                '<p style="grid-area: text; margin-bottom: 0;">'+ commentData.text +'</p>'
                +
                '</div>'
            });
        }
    };

    xhr.open('GET', 'base/getComment.php?id=' + productId, true);
    xhr.send();
}
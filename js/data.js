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
function open_modal(key) {
    document.getElementById('blackOut').style.display = 'block';
    document.getElementById('html').style.overflow = 'hidden hidden';
    switch (key) {
        case 1:
            document.getElementById('reg').style.display = 'grid';
            break;
        case 2:
            document.getElementById('productModal').style.display = 'grid';
            break;
        case 3:
            what = document.getElementById('commentCard');
            if(what.style.display == 'grid')
                close_modal(3);
            else
                what.style.display = 'grid';
    }
}

function close_modal(key) {
    if(key != 3){
    document.getElementById('blackOut').style.display = 'none';
    document.getElementById('html').style.overflow = 'hidden overlay';
    }
    switch (key) {
        case 1:
            document.getElementById('reg').style.display = 'none';
            document.getElementById('navReg').style.display = 'none';
            document.getElementById('navIcons').style.display = 'block';
            sessionStorage.entry = 1;
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






function open_modal(key) {
    document.getElementById('blackOut').style.display = 'block';
    document.getElementById('html').style.overflow = 'hidden hidden';
    switch (key) {
        case 1:
            document.getElementById('reg').style.display = 'grid';
            break;
        case 2:
            document.getElementById('productModal').style.display = 'block';
            break;
    }
}

function close_modal(key) {
    document.getElementById('blackOut').style.display = 'none';
    document.getElementById('html').style.overflow = 'hidden overlay';
    switch (key) {
        case 1:
            document.getElementById('reg').style.display = 'none';
            document.getElementById('navReg').style.display = 'none';
            document.getElementById('navIcons').style.display = 'block';
            sessionStorage.entry = 1;
            break;
        case 2:
            document.getElementById('productModal').style.display = 'none';
            break;
    }
}

function searchSortOpenClose(index, close = 0) {
    divElements = document.querySelectorAll('#searchTb .searchCard');
    targetElement = divElements[index - 1];

    if (!close) {
        targetElement.style.height = 'fit-content';
        targetElement.style.overflow = 'visible';
    }
    else {
        targetElement.style.height = '0';
        targetElement.style.overflow = 'hidden';
    }
}






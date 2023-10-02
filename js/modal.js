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
function getPositionMove(event) {
    mouseX = event.pageX;
    mouseY = event.pageY;
    mouseYHelp = event.clientY;
    mousePoint = document.getElementById('mousePoint');
    mousePoint.style.left = mouseX - 50 + 'px';
    mousePoint.style.top = mouseY - 50 + 'px';
}

function getPositionScroll(event) {
    scrolledY = window.scrollY;
    mousePoint = document.getElementById('mousePoint');
    currentTop = parseFloat(mousePoint.style.top);
    mousePoint.style.top = (scrolledY + mouseYHelp - 50) + 'px';
}

function reload() {
    html = document.querySelector('html');
    html.style.setProperty('--main-color', localStorage.getItem("color"));
    if (sessionStorage.getItem("entry") == 1) {
        document.getElementById('navReg').style.display = 'none';
        document.getElementById('navIcons').style.display = 'block';
    }
    else {
        document.getElementById('navReg').style.display = 'block';
        document.getElementById('navIcons').style.display = 'none';
    }
}

function profileNav(key) {
    document.getElementById('bagPageProfile').style.display = 'none';
    document.getElementById('settingPageProfile').style.display = 'none';
    document.getElementById('likePageProfile').style.display = 'none';
    pageName = document.getElementById('profilePageName');
    buttonName = document.getElementById('profilePageConfirm');
    buttonName.style.display = 'block';

    switch (key) {
        case 1:
            pageName.innerHTML = 'Корзина';
            document.getElementById('bagPageProfile').style.display = 'grid';
            buttonName.innerHTML = 'Заказать';
            break;
        case 2:
            pageName.innerHTML = 'Избранное';
            document.getElementById('likePageProfile').style.display = 'block';
            buttonName.style.display = 'none';
            break;
        case 3:
            pageName.innerHTML = 'Настройки';
            document.getElementById('settingPageProfile').style.display = 'block';
            buttonName.innerHTML = 'Подтвердить';
            buttonName.onclick = changeUserInfo;
            break;
    }
}

function changeColor(color) {
    localStorage.color = color;
    html = document.querySelector('html');
    html.style.setProperty('--main-color', color);
}

function starChange(which) {
    var star = document.getElementsByName('star');
    switch (which) {
        case 1:
            if (star[0].style.filter == '')
                star[0].style.filter = 'brightness(1)';
            else {
                star[0].style.filter = '';
                star[1].style.filter = '';
                star[2].style.filter = '';
                star[3].style.filter = '';
                star[4].style.filter = '';
            }
            break;
        case 2:
            if (star[1].style.filter == '') {
                star[0].style.filter = 'brightness(1)';
                star[1].style.filter = 'brightness(1)';
            }
            else {
                star[1].style.filter = '';
                star[2].style.filter = '';
                star[3].style.filter = '';
                star[4].style.filter = '';
            }
            break;
        case 3:
            if (star[2].style.filter == '') {
                star[0].style.filter = 'brightness(1)';
                star[1].style.filter = 'brightness(1)';
                star[2].style.filter = 'brightness(1)';
            }
            else {
                star[2].style.filter = '';
                star[3].style.filter = '';
                star[4].style.filter = '';
            }
            break;
        case 4:
            if (star[3].style.filter == '') {
                star[0].style.filter = 'brightness(1)';
                star[1].style.filter = 'brightness(1)';
                star[2].style.filter = 'brightness(1)';
                star[3].style.filter = 'brightness(1)';
            }
            else {
                star[3].style.filter = '';
                star[4].style.filter = '';
            }
            break;
        case 5:
            if (star[4].style.filter == '') {
                star[0].style.filter = 'brightness(1)';
                star[1].style.filter = 'brightness(1)';
                star[2].style.filter = 'brightness(1)';
                star[3].style.filter = 'brightness(1)';
                star[4].style.filter = 'brightness(1)';
            }
            else
                star[4].style.filter = '';
            break;
    }
}
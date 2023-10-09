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
    html.style.setProperty('--main-color',  localStorage.getItem("color"));
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
            buttonName.innerHTML = 'Оплатить';
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
            break;
    }
}

function changeColor(color){
    localStorage.color = color;
    html = document.querySelector('html');
    html.style.setProperty('--main-color', color);
}
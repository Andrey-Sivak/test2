'use strict';

const mobileWidth = 767;
let isMobile = checkWidth();

window.addEventListener('resize', () => {
    isMobile = checkWidth();
});

setTimeout(() => {
    if (!document.querySelector('.loader')) {
        return;
    }

    const loader = document.querySelector('.loader');
    if (loader.classList.contains('active')) {
        loader.classList.remove('active');

        setTimeout(() => {
            loader.parentElement.removeChild(loader);
        }, 300)
    }
}, 2500);

(function loader() {
    if (!document.querySelector('.loader')) {
        return;
    }

    const loader = document.querySelector('.loader');

    if (loader.classList.contains('active')) {
        loader.classList.remove('active');
    }

    setTimeout(() => {
        loader.parentElement.removeChild(loader);
    }, 1500);

})();

(function menu() {
    const menuButton = document.querySelector('.mob-menu-btn') || null;
    const menuContent = document.querySelector('.header__menu_container') || null;
    const menuLogo = document.querySelector('.header__logo-mob-menu') || null;

    if (!menuButton || !menuContent) return;

    menuButton.addEventListener('click', showMenu);
    menuContent.addEventListener('click', hideMenu);

    function showMenu(e) {
        this.classList.add('active');
        menuContent.classList.add('active');
        menuLogo.classList.add('active');
        document.body.classList.add('no-scrolling');
    }

    function hideMenu(e) {
        const target = e.target;

        if (target !== this && !target.classList.contains('close')) return;

        this.classList.remove('active');
        menuButton.classList.remove('active');
        menuLogo.classList.remove('active');
        document.body.classList.remove('no-scrolling');
    }
})();

function checkWidth() {
    return mobileWidth > document.documentElement.clientWidth;
}
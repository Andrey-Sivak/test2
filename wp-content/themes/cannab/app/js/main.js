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

(function setArchiveProductsNumbers() {
    const widget = document.querySelector('.widget.widget_wpc_filters_widget') || null;

    if (!widget) return;

    const foundProductsCount = document.querySelector('.wpc-posts-found-number');
    const categoriesList = [...document.querySelector('.wpc-filter-chips-list').children];

    const foundProductsCountOut = document.querySelector('.archive-wrap_found .count');
    const categoriesListOut = document.querySelector('.archive-wrap__header_bottom');

    (function setProductsCount() {
        if (foundProductsCount) {
            foundProductsCountOut.innerHTML = foundProductsCount.innerHTML;
            return;
        }

        let total = 0;
        const categories = [...document.querySelectorAll('.wpc-filter-product_cat .wpc-term-count-value')];

        categories.forEach(c => {
            const value = parseInt(c.innerHTML);
            total += value;
        });

        foundProductsCountOut.innerHTML = total;
    })();

    (function setActiveCats() {
        if (!categoriesList.length) return;
        categoriesList.forEach(c => {
            const cat = c.querySelector('span.wpc-filter-chip-name').innerHTML;
            if (cat !== 'Reset all') {
                const catClasses = [...c.classList];
                const classWithId = catClasses.filter(t => t.includes('wpc-chip-product_cat-'))[0];
                const catId = classWithId.replace('wpc-chip-product_cat-', '');
                const item = createCat(cat, catId);

                categoriesListOut.appendChild(item);
            }
        });


    })();

    function createCat(title, id) {
        const p = document.createElement('p');
        p.classList.add('archive-wrap__header_cat');
        p.innerHTML = title;

        const span = document.createElement('span');
        span.classList.add('remove');
        span.innerHTML = '×';
        span.dataset.categoryRemove = id;
        p.appendChild(span);

        span.addEventListener('click', removeCat);

        return p;
    }
    
    function removeCat(e) {
        const catId = this.dataset.categoryRemove;
        const category = document.querySelector(`label[for="wpc-checkbox-taxonomy-product_cat-${catId}"]`);
        category.click();
    }
})();

(function mobileSidebar() {
    const btnShow = document.getElementById('mobile-trigger-sidebar') || null;
    const btnHide = document.getElementById('mobile-close-sidebar') || null;
    const wrapper = document.querySelector('.archive-container') || null;

    if (!wrapper || !btnHide || !btnShow) return;

    btnShow.addEventListener('click', switchSidebar);
    btnHide.addEventListener('click', switchSidebar);

    function switchSidebar(e) {
        e.preventDefault();

        wrapper.classList.toggle('activeslide');
    }
})();

function checkWidth() {
    return mobileWidth > document.documentElement.clientWidth;
}
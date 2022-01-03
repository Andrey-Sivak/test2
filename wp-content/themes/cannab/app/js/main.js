'use strict';

(function checkAge() {
    const isAgeVerify = window.localStorage.getItem('age_verify') || null;

    if (isAgeVerify) return;

    const modal = `
    <div class="age-modal">
    <div class="age-modal__content">
    <p class="age-modal_note">You are not old enough to view this content</p>
    <figure class="age-modal__logo">
    <img src="${homeUrl}/wp-content/uploads/2021/12/image-16-1.png"
    width="255"
     alt="img">
</figure>
<p class="age-modal__title">You must be over 21 years old to visit this site</p>
<p class="age-modal__text">Please, verify your age</p>
<div class="age-modal__btns">
<a href="#" class="age-modal__btn enter">Yes, I am over 21 - <br>ENTER</a>
<a href="#" class="age-modal__btn leave">No, I am under 21 - <br>LEAVE</a>
</div>
</div>
</div>
    `;

    document.body.insertAdjacentHTML('beforeend', modal);
    const enter = document.querySelector('.age-modal__btn.enter');
    const leave = document.querySelector('.age-modal__btn.leave');
    const modalEl = document.querySelector('.age-modal');
    const note = document.querySelector('.age-modal_note');

    modalEl.classList.add('active');

    enter.addEventListener('click', verifyAge);
    leave.addEventListener('click', noVerify);

    function verifyAge(e) {
        e.preventDefault();
        window.localStorage.setItem('age_verify', 'true');
        modalEl.classList.remove('active');
        setTimeout(() => {
            document.body.removeChild(modalEl);
        }, 300);
    }

    function noVerify(e) {
        e.preventDefault();
        note.classList.add('active');
    }
})();

import $ from 'jquery';
import './slick.min.js';

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

    const categoriesList = [...document.querySelector('.wpc-filter-chips-list').children];
    const categoriesListOut = document.querySelector('.archive-wrap__header_cats');

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

        document.querySelector('.archive-container')
            .classList.toggle('activeslide');
    }
})();

(function reviewsSlider() {
    if (isMobile) return;

    const reviewsList = document.querySelector('.commentlist') || null;

    if (!reviewsList) return;

    $('.commentlist').slick({
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: `<span class="slider-arrow prev">
<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.000226974 5L4.24323 0.757004L5.65723 2.172L2.82823 5L5.65723 7.828L4.24323 9.243L0.000226974 5Z"/>
</svg>
</span>`,
        nextArrow: `<span class="slider-arrow next">
<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.99977 5L1.75677 9.243L0.342773 7.828L3.17177 5L0.342773 2.172L1.75677 0.756996L5.99977 5Z"/>
</svg>
</span>`,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },
        ],
    });
})();

(function reviewForm() {
    const form = document.querySelector('#review_form_wrapper') || null;
    const btn = document.querySelector('#show-comment-form') || null;

    if (!form || !btn) return;

    btn.addEventListener('click', function (e) {
        e.preventDefault();

        form.classList.toggle('active');
    })
})();

(function singleProductDescriptionTabs() {
    if (isMobile) return;

    const captions = document.querySelector('.cannab-product__desc_title') ||
        document.querySelector('.post-single__content h2')
        || null;

    if (!captions) return;

    const descTabsWrap = document.querySelector('.cannab-product__desc_tabs-wrap')
        || document.querySelector('.post-single__wrap');
    let captionList = [...document.querySelectorAll('.cannab-product__desc_title')];

    if (!captionList.length) {
        captionList = [...document.querySelectorAll('.post-single__content h2')];
    }

    console.log(captionList);

    const tabs = document.createElement('div');
    tabs.classList.add('cannab-product__desc_tabs');

    captionList.forEach(c => {
        const text = c.innerHTML;
        const dataScroll = c.offsetTop;
        c.dataset.scroll = dataScroll;
        const item = document.createElement('span');
        item.classList.add('cannab-product__desc_tab');
        item.innerHTML = text;
        item.dataset.scroll = dataScroll;
        item.addEventListener('click', function (e) {
            e.preventDefault();
            scrollTo(c);
        });
        tabs.appendChild(item);
    });

    descTabsWrap.appendChild(tabs);

    function scrollTo(elem) {
        const y = elem.getBoundingClientRect().top + window.scrollY - 150;

        window.scroll({
            top: y,
            behavior: 'smooth'
        });
    }

    /*var sections = $('.cannab-product__desc_title')
        , nav = $('.cannab-product__desc_tabs-wrap')
        , nav_height = nav.outerHeight();

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop();

        sections.each(function() {
            var top = $(this).offset().top - nav_height,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                const dataScroll = $(this).data('scroll');
                const currentTab = nav.find(`.cannab-product__desc_tab[data-scroll="${dataScroll}"]`);

                if (currentTab.hasClass('active')) return;

                $('.cannab-product__desc_tab.active').removeClass('active');
                currentTab.addClass('active');
            }
        });
    });*/

})();

(function selectAmount() {

    const select = jQuery('.variations select');

    if (select.length === 0) return;

    const unnecessaryPrice = $('p.price');

    unnecessaryPrice.css('display', 'none');

    select.select2({
        minimumResultsForSearch: Infinity,
    });
})();

(function selectOrder() {

    const select = jQuery('select.orderby');

    if (select.length === 0) return;

    select.select2({
        minimumResultsForSearch: Infinity,
    });
})();

(function checkoutButton() {
    const btn = document.querySelector('#place_order') || null;

    if (!btn) return;
    console.log(btn);
    const fakeBtn = document.querySelector('.checkout__section-card_button');

    fakeBtn.addEventListener('click', clickBtn);

    function clickBtn(e) {
        e.preventDefault();

        const btn = document.querySelector('#place_order');
        btn.click();
    }
})();

(function cartCounter() {
    const counter = document.querySelector('.product-price-quantity') || null;

    if (!counter) return;

    const counters = [...document.querySelectorAll('.product-price-quantity')];

    counters.forEach(c => {
        // const inputMaxValue = input.getAttribute('max') || null;
        const buttons = [...document.querySelectorAll('.product-price-quantity__count')];

        buttons.forEach(b => b.addEventListener('click', count));
    });

    function count(e) {
        const target = e.target;
        const input = target.parentElement.querySelector('input');

        if (!target.classList.contains('product-price-quantity__count')) return;

        const minus = target.classList.contains('minus');

        if (minus && +input.value >= 1) {
            input.value = +input.value - 1;
            input.setAttribute('value', input.value);
            // return;
        }

        if (!minus) {
            input.value = +input.value + 1;
            input.setAttribute('value', input.value);
        }

        const item_hash = input.getAttribute('name').replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
        const item_quantity = input.value;
        const currentVal = parseFloat(item_quantity);

        $.ajax({
            type: 'POST',
            dataType: 'text',
            url: cart_qty_ajax.ajax_url,
            data: {
                action: 'qty_cart',
                hash: item_hash,
                quantity: currentVal
            },
            beforeSend: function () {
                $('.cart-page > .loader').addClass('active');
            },
            success: function (data) {
                $('.entry-content').html(data);
                $('.cart-page > .loader').removeClass('active');

                const counters = [...document.querySelectorAll('.product-price-quantity')];

                counters.forEach(c => {
                    // const inputMaxValue = input.getAttribute('max') || null;
                    const buttons = [...document.querySelectorAll('.product-price-quantity__count')];

                    buttons.forEach(b => b.addEventListener('click', count));
                });
            },
            error: function (er) {
              console.log(er);
              $('.cart-page > .loader').removeClass('active');
            }
        })
    }
})();

(function () {
    const accordions = [...document.querySelectorAll('.cannab-product-accordion')];

    accordions.forEach(a => a.addEventListener('click', accordion));

    function accordion(e) {
        if (e.target.classList.contains('cannab-product-accordion__header')) {
            this.classList.toggle('active');

            let content = this.querySelector('.cannab-product-accordion__text');

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        }
    }
})();

function checkWidth() {
    return mobileWidth > document.documentElement.clientWidth;
}
(function ProductCounters($) {

    const miniCart = document.querySelector('.mini--cart') || null;

    if (!miniCart) return;

    const counters = [...miniCart.querySelectorAll('.quantity')];

    if (!counters[0]) return;

    counters.forEach(c => {
        const input = c.querySelector('input');
        const buttons = [...c.querySelectorAll('.product-price-quantity__count')];
        const max = parseInt(input.getAttribute('max'));
        const min = parseInt(input.getAttribute('min'));
        const step = parseInt(input.getAttribute('step'));

        buttons.forEach(b => b.addEventListener('click', count));

        function count(e) {
            const target = e.target;
            const isMinus = target.classList.contains('minus');

            if (isMinus && parseInt(input.value) <= min) return;

            if (isMinus && parseInt(input.value) > min) {
                input.value = parseInt(input.value) - step;
            } else if (!isMinus) {
                input.value = parseInt(input.value) + step;
            }

            const item_hash = input.getAttribute('name').replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
            const item_quantity = input.value;
            const currentVal = parseFloat(item_quantity);

            $.ajax({
                type: 'POST',
                dataType: 'text',
                url: min_cart_qty_ajax.ajax_url,
                data: {
                    action: 'mini_cart_update',
                    hash: item_hash,
                    quantity: currentVal
                },
                beforeSend: function () {
                    $('.mini--cart').addClass('loading');
                },
                success: function (data) {
                    $('.mini--cart').html(data);

                    const amount = $('.mini--cart__items-count > span').html();
                    const total = $('.woocommerce-mini-cart__total .woocommerce-Price-amount.amount').html();

                    $('.header__cart_amount').html(amount);
                    $('.header__cart_total .woocommerce-Price-amount.amount').html(total);
                    $('.mini--cart').removeClass('loading');
                },
                error: function (er) {
                    console.log(er);
                    $('.mini--cart').removeClass('loading');
                }
            })
        }
    });
})(jQuery);
'use strict';

$(document).ready(function () {
    $('.cnt, .price').on('keyup', function () {
        let cnt = $('.cnt').val(),
            price = $('.price').val();
       if (cnt !== '' && price !== '') {
           let finalPrice = price / cnt;
           $('#ingredientslist-price').val(Math.ceil(finalPrice));
       }
    });
});
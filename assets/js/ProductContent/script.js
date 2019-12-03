'use strict';

$(document).ready(function () {
    $('.cnt, .weight').on('keyup', function () {
        let cnt = $('.cnt').val(),
            weight = $('.weight').val();
        if (cnt !== '' && weight !== '') {
            let finalPrice = cnt / weight;
            $('#productcontent-count').val(finalPrice.toFixed(3));
        }
    });

    $('.add-tr').on('click', function () {
        $.ajax({
            data: {'id': $(this).data('id')},
            url: '/product-content/ajax-add-tr',
            success: function (data) {
                if (data) {
                    $('.main-row').prepend(data);
                }
            }
        });
    });

    $('body').on('keyup', '.mass-cnt', function () {
       let index = $(this).data('id'),
            cnt = $(this).val(),
            weight = $('.mass-weight').val();
       console.log(index);
       console.log(cnt);
       console.log(weight);
       if (index && cnt && weight) {
           let finalPrice = cnt / weight;
           $('#productcontent-' + index + '-count').val(finalPrice.toFixed(3));
       }
    });
});
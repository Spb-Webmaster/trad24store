export function input_label() {
    /**
     * input движение label
     * */
    var show = 'show';

    $('.inputClass').each(function (index) {
        let label = $(this).next('label');
        if ($(this).val() != '') {
            label.addClass(show);
        }
    });
    $('.inputClass').change(function () {
        let label = $(this).next('label');
        if ($(this).val() != '') {
            label.addClass(show);
        }

    });


    $('.inputClass').on('checkval', function () {
        let label = $(this).next('label');


        if ($(this).val() != '') {
            label.addClass(show);
        } else {
            label.removeClass(show);
        }


    }).on('keyup', function () {
        $(this).trigger('checkval');
    });
}


export function _iserror() {
    /* удаление  рамки при error */
    $('input[type="text"], input[type="date"], input[type="password"], input[type="email"]').focus(
        function () {
            $(this).parents('.text_input').find('.errorBlade').text('');
            $(this).removeClass('_is-error');
            /* используется не всегда*/
            $('.labelInput').each(function(){
                if ($(this).css('display') == 'none')
                {
                    $(this).show();
                }
            });
            /* используется не всегда*/

        }
    );
    /* удаление  рамки при error */

    $('body').on('click', '.selectClass', function (event) {
        $(this).find('a.chosen-single').removeClass('_is-error');
        $(this).find('.errorBlade').text('');
    });


}


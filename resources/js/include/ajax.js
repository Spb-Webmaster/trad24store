function loader(Parents) {
    Parents.find('.wrapper_loader ').css('display', 'flex');
}

function loaderHide(Parents) {
    Parents.find('.wrapper_loader ').css('display', 'none');
}

function url() {
    return window.location.href;
}


export function call_me() {
    /* call_me__js Звонок  (mini форма на главной)*/
    $('body').on('click', '.call_me__js', function (event) {

        var Parents = $(this).parents('.F_form');
        var Name = Parents.find('input[name="name"]').val();
        var Phone = Parents.find('input[name="phone"]').val();
        loader(Parents);

        $.ajax({
            url: "/send-mail/order-call",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "name": Name,
                "phone": Phone,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        printErrorMsg(Parents, response.error);
                    }, 1000);

                } else {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        Parents.find('.F_form__body').hide();
                        Parents.find('.F_responce').show();
                    }, 1000);
                }
            }
        });

    });
    /* call_me__js Звонок (mini форма на главной)*/

}

export function reserve() {
    /* */


    $('body').on('click', '.reserve_button__js', function (event) {

        let Title = $('._t_title__js').text();
        let Img = $('.img__js').attr('src');
        let Price = $('.__t_css__js').text();

            $('.res_title__js').text(Title);
            $('.res_img__js').attr('src', Img);
            $('.res_price__js').text(Price);
    });


    $('body').on('click', '.reserve__js', function (event) {

        var Title = $('.res_title__js').text();
        var Price = $('.res_price__js').text();


        var Parents = $(this).parents('.F_form');
        var Name = Parents.find('input[name="name"]').val();
        var Phone = Parents.find('input[name="phone"]').val();
        var Email = Parents.find('input[name="email"]').val();
        loader(Parents);

        $.ajax({
            url: "/send-mail/reserve",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "name": Name,
                "phone": Phone,
                "email": Email,
                "title": Title,
                "price": Price,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        printErrorMsg(Parents, response.error);
                    }, 1000);

                } else {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        Parents.find('.F_form__body').hide();
                        Parents.find('.F_responce').show();
                    }, 1000);
                }
            }
        });

    });
    /* */

}

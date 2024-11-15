import { loader, loaderHide, url, printErrorMsg } from './loader';

export function bid() {

    /* bid__js  дополнение к форме*/
    $('.selectClass.type select').on( "change", function() {
        if($(this).val() == 2) {
            $('._service_mediator__js').slideUp(500);
            $('._training_mediator__js').slideDown(500);
        }
        if($(this).val() == 1) {
            $('._service_mediator__js').slideDown(500);
            $('._training_mediator__js').slideUp(500);

        }
        if($(this).val() == 0) {
            $('._service_mediator__js').slideUp(500);
            $('._training_mediator__js').slideUp(500);

        }

    });
    /* bid__js  дополнение к форме*/

    /* bid__js Отправить заявку  (форма)*/
    $('body').on('click', '.bid__js', function (event) {

        var Parents = $(this).parents('.F_form');


        var Type = Parents.find('select[name="type"]').val();
        if(Type == 1) { // выбрали 'обучение'
            let M_training = Parents.find('select[name="m_training"]').val();
            if(M_training.length == 0) {

                Parents.find('.m_training a.chosen-single').addClass('_is-error');
                $('.error_m_training').text('Поле "Обучение" обязательно.');
                return false;
            }


        }

        if(Type == 2) { // выбрали 'Услуги медиатора'
            let M_service = Parents.find('select[name="m_service"]').val();
            if(M_service.length == 0) {
                Parents.find('.m_service a.chosen-single').addClass('_is-error');
                $('.error_m_service').text('Поле "Услуги медиатора" обязательно.');
                return false;
            }


        }

        if(Type == 0) {
            Parents.find('.type a.chosen-single').addClass('_is-error');
            $('.error_type').text('Поле "Выбрать услугу" обязательно.');
            return false;

        }


        var Name = Parents.find('input[name="name"]').val();
        var Phone = Parents.find('input[name="phone"]').val();
        var Email = Parents.find('input[name="email"]').val();
        var Type = Parents.find('select[name="type"] option:selected').text();
        var Service = Parents.find('select[name="m_service"]').val();
        var Training = Parents.find('select[name="m_training"]').val();
        loader(Parents);

        $.ajax({
            url: "/send-mail/bid",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "name": Name,
                "phone": Phone,
                "email": Email,
                "type": Type,
                "service": Service,
                "training": Training,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        printErrorMsg(Parents, response.error);
                    }, 1000);

                } else {
                    console.log(response.r);
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        Parents.find('.F_form__body').hide();
                        Parents.find('.F_responce').show();
                    }, 1000);
                }
            }
        });

    });
    /* bid__js Отправить заявку  (форма)*/

}




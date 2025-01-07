import {loader, loaderHide, url, printErrorMsg, MyscrollTop} from './loader';
import {Fancybox} from "@fancyapps/ui";


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

export function send_blue_form() {
    /* send_form__js Звонок  (mini форма на главной)*/
    $('body').on('click', '.send_form__js', function (event) {

        var Parents = $(this).parents('.F_form');
        var Name = Parents.find('input[name="name"]').val();
        var Phone = Parents.find('input[name="phone"]').val();
        var Email = Parents.find('input[name="email"]').val();
        loader(Parents);


        $.ajax({
            url: "/send-mail/order-call-blue-form",

            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "name": Name,
                "phone": Phone,
                "email": Email,
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

                        Parents.find('.new__temp_middle_blue ').css('display', 'none');

                        Parents.find('.wrapper_loader ').css('display', 'none');
                        Parents.find('.F_form__body').hide();
                        Parents.find('.F_responce').show();
                    }, 1000);
                }
            }
        });

    });
    /* send_form__js Звонок (mini форма на главной)*/

}

export function search_diplom_form() {
    /* search_diplom__js поиск диплама */
    $('body').on('click', '.search_diplom__js', function (event) {

        var Parents = $(this).parents('.F_form');
        var Diplom_title = Parents.find('input[name="diplom_title"]').val();
        var Diplom_name = Parents.find('input[name="diplom_name"]').val();
        loader(Parents);


        $.ajax({
            url: "/search/search-diplom-form",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "title": Diplom_title,
                "name": Diplom_name,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        printErrorMsg(Parents, response.error);
                    }, 1000);

                    inputFocus(Parents);

                } else {
                    setTimeout(function () {

                        if (!response.html) {

                            if (Diplom_title) {

                                Parents.find('.diplom_title').addClass('_is-error');
                                $('.error_diplom_title').text('Диплом не найден');
                                $('._diplom_title').find('.labelInput').hide();
                            }

                            if (Diplom_name) {

                                Parents.find('.diplom_name').addClass('_is-error');
                                $('.error_diplom_name').text('Пользователь не найден');
                                $('._diplom_name').find('.labelInput').hide();
                            }


                        }
                        MyscrollTop('diplom__result');
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        Parents.find('.F_form_search_diplom__result').html(response.html);
                    }, 1000);
                }
            }
        });

    });
    /*  search_diplom__js поиск диплама  */


    $('body').on('click', '.clear_form__js', function (event) {

        var Parents = $(this).parents('.F_form');
        Parents.find('input[type="text"]').val('');
        Parents.find('#diplom__result').html('');


    });




    }

export function search_lessons() {
    /* отправка формы при смене города */
    $('#registerTimetable_city').on('change', function () {

        var Parents = $(this).parents('.F_form');
        var City = $(this).find('option:selected').val();
        var Mounth = Parents.find('select[name="timetable_month"]').val();

        $.ajax({
            url: "/redirect/redirect-city-mounth",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "city": City,
                "mounth": Mounth,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {

                } else {
                    $(location).prop('href', response.route);

                }
            }
        });

    });

    /* БЕЗ отправки формы при смене месяца */
    $('#registerTimetable_month').on('change', function () {

        var Parents = $(this).parents('.F_form');
        var Mounth = $(this).find('option:selected').val();
        var City = Parents.find('select[name="timetable_city"]').val();

        $.ajax({
            url: "/redirect/redirect-mounth-city",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "city": City,
                "mounth": Mounth,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {

                } else {
                    if(response.html) {

                        loader(Parents);

                        setTimeout(function () {
                            Parents.find('.F_form_timetable__data').html(response.html);
                            Parents.find('.wrapper_loader ').css('display', 'none');

                        }, 1000);

                    }
// html

                }
            }
        });

    });
// нажатие "Записаться на курс" - из раздела расписание
    Fancybox.bind("#course_sign_up", {
        on: {
            reveal: (fancybox, slide) => {
                // Содержимое этого слайда загружено и готово к показу
                //slide.contentEl.style.filter = "brightness(1.25) contrast(1.25)";
                const obj = JSON.parse(slide.options);



                $('.lesson__js').text(obj.title)
                $('.date_lesson_js').text(obj.date)
                $('.price_lesson__js').text(obj.price)

                $('input.lesson__js').val(obj.title)
                $('input.date_lesson_js').val(obj.date)
                $('input.price_lesson__js').val(obj.price)
                $('input.city_lesson__js').val(obj.city)
            },
        },
    });


}

export function  send_sign_up() {
    /* отправить форму для записи на курс */
    $('body').on('click', '.sign_up__js', function (event) {

        var Parents = $(this).parents('.F_form');
        var Name = Parents.find('input[name="name"]').val();
        var Phone = Parents.find('input[name="phone"]').val();
        var Email = Parents.find('input[name="email"]').val();
        var Title = Parents.find('input[name="title"]').val();
        var Date = Parents.find('input[name="date"]').val();
        var Price = Parents.find('input[name="price"]').val();
        var City = Parents.find('input[name="city"]').val();
        loader(Parents);

        $.ajax({
            url: "/send-mail/order-sing-up-lesson",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "name": Name,
                "phone": Phone,
                "email": Email,
                "title": Title,
                "date": Date,
                "price": Price,
                "city": City,
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
    /* отправить форму для записи на курс */

}

export function  replace() {
    /* перезагрузка */
    $('body').on('click', '.clear_form_2__js', function (event) {

        let url = $(this).data('replace')
        window.location.replace(url);
        return false;

    });
    /* перезагрузка */

}

export function feedback() {


        $.fn.extend({

            addTemporaryClass: function(className, duration) {
                var elements = this;
                setTimeout(function() {
                    elements.removeClass(className);
                }, duration);

                return this.each(function() {
                    $(this).addClass(className);
                });
            }
        });



    /* оставить отзыв для медиатора */
    $('body').on('click', '.feedback__js', function (event) {

        var Parents = $(this).parents('.F_form');
        var Name = Parents.find('input[name="name"]').val();
        var Phone = Parents.find('input[name="phone"]').val();
        var Email = Parents.find('input[name="email"]').val();
        var Feedback = Parents.find('textarea[name="feedback"]').val();

        var Feedback_star;
        if (Parents.find('input[name="feedback_star"]').is(':checked')) {
             Feedback_star = Parents.find('input[name="feedback_star"]:checked').val();
        } else {
            alert('Необходимо поставить оценку!');
            Parents.find('.rating-area').addTemporaryClass("alert", 2000);

            return false;
        }



        loader(Parents);



        $.ajax({
            url: "/send-mail/feedback",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "name": Name,
                "phone": Phone,
                "email": Email,
                "feedback": Feedback,
                "feedback_star": Feedback_star,
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
    /* оставить отзыв для медиатора */

}

export function excel_report() {
    /* button_excel__js Сформировать отчет */
    $('body').on('click', '.button_excel__js', function (event) {

        var Parents = $(this).parents('._r_range');
        var From = Parents.find('input[name="from"]').val();
        var To = Parents.find('input[name="to"]').val();
        var Id = Parents.find('input[name="id"]').val();
      //  loader(Parents);

        $.ajax({
            url: "/generate/excel_report",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "from": From,
                "to": To,
                "id": Id,
            },
            success: function (response) {
                if (response.error) {
                    printErrorMsg(Parents, response.error);


                } else {

                    var link = document.createElement('a');
                    link.setAttribute('href', response.filename);
                    link.setAttribute('download', response.filename);
                    link.click();
                    alert('Файл "' + response.file + '" успешно скачан.');

                }
            }
        });

    });
    /* button_excel__js Сформировать отчет */

}

/*  загрузка аватара */
export function upload_f() {


    $('.upload_f').change(function (event) {
        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var Parent = $(this).parents('.image-upload__cabinet');
            event.preventDefault();
            let form = $(this).parents('form').get(0);
            let formData = new FormData(form);


            $.ajax({
                async: true,
                url: '/cabinet/upload-avatar',
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                contentType: false,
                data: formData,
                cache: false,
                processData: false,
                success: function (result) {
                    console.log(result);

                    if (result.success == true) {

                        console.log(result.avatar)
                        Parent.find('.site_avatar').css('background-image', 'url("' + result.avatar + '")');
                        $('.site_avatar').css('background-image', 'url("' + result.avatar + '")');
                        if ($('.enter_to_website__a').length) {
                            $('.enter_to_website__a .site_avatar').css('background-image', 'url("' + result.avatar + '")');
                        }
                    } else {
                        console.log(result);
                        alert('Ошибка при загрузке аватара.');

                    }
                },
                error: function (data) {
                    console.log(data.err);
                    console.log(data);
                }
            });


        }
    });
    return true;

}
/*  загрузка аватара */

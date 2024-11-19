/**
 * Не выводим в script.js, только в скрипты в которых нужно выводить формы
 * @param Parents
 */

export  function loader(Parents) {
    Parents.find('.wrapper_loader ').css('display', 'flex');
}

export function loaderHide(Parents) {
    Parents.find('.wrapper_loader ').css('display', 'none');
}

export function url() {
    return window.location.href;
}


export function printErrorMsg(Parents, msg) {
    $.each(msg, function (key, value) {

        console.log(key);
        console.log(' -- ');
        console.log(msg);

        Parents.find('.error_' + key).text(value);
        Parents.find('input.' + key).addClass('_is-error');
        Parents.find('textarea.' + key).addClass('_is-error');
    });
}

export function MyscrollTop(id) {

    var elementClick = $('#'+ id);
    var destination = $(elementClick).offset().top;
    $("html, body").animate({ scrollTop: destination }, 1100); //1100 - скорость прокрутки

    return false;
}

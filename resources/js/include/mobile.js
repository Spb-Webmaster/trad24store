export function mobile_menu () {
    /**
     * меню мобильное
     * */
    $('.mobile_version__logo').html($('.header_bottom .logo').html());
    $('.mobile_version__social').html($('.header_top .top_social').html());

    $('body').on('click', '.m_f3', function (event) {

        if ($(this).hasClass('active')) {

            $('.fMenu').hide();
            $('.fContacts').hide();
            $('.fLogin').hide();

            $('.mob_menu_content').fadeOut();
            $(this).removeClass('active');


        } else {
            $('.fMenu').show();
            $('.fContacts').hide();
            $('.fLogin').hide();

            $('.mob_menu_content').fadeIn();
            $('.m_f').removeClass('active');
            $(this).addClass('active');
        }
    });


    $('body').on('click', '.m_f4', function (event) {

        if ($(this).hasClass('active')) {

            $('.fMenu').hide();
            $('.fContacts').hide();
            $('.fLogin').hide();

            $('.mob_menu_content').fadeOut();
            $(this).removeClass('active');


        } else {
            $('.fMenu').hide();
            $('.fContacts').show();
            $('.fLogin').hide();

            $('.mob_menu_content').fadeIn();
            $('.m_f').removeClass('active');
            $(this).addClass('active');
        }
    });



    $('body').on('click', '.m_f5', function (event) {

        if ($(this).hasClass('active')) {

            $('.fMenu').hide();
            $('.fContacts').hide();
            $('.fLogin').hide();

            $('.mob_menu_content').fadeOut();
            $(this).removeClass('active');


        } else {
            $('.fMenu').hide();
            $('.fContacts').hide();
            $('.fLogin').show();

            $('.mob_menu_content').fadeIn();
            $('.m_f').removeClass('active');
            $(this).addClass('active');
        }
    });


/*if($('.hbox__submenu .view_subcategories_countries .v_s_c__item').length) {
    $('.hbox__submenu .view_subcategories_countries .v_s_c__item').each(function (i) {
        $('.mob_cab_menu__js').prepend('<li>' + $(this).html() + '</li>');

    });
}*/
    //mob_cab_menu__js


}

export function mobile_menu_close () {

// закрытие меню
    $('body').on('click', '.m_m_top_close', function (event) {

        $('.mob_menu_content').fadeOut();
        $('.m_f').removeClass('active');

    });
}

export function add__mobile_menu() {

    // добавляем в мобильное меню пункты у который есть class="add__mobile_menu"
    $('.add__mobile_menu').each(function (index, h) {

        let  Class;

        Class = $(h).parent('li').attr('class');

        $('.fMenu').append('<li><a class="' + Class + '" href="' + $(this).attr('href') + '">' + $(this).text() + '</a></li>');


    });
}

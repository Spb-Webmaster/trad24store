export  function toggle_manager_menu() {
    $('body').on('click', '.m_menu_fixed', function (event) {
        $('.menu_send').removeClass('close');
        $('.m_menu_fixed').fadeOut();
        $('.m_menu_absol').slideUp(600);

    });
    $('body').on('click', '.menu_send', function (event) {
        $(this).toggleClass('close');

        if ($('.menu_send').hasClass('close')) {

            $('.m_menu_fixed').fadeIn();
            $('.m_menu_absol').slideDown(600);
        } else {

            $('.m_menu_fixed').fadeOut();
            $('.m_menu_absol').slideUp(600);
        }

    });
}

export function canche_contacts() {
    /* нажатие на один из контактов */
    $('body').on('click', '._canche__js', function (event) {



        var Type = $(this).data('type');
        var Ob = $(this).data('object');


        $.ajax({
            url: "/canche.contacts",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "type": Type,
                "object": Ob,
            },
            success: function (response) {
                /**
                 * ничего не делаем.
                 */
            }
        });

    });
    /* нажатие на один из контактов */


}
export  function toggle_contacts() {
    $('body').on('click', '.connection_fixed', function (event) {
        $('.connect_send').removeClass('close');
        $('.connection_fixed').fadeOut();
        $('.connection_absol').slideUp(600);

    });
    $('body').on('click', '.connect_send', function (event) {
        $(this).toggleClass('close');

        if ($('.connect_send').hasClass('close')) {

            $('.connection_fixed').fadeIn();
            $('.connection_absol').slideDown(600);
        } else {

            $('.connection_fixed').fadeOut();
            $('.connection_absol').slideUp(600);
        }

    });
}

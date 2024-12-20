export function cabinet_toggle_type() {
    $('.selectClass._type select').on("change", function () {
        if ($(this).val() == 1) {
            $('.registerCompany__js').slideUp();
        }
        if ($(this).val() == 2) {
            $('.registerCompany__js').slideDown();
        }
        if ($(this).val() == 3) {
            $('.registerCompany__js').slideUp();
        }

    });
}






export function city() {
    $('body').on('click', '.ssityy', function (event) {
        $('.list_sitys').slideToggle();
        $(this).parent('.active_sity').addClass('active');
    });

        $('body').on('click', '.city_li-name', function (event) {

        var Text = $(this).text();
        var Phone = $(this).next('a').text();
        $('.ssityy').text(Text);
        $('.black_phone').text(Phone);
        $('.active_sity').removeClass('active');
        $('.list_sitys').slideToggle();
       // $('.top_sity_active_js').slideToggle();
            $.ajax({
                url: "/set-city/city-action",
                method: "POST",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "city": Text,
                    "phone": Phone,
                },
                success: function (response) {
                    $('.h_s_sity_js').text(response.city);
                    console.log(response.city);
                }
            });

        });


}

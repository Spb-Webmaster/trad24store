export function report_toggle() {
    // faq_question__js
    $('body').on('click', '.report_Stroke__js', function (event) {
        $(this).toggleClass('active');
        let Parent = $(this).parents('.m_report');

        Parent.find('.report_full').slideToggle( "slow", function() {
            // Animation complete.
        });
    });

}

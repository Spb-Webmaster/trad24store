export function faq() {
    // faq_question__js
    $('body').on('click', '.faq_question__js', function (event) {
        $(this).toggleClass('active');
        let Parent = $(this).parents('.faq__js');

        Parent.find('.faq_answer__js').slideToggle( "slow", function() {
            // Animation complete.
        });
    });

}

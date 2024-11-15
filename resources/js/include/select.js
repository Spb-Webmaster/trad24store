export function chosen() {
    //todo:jquery

    /* -- js-chosen  -- */
    if($('.js-chosen').length) {
        $('.js-chosen').chosen({
            width: '100%',
            no_results_text: 'Совпадений не найдено',
            placeholder_text_single: 'Выберите'
        });
    }
}

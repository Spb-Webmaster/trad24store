import moment from 'moment';
import 'moment/dist/locale/ru';
moment.locale('ru');


export function localDataPicker() {
    /* Локализация datepicker */
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);
}

export function datepicker_birthdate() {
    $(".datepicker__js").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "-16Y",
            minDate: "-80Y",
            yearRange: "-80:-16",
            onSelect: function () {
                var dateObject = $(this).datepicker('getDate');
                $('#alternate').text(moment(dateObject).format('LL'));

            }

        });

}

export function datepicker_report() {
    $(".datepicker_report__js").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
        /*     maxDate: "-16Y",
             minDate: "-80Y",
             yearRange: "-80:-16",*/
            onSelect: function () {
                var dateObject = $(this).datepicker('getDate');
                $('#alternate').text(moment(dateObject).format('LL'));

            }

        });

}

export function datepicker_range() {


        var dateFormat = "mm/dd/yy",
            from = $( "#from" )
                .datepicker({
               /*     defaultDate: "+1w",*/
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1
                })
                .on( "change", function() {
                    to.datepicker( "option", "minDate", getDate( this ) );
                }),
            to = $( "#to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1
            })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });

        function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }

            return date;
        }


}

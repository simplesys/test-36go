/**
 * Autor: Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * Copyright: 2016 Jazz-shop.ru
 * Date: 30.05.17 10:51
 */

$(document).ready(function() {
    var body = $("body");

    $('input:enabled:visible:not([readonly]):first').focus();

    //ajax loading image
    $(document).on({
        ajaxStart: function() {
            body.append('<div class="ajax-loader"></div>');

        },
        ajaxStop: function() {
            $("div.ajax-loader").detach();
        }
    });

    //button from reload page
    $(':reset').click(function(){
        document.location.href = document.location;
    });

    //calender
    var minDate = new Date();
    var currentYear = new Date();
    var yearStart = currentYear.getFullYear();
    var yearEnd = currentYear.getFullYear() + 1;
    $(".datepick").datetimepicker({
        format:'Y-m-d H:i:s',
        lang:'ru',
        minDate:minDate,
        yearStart:yearStart,
        yearEnd:yearEnd
    });
});

$(document).ready( function() {
    $('.stat_time_input').datetimepicker({
        showSecond: true,
        timeFormat: 'hh:mm:ss'
    });
    $('.stat_time_input').bind('click',datetimepickerTranslate);//翻译
    $('#ui-datepicker-div').bind('click',datetimepickerTranslate);
})

function datetimepickerTranslate(){
    $(".ui_tpicker_time_label").html('时间');
    $(".ui_tpicker_hour_label").html('小时');
    $(".ui_tpicker_minute_label").html('分钟');
    $(".ui_tpicker_second_label").html('秒');
    $('.ui-datepicker-current.ui-state-default').html('现在');
    $('.ui-datepicker-close.ui-state-default').html('完成');
    //日期
    switch($(".ui-datepicker-month").html()) {
        case 'January':
            $(".ui-datepicker-month").html('一月');
            break;
        case 'February':
            $(".ui-datepicker-month").html('二月');
            break;
        case 'March':
            $(".ui-datepicker-month").html('三月');
            break;
        case 'April':
            $(".ui-datepicker-month").html('四月');
            break;
        case 'May':
            $(".ui-datepicker-month").html('五月');
            break;
        case 'June':
            $(".ui-datepicker-month").html('六月');
            break;
        case 'July':
            $(".ui-datepicker-month").html('七月');
            break;
        case 'August':
            $(".ui-datepicker-month").html('八月');
            break;
        case 'September':
            $(".ui-datepicker-month").html('九月');
            break;
        case 'October':
            $(".ui-datepicker-month").html('十月');
            break;
        case 'November':
            $(".ui-datepicker-month").html('十一月');
            break;
        case 'December':
            $(".ui-datepicker-month").html('十二月');
            break;
    }
    //星期
    $(".ui-datepicker-calendar").find('th').each( function() {
        switch($(this).children().html()) {
            case 'Su':
                $(this).children().html('日');
                $(this).children().attr('title','星期日');
                break;
            case 'Mo':
                $(this).children().html('一');
                $(this).children().attr('title','星期一');
                break;
            case 'Tu':
                $(this).children().html('二');
                $(this).children().attr('title','星期二');
                break;
            case 'We':
                $(this).children().html('三');
                $(this).children().attr('title','星期三');
                break;
            case 'Th':
                $(this).children().html('四');
                $(this).children().attr('title','星期四');
                break;
            case 'Fr':
                $(this).children().html('五');
                $(this).children().attr('title','星期五');
                break;
            case 'Sa':
                $(this).children().html('六');
                $(this).children().attr('title','星期六');
                break;
        }
    });

}

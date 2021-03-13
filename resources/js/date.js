require('./datepicker');

$(document).ready(function(){
    $('.date').datepicker({  
        format: 'mm-dd-yyyy',
        weekStart: 0,
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true,
        rtl: true,
        orientation: "auto"
    });
})  
$(document).ready(function(){

    //convert true to 1 & false to 0
    function castBoolean(bool){
        return (bool) ? 1 : 0;
    }
    //cast checkbox values (on & off) to boolean on change
    $("input.hidden_is_active_input:hidden").val(castBoolean($("input[type=checkbox]").is(":checked") ))
    $("input[type=checkbox]").change(function(){
        $(this).siblings("input.hidden_is_active_input:hidden").val(castBoolean($(this).is(":checked") ) )
    })
})
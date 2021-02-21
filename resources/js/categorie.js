import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function(){
    console.log($("#categories .modal"));

    $(".show-infos").on('click',function(){
        let url = $(this).attr('href');
        let id = $(this).parent().siblings("th").text()

        $.ajax({url : url,
            success: function(responseJSON, status){

                $("#categories .modal input[name='id']").val(responseJSON.id);
                $("#categories .modal input[name='name']").val(responseJSON.name);
                $("#categories .modal input[name='is_active']").val(responseJSON.is_active);
                return responseJSON;

                
            },
            error: function(responseJSON, status){
                return responseJSON;
            }
            
        });
    })

})

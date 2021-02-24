import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function(){
    console.log($("#categories .modal#categorieUpdate"));

    $(".show-infos, .edit-infos").on('click',function(){
        let url = $(this).attr('href');
        let id = $(this).parent().siblings("th").text()

        $.ajax({url : url,
            success: function(responseJSON, status){

                $("#categories .modal input[name='id']").val(responseJSON.id);
                $("#categories .modal input[name='name']").val(responseJSON.name);
                $("#categories .modal input[name='is_active']").val(responseJSON.is_active);
                let route = $("#categories .modal .modal-footer .update").data('url');
                $("#categories .modal form").attr('action', route + "/" + responseJSON.id)
                //console.log()
                return responseJSON;
            },
            error: function(responseJSON, status){
                return responseJSON;
            }
            
        });
    })

    $("select[name='categories_entries'").on("change", function(){
        let pagination_limit = $(this).val();
        let url = window.local_url + "categories"
        let data = 'pagination_limit='+pagination_limit

        $.ajax({url : url,
            type: 'get',
            data: data,
            success: function(responseJSON, status){
                window.location.href = url + "?" + data;
            },
            error: function(responseJSON, status){
                return responseJSON;
            }
            
        });
    })

})

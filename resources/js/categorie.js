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
                $("#categories .modal input[name='is_active_checkbox']").val(responseJSON.is_active);
                if(responseJSON.is_active == true || responseJSON.is_active == 1)
                {
                    $("#categories .modal input[name='is_active_checkbox']").attr("checked", true);
                    $("#categories .modal input[name='is_active']").val(responseJSON.is_active);
                }
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

    $(".mass-delete-categorie").click(function(){
        if(confirm("You want to delete all theses categories ?"))
        {
            let url = window.local_url + "admin/categorie/mass_delete"
            let data = $("input[name='ids[]']").serialize()
            $.ajaxSetup({
                //"_token" : $("meta[name='csrf']").attr("value"),
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf']").attr("value")
                }
            });
            $.ajax({
                'url': url,
                'type': 'delete',
                'data': data,
                success: function(responseJSON, status){
                    window.location.href = responseJSON.url
                },
                error: function(responseJSON, status){

                }
            })
        }
    })

    $("select[name='categories_entries'").on("change", function(){
        let pagination_limit = $(this).val();
        let url = window.local_url + "admin/categorie/index"
        let data = 'pagination_limit='+pagination_limit

        $.ajax({
            url : url,
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

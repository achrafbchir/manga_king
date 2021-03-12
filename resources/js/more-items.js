$(document).ready(function(){
    $(document).on("click", ".add_more", function(e){
        e.preventDefault();

        var items = $(".items");
        var more_items = $(".more_items").html();
        var number = items.find(".item").last().length > 0 ? parseInt(items.find(".item").last().attr("data-number")) + 1 : 0;
        items.append(more_items.replaceAll("__number__", number));
    });

    $(document).on("click", ".delete-more", function(e){
        e.preventDefault();

        var number = parseInt($(this).closest(".item").attr("data-number"));
        
        $(".items .item").each(function(){
            var element_number = parseInt($(this).attr("data-number"));
            if(element_number > number)
            {
                var new_element_html = $(this).html().replaceAll("["+element_number+"]", "["+(element_number-1)+"]")
                $(this).html(new_element_html)
                $(this).attr("data-number", (element_number-1))
            }
        });
        
        $(this).closest(".item").remove();
    })
})
$.fn.select_chain = function(child,url,default_value)
{
    $(child).attr("disabled","disabled");
    $(this).on("click change",function(){
        if($(this).val() == 0){
            $(child).attr("disabled","disabled");
            $(child).html("<option value='0'>"+default_value+"</option>");
        }else{
            $(child).attr("disabled","disabled");
            $(child).html("<option>RETRIEVING RECORDS...</option>");
            $.get(url+$(this).val(), function(data){
                $(child).removeAttr("disabled");
                $(child).html("<option value='0'>"+default_value+"</option>");

                if(data.regions != ""){
                    $.each (data.regions, function (key) {
                        $('<option />', {value: key, text: data.regions[key]}).appendTo($(child));       
                    });
                }else{
                    $(child).attr("disabled","disabled");
                    $(child).html("<option value='0'>NO RECORD FOUND</option>");
                }

            });
        }
    });
};
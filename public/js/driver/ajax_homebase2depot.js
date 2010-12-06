 function addClickHandlers(Homebase_id) {
        $.get("/driver/ajax-Driver-homebase/get-Depot-List/",{id:Homebase_id}, function(data){
            $('#d_depot_ID option').remove();
            $('#d_depot_ID').append(""+data+"");
        })
 }
 
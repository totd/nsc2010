$(function() {
    $("#ea_start_date").datepicker({
			changeMonth: true,
			changeYear: true,
            yearRange: '-10:+10'
		});
    $("#ea_end_date").datepicker({
			changeMonth: true,
			changeYear: true,
            yearRange: '-10:+10'
		});

    $("#updateAsignment").validate({
        rules: {
            ea_homebase_id: "required"
        },
        messages: {
            comment: "Please check information."
        }
    });

    $("#equipmentAssignmentSaveLink1").click(function() {
        if ($("#updateAsignment").valid()) {
            document.getElementById("updateAsignment").submit();
        }
    });

    $("#equipmentAssignmentSaveLink2").click(function() {
        if ($("#updateAsignment").valid()) {
            document.getElementById("updateAsignment").submit();
        }
    });

    $("#ea_homebase_id").change(function() {
        getDepotList();
    });

    $("#driver_autocomplete").autocomplete(
        {
            source: function (request, response) {
                $.ajax({
                    url: "/equipment/information-worksheet/get-autocomplete-drivers",
                    dataType: 'json',
                    data: request,
                    success: function (data) {
                        response(data.map(function (value) {
                            return {
                                'label': value.label,
                                'value': value.label,
                                'id': value.id
                            };
                        }));
                        
                    }
                });
            },
            select: function( event, ui ) {
                if (ui.item.id == 'new') {
                    window.location.href = '/driver/new-driver/new-driver-search';
                } else {
                    $('#ea_driver_id').val(ui.item.id);
                }
            }
        }
    );

});

function getDepotList() {
    $.get(
        "/driver/ajax-Driver-homebase/get-Depot-List/",
        {id: $("#ea_homebase_id").val()},
        function(data){
            $('#ea_depot_id option').remove();
            // add empty value
            $('#ea_depot_id').append($("<option></option>").
                          attr("value","").
                          text(" - "));
            $('#ea_depot_id').append(""+data+"");
    });
}

function getDepotListNonAsync() {
    $.ajax({
            type: "GET",
            url: "/driver/ajax-Driver-homebase/get-Depot-List/",
            data: "id=" + $("#ea_homebase_id").val(),
            async:false,
            success: function(data){
                $('#ea_depot_id option').remove();
                // add empty value
                $('#ea_depot_id').append($("<option></option>").
                              attr("value","").
                              text(" - "));
                $('#ea_depot_id').append(""+data+"");
        }
    });
}



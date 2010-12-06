function changeType() {
    var text = $('#e_type_id :selected').text();
    $(".second *").show();

    if (text == "Straight Truck") {
        $("#e_Owner_Number").parents("tr").hide();

        $("#e_Alternate_ID").parents("tr").hide();

    }

    if (text == "Tractor") {
        $("#e_Alternate_ID").parents("tr").hide();

        $("#e_Fee").parents("tr").hide();

        $("#e_Title_Status").parents("tr").hide();

        $("#e_RFID_No").parents("tr").hide();
    }
}


$(function() {
    // Show/hide VIW edit form
    $(".VIWActionLink").each(function() {
       $(this).click(function() {
            $(".VIWDiv").toggle("slow");
            return false;
        });
    });

    $('.EquipmentAssigmentActionLink').each(function() {
       $(this).click(function() {
            $('.AssignmentDiv').toggle("showOrHide");
            return false;
        });
    });

    $("#e_License_Expiration_Date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '-20:+20'
    });

    $("#e_type_id").change(function() {
        changeType();
    })

    changeType();

    $("#VIWSaveLink").click(function() {
        document.getElementById("updateVIM").submit();
    });

    
    $("#attachFile").imgPreview({
        containerID: 'imgPreviewWithStyles',
        imgCSS: {
            // Limit preview size:
            height: 200
        },
        // When container is shown:
        onShow: function(link){
            // Animate link:
            $(link).stop().animate({opacity:0.4});
            // Reset image:
            $('img', this).stop().css({opacity:0});
        },
        // When image has loaded:
        onLoad: function(){
            // Animate image
            $(this).animate({opacity:1}, 300);
        },
        // When container hides:
        onHide: function(link){
            // Animate link:
            $(link).stop().animate({opacity:1});
        }
    });

    

});


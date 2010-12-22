/**
 * Created by IntelliJ IDEA.
 * User: Влад
 * Date: 22.12.2010
 * Time: 21:13:38
 * To change this template use File | Settings | File Templates.
 */
function driver_last_saved(d_ID) {
        $.get("/driver/Driver/ajax-Driver-Last-Saved/",
        {
            d_ID: d_ID
        }, function(data){
                document.getElementById("last_saved").innerHTML="Last saved: "+data;
                return true;
           });
}

function exit(url){
    var $dialog = $('<div></div>')
            .html("Leaving without saving will discard all changes!")
            .dialog({
                autoOpen: false,
                title: 'Exit',
                minHeight: 13,
                draggable:false,
                resizable:false,
                buttons: [
                    {
                        text: "Cancel",
                        click: function() { $(this).dialog("close"); }
                    },
                    {
                        text: "Exit",
                        click: function() { setTimeout('window.location = "'+url+'"', 0); }
                    }
                ]
            });
    $dialog.dialog('open');
    
}
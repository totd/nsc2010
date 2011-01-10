
function exit_simple(url){
    var $dialog = $('<div></div>')
            .html("Are you sure?")
            .dialog({
                autoOpen: false,
                title: 'Exit',
                minHeight: 13,
                draggable:false,
                resizable:false,
                buttons: [
                    {
                        text: "No",
                        click: function() { $(this).dialog("close"); }
                    },
                    {
                        text: "Yes",
                        click: function() { setTimeout('window.location = "'+url+'"', 0); }
                    }
                ]
            });
    $dialog.dialog('open');
}
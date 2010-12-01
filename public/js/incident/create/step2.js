$(function() {
    $("#chooseDriver").click(function() {
        window.location.href='/driver/index/involved-in-incident-drivers/incident_id/new';
    });

    $("#exitSubmit").click(function() {
        window.location.href='/incident/create/exit';
    });
});
$(function() {
    $("#nextSubmit").click(function() {
        document.getElementById("step2Form").submit();
    });

    $("#exitSubmit").click(function() {
        window.location.href='/incident/create/exit';
    });

});
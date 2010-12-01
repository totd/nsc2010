$(function() {
    $("#nextSubmit").click(function() {
        document.getElementById("step4Form").submit();
    });

    $("#exitSubmit").click(function() {
        window.location.href='/incident/create/exit';
    });
});
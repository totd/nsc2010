$(function() {
    $("#i_Date").datepicker();

    $("#step1Form").validate({
        rules: {
            i_Date : "required"
        }
    });

    $("#nextSubmit").click(function() {
        if ($("#step1Form").valid()) {
            document.getElementById("step1Form").submit();
        }
    });

    $("#exitSubmit").click(function() {
        window.location.href='/incident/create/exit';
    });

});
$(function() {
    $("#saveSubmit").click(function() {
        document.getElementById("step3Form").submit();
    });

    $("#exitSubmit").click(function() {
        window.location.href='/incident/create/exit';
    });

    $(function(){
        $(".multiselect").multiselect();
    });
});
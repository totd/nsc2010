$(function() {
    $("#saveSubmit").click(function() {
        document.getElementById("step4Form").submit();
    });

    $("#exitSubmit").click(function() {
        window.location.href='/incident/create/exit';
    });

    $(function(){
        $(".multiselect").multiselect();
    });
});
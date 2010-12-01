$(function() {
    $("#nextSubmit").click(function() {
        document.getElementById("step5Form").submit();
    });

    $("#exitSubmit").click(function() {
        window.location.href='/incident/create/exit';
    });

    $(function(){
        $(".multiselect").multiselect();
    });
});
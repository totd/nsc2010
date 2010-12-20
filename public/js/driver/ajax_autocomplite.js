function autocomplete_custom(){
    document.getElementById("emp_Employer_Name_ul").innerHTML="Select employer:";
    $("#emp_Employer_Name_indicator").css("display","inline");
    $("#emp_Employer_Name_ul").css("display","block");
    query = document.getElementById("emp_Employer_Name").value;
    $.get("/driver/ajax-driver-previous-employment/autocomplete-Employer/",
        {
            q: query
        }, function(data){
            if(data!=""){
                $("#emp_Employer_Name_ul").append(data);
                $("#emp_Employer_Name_indicator").css("display","none");
                return true;
            }else{
                $("#emp_Employer_Name_ul").css("display","none");
                $("#emp_Employer_Name_indicator").css("display","none");
                return true;
            }
           });
}
function select_employer(emp_id){
    //alert(emp_id);
}
$().ready(function() {

	function log(event, data, formatted) {
		$("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
	}

	function formatItem(row) {
		//return row[0] + " (<strong>id: " + row[1] + "</strong>)";
		return row[0] + " (id: " + row[1] + ")";
	}
	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}


	$("#dah_City").focus().autocomplete("/driver/ajax-driver-address-history/autocomplete-Address-History/",{
        extraParams:{"searchBy":'dah_City'}
    });
	$("#dah_Postal_Code").focus().autocomplete("/driver/ajax-driver-address-history/autocomplete-Address-History/",{
        extraParams:{"searchBy":'dah_Postal_Code'}
    });

	$("#clear").click(function() {
		$(":input").unautocomplete();
	});
});
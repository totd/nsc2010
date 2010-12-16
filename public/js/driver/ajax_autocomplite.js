
$().ready(function() {

	function log(event, data, formatted) {
		$("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
	}

	function formatItem(row) {
		return row[0] + " (<strong>id: " + row[1] + "</strong>)";
	}
	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}

	$("#pe_Employer_Name").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
        extraParams:{"searchBy":'pe_Employer_Name'}
    });
	$("#pe_Address1").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
        extraParams:{"searchBy":'pe_Address1'}
    });
	$("#pe_City").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
        extraParams:{"searchBy":'pe_City'}
    });
	$("#pe_Postal_Code").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
        extraParams:{"searchBy":'pe_Postal_Code'}
    });
	$("#pe_Phone").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
        extraParams:{"searchBy":'pe_Phone'}
    });
	$("#pe_Fax").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
        extraParams:{"searchBy":'pe_Fax'}
    });
	$("#pe_Position").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
        extraParams:{"searchBy":'pe_Position'}
    });

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
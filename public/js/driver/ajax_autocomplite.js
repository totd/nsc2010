

function autocomplete_custom(field,div){
    if(field==""){
        query = document.getElementById("emp_Employer_Name").value;
    }else{
        query = document.getElementById(field).value;
    }
    hide_autocomplete(field);
    $.get("/driver/ajax-driver-previous-employment/autocomplete-Employer/",
        {
            q: query,
            field:field
        }, function(data){
            if(data!=""){
                document.getElementById(div).innerHTML="";
                if(field=="emp_Employer_Name"){
                    $("#emp_Employer_Name_indicator").css("display","inline");
                }else{
                    $("#edit_emp_Employer_Name_indicator").css("display","inline");
                }
                clear_autocomplete(field);
                $("#"+div+"").css("display","block");
                $("#"+div+"").append(data);
                if(field=="emp_Employer_Name"){
                    $("#emp_Employer_Name_indicator").css("display","none");
                }else{
                    $("#edit_emp_Employer_Name_indicator").css("display","none");
                }
                return true;
            }else{
                if(field==""){
                        $("#emp_Employer_Name_ul").css("display","none");
                        $("#emp_Employer_Name_indicator").css("display","none");
                        clear_autocomplete(field);
                    }else{
                        $("#edit_emp_Employer_Name_ul").css("display","none");
                        $("#edit_emp_Employer_Name_indicator").css("display","none");
                        clear_autocomplete(field);
                    }
                return true;
            }
           });
}
function select_employer(emp_id,field){

    if(field=="emp_Employer_Name"){
        $("#emp_Employer_Name_indicator").css("display","inline");
        $("#emp_Employer_Name_ul").css("display","none");
    }else{
        $("#edit_emp_Employer_Name_indicator").css("display","inline");
        $("#edit_emp_Employer_Name_ul").css("display","none");
    }
    $.get("/driver/ajax-driver-previous-employment/get-json-record/",
        {
            emp_ID: emp_id
        }, function(data){
            if(data!=""){
                var dataJSON = eval( '(' + data+ ')' );

                if(field=="emp_Employer_Name"){
                    document.getElementById("emp_ID").value=dataJSON['emp_ID'];
                    document.getElementById("emp_Employer_Name").value=dataJSON['emp_Employer_Name'];
                    document.getElementById("emp_Address1").value=dataJSON['emp_Address1'];
                    document.getElementById("emp_Address1").readOnly="readOnly";
                    document.getElementById("emp_City").value=dataJSON['emp_City'];
                    document.getElementById("emp_City").readOnly="readOnly";
                    var emp_state = document.getElementById("emp_State_ID");
                    var opts = emp_state.getElementsByTagName('option');
                    for (var i=0; i<opts.length; i++)
                    {
                        if (opts[i].value == dataJSON['emp_State_ID'])
                        {
                            opts[i].selected = true;
                        }else{
                            opts[i].selected = false;
                        }
                    }
                    document.getElementById("emp_Postal_Code").value=dataJSON['emp_Postal_Code'];
                    document.getElementById("emp_Postal_Code").readOnly="readOnly";
                    document.getElementById("emp_Phone").value=dataJSON['emp_Phone'];
                    document.getElementById("emp_Phone").readOnly="readOnly";
                    document.getElementById("emp_Fax").value=dataJSON['emp_Fax'];
                    document.getElementById("emp_Fax").readOnly="readOnly";
                    var emp_DOT_Safety_Sensitive_Function = document.getElementById("emp_DOT_Safety_Sensitive_Function");
                    var opts2 = emp_DOT_Safety_Sensitive_Function.getElementsByTagName('option');
                    for (var i=0; i<opts2.length; i++)
                    {
                        if (opts2[i].value == dataJSON['emp_DOT_Safety_Sensitive_Function'])
                        {
                            opts2[i].selected = true;
                        }else{
                            opts2[i].selected = false;
                        }
                    }
                    var emp_FMCSR_Regulated = document.getElementById("emp_FMCSR_Regulated");
                    var opts3 = emp_FMCSR_Regulated.getElementsByTagName('option');
                    for (var i=0; i<opts3.length; i++)
                    {
                        if (opts3[i].value == dataJSON['emp_FMCSR'])
                        {
                            opts3[i].selected = true;
                        }else{
                            opts3[i].selected = false;
                        }
                    }
                    $("#emp_Employer_Name_indicator").css("display","none");
                    return true;
                }else{
                    document.getElementById("edit_emp_ID").value=dataJSON['emp_ID'];
                    document.getElementById("edit_emp_Employer_Name").value=dataJSON['emp_Employer_Name'];
                    document.getElementById("edit_emp_Address1").value=dataJSON['emp_Address1'];
                    document.getElementById("edit_emp_Address1").readOnly="readOnly";
                    document.getElementById("edit_emp_City").value=dataJSON['emp_City'];
                    document.getElementById("edit_emp_City").readOnly="readOnly";
                    var emp_state = document.getElementById("edit_emp_State_ID");
                    var opts = emp_state.getElementsByTagName('option');
                    for (var i=0; i<opts.length; i++)
                    {
                        if (opts[i].value == dataJSON['edit_emp_State_ID'])
                        {
                            opts[i].selected = true;
                        }else{
                            opts[i].selected = false;
                        }
                    }
                    document.getElementById("edit_emp_Postal_Code").value=dataJSON['emp_Postal_Code'];
                    document.getElementById("edit_emp_Postal_Code").readOnly="readOnly";
                    document.getElementById("edit_emp_Phone").value=dataJSON['emp_Phone'];
                    document.getElementById("edit_emp_Phone").readOnly="readOnly";
                    document.getElementById("edit_emp_Fax").value=dataJSON['emp_Fax'];
                    document.getElementById("edit_emp_Fax").readOnly="readOnly";
                    var emp_DOT_Safety_Sensitive_Function = document.getElementById("edit_emp_DOT_Safety_Sensitive_Function");
                    var opts2 = emp_DOT_Safety_Sensitive_Function.getElementsByTagName('option');
                    for (var i=0; i<opts2.length; i++)
                    {
                        if (opts2[i].value == dataJSON['edit_emp_DOT_Safety_Sensitive_Function'])
                        {
                            opts2[i].selected = true;
                        }else{
                            opts2[i].selected = false;
                        }
                    }
                    var emp_FMCSR_Regulated = document.getElementById("edit_emp_FMCSR");
                    var opts3 = emp_FMCSR_Regulated.getElementsByTagName('option');
                    for (var i=0; i<opts3.length; i++)
                    {
                        if (opts3[i].value == dataJSON['edit_emp_FMCSR'])
                        {
                            opts3[i].selected = true;
                        }else{
                            opts3[i].selected = false;
                        }
                    }
                    $("#edit_emp_Employer_Name_indicator").css("display","none");
                    return true;
                }
            }else{
                $("#emp_Employer_Name_indicator").css("display","none");
                return true;
            }
        }
    );
}
function clear_autocomplete(field){
    if(field=="emp_Employer_Name"){
        document.getElementById("emp_ID").value="";
        document.getElementById("emp_Address1").readOnly="";
        document.getElementById("emp_City").readOnly="";
        document.getElementById("emp_Postal_Code").readOnly="";
        document.getElementById("emp_Phone").readOnly="";
        document.getElementById("emp_Fax").readOnly="";
    }else{
        document.getElementById("edit_emp_ID").value="";
        document.getElementById("edit_emp_Address1").readOnly="";
        document.getElementById("edit_emp_City").readOnly="";
        document.getElementById("edit_emp_Postal_Code").readOnly="";
        document.getElementById("edit_emp_Phone").readOnly="";
        document.getElementById("edit_emp_Fax").readOnly="";

    }
  }
function hide_autocomplete(field){
    $().ready(function() {
        $("body").click(function() {
            if(field=="emp_Employer_Name"){
                document.getElementById("emp_Employer_Name_ul").innerHTML="";
                $("#emp_Employer_Name_ul").css("display","none");
            }else{
                document.getElementById("edit_emp_Employer_Name_ul").innerHTML="";
                $("#edit_emp_Employer_Name_ul").css("display","none");
            }
        });
    });
}
        
	function log(event, data, formatted) {
		$("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
	}

	function formatItem(row) {
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

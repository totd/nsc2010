
function validateForm(){
    document.getElementById("error").innerHTML="";
    isvaid=9;
    dah_Driver_ID = document.getElementsByName("dah_Driver_ID")[0].value;
    if(dah_Driver_ID==""){isvaid--;}
    dah_Address1 = document.getElementsByName("dah_Address1")[0].value;
    if(dah_Address1==""){isvaid--;}
    dah_City = document.getElementsByName("dah_City")[0].value;
    if(dah_City==""){
        isvaid--;
        
    }
    dah_State = document.getElementsByName("dah_State")[0].value;
    if(dah_State==""){isvaid--;}
    dah_Postal_Code = document.getElementsByName("dah_Postal_Code")[0].value;
    if(dah_Postal_Code==""){
        isvaid--;
    }
    dah_Phone = document.getElementsByName("dah_Phone")[0].value;
    if(dah_Phone==""){isvaid--;}
    dah_Start_Date = document.getElementsByName("dah_Start_Date")[0].value;
    if(dah_Start_Date==""){isvaid--;}
    dah_End_Date = document.getElementsByName("dah_End_Date")[0].value;
    if(dah_End_Date==""){isvaid--;}
    dah_Current_Address = document.getElementsByName("dah_Current_Address")[0].value;
    if(dah_Current_Address==""){isvaid--;}

    if(isvaid!=9){
        document.getElementById("error").innerHTML="All Fields must be filled!";
        return null;
    }
    return true;
    
}
function addAddressHistoryRecord() {
    if(validateForm()==true){
    var qString = $("#NewDIW_Address").formSerialize();
   // alert(qString);
    //   $.post("myscript.php", qString);
        $.get("/ajax/Driver-Address-History/add-Record/",qString, function(data){

               //   $('#d_depot_ID option').remove();
               //   $('#d_depot_ID').append(""+data+"");
           });
    }
};
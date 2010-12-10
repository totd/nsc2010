
function validateDriverInfo(){
    d_homebase_ID = document.getElementsByName("d_homebase_ID")[0].value;
    d_First_Name = document.getElementsByName("d_First_Name")[0].value;
    d_Middle_Name = document.getElementsByName("d_Middle_Name")[0].value;
    d_Last_Name = document.getElementsByName("d_Last_Name")[0].value;
    d_Medical_Card_Expiration_Date = document.getElementsByName("d_Medical_Card_Expiration_Date")[0].value;
    d_Doctor_Name = document.getElementsByName("d_Doctor_Name")[0].value;
    d_Telephone_Number1 = document.getElementsByName("d_Telephone_Number1")[0].value;
    d_Telephone_Number2 = document.getElementsByName("d_Telephone_Number2")[0].value;
    d_Telephone_Number3 = document.getElementsByName("d_Telephone_Number3")[0].value;
    d_TWIC = document.getElementsByName("d_TWIC")[0].value;
    d_TWIC_expiration = document.getElementsByName("d_TWIC_expiration")[0].value;
    d_R_A = document.getElementsByName("d_R_A")[0].value;
    d_R_A_expiration = document.getElementsByName("d_R_A_expiration")[0].value;

    $.get("/driver/Ajax-Driver/validate-driver-info/",
        {
            d_homebase_ID: d_homebase_ID,
            d_First_Name: ""+d_First_Name+"",
            d_Middle_Name: ""+d_Middle_Name+"",
            d_Last_Name: ""+d_Last_Name+"",
            d_Medical_Card_Expiration_Date: ""+d_Medical_Card_Expiration_Date+"",
            d_Doctor_Name: ""+d_Doctor_Name+"",
            d_Telephone_Number1: ""+d_Telephone_Number1+"",
            d_Telephone_Number2: ""+d_Telephone_Number2+"",
            d_Telephone_Number3: ""+d_Telephone_Number3+"",
            d_TWIC: ""+d_TWIC+"",
            d_TWIC_expiration: ""+d_TWIC_expiration+"",
            d_R_A: ""+d_R_A+"",
            d_R_A_expiration: ""+d_R_A_expiration+""
        }, function(data){
            if(data==1){
                document.getElementById('driver_DriverPersonalInformation_Form').submit();
                return true;
            }else{
                alert(data);
            }
           });
}
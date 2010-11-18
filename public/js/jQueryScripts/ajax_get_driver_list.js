function deleteAddressHistoryRecord(dah_ID) {
        $.get("/ajax/Driver-Address-History/delete-Record/",
        {
            dah_ID: dah_ID
        }, function(data){
                document.getElementById("currentDriverAddressHistoryList").innerHTML=data;
                refreshAddressHistoryRecords(dah_Driver_ID);
                return true;
           });
}
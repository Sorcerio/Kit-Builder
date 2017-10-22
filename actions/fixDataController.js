// Submits the data provided by the user to a data in XML file and clears the forum
function submitNewData() {
    // Get Data from Forum
    itemName = $("#itemSelectedForCorrection").text();
    itemType = $("#itemType").val();
    itemCorrection = $("#itemCorrection").val();
    userName = $("#userName").val();

    // Pack up data
    var newData = {item:itemName, spot:itemType, details:itemCorrection, user:userName};
    var newDataPackage = JSON.stringify(newData);
    // console.log(newData);
    
    // Submit with PHP
    $.get("actions/submitFixRequest.php?data="+newDataPackage, function(data, status){
        if(status === "success") {
            if(data == "Data_Added") {
                // Log Success
                console.log("Data added succesfully.");
            } else {
                // Log Normal Failure
                console.log("Unable to submit data because of regular failure (Failure inside the PHP program).");
            }
        } else {
            // Log SUPER Failure
            console.log("Unable to submit data because of SUPER FAILURE (PHP file couldn't be found).");
        }
    });

    // // Close Page
    // window.close();
}
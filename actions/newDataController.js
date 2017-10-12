// Runs right when the page starts
function onStartup() {

    // Pupulates the selector
    getValidItemTypes();
}

// Gets the types of Items currently recorded as avalible
function getValidItemTypes() {
    // Run PHP script
    $.get("actions/getValidEquipmentTypes.php?file=types.txt", function(data, status){
        if(status === "success") {
            // Clean default items
            // 'Other' is included in the list of types so we can remove it
            $("#itemType").empty();

            // Split JSON
            validTypes = JSON.parse(data);
            
            // Deploy to Forum Select
            for(type of validTypes) {
                $("#itemType").append('<option value="'+type+'">'+type+'</option>');
            }

        } else {
            // Log
            console.log("Unable to get Types.");
        }
    });
}

// Submits the data provided by the user to a data in XML file and clears the forum
function submitNewData() {
    // Get Data from Forum
    itemName = $("#itemName").val();
    itemPrice = $("#itemPrice").val();
    itemStore = $("#itemStore").val();
    itemDesc = $("#itemDesc").val();
    itemLink = $("#itemLink").val();
    itemImage = $("#itemImage").val();
    itemType = $("#itemType").val();
    userName = $("#userName").val();

    // Check optionals
    if(itemImage == "" || itemImage == undefined) {
        itemImage = "NO_IMAGE";
    }

    // Pack up data
    var newData = {name:itemName, price:itemPrice, store:itemStore, desc:itemDesc, type:itemType, image:itemImage, link:itemLink, submitter:userName};
    var newDataPackage = JSON.stringify(newData);
    console.log(newDataPackage);
    
    // Submit with PHP
    $.get("actions/addNewEquipmentData.php?data="+newDataPackage, function(data, status){
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

    // Clear forum
    $("#itemName").val("");
    $("#itemPrice").val(0);
    $("#itemStore").val("");
    $("#itemDesc").val("");
    $("#itemLink").val("");
    $("#itemImage").val("");
    //$("#itemType").val(""); // Don't need the Type because it's a drop down
}

// Run it
onStartup();
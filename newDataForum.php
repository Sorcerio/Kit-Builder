<!DOCTYPE html>
<html>
<header>
    <title>Kit Builder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Brody.MC Media">
    <meta name="description" content="Welcome to the Brody.MC Media Kit Builder. Here you can build a kit for your next airsoft or paintball game?">
    <meta name="tags" content="">
    <link rel="icon" type="image/png" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
    <link rel="stylesheet" type="text/css" href="assets/w3.css">
    <script type="text/javascript" src="assets/jquery-3.2.1.min.js"></script>
</header>
<body>
    <!-- Main Content -->
    <div style="margin-left: 10px;">
        <div>
            <h1 class="main_Header">Submit New Equipment</h1>
            <h4>Here you can help improve the Kit Builder by adding pieces of gear to the catalogue!<br>Once submitted, the gear will be checked for approval and, if accepted, added to the Kit Builder catalogue.</h4>
        </div>
         <forum class="main_ExtraItemForum">
            <div class="inputs">
                <!-- Inputs -->
                <h4>Item Name</h4>
                <p>The name of the item.</p>
                <input type="text" name="itemName" id="itemName">

                <h4>Item Price</h4>
                <p>The price of the item. In USD, please.</p>
                <input type="number" name="itemPrice" id="itemPrice">

                <h4>Store Name</h4>
                <p>The name of the store that the item is from.</p>
                <input type="text" name="itemStore" id="itemStore">

                <h4>Item Description</h4>
                <p>A short description of the item.</p>
                <input type="text" name="itemDesc" id="itemDesc">

                <h4>Item Link</h4>
                <p>The weblink to the item.</p>
                <input type="text" name="itemLink" id="itemLink">

                <h4>Image Link</h4>
                <p>The weblink to the image of the item. <i>Optional.</i></p>
                <input type="text" name="itemImage" id="itemImage">

                <h4>Item Type</h4>
                <p>The type of the item.</p>
                <select id="itemType">
                    <!-- Populated by Script -->
                    <option value="Other">Other</option> 
                </select>

                <h4>Your Username</h4>
                <p>To record who adds what data.</p>
                <input type="text" name="userName" id="userName">
            </div>

            <!-- Submit Button -->
            <button type="button" class="" onclick="submitNewData();" id="extras_AddItem">Submit New Item for Review *</button>
        </forum>

        <!-- Information -->
        <p>* By submitting data to this site you are confirming that you are submitting data that is public domain or you are allowed to and are granting this site the ability to use any submitted data. You are allowing the data to be used freely on this site. We promise <i>the operators of this site</i> will not share any data submitted with other sites.</p>
    </div>

    <!-- Footer -->
    <?php
        include("assets/footer.php");
    ?>
</body>
<script>
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
</script>
</html>
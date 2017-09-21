<!DOCTYPE html>
<html>
<header>
    <title>Kit Builder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Brody.MC Media">
    <meta name="description" content="Welcome to the Brody.MC Media Kit Builder. Here you can build a kit for your next airsoft or paintball game?">
    <meta name="tags" content="TO-DO">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
    <link rel="stylesheet" type="text/css" href="assets/w3.css">
    <script type="text/javascript" src="assets/jquery-3.2.1.min.js"></script>
</header>
<body>
    <!-- Tool Bar -->
    <div class="toolBar">
        <h4 class="main_Header main_Header_Price">Total Price: $<span id="totalPriceDisplay">0.00</span></h4>
        <ul>
            <a href="javascript:switchToolbarSelector('equip_menu');"><li id="equip_menu">[ Equipment ]</li></a>
            <a href="javascript:switchToolbarSelector('primary_menu');"><li id="primary_menu">Primary Weapon</li></a>
            <a href="javascript:switchToolbarSelector('secondary_menu');"><li id="secondary_menu">Secondary Weapon</li></a>
            <a href="javascript:switchToolbarSelector('extras_menu');"><li id="extras_menu">Extras</li></a>
            <a href="javascript:openFinishMenu();"><li id="finish_menu">Finish</li></a> <!-- TODO: Make finish page w/ Store Totals and Save button -->
        </ul>
    </div>

    <!-- Page Contents -->
    <div class="toolBar_otherSpacer">
        <!-- Left Panel | Spot Choice -->
        <div class="main_LeftPanel">
            <h1 class="main_Header">Select Location</h1>
            <div class="main_ImageContainer" id="mainNodeSelectionContainer">
                <div id="equipmentMenu">
                    <img src="images/backgrounds/backgroundSoldier.png" alt="Background Soldier" class="main_Image">

                    <!-- Buttons Start -->
                    <button type="button" class="main_SelectorButton" onclick="expandMenu(this,'headMenuFull')" id="HeadMenu" style="left: 49%; top: 19%;" data-menustatus="closed" data-name="HEAD">HEAD</button>
                    <div id="headMenuFull" style="display: none;"> 
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Helmet" style="left: 49%; top: 11.5%;" data-tooltip="No Selection">HELM</button>
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Mask" style="left: 56.5%; top: 19%;" data-tooltip="No Selection">MASK</button>
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Goggle" style="left: 41.5%; top: 19%;" data-tooltip="No Selection">GOGGL</button>
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Scarf" style="left: 49%; top: 26.5%;" data-tooltip="No Selection">SCARF</button>
                    </div>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Shirt" style="left: 65%; top: 30%;" data-tooltip="No Selection">SHIRT</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Vest" style="left: 47%; top: 35%;" data-tooltip="No Selection">VEST</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Belt" style="left: 52%; top: 60%;" data-tooltip="No Selection">BELT</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Glove" style="left: 66%; top: 58%;" data-tooltip="No Selection">GLOVE</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Pant" style="left: 32%; top: 65%;" data-tooltip="No Selection">PANT</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Knee Pad" style="left: 57%; top: 75%;" data-tooltip="No Selection">KNEE</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Boot" style="left: 36%; top: 87%;" data-tooltip="No Selection">BOOT</button>
                    <!-- Buttons End -->
                </div>
                <div id="primaryMenu">
                    <img src="images/backgrounds/backgroundM4A1.png" alt="Background Soldier" class="main_Image" style="transform: translate(0%,-25%);">

                    <!-- Buttons Start -->
                    <button type="button" class="main_SelectorButton" onclick="expandMenu(this,'weaponTypeMenuFull')" id="WeaponTypeMenu" style="left: 3%; top: 0%;" data-menustatus="closed" data-name="WEPN">WEPN</button>
                    <div id="weaponTypeMenuFull" style="display: none;">
                        <!-- TODO: Implement switching Weapon type. -->
                        <!-- TODO: Implement selecting pre-built models -->
                        <!-- TODO: Increase customization into the gear box and beyond -->
                        <button type="button" class="main_SelectorButton" onclick="#" id="selectM4" style="left: 10.5%; top: 0%;">M4</button>
                        <button type="button" class="main_SelectorButton" onclick="#" id="selectAK" style="left: 18%; top: 0%;">AK</button>
                        <button type="button" class="main_SelectorButton" onclick="#" id="selectPistol" style="left: 25.5%; top: 0%;">PSTL</button>
                    </div>

                    <button type="button" class="main_SelectorButton" onclick="expandMenu(this,'frontGuardMenuFull')" id="FrontGuardMenu" style="left: 62%; top: 14%;" data-menustatus="closed" data-name="FRONT">FRONT</button>
                    <div id="frontGuardMenuFull" style="display: none;">
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Rail Mount" style="left: 54.5%; top: 14%;" data-tooltip="No Selection">RAIL MNT</button>
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Under Mount" style="left: 62%; top: 21.5%;" data-tooltip="No Selection">UNDR MNT</button>
                    </div>

                    <button type="button" class="main_SelectorButton" onclick="expandMenu(this,'magazineMenuFull')" id="MagazineMenu" style="left: 44%; top: 31%;" data-menustatus="closed" data-name="MAG">MAG</button>
                    <div id="magazineMenuFull" style="display: none;">
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Low-Cap Magazine" style="left: 36.5%; top: 23.5%;" data-tooltip="No Selection">LOW CAP</button>
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Mid-Cap Magazine" style="left: 44%; top: 23.5%;" data-tooltip="No Selection">MID CAP</button>
                        <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="High-Cap Magazine" style="left: 51.5%; top: 23.5%;" data-tooltip="No Selection">HIGH CAP</button>
                    </div>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Sight" style="left: 39%; top: 6.5%;" data-tooltip="No Selection">SIGHT</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Muzzle" style="left: 85%; top: 14%;" data-tooltip="No Selection">MZZLE</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Stock" style="left: 10%; top: 14%;" data-tooltip="No Selection">STOCK</button>

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Battery" style="left: 10%; top: 30%;" data-tooltip="No Selection">BTRY</button>
                    <!-- Buttons End -->
                </div>
                <div id="secondaryMenu">
                    <h1>Secondary Weapons are not implemented yet!</h1>
                </div>
                <div id="extrasMenu">
                    <h1>Extras are not implemented yet!</h1>
                </div>
            </div>
        </div>

        <!-- Right Panel | Item Choice -->
        <div class="main_RightPanel">
            <h1 class="main_Header" id="selectSlotTitle">Select a Slot</h1>
            <ul class="main_List" id="equipmentList">
                <!-- Populated by Script -->
                <li>
                    <p class="main_List_Header">No slot selected. Select one on the left.</p>
                </li>
            </ul>
        </div>
    </div>

    <!-- Finish Button Pop-Up -->
    <div id="finishButtonModal" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container modal">
                <!-- Close button -->
                <span onclick="$('#finishButtonModal').css('display','none');" class="modal_closeButton w3-display-topright">&times;</span>

                <!-- Contents -->
                <h1 class="modal_MainHeader">Total Price: $<span id="modal_TotalPrice">0.00</span></h1>
                <div id="modal_PriceBreakdown" class="modal_LeftPanel">
                    <!-- Populated by script -->
                </div>
                <div class="modal_RightPanel" style="margin-top:15px;">
                    <button type="button" class="modal_MenuButton" onclick="finishMenu_SaveCSV();" id="saveToCsvBtn">Save Your Loadout</button>
                    <button type="button" class="modal_MenuButton" onclick="finishMenu_LoadCSV();" id="loadFromCsvBtn">Load a Loadout</button>
                    <!-- <button type="button" class="modal_MenuButton" onclick="finishMenu_Reset();" id="loadFromCsvBtn">Reset Loadout</button> -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <ul class="footer_List">
            <li><p>Copyright under MIT License to Brody.MC Media and all personal aliases.</p></li>
            <li><a href="LICENSE" title="Opens in a new tab." target="_blank"><p>View License.</p></a></li>
            <li><a href="credits.php" title="Opens in a new tab." target="_blank"><p>View Credits.</p></a></li>
            <li><a href="https://github.com/maximombro/Kit-Builder" title="Opens in a new tab." target="_blank"><p>View on Github.</p></a></li>
        </ul>
    </div>  
</body>
<script>
    // Kept Variables
    var equipment = []; // Saved equipment selected by the user
    var allItems = []; // All items currently loaded at one time (Has every item loaded from the XML file)
    var loadedHTML = "equipmentHTML";
    var equipmentHTML = "";
    var primaryHTML = "";
    var secondaryHTML = "";
    var extrasHTML = "";
    var totalPrice = "0.00";

    // Start up function
    function onStartUp() {
        // Sets the HTML save points
        equipmentHTML = $("#equipmentMenu").clone();
        primaryHTML = $("#primaryMenu").clone();
        secondaryHTML = $("#secondaryMenu").clone();
        extrasHTML = $("#extrasMenu").clone();
        $("#mainNodeSelectionContainer").empty();

        // Start at specific HTML
        $("#mainNodeSelectionContainer").append(equipmentHTML);
    }

    // Opens the selection menu for the correct item
    function openSelectionMenu(sender) {
        // console.log(sender);

        // Clean List
        $("#equipmentList").empty();
        $("#selectSlotTitle").text("Select a "+sender.id);
        
        // Get Data
        // TODO: Only call for all items once at start and just work from the 'allItems' list afterward
        $.get("actions/getEquipmentData.php?file=equipmentData", function(data, status){
            if(status === "success") {
                // Populate Main List
                allItems = JSON.parse(data).item;

                // Create Back button
                $("#equipmentList").append('<li class="main_Cancel_ListItem"><button type="button" class="main_List_Header main_CancelButton" onclick="cancelEquipmentSelection();">Cancel Selection</button></li>');

                // Create Clear button
                $("#equipmentList").append('<li class="main_Cancel_ListItem"><button type="button" class="main_List_Header main_CancelButton" onclick="clearEquipmentSelection(\''+sender.id+'\');">Clear Selection</button></li>');

                // Create HTML options
                var tick = 0;
                for(item of allItems) {
                    // Only load correct type
                    if(item.type == sender.id) {
                        // Build HTML
                        var html = '<li>';
                        html += '<p class="main_List_Header"><a href="'+item.link+'" class="main_ProductLink" target="_blank">'+item.name+'</a> | $'+item.price+'</p>';
                        html += '<p>'+item.desc+'</p>';
                        html += '<button type="button" class="main_List_Button" onclick="swapData(\''+sender.id+'\','+tick+');">Select</button>';
                        html += '</li>';

                        // Send it out
                        $("#equipmentList").append(html);
                    }

                    // Iterate
                    tick += 1;
                }
            }
        });
    }

    // Adds selected item to Equipment array, removes old items, and sets tool tip of button
    function swapData(node, itemId) {
        // console.log("Node: "+node);
        // console.log(allItems[itemId]);

        // Create item
        var item = allItems[itemId];

        // Remove old Equipment if exists
        if(equipment.length != 0) {
            for(part of equipment) {
                if(part.type == node) {
                    // Subtract previous from Total Price
                    totalPrice = (parseFloat($("#totalPriceDisplay").text())-parseFloat(part.price)).toFixed(2);
                    $("#totalPriceDisplay").text(totalPrice);

                    // Remove from equipment list
                    var index = equipment.indexOf(part);
                    equipment.splice(index, 1);
                }
            }
        }

        // Add to Equipment
        equipment.push(item);

        // Set tool tip
        $("#"+node).attr("data-tooltip", item.name+" Selected");

        // Add to Total Price
        totalPrice = (parseFloat($("#totalPriceDisplay").text())+parseFloat(item.price)).toFixed(2);
        $("#totalPriceDisplay").text(totalPrice);

        // Clear List
        cancelEquipmentSelection();

        // console.log(equipment);
    }

    // Clears the equipment list of items without selecting anything
    function cancelEquipmentSelection() {
        // Clean list
        $("#equipmentList").empty();
        $("#selectSlotTitle").text("Select a Slot");

        // Insert placeholder
        $("#equipmentList").append('<li><p class="main_List_Header">No slot selected.</p></li>');
    }

    // Clears a slot completely and subtracts price of item
    function clearEquipmentSelection(node) {
        // Look through equipment
        if(equipment.length != 0) {
            for(part of equipment) {
                if(part.type == node) {
                    // Subtract previous from Total Price
                    totalPrice = (parseFloat($("#totalPriceDisplay").text())-parseFloat(part.price)).toFixed(2);
                    $("#totalPriceDisplay").text(totalPrice);

                    // Remove from equipment list
                    var index = equipment.indexOf(part);
                    equipment.splice(index, 1);

                    // Reset node to empty
                    $("#"+node).attr("data-tooltip", "No Selection");
                }
            }
        }

        // Exit equipment section
        cancelEquipmentSelection();
    }

    // Expand expandable menu
    // node, The button that triggered the expansion
    // menuId, String of Id for the div containing the extra buttons
    function expandMenu(node, menuId) {
        // Variables
        var displayMode = "none";
        var displayText = node.getAttribute("data-name");

        // Check which mode the menu is in
        if(node.getAttribute("data-menustatus") == "closed") {
            // Menu is currently closed
            displayMode = "block";
            displayText = "CLOSE";
            $("#"+node.id).attr("data-menustatus", "open");
        } else {
            // Menu is currently open
            $("#"+node.id).attr("data-menustatus", "closed");
        }

        // Set menu to visible
        $("#"+menuId).attr("style", "display: "+displayMode+";")

        // Set Text
        $("#"+node.id).text(displayText);
    }

    // Switches between the various toolbar menus.
    // mode, String of Id of button selected
    function switchToolbarSelector(mode) {
        // Close Menu
        cancelEquipmentSelection();

        // Set Text of button
        switch(mode) {
            case "equip_menu":
                // Swap menu indicator
                $("#equip_menu").text("[ Equipment ]");
                $("#primary_menu").text("Primary Weapon");
                $("#secondary_menu").text("Secondary Weapon");
                $("#extras_menu").text("Extras");
                $("#finish_menu").text("Finish");

                // Save Current HTML
                saveCurrentHTML();
                loadedHTML = "equipmentHTML";

                // Clear Old HTML
                $("#mainNodeSelectionContainer").empty();

                // Attach HTML
                $("#mainNodeSelectionContainer").append(equipmentHTML);

                break;

            case "primary_menu":
                // Swap menu indicator
                $("#equip_menu").text("Equipment");
                $("#primary_menu").text("[ Primary Weapon ]");
                $("#secondary_menu").text("Secondary Weapon");
                $("#extras_menu").text("Extras");
                $("#finish_menu").text("Finish");

                // Save Current HTML
                saveCurrentHTML();
                loadedHTML = "primaryHTML";

                // Clear Old HTML
                $("#mainNodeSelectionContainer").empty();

                // Attach HTML
                $("#mainNodeSelectionContainer").append(primaryHTML);

                break;

            case "secondary_menu":
                // Swap menu indicator
                $("#equip_menu").text("Equipment");
                $("#primary_menu").text("Primary Weapon");
                $("#secondary_menu").text("[ Secondary Weapon ]");
                $("#extras_menu").text("Extras");
                $("#finish_menu").text("Finish");

                // Save Current HTML
                saveCurrentHTML();
                loadedHTML = "secondaryHTML";

                // Clear Old HTML
                $("#mainNodeSelectionContainer").empty();

                // Attach HTML
                $("#mainNodeSelectionContainer").append(secondaryHTML);

                break;

            case "extras_menu":
                // Swap menu indicator
                $("#equip_menu").text("Equipment");
                $("#primary_menu").text("Primary Weapon");
                $("#secondary_menu").text("Secondary Weapon");
                $("#extras_menu").text("[ Extras ]");
                $("#finish_menu").text("Finish");

                // Save Current HTML
                saveCurrentHTML();
                loadedHTML = "extrasHTML";

                // Clear Old HTML
                $("#mainNodeSelectionContainer").empty();

                // Attach HTML
                $("#mainNodeSelectionContainer").append(extrasHTML);

                break;

            default:
                console.log("Unknown Toolbar Id");
                break;
        }
    }

    // Saves the current HTML with changes so it can be correctly displayed when switched back to
    function saveCurrentHTML() {
        // Save current HTML
        switch(loadedHTML) {
            case "equipmentHTML":
                equipmentHTML = $("#mainNodeSelectionContainer").clone();
                break;

            case "primaryHTML":
                primaryHTML = $("#mainNodeSelectionContainer").clone();
                break;

            case "secondaryHTML":
                secondaryHTML = $("#mainNodeSelectionContainer").clone();
                break;

            case "extrasHTML":
                extrasHTML = $("#mainNodeSelectionContainer").clone();
                break;
        }
    }

    // Opens the finish page with the current list
    function openFinishMenu() {
        console.log(equipment);

        // Show the Finish Menu
        $("#finishButtonModal").css("display","block");

        // Populate total price
        $("#modal_TotalPrice").text(totalPrice);

        // Clean Price Breakdown
        $("#modal_PriceBreakdown").empty();

        // Check if any equipment selected
        if(equipment.length != 0) {
            // Populate Price Breakdown
            var usedStores = [];
            for(item of equipment) {
                var isPresent = false;
                for(store of usedStores) {
                    console.log(store);
                    if(store == item.store) {
                        isPresent = true;
                    }
                }

                if(isPresent) {
                    // Need to create a new store entry
                    // Prepare Table Entry
                    var html = '<tr>';
                    html += '<th>'+item.name+'</th>';
                    html += '<th>$'+item.price+'</th>';
                    html += '<th><a href="'+item.link+'">Link</a></th>';
                    html += '</tr>';

                    // Deploy Entry
                    $("#modal_PB_"+item.store+"_table").append(html);
                } else {
                    // There's already a store entry
                    // Prepare full HTML Table
                    var html = '<div id="modal_PB_'+item.store+'">';
                    html += '<p class="modal_MinorHeader">'+item.store+'</p>';
                    html += '<table class="modal_BreakdownTable" id="modal_PB_'+item.store+'_table">';
                    html += '<tr>';
                    html += '<th>'+item.name+'</th>';
                    html += '<th>$'+item.price+'</th>';
                    html += '<th><a href="'+item.link+'">Link</a></th>';
                    html += '</tr>';
                    html += '</table>';
                    html += '</div>';

                    // Deploy full HTML
                    $("#modal_PriceBreakdown").append(html);

                    // Add to 'usedStores'
                    usedStores.push(item.store);
                }
            }
        } else {
            // There's no equipment selected
            $("#modal_PriceBreakdown").append("<h4>No equipment selected.</h4>");
        }
    }

    // Saves the current 'equipment' list to a CSV file for download
    function finishMenu_SaveCSV() {
        console.log("TODO: Implement Saving");
    }

    // Loads a set of data into the 'equipment' list
    function finishMenu_LoadCSV() {
        console.log("TODO: Implement Loading");
    }

    // Resets the equipment list to nothing
    function finishMenu_Reset() {
        // Reset
        for(item of equipment) {
            clearEquipmentSelection(item.type);
        }

        // Close Finish Menu
        $('#finishButtonModal').css('display','none');
    }

    // Runs the startup
    onStartUp();
</script>
</html>
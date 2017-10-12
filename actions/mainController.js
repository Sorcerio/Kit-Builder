// Kept Variables
var equipment = []; // Saved equipment selected by the user
var allItems = []; // All items currently loaded at one time (Has every item loaded from the XML file)
var normalMenuHeader = "Select Location";
var extrasMenuHeader = "Add Extra Item";
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

    // $("#main_LeftInstructionHeader").text(extrasMenuHeader);
    // $("#mainNodeSelectionContainer").append(extrasHTML);
}

// Opens the selection menu for the correct item
function openSelectionMenu(sender) {
    console.log(sender);

    // Extract Sender Id
    senderId = undefined;
    if(sender.type == "button") {
        senderId = sender.id;
    } else {
        senderId = sender;
    }

    // Clean List
    $("#equipmentList").empty();

    // Set title
    $("#selectSlotTitle").text("Select a "+senderId.replace("++", " "));
    
    // Get Data
    // TODO: Only call for all items once at start and just work from the 'allItems' list afterward
    $.get("actions/getEquipmentData.php?file=equipmentData", function(data, status){
        if(status === "success") {
            // Populate Main List
            allItems = JSON.parse(data).item;

            // // Create Refresh button
            // $("#equipmentList").append('<li class="main_Cancel_ListItem"><button type="button" class="main_List_Header main_CancelButton" onclick="openSelectionMenu(\''+senderId+'\');">Refresh</button></li>');

            // Create Back button
            $("#equipmentList").append('<li class="main_Cancel_ListItem"><button type="button" class="main_List_Header main_CancelButton" onclick="cancelEquipmentSelection();">Cancel Selection</button></li>');

            // Create Clear button
            $("#equipmentList").append('<li class="main_Cancel_ListItem"><button type="button" class="main_List_Header main_CancelButton" onclick="clearEquipmentSelection(\''+senderId+'\');">Clear Selection</button></li>');

            // Create HTML options
            var tick = 0;
            for(item of allItems) {
                // Only load correct type
                if(item.type == senderId) {
                    // Build HTML
                    var html = '<li>';
                    if(item.name.length > 80) {
                        html += '<p class="main_List_Header"><a href="javascript:openLinkMenu(\''+item.link+'\');" class="main_ProductLink" target="_blank">'+item.name.substring(0,80)+'...</a> | $'+item.price+'</p>';
                    } else {
                        html += '<p class="main_List_Header"><a href="javascript:openLinkMenu(\''+item.link+'\');" class="main_ProductLink" target="_blank">'+item.name+'</a> | $'+item.price+'</p>';
                    }
                    if(item.desc.length > 90) {
                        html += '<p>'+item.desc.substring(0,90)+'...</p>';
                    } else {
                        html += '<p>'+item.desc+'</p>';
                    }
                    html += '<button type="button" class="main_List_Button" onclick="swapData(\''+senderId+'\','+tick+');">Select</button>';
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

    // Set tool tips
    setAllTooltips();
    // $("#"+node).attr("data-tooltip", item.name+" Selected");

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

// Sets the tooltips to data from the equipment list
function setAllTooltips() {
    for(part of equipment) {
        try {
            $("#"+part.type).attr("data-tooltip", part.name+" Selected");
        } catch(error) {
            null;
        }
    }
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

            // Switch Title
            $("#main_LeftInstructionHeader").text(normalMenuHeader);

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

            // Switch Title
            $("#main_LeftInstructionHeader").text(normalMenuHeader);

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

            // Switch Title
            $("#main_LeftInstructionHeader").text(normalMenuHeader);

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

            // Switch Title
            $("#main_LeftInstructionHeader").text(extrasMenuHeader);

            // Open list of extra items
            openExtrasSelectionMenu();

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
    // console.log(equipment);

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
                // console.log(store);
                if(store == item.store) {
                    isPresent = true;
                }
            }

            if(isPresent) {
                // Need to create a new store entry
                // Prepare Table Entry
                var html = '<tr>';
                // html += '<th><button type="button" class="modal_removeItemButton" onclick="removeItemInModal('+item.name+')">&times;</button></th>'
                html += '<th>'+item.name+'</th>';
                html += '<th>$'+item.price+'</th>';
                html += '<th><a href="'+item.link+'" target="_blank">Link</a></th>';
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
                // html += '<th><button type="button" class="modal_removeItemButton" onclick="removeItemInModal(\'"'+item.name+'\')">&times;</button></th>'
                html += '<th>'+item.name+'</th>';
                html += '<th>$'+item.price+'</th>';
                html += '<th><a href="'+item.link+'" target="_blank">Link</a></th>';
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

// Opens the link page with the selected link address
function openLinkMenu(link) {
    // Switch the link menu's link
    $("#linkButtonModal_iFrame").attr("src", link);

    // Show the Link Menu
    $("#linkButtonModal").css("display","block");
}

// Removes an item from the equipment list and refreshes the tool tips
// Takes the name of the item to remove
function removeItemInModal(name) {
    // console.log(name);

    // Remove the item from list
    for(part of equipment) {
        if(name == part.name) {
            equipment.splice(equipment.indexOf(name),1);
        }
    }

    // Refresh the tool tips
    setAllTooltips();
}

// Saves the current 'equipment' list to a CSV file for download
function finishMenu_SaveCSV() {
    console.log("TODO: Implement Saving");
    alert("Save loadout has not been implemented yet. Check back soon!");
}

// Loads a set of data into the 'equipment' list
function finishMenu_LoadCSV() {
    console.log("TODO: Implement Loading");
    alert("Load loadout has not been implemented yet. Check back soon!");
}

// Resets the equipment list to nothing
function finishMenu_Reset() {
    // Reload the page. Work smarter, not harder.
    location.reload();
}

// Add an Extra item to the extra list
function addExtrasItem() {
    // Get data from forum
    itemName = $("#itemName").val();
    itemPrice = $("#itemPrice").val();
    itemStore = $("#itemStore").val();
    itemDesc = $("#itemDesc").val();
    itemLink = $("#itemLink").val();
    addToDatabase = $("input[name=submitToUserData]:checked").val();

    // Build Item
    var newItem = {name:itemName, price:itemPrice, store:itemStore, desc:itemDesc, type:"ExtraItem", image:"None", link:itemLink};

    // Check if we should send to database
    if(addToDatabase == "yes") {
        // We should add to the database
        // Package the Data into a JSON
        var newDataPackage = JSON.stringify(newItem);

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
    } 

    // Add to Equipment List
    equipment.push(newItem);

    // Add to Total Price
    totalPrice = (parseFloat($("#totalPriceDisplay").text())+parseFloat(newItem.price)).toFixed(2);
    $("#totalPriceDisplay").text(totalPrice);

    // Empty the forum
    $("#itemName").val("");
    $("#itemPrice").val(0);
    $("#itemStore").val("");
    $("#itemDesc").val("");
    $("#itemLink").val("");

    // Re-Open the list
    openExtrasSelectionMenu();
}

function deleteExtrasItem(itemName) {
    // Delete the item from equipment
    var tick = 0;
    for(item of equipment) {
        if("extraItem_"+item.name.substr(0,5) == itemName) {
            // Subtract from Total Price
            totalPrice = (parseFloat($("#totalPriceDisplay").text())-parseFloat(item.price)).toFixed(2);
            $("#totalPriceDisplay").text(totalPrice);

            // Remove from list
            equipment.splice(tick, 1);
        }
        tick += 1;
    }

    // Delete from the visual list
    openExtrasSelectionMenu();
}

// Opens the selection menu but configured for showing extra items
function openExtrasSelectionMenu() {
    // Clean List
    $("#equipmentList").empty();

    // Set up senderId
    senderId = "ExtraItem";

    // Set title
    $("#selectSlotTitle").text("Current Extras");

    // Create Refresh button
    $("#equipmentList").append('<li class="main_Cancel_ListItem"><button type="button" class="main_List_Header main_CancelButton" onclick="openExtrasSelectionMenu();">Refresh</button></li>');

    // Create HTML options
    var tick = 0;
    var areExtras = false;
    for(item of equipment) {
        // Only load correct type
        if(item.type == senderId) {
            // Set that extras are present
            areExtras = true;

            // Build HTML
            var html = '<li id="extraItem_'+item.name.substr(0,5)+'">';
            if(item.name.length > 80) {
                html += '<p class="main_List_Header"><a href="javascript:openLinkMenu(\''+item.link+'\');" class="main_ProductLink" target="_blank">'+item.name.substring(0,80)+'...</a> | $'+item.price+'</p>';
            } else {
                html += '<p class="main_List_Header"><a href="javascript:openLinkMenu(\''+item.link+'\');" class="main_ProductLink" target="_blank">'+item.name+'</a> | $'+item.price+'</p>';
            }
            if(item.desc.length > 90) {
                html += '<p>'+item.desc.substring(0,90)+'...</p>';
            } else {
                html += '<p>'+item.desc+'</p>';
            }
            html += '<button type="button" class="main_List_Button" onclick="deleteExtrasItem(\'extraItem_'+item.name.substr(0,5)+'\');">Delete</button>';
            html += '</li>';

            // Send it out
            $("#equipmentList").append(html);
        }

        // Iterate
        tick += 1;
    }

    // Place bumper if no Extras
    if(!areExtras) {
        $("#equipmentList").append('<li><p><b>No Extras added. You can add some on the left.</b></p></li>');
    }
}

// Runs the startup
onStartUp();
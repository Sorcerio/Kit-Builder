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
        <h4 class="main_Header main_Header_Price">Total Price: $<span id="totalPriceDisplay">00.00</span></h4>
        <ul>
            <a href="javascript:switchToolbarSelector('equip_menu');"><li id="equip_menu">[ Equipment ]</li></a>
            <a href="javascript:switchToolbarSelector('primary_menu');"><li id="primary_menu">Primary Weapon</li></a>
            <a href="javascript:switchToolbarSelector('secondary_menu');"><li id="secondary_menu">Secondary Weapon</li></a>
            <a href="javascript:switchToolbarSelector('extras_menu');"><li id="extras_menu">Extras</li></a>
            <a href="#"><li id="extras_menu">Finish</li></a> <!-- TODO: Make finish page w/ Store Totals and Save button -->
        </ul>
    </div>

    <!-- Page Contents -->
    <div class="toolBar_otherSpacer">
        <!-- Left Panel | Spot Choice -->
        <div class="main_LeftPanel">
            <h1 class="main_Header">Select Location</h1>
            <div class="main_ImageContainer">
                <img src="images/backgrounds/backgroundSoldier.png" alt="Background Soldier" class="main_Image">
                <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="vest" style="left: 47%; top: 35%;" data-tooltip="No Selection">VEST</button>
            </div>
        </div>

        <!-- Right Panel | Item Choice -->
        <div class="main_RightPanel">
            <h1 class="main_Header">Select Equipment</h1>
            <ul class="main_List" id="equipmentList">
                <!-- Populated by Script -->
            </ul>
        </div>
    </div>
    
    <!-- Footer -->
    <!-- <div class="footer">
        <ul class="footer_List">
            <li><p>Copyright under MIT License to Brody.MC Media and all personal aliases.</p></li>
            <li><a href="LICENSE" title="Your work will not be saved."><p>View License.</p></a></li>
            <li><a href="credits.php" title="Your work will not be saved."><p>View Credits.</p></a></li>
            <li><a href="https://github.com/maximombro/Kit-Builder" title="Opens in a new tab." target="_blank"><p>View on Github.</p></a></li>
        </ul>
    </div>  -->
</body>
<script>
    // Kept Variables
    var equipment = [];

    // Opens the selection menu for the correct item
    function openSelectionMenu(sender) {
        console.log(sender);
        
        // Get Data
        $.get("actions/getEquipmentData.php", function(data, status){
            if(status === "success") {
                // Populate Main List

                // Build HTML
                var html = '<li>';
                html += '<p class="main_List_Header">NAME | $00.00</p>';
                html += '<p>DESCRIPTION</p>';
                html += '<button type="button" class="main_List_Button" onclick="swapData(BTN_NODE,ITEM);">Select</button>';
                html += '</li>';

                // Send it out
                $("#equipmentList").append(html);

                // Wait for Selection
            }
        });

        
        $("#"+sender.id).attr("data-tooltip","SET TO NEW VALUE");
    }

    // Adds selected item to Equipment array, removes old items, and sets tool tip of button
    function swapData(node, item) {
        // Remove old Equipment if exists

        // Add to Equipment

        // Set tool tip

        // Clear #equipmentList
    }

    // Switches between the various toolbar menus.
    // mode, String of Id of button selected
    function switchToolbarSelector(mode) {
        // Set Text of button
        switch(mode) {
            case "equip_menu":
                $("#equip_menu").text("[ Equipment ]");
                $("#primary_menu").text("Primary Weapon");
                $("#secondary_menu").text("Secondary Weapon");
                $("#extras_menu").text("Extras");
                break;

            case "primary_menu":
                $("#equip_menu").text("Equipment");
                $("#primary_menu").text("[ Primary Weapon ]");
                $("#secondary_menu").text("Secondary Weapon");
                $("#extras_menu").text("Extras");
                break;

            case "secondary_menu":
                $("#equip_menu").text("Equipment");
                $("#primary_menu").text("Primary Weapon");
                $("#secondary_menu").text("[ Secondary Weapon ]");
                $("#extras_menu").text("Extras");
                break;

            case "extras_menu":
                $("#equip_menu").text("Equipment");
                $("#primary_menu").text("Primary Weapon");
                $("#secondary_menu").text("Secondary Weapon");
                $("#extras_menu").text("[ Extras ]");
                break;

            default:
                console.log("Unknown Toolbar Id");
                break;
        }
    }
</script>
</html>
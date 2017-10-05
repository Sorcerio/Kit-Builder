<!DOCTYPE html>
<html>
<header>
    <title>Kit Builder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Brody.MC Media">
    <meta name="description" content="Welcome to the Brody.MC Media Kit Builder. Here you can build a kit for your next airsoft or paintball game using parts from various popular retailers!">
    <meta name="tags" content="airsoft kit builder brody.mc media brody paintball customization custom parts kit configuration build your own">
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
            <a href="javascript:openFinishMenu();"><li id="finish_menu">Finish</li></a>
        </ul>
    </div>

    <!-- Page Contents -->
    <div class="toolBar_otherSpacer">
        <!-- Left Panel | Spot Choice -->
        <div class="main_LeftPanel">
            <h1 class="main_Header" id="main_LeftInstructionHeader">Select Location</h1>
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

                    <!-- <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Knee++Pad" style="left: 57%; top: 75%;" data-tooltip="No Selection">KNEE</button> -->

                    <button type="button" class="main_SelectorButton" onclick="openSelectionMenu(this);" id="Boot" style="left: 36%; top: 87%;" data-tooltip="No Selection">BOOT</button>
                    <!-- Buttons End -->
                </div>
                <div id="primaryMenu">
                    <h1>Primaries Coming Soon!</h1>
                    <!--<img src="images/backgrounds/backgroundM4A1.png" alt="Background Soldier" class="main_Image" style="transform: translate(0%,-25%);">

                    <!-- Buttons Start --
                    <button type="button" class="main_SelectorButton" onclick="expandMenu(this,'weaponTypeMenuFull')" id="WeaponTypeMenu" style="left: 3%; top: 0%;" data-menustatus="closed" data-name="WEPN">WEPN</button>
                    <div id="weaponTypeMenuFull" style="display: none;">
                        <!-- TODO: Implement switching Weapon type. 
                        <!-- TODO: Implement selecting pre-built models 
                        <!-- TODO: Increase customization into the gear box and beyond 
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
                    <h1>Secondaries Coming Soon!</h1>
                </div>
                <div id="extrasMenu">
                    <forum class="main_ExtraItemForum">
                        <div class="inputs">
                            <!-- Inputs -->
                            <!-- Image and Type are defaulted -->
                            <h4>Item Name</h4>
                            <p>The name of your item.</p>
                            <input type="text" name="itemName" id="itemName">

                            <h4>Item Price</h4>
                            <p>The price of your item. Preferably, in USD.</p>
                            <input type="number" name="itemPrice" id="itemPrice">

                            <h4>Store Name</h4>
                            <p>The name of the store that your item is from.</p>
                            <input type="text" name="itemStore" id="itemStore">

                            <h4>Item Description</h4>
                            <p>A short description of the item to help you remember.</p>
                            <input type="text" name="itemDesc" id="itemDesc">

                            <h4>Item Link</h4>
                            <p>The weblink to your item.</p>
                            <input type="text" name="itemLink" id="itemLink">
                        </div>

                        <!-- Submit Button -->
                        <button type="button" class="" onclick="addExtrasItem();" id="extras_AddItem">Add New Item</button>
                    </forum>
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
                    <button type="button" class="modal_MenuButton" title="Saves your current loadout to a CSV on your computer." onclick="finishMenu_SaveCSV();" id="saveToCsvBtn">Save Your Loadout</button>
                    <button type="button" class="modal_MenuButton" title="Loads a loadout from a CSV file on your computer." onclick="finishMenu_LoadCSV();" id="loadFromCsvBtn">Load a Loadout</button>
                    <button type="button" class="modal_MenuButton" title="Resets the loadout." onclick="finishMenu_Reset();" id="resetLoadoutBtn">Reset Loadout</button> 
                    <button type="button" class="modal_MenuButton" title="Opens all links in new tabs." onclick="#" id="openAllLinksBtn">Open All Links</button> 
                </div>
            </div>
        </div>
    </div>

    <!-- Link Buttons Pop-Up -->
    <div id="linkButtonModal" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container modal">
                <!-- Close button -->
                <span onclick="$('#linkButtonModal').css('display','none');" class="modal_closeButton w3-display-topright">&times;</span>

                <!-- Contents -->
                <div class="modal_iFrame">
                    <iframe src="http://www.example.com" id="linkButtonModal_iFrame"></iframe>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <?php
        include("assets/footer.php");
    ?>
</body>
<script type="text/javascript" src="actions/mainController.js"></script>
</html>
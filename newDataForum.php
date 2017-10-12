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
<script type="text/javascript" src="actions/newDataController.js"></script>
</html>
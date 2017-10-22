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
            <h1 class="main_Header">Submit Fixes</h1>
            <h4>
                Here you can help improve the Kit Builder by submitting corrections.<br>
                Once submitted, the corrections will be checked for approval and, if accepted, the fix will be added to the Kit Builder catalogue.<br>
                Your input is greatly appreciated as it would be near impossible for us to keep track of every simple change.
            </h4>
        </div>

        <h4><b>Corrections for:</b> <span id="itemSelectedForCorrection"><?php print $_GET['item'] ?></span></h4>

        <form class="main_ExtraItemForum">
            <div class="inputs">
                <!-- Inputs -->
                <h4>Item to Correct</h4>
                <p>Choose the item that you are correcting.</p>
                <select id="itemType">
                    <option value="Title">Title</option> 
                    <option value="Price">Price</option> 
                    <option value="Description">Description</option>
                    <option value="WrongType">Wrong Type</option>
                </select>

                <h4>Correction</h4>
                <p>Explain what your correction is and what the item should be corrected to.</p>
                <input type="text" name="itemCorrection" id="itemCorrection">

                <h4>Your Username</h4>
                <p>To record who adds what corrections.</p>
                <input type="text" name="userName" id="userName">
            </div>

            <!-- Submit Button -->
            <button type="button" class="" onclick="submitNewData();" id="extras_AddItem">Submit Correction for Review *</button>
        </form>

        <!-- Information -->
        <p>* By submitting data to this site you are confirming that you are submitting data that is public domain or you are allowed to and are granting this site the ability to use any submitted data. You are allowing the data to be used freely on this site. We promise <i>the operators of this site</i> will not share any data submitted with other sites.</p>
    </div>

    <!-- Footer -->
    <?php
        include("assets/footer.php");
    ?>
</body>
 <script type="text/javascript" src="actions/fixDataController.js"></script> 
</html>
<?php
    // Variables
    $fileName = "submittedData.xml";

    // Get Data JSON
    $newData = json_decode($_GET['data'],true);

    // Prep status
    $status; // "Data_Added", "Data_Failed"

    // Give adding to the file a try
    try {
        // Open File in Append Mode
        $file = fopen("../data/".$fileName, "a") or die("Data_Failed");

        // Write Header
        fwrite($file, "<item>\n");

        // Write Data
        foreach($newData as $key => $value) {
            // Write to the File if not the Submitting User
            fwrite($file, "    <".$key.">".$value."</".$key.">\n");
        }

        // Write Footer
        fwrite($file, "</item>\n\n");

        // Close File
        fclose($file);

        // Set Status
        $status = "Data_Added";
    } catch (Exception $e) {
        // Set Status
        $status = "Data_Failed";
    }

    // Return Status
    print($status);
?>
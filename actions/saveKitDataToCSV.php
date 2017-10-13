<?php
    // Variables
    $startLine = 2;

    // Get File Name
    $fileName = $_GET['file'].".csv";

    // Get Data JSON
    $newData = json_decode($_GET['data'],true);

    // print_r($newData[0]["name"]);
    // print("<br><br>");
    // print_r($newData[1]["name"]);

    // Prep status
    $status; // "Data_Saved", "Data_Not_Saved"

    // Give saving the CSV and downloading
    try {
        // Open File in Append Mode
        $file = fopen("../createdLoadouts/".$fileName, "w") or die("Data_Not_Saved");

        // Write Headers Line
        fwrite($file, "Item Name,Type,Price,Store,Description,Link\n");

        // Write Data Lines
        $lastLine = startLine;
        foreach($newData as $item) {
            fwrite($file,$item["name"].",".$item["type"].",".$item["price"].",".$item["store"].",".$item["desc"].",".$item["link"]."\n");
            $lastLine += 1;
        }

        // Write Spacer Line
        fwrite($file,"\n");

        // Write Total Line Header
        fwrite($file,"Total Price,=");

        // Build Total Line Calculation
        $totalLineCalc = "";
        for($i = $lastLine+1; $i >= $startLine; $i--) {
            $totalLineCalc = $totalLineCalc."C".$i."+";
        }

        // Write Total Line Calculation
        fwrite($file,rtrim($totalLineCalc,"+"));

        // Close File
        fclose($file);

        // Intiate Download on User's end
        header('Content-Type: application/download');
        header('Content-Disposition: attachment; filename='.$fileName);
        header("Content-Length: " . filesize("../createdLoadouts/".$fileName));
        ignore_user_abort(true);
        $fp = fopen("../createdLoadouts/".$fileName, "r") or die("Data_Not_Saved");
        fpassthru($fp);
        fclose($fp);

        // Set Status
        $status = "Data_Saved";
    } catch (Exception $e) {
        // Set Status
        $status = "Data_Not_Saved";
    }

    // // Return Status
    // print($status);
?>
<?php
    // Get the file name
    $fileName = $_GET['file'].".csv";
    $filePath = "../createdLoadouts/";

    // Open File
    $file = fopen($filePath.$fileName, "r") or die("Unable to open file '".$fileName."'!");

    // Open the out array
    $equipmentList = array();

    // Load Data From Each Line, Can ignore First Line
    $tick = 0;
    $tick2;
    while(!feof($file)) {
        // Create new Gear Array
        $newGear = array();

        // Get Data from Line
        $line = explode(",", fgets($file));

        // Package Data
        $tick2 = 1;
        foreach($line as $item) {
            switch($tick2) {
                case 1:
                    $newGear["name"] = $item;
                    break;

                case 2:
                    $newGear["type"] = $item;
                    break;

                case 3:
                    $newGear["price"] = $item;
                    break;

                case 4:
                    $newGear["store"] = $item;
                    break;

                case 5:
                    $newGear["desc"] = $item;
                    break;

                case 6:
                    $newGear["link"] = $item;
                    break;
            }

            // Iterate
            $tick2 += 1;
        }

        // Add to equipmentList
        array_push($equipmentList,$newGear);

        // Iterate
        $tick += 1;
    }

    // Close File
    fclose($file);

    // Print data back
    print(json_encode(array_slice($equipmentList,1,$tick2-1)));
?>
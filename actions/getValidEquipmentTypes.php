<?php
    // Get the file name
    $fileName = $_GET['file'];

    // Open File
    $file = fopen("../data/".$fileName, "r") or die("Unable to open file!");

    // Open the out array
    $typeList = array();

    // Loop through all lines
    while(!feof($file)) {
        array_push($typeList,trim(fgets($file)));
    }

    // Close File
    fclose($file);

    // Print data back
    print(json_encode($typeList));
?>
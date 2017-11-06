<?php
    // Set directory to scan
    $dir = "../createdLoadouts";

    // Read the directory
    $dirtyOut = scandir($dir);

    // Clean out the bullshit
    $out = array();
    foreach (array_diff($dirtyOut, array('.', '..')) as $item) {
        // if($item != "." or $item != ".." or $item != "NotesOnThisFile.txt") {
        if($item != "NotesOnThisFile.txt") {
            array_push($out, $item);
        }
    }

    // Print data back
    print(json_encode($out));
?>
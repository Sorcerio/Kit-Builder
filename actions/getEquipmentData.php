<?php
    // Get XML File name
    $xmlFile = $_GET['file'].".xml";

    // Collect XML data
    $xml = simplexml_load_file("../data/".$xmlFile) or die("Error: Equipment Data could not be loaded.");

    // Print data back
    print(json_encode($xml));
?>
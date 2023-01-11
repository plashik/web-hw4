<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $xml = simplexml_load_file("data/products.xml") or die("Error: Cannot create object");
        $id = $_GET['id'];
        $i = 0;
        foreach ($xml->item as $item) {   
            if ($item['id'] == $id) {
                unset($xml->item[$i]);
                break;
            }
            $i++;
        }    
        $xml->saveXML('data/products.xml');
        header('location:list.php');
    }
?>
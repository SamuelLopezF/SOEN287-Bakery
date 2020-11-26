<?php
    // Last Edited By: Sobhan
    // Edit Number: 1
    // Edit Date: 26-Nov-2020
    // Edit Details: Created File

    $dataBase = "Database/Item_Info.txt";

    function createRow($itemID, $itemCount){
        // find price
        $price = getPrice($itemID);
        if(!isset($price))
            return null;
        // find total cost
        $total = (float)$price*(int)$itemCount;
        // format name
        $name = ucwords(str_replace("_"," ",$itemID));
        // print row
        print("<tr>
                <td> $name </td>
                <td> $itemCount </td>
                <td> $".number_format($total,2)." </td>
            </tr>");
    }

    function getPrice($item){
        global $dataBase;
        if(file_exists($dataBase) && is_readable($dataBase)){
            // open file
            $list = file($dataBase);
            // get each line and check the id. Return if it matches
            foreach ($list as $food){
                $id = explode(" ", $food)[0];
                $price = explode(" ", $food)[1];
                if($item == $id)
                    return $price;
            } 
            return null;
        }
        else{
            return null;
        }
    }


?>

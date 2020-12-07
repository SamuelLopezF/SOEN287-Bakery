<?php

    $cart = [
        "almond_cookies",  0,
        "cheese_cake", 0,
        "chicken_biscuit", 0,
        "egg_tart", 0,
        "guava_bites", 0,
        "coconut_mochi", 0,
        "pineapple_bites", 0,
        "pineapple_cake", 0,
        "tan_wong_su", 0,
        "tau_sa_pen", 0,
        "pork_bun", 0,
        "red_bean_paste_bun", 0,
        "coconut_bun", 0,
        "custard_bun", 0,
    ];

    // Creates new file and creates 3 default templates
    function createFile($user){
        global $cart;
        // create file for appending
        $file = fopen("$user.txt", "a");
        fwrite($file, "Template1 ".implode(" ", $cart)."\n");
        fwrite($file, "Template2 ".implode(" ", $cart)."\n");
        fwrite($file, "Template3 ".implode(" ", $cart)."\n");
        fflush($file);
        fclose($file);
    }

    // takes in a new template as $string and the $templateNumber (1 through 3) and updates it
    function updateTemplate($user, $string, $templateNumber){
        $fileName = "$user.txt";
        $templateIndex = $templateNumber - 1;
        $file = file($fileName);
        $file[$templateIndex] = $string."\n"; // replace the line
        file_put_contents( $fileName , implode("", $file));
    }

    // Adds an order
    function addOrder($user, $order){
        $fileName = "$user.txt";
        $file = fopen($fileName, "a");
        fwrite($file, date("d-m-Y")." $order\n");
        fflush($file);
        fclose($file);
    }

    // returns the template number (1 through 3) as a string
    function getTemplate($user, $templateNumber){
        $fileName = "$user.txt";
        $templateIndex = $templateNumber - 1;
        $file = file($fileName);
        return $file[$templateIndex];
    }

    // Gets 5 most recent orders as an array of strings
    function getRecentOrders($user){
        $fileName = "$user.txt";
        $file = file($fileName);
        $orders = array();
        for($i = sizeof($file)-1 ; $i > sizeof($file)-6 ; $i--)
            // if this is a valid line and starts with a date
            if(isset($file[$i]) && preg_match("/\d{2}-\d{2}-\d{4}/", explode(" ", $file[$i])[0]))
                $orders[] = $file[$i];
        return $orders;
    }

    // ToDo: templateStringToHTML
    // ToDo: HTMLToTemplateString
    // ToDo: orderToHTML


?>
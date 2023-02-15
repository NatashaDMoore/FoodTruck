<?php

if(isset($_POST['checkout'])) {

    // create arrays
    $quantity = array();

    foreach($_POST AS $key => $value) { // when posted, name will be $key and quantity will be $value
        if (strpos($key, 'quantity_') === 0) { // find the position of the word/ identify the right strings
            $quantity[substr($key,9)] = $value; // subtract the first 9 letters of the string
        }
    }

    // echo '<pre>';
    // print_r($quantity);
    // echo '</pre>';
    
}

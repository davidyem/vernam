<?php
//define("c", 6);if you want to use lower case(symbols in the range from 97 to 122)
define("c", 13);
if(!empty($_POST["messagetoencrypt"])) {
    $message = str_split(strtoupper(trim($_POST["messagetoencrypt"], " ")));
    foreach ($message as $mes => $value) {
        $key = random_int(0, 25);
        $keys[] .= $key . " ";
        if(ord($value) < 65 || ord($value) > 90) {
            $crypt[] .= " ";
        }
        else {
            $crypt[] .= chr((ord($value) + $key - c) % 26 + ord("a"));
        }
    }
    $crypt = implode($crypt);
    $keys = implode($keys);
    $resultencrypt = array('textencrypt' => $crypt, 'keys' => $keys);
    echo json_encode($resultencrypt);
}
?>
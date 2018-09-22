<?php
//define("c", 6);if you want to use lower case(symbols in the range from 97 to 122)
define("c", 13);
if(!empty($_POST['messagetodecrypt']) && !empty($_POST['keys'])) {
    $message = str_split(strtoupper($_POST['messagetodecrypt']));
    $keys = explode(" ", trim($_POST['keys'], " "));
    foreach ($message as $mes => $val) {
        if(ord($val) < 65 || ord($val) > 90) {
            $decrypt[] .= " ";
        }
        else {
            $decrypt[] .= chr((ord($val) - $keys[$mes] - c) % 26 + ord("a"));
        }
    }
    $decrypt = implode($decrypt);
    $resultdecrypt = array('textdecrypt' => $decrypt, 'arr' => $keys);
    echo json_encode($resultdecrypt);
}
?>
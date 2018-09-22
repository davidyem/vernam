<?php
define("c", 13);
//if(isset($_POST['submitencrypt'])){
if(!empty($_POST["messagetoencrypt"])) {
    $message = $_POST["messagetoencrypt"];
    $message = str_split(strtoupper(trim($message, " ")));
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
//}
?>
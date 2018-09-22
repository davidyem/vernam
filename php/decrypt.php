<?php
define("c", 13);
//if(isset($_POST['submitdecrypt'])){
if(!empty($_POST['messagetodecrypt']) && !empty($_POST['keys'])) {
    $message = str_split(strtoupper($_POST['messagetodecrypt']));
    $keys = explode(" ", trim($_POST['keys'], " "));
    foreach ($message as $mes => $val){
        if(ord($val) < 65 || ord($val) > 90 ) {
            $decrypt[] .= " ";
        }else{
            $decrypt[] .= chr((ord($val) - $keys[$mes] - c)%26 + ord("a"));
         }
    }
    $decrypt = implode($decrypt);
    $resultdecrypt = array('textdecrypt' => $decrypt, 'arr' => $keys);
    echo json_encode($resultdecrypt);
}
//}
?>
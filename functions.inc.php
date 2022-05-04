<?php
function pr($arr){
echo '<pre>';
print_r($arr);
}

function prx($arr){
echo '<pre>';
print_r($arr);
die();
}

function get_safe_value($con,$str){
    if($str!=''){
    $str=trim($str);//to remove spaces so as to avoid common names
    return mysqli_real_escape_string($con,$str);
}
}
?>
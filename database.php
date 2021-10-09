<?php
$connection = mysqli_connect('localhost','root','','multipleimg');

if(!$connection){
    echo 'error occur';
}
else{
    echo 'connected';
}
?>
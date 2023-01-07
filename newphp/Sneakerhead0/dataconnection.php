<?php 
$server = "127.0.0.1:8111";
$username = "root";
$password = "";
$database = "sneakerhead" ;

$conn = mysqli_connect($server,$username,$password,$database) ;
if ($conn) {
    echo "Connected success" ;
 }
 else {
     echo " not connected";
 }



?>
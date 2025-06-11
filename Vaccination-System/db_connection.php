<?php
$host="localhost";
$username="root";
$password="";
$db_name="vaccination_system";

$conn=mysqli_connect($host,$username,$password,$db_name);

if(!$conn){
    echo "Connection Error! Can't Connect to Database";
}

?>
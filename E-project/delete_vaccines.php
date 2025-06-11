<?php 
include "db_connection.php";
$id=$_GET["id"];
$query="DELETE FROM vaccines WHERE id='$id'";
$run=mysqli_query($conn,$query);
if($run){
    echo "<script>alert('Successfully Delete Vaccine'); window.location.href='vaccines_manage.php';;</script>";
}
else{
    echo "Error".mysqli_error($conn);
}

?>
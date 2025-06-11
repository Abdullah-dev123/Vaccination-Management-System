<?php 
include "db_connection.php";
$id=$_GET["id"];
$query = "DELETE FROM `users` WHERE `id` = '$id'";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<script>alert('Successfully Deleted The User'); window.location.href='users_records.php';;</script>";
}

?>
<?php
include "db_connection.php";
$id = $_GET["id"];
$query = "DELETE FROM `users` WHERE `id` = '$id'";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<script>alert('Record deleted successfully'); window.location.href='manage_hospitals.php';; </script>";
} else {
    echo "Error While deleting record: " . mysqli_error($conn);
}

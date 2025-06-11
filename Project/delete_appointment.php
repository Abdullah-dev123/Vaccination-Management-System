<?php
include "db_connection.php";
$id = $_GET["id"];
$query = "DELETE FROM appointments WHERE id='$id'";
$run = mysqli_query($conn, $query);
if ($run) {
    echo "<script>alert('Successfully Deleted The Appointment User'); window.location.href='manage_appoinmnets.php';; </script>";
} else {
    echo "Error" . mysqli_error($conn);
}


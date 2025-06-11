<?php 
include "db_connection.php";

if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    $status = $_POST["status"];

    $query = "UPDATE appointments SET status='$status' WHERE id='$id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        header("Location: manage_appoinmnets.php");
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Appointment</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #1f1f1f;
      padding: 40px;
      border-radius: 10px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    h2 {
      text-align: center;
      color: #00bcd4;
      margin-bottom: 25px;
    }

    input, select {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      border: none;
      border-radius: 6px;
      background-color: #2a2a2a;
      color: #ffffff;
    }

    input[type="submit"] {
      background-color: #00bcd4;
      color: #000;
      font-weight: bold;
    }

    input[type="submit"]:hover {
      background-color: #0097a7;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Update Appointment Status</h2>
    <form method="POST">
      <select name="status" required>
        <option value="">-- Select New Status --</option>
        <option value="pending">Pending</option>
        <option value="approved">Approved</option>
        <option value="rejected">Rejected</option>
      </select>
      <input type="submit" name="submit" value="Update Status">
    </form>
  </div>

</body>
</html>

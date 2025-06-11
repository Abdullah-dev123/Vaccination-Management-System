<?php
include "db_connection.php";
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM vaccines WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $vaccine = mysqli_fetch_assoc($result);
}

// Update logic
if (isset($_POST['update'])) {
    $status = $_POST['status'];
    $update_query = "UPDATE vaccines SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $update_query);
    header("Location: vaccines_manage.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Vaccine Status</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 40px;
    }

    .form-container {
      background-color: #1f1f1f;
      border: 1px solid #333;
      padding: 30px;
      border-radius: 10px;
      max-width: 500px;
      margin: auto;
    }

    h2 {
      text-align: center;
      color: #00bcd4;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: #ccc;
    }

    select, button {
      margin-top: 10px;
    }

    .btn-custom {
      background-color: #00bcd4;
      color: #000;
    }

    .btn-custom:hover {
      background-color: #0097a7;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Update Vaccine Status</h2>

    <form method="POST">
      <div class="form-group">
        <label for="status">Vaccine Status:</label>
        <select class="form-control" name="status" id="status" required>
          <option value="">Select Status</option>
          <option value="Available" <?= ($vaccine['status'] == 'Available') ? 'selected' : '' ?>>Available</option>
          <option value="Unavailable" <?= ($vaccine['status'] == 'Unavailable') ? 'selected' : '' ?>>Unavailable</option>
        </select>
      </div>

      <button type="submit" name="update" class="btn btn-custom btn-block">Update Status</button>
    </form>
  </div>

</body>
</html>

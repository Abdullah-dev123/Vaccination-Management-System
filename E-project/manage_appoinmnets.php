<?php
include "db_connection.php";
session_start();

$query = "SELECT * FROM appointments";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Appointments - Vaccination Management System</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 30px;
    }

    h2 {
      text-align: center;
      color: #00bcd4;
    }

    .table th {
      background-color: #00bcd4;
      color: #000;
    }

    .table td,
    .table th {
      text-align: center;
      vertical-align: middle;
    }

    a.btn {
      margin: 0 3px;
    }
  </style>
</head>

<body>
  <h2>Manage All Appointments</h2>

  <table class="table table-bordered table-dark table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Patient Name</th>
        <th>Vaccine Name</th>
        <th>Patient Email</th>
        <th>Date</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
      ?>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $row['patient_name']; ?></td>
          <td><?php echo $row['vaccine_name']; ?></td>
          <td><?php echo $row['patient_email']; ?></td>
          <td><?php echo $row['appointment_date']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['created_at']; ?></td>

          <td>
            <a href="update_appointment.php?id=<?= $id ?>" class="btn btn-primary btn-sm">Update Status</a>
            <a href="delete_appointment.php?id=<?= $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete Appointment</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</body>

</html>
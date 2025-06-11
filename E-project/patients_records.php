<?php
include "db_connection.php";
session_start();
$query="SELECT id,name,email,role,created_at FROM users WHERE role='patient'";
$result=mysqli_query($conn ,$query);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Vaccines - Vaccination Management System</title>
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

    table {
      width: 100%;
      margin-top: 30px;
    }

    th,
    td {
      padding: 12px;
      text-align: center;
      border: 1px solid #333;
    }

    th {
      background-color: #00bcd4;
      color: #000;
    }
  </style>
</head>

<body>

  <h2>Patients Management Page</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Created_at</th>
      <th>Operations</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
      ?>
        <tr>
          <td><?= $id ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['role'] ?></td>
          <td><?= $row['created_at'] ?></td>
          <td>
            <a href="update_user.php?id=<?= $id ?>" class="btn btn-primary btn-sm">Update</a>
            <a href="delete_appointment.php?id=<?= $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</a>
          </td>
        </tr>
      <?php } ?>

  </table>

</body>

</html>
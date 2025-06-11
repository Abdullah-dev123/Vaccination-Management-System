<?php
include "db_connection.php";
session_start();
$query = "SELECT * FROM users WHERE role='hospital'";
$result = mysqli_query($conn, $query);

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

  <h2>Hospital Management Page</h2>

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
        <td><?php echo $id; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['role']; ?></td>
        <td><?php echo $row['created_at']; ?></td>

        <td>
          <a href="insert_hospitals.php" class="btn btn-primary btn-sm">Insert Hospital</a>
          <a href="delete_hospitals.php?id=<?= $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this hospital?')">Delete Hospital</a>
        </td>
      </tr>
    <?php } ?>
  </table>

</body>

</html>
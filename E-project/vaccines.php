<?php
include "db_connection.php";
session_start();

$query = "SELECT * FROM vaccines";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Vaccines - Vaccination Management System</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

  <h2>Available Vaccines</h2>

  <table>
    <tr>
      <th>Vaccine Name</th>
      <th>Age Group</th>
      <th>Doses Required</th>
      <th>Status</th>
    </tr>

    <?php while ($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['age_group'] ?></td>
        <td><?= $row['doses_required'] ?></td>
        <td><?= $row['status'] ?></td>
      </tr>
    <?php } ?>

  </table>

</body>

</html>
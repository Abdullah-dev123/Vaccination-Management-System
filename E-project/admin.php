<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard - Vaccination System</title>
  <style>
    body {
      background-color: #121212;
      color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #1f1f1f;
      padding: 20px;
      text-align: center;
      border-bottom: 1px solid #333;
    }

    header h1 {
      color: #00bcd4;
      margin: 0;
    }

    .container {
      padding: 30px;
    }

    .card {
      background-color: #1f1f1f;
      border: 1px solid #333;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
    }

    .card h2 {
      color: #00bcd4;
      margin-bottom: 10px;
    }

    .card p {
      color: #ccc;
    }

    footer {
      background-color: #1f1f1f;
      text-align: center;
      padding: 20px;
      color: #777;
      border-top: 1px solid #333;
    }
    a{
      color: #00bcd4;
      text-decoration: none;
    }
    a:hover{
      color: #00bcd4;
      text-decoration: underline;
    }
    
  </style>
</head>
<body>

  <header>
    <h1>Admin Dashboard</h1>
  </header>

  <div class="container">

    <div class="card">
      <h2>Manage Hospitals</h2>
      <p>View, approve or reject hospital registrations.</p>
      <a href="manage_hospitals.php">Manage Hospitals</a>
    </div>

    <div class="card">
      <h2>Manage Vaccines</h2>
      <p>Add, update or remove vaccine data from the system.</p>
      <a href="vaccines_manage.php">Manage Vaccines</a>
    </div>

    <div class="card">
      <h2>View Appointments</h2>
      <p>See booked vaccine appointments from all patients.</p>
      <a href="manage_appoinmnets.php">Manage Appointments</a>
    </div>

    <div class="card">
      <h2>View Login Users</h2>
      <p>See Login Users and there details</p>
      <a href="users_records.php">Manage Users Records</a>
    </div>

  </div>

  <footer>
    &copy; 2025 Vaccination Management System - Admin Panel
  </footer>

</body>
</html>

<?php
include "db_connection.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo "<script>alert('Please login first to book an appointment.'); window.location.href='login.php';</script>";
    exit();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $vaccine_name=$_POST["vaccine_name"];
    $email=$_POST["email"];
    $date=$_POST["date"];
    $query="INSERT INTO appointments (patient_name,vaccine_name,patient_email,appointment_date) VALUES ('$name','$vaccine_name','$email','$date')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Appointment booked successfully!'); window.location.href='appointments.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Book Appointment</title>
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
      padding: 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    h2 {
      text-align: center;
      color: #00bcd4;
      margin-bottom: 20px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 6px;
      background-color: #2a2a2a;
      color: #ffffff;
    }

    input[type="submit"] {
      background-color: #00bcd4;
      color: #000;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0097a7;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Book Appointment</h2>
    <form method="POST" action="">
      <input type="text" name="name" placeholder="Patient Name" required />
      <input type="text" name="vaccine_name" placeholder="Vaccine Name" required />
      <input type="email" name="email" id="email" placeholder="Email" required />
      <input type="date" name="date" id="date" placeholder="Date" required />
      <input type="submit" name="submit" value="Book Appointment" />
    </form>
  </div>

</body>
</html>

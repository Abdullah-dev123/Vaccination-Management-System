<?php 
include "db_connection.php";
session_start();
if(!isset($_SESSION["email"])){
    echo "<script>alert('Please login first to view appointment details.'); window.location.href='login.php';</script>";
}
$data = null; 

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $vaccine_name = $_POST["vaccine_name"];
    $email = $_POST["email"];
    
    $sql = "SELECT patient_name, vaccine_name, patient_email, appointment_date, status FROM appointments WHERE patient_name='$name' AND vaccine_name='$vaccine_name' AND patient_email='$email'";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Track Appoinment- Vaccination Management System</title>
  <style>
    body {
      background-color: #121212;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .details-container {
      background-color: #1f1f1f;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.7);
      width: 100%;
      max-width: 450px;
    }

    h2 {
      text-align: center;
      color: #00bcd4;
      margin-bottom: 25px;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 6px;
      background-color: #2a2a2a;
      color: #fff;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #ccc;
    }
    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #00bcd4;
      color: #000;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 20px;
    }

    input[type="submit"]:hover {
      background-color: #0097a7;
    }

  </style>
</head>
<body>

  <div class="details-container">
    <h2>Enter Your Deatils to See Your Appointment Status</h2>
    <form method="POST" action="">
      <input type="text" name="name" placeholder="Name" required />
      <input type="text" name="vaccine_name" placeholder="Vaccine Name" required />
      <input type="email" name="email" placeholder="Patient Email" required>
      <input type="submit" name="submit" value="Submit" />
    </form>
  </div>
  <?php if ($data): ?>
    
  <div class="details-container" style="margin-top: 20px;">
    <h3>Status Found</h3>
    <p><strong>Name:</strong> <?php echo $data['patient_name']; ?></p>
    <p><strong>Vaccine Name:</strong> <?php echo $data['vaccine_name']; ?></p>
    <p><strong>Patient Email:</strong> <?php echo $data['patient_email']; ?></p>
    <p><strong>Appointment Date:</strong> <?php echo $data['appointment_date']; ?></p>
    <p><strong>Status:</strong> <?php echo $data['status']; ?></p>
  </div>
<?php endif; ?>

</body>
</html>

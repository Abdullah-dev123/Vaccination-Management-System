<?php 
include "db_connection.php";
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "INSERT INTO users (name,email,password,role) VALUES ('$name','$email','$password','$role')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Signup Successful! Please Login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Signup failed! Try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up - Vaccination Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      background-color: #121212;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .signup-container {
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
    input[type="email"],
    input[type="password"] {
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

    .radio-group {
      margin: 10px 0;
      display: flex;
      justify-content: space-between;
    }

    .radio-group label {
      font-weight: normal;
      display: flex;
      align-items: center;
      gap: 5px;
      color: #ccc;
    }

    input[type="radio"] {
      accent-color: #00bcd4;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #00bcd4;
      color: #000;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      margin-top: 20px;
      transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #0097a7;
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
    }

    .login-link a {
      color: #00bcd4;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="signup-container">
    <h2><i class="fas fa-user-plus"></i> Create an Account</h2>
    <form method="POST" action="">
      <input type="text" name="name" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email Address" required />
      <input type="password" name="password" placeholder="Password" required />

      <label><i class="fas fa-user-tag"></i> Select Role:</label>
      <div class="radio-group">
        <label><input type="radio" name="role" value="patient" required /> Patient</label>
        <label><input type="radio" name="role" value="hospital" required /> Hospital</label>
      </div>

      <input type="submit" name="submit" value="Sign Up" />
    </form>

    <div class="login-link">
      Already have an account? <a href="login.php">Login here</a>
    </div>
  </div>

</body>
</html>

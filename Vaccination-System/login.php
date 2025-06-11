<?php
include "db_connection.php";
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_array($result);

    if ($user) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            echo "<script>alert('Welcome Admin'); window.location.href='admin.php';</script>";
        } elseif ($user['role'] == 'hospital') {
            echo "<script>alert('Welcome Hospital'); window.location.href='hospital.php';</script>";
        } else {
            echo "<script>alert('Login Successful'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Vaccination Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #121212;
      color: #ffffff;
    }

    nav {
      background-color: #1a1a1a;
      display: flex;
      justify-content: center;
      padding: 15px 0;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    nav a {
      color: #ccc;
      text-decoration: none;
      margin: 0 10px;
      padding: 8px 20px;
      transition: all 0.3s;
      border-radius: 5px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    nav a:hover {
      background-color: #00bcd4;
      color: #000;
      transform: translateY(-2px);
    }

    nav a.login-btn {
      background-color: #00bcd4;
      color: #000;
      font-weight: 600;
    }

    .login-container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #1f1f1f;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 188, 212, 0.2);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #00bcd4;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #ccc;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 6px;
      background-color: #2d2d2d;
      color: #fff;
      font-size: 1rem;
    }

    .form-group input:focus {
      outline: none;
      box-shadow: 0 0 5px #00bcd4;
    }

    .login-btn-submit {
      background-color: #00bcd4;
      color: #000;
      padding: 12px;
      width: 100%;
      border: none;
      border-radius: 6px;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .login-btn-submit:hover {
      background-color: #0097a7;
    }

    .login-footer {
      text-align: center;
      margin-top: 20px;
    }

    .login-footer a {
      color: #00bcd4;
      text-decoration: none;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

    @media (max-width: 500px) {
      .login-container {
        margin: 60px 20px;
        padding: 30px;
      }
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Login</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="email"><i class="fas fa-envelope"></i> Email</label>
      <input type="email" name="email" id="email" required />
    </div>
    <div class="form-group">
      <label for="password"><i class="fas fa-lock"></i> Password</label>
      <input type="password" name="password" id="password" required />
    </div>
    <button type="submit" name="submit" class="login-btn-submit">Login</button>
  </form>
  <div class="login-footer">
    <p>Don't have an account? <a href="signup.php">Register here</a></p>
  </div>
</div>

</body>
</html>

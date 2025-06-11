<?php 
include "db_connection.php";
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password=$_POST["password"];
    $role=$_POST["role"];
    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name','$email','$password','$role')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Successfully Inserted Hospital $name'); window.location.href='manage_hospitals.php';;</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert Hospital - Vaccination Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            background-color: #1f1f1f;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
        }

        h2 {
            text-align: center;
            color: #00bcd4;
            margin-bottom: 30px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 6px;
            background-color: #2a2a2a;
            color: #ffffff;
            font-size: 1rem;
        }

        button {
            background-color: #00bcd4;
            color: #000;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0097a7;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Insert New Hospital</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Hospital Name" required />
            <input type="email" name="email" placeholder="Hospital Email" required />
            <input type="password" name="password" placeholder="password" required /> 
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="hospital">Hospital</option>
            </select>
            <button type="submit" name="submit">Insert Hospital</button>
        </form>
    </div>
</body>

</html>
<?php
include "db_connection.php";
session_start();

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $age_group = $_POST["age_group"];
    $doses_required = $_POST["doses_required"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    $query = "INSERT INTO vaccines (name, age_group, doses_required, description, status)
              VALUES ('$name', '$age_group', '$doses_required', '$description', '$status')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Vaccine Inserted Successfully!'); window.location.href='vaccines_manage.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error inserting vaccine! Please try again.'); window.location.href='vaccines.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert Vaccine - Vaccination Management System</title>
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
        <h2>Insert New Vaccine</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Vaccine Name" required />
            <input type="text" name="age_group" placeholder="Age Group (e.g. 0-1 years)" required />
            <input type="number" name="doses_required" placeholder="Doses Required" min="1" required />
            <textarea name="description" rows="3" placeholder="Description" required></textarea>
            <select name="status" required>
                <option value="">Select Status</option>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select>
            <button type="submit" name="submit">Insert Vaccine</button>
        </form>
    </div>
</body>

</html>
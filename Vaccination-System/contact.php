<?php
include "db_connection.php";
session_start();

// Form submit handling
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $msg = $_POST["message"];

    $query = "INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$msg')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Form Submitted Successfully!'); window.location.href='contact.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error while submitting the form! Please try again.'); window.location.href='contact.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - Vaccination Management System</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }

        nav {
            background-color: #1a1a1a;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        nav a {
            color: #ccc;
            text-decoration: none;
            margin: 0 15px;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #00bcd4;
            color: #000;
            border-radius: 5px;
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
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 6px;
            background-color: #2a2a2a;
            color: #ffffff;
            font-size: 1rem;
        }

        input::placeholder,
        textarea::placeholder {
            color: #aaa;
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
    <nav>
        <a href="index.php">Home</a>
        <a href="vaccines.php">Vaccines</a>
        <a href="login.php">Login</a>
        <a href="contact.php">Contact</a>
    </nav>
    <div class="container">
        <h2>Contact Us</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Name" required />
            <input type="email" name="email" placeholder="Your Email" required />
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit" name="submit">Send Message</button>
        </form>
    </div>

</body>

</html>
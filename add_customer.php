<?php
    session_start();
    if (isset($_SESSION["customer"])) {
        header('location: customers.php');
    }

    if(isset($_POST['submit']) and isset($_POST['username']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['city'])){
        include('connection.php');

        $user_id = $_SESSION["user"]["id"];
        $customer_id = rand(1, 2000);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city =  $_POST['city'];

        $sql_items = "INSERT INTO `items`(`customer_id`) VALUES ('$customer_id')";
        mysqli_query($conn,$sql_items);

        $sql_customer = "INSERT INTO `customers`(`id`, `customer_id`, `username`, `email`, `phone`, `city`) VALUES ('$user_id','$customer_id','$username','$email','$phone','$city')";
        mysqli_query($conn,$sql_customer);

        header('Location: customers.php');
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Customer registration Form</title>
    <style>
        body {
            background-color: #f2f2f2;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }
        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Registration Form</h2>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Your username..">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email..">

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="Your phone..">

        <label for="city">City</label>
        <input type="text" id="city" name="city" placeholder="Your city..">

        <button type="submit" name="submit">Register</button>
    </form>

</body>
</html>

<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('location: login.php');
} else {
    $user = $_SESSION["user"];
}

    if(isset($_POST['submit']) and isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['email']) and isset($_POST['password'])){
        $id = $user["id"];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $created = $user["created"];
        $date =  date('Y-m-d');

        include('connection.php');
        
        $sql = "UPDATE `users` SET `firstname`='$firstname', `lastname`='$lastname', `password`='$pass', `email`='$email', `created`=`$created`, `updated`='$date' WHERE `id`='$id'";
        mysqli_query($conn,$sql);
        header('Location: dashboard.php');
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Form</title>
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
        <label for="fname">First name</label>
        <input type="text" id="fname" name="fname" placeholder=<?= $user["firstname"] ?>>

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" placeholder=<?= $user["lastname"] ?>>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder=<?= $user["email"] ?>>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder=<?= $user["password"] ?>>

        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>

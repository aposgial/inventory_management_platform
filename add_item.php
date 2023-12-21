<?php
    session_start();
    if (isset($_SESSION["customer"])) {
        header('location: customers.php');
    }

    if(isset($_POST['submit']) and isset($_POST['item_id']) and isset($_POST['quantity']) and isset($_POST['price'])){
        include('connection.php');

        $customer_id = $_SESSION["customer_id"];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];
        $price =  $_POST['price'];


        $sql_customer = "INSERT INTO `items`(`item_id`, `quantity`, `price`) VALUES ('$item_id','$quantity','$price')";
        mysqli_query($conn,$sql_customer);

        header('Location: items.php');
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Item registration Form</title>
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
        <h2>Add Item Form</</label>
        <input type="text" id="item_id" name="item_id" placeholder="Item ID..">

        <label for="quantity">Quantity</label>
        <input type="text" id="quantity" name="quantity" placeholder="Quantity..">

        <label for="price">Price</label>
        <input type="text" id="price" name="price" placeholder="Price..">

        <button type="submit" name="submit">Add Item</button>
    </form>


</body>
</html>

<?php
    session_start();
    if (!isset($_SESSION["user_id"])) {
        header('location: login.php');
    } else {
        $customer_id = $_SESSION["customer_id"];
    }
    include 'connection.php';

    $sql="DELETE FROM customers WHERE customer_id=$customer_id";
    mysqli_query($conn,$sql);

    header('Location: customers_list.php');
?>
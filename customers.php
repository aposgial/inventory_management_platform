<?php
    session_start();

    if (!isset($_SESSION["user"])) {
        header('location: login.php');
    } else {
        $user = $_SESSION["user"];
    }
    $user_id = $user["id"];

    include('connection.php');
    $sql = "SELECT * FROM `customers` WHERE id = '$user_id'";
    $result_customers = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }
        
        #sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        #sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #555;
        }
        
        #sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }
        
        #main-content {
            margin-left: 200px;
            padding: 20px;
            box-sizing: border-box;
        }

        #user-info {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }
        #user-info span {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
    <div id="sidebar">
        <div class="user-info">
        <span><?= $user["firstname"] ?></span>
    </div>

    <style>
        .user-info {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }
        .user-info span {
            font-weight: bold;
        }
    </style>

        <ul>
            <li><a href="/roumen/inventory_management_platform/dashboard.php">Dashboard</a></li>
            <li><a href="/roumen/inventory_management_platform/customers_list.php">Customers</a></li>
            <li><a href="/roumen/inventory_management_platform/add_customer.php">Add customer</a></li>
        </ul>
    </div>
    
    <div id="main-content">
        <div class="logout-button">
            <a href="/roumen/inventory_management_platform/logout.php">Logout</a>
        </div>
        <br>
        <br>
        <br>

        <table width="100%">
            <thead>
                <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Customer ID</th>
                <th>Total quantity</th>
                <th>Total price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if ($result_customers){
                        while($data=mysqli_fetch_assoc($result_customers)){
                            echo'<tr>
                            <td>'.$data['username'].'</td>
                            <td>'.$data['email'].'</td>
                            <td>'.$data['customer_id'].'</td>';

                            $customer_id = $data['customer_id'];
                            $sql = "SELECT * FROM `items` WHERE customer_id = '$customer_id'";
                            $result_items = mysqli_query($conn,$sql);

                            $sum_quantity = 0;
                            $sum_price = 0;
                            while($item=mysqli_fetch_assoc($result_items)){
                                $sum_quantity += $item['quantity'];
                                $sum_price += (float) $item['price'];
                            }
                            echo'<td>'.$sum_quantity.'</td>
                            <td>$'.$sum_price.'</td>
                            </tr>';
                        }
                    }
                        
                ?>
            </tbody>
        </table>

    </div>


        <style>
            .logout-button {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: #f2f2f2;
                border: 1px solid #ccc;
                padding: 10px;
                border-radius: 5px;
                font-size: 16px;
                color: #333;
            }
            .logout-button a {
                text-decoration: none;
                color: #333;
            }
        </style>

</body>
</html>

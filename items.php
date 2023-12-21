<?php
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header('location: customers.php');
    } else {
        $user = $_SESSION["user"];
        $customer_id = $_SESSION["customer_id"];
    }

    include('connection.php');
    $sql = "SELECT * FROM `items` WHERE customer_id = '$customer_id'";
    $result_items = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
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
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #3e8e41;
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
            <li><a href="/roumen/inventory_management_platform/customers_list.php">Customers</a></li>
            <li><a href="/roumen/inventory_management_platform/add_item.php">Add</a></li> 
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
                <th>Item ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if ($result_items){
                        while($data=mysqli_fetch_assoc($result_items)){
                            $_SESSION["item_id"] = $data['item_id'];
                            echo'<tr>
                            <td>'.$data['item_id'].'</td>
                            <td>'.$data['quantity'].'</td>
                            <td>$'.$data['price'].'</td>
                            <td>
                                <a href="/roumen/inventory_management_platform/delete_item.php" class="button">Delete</a>
                            </td>
                            <tr>';

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

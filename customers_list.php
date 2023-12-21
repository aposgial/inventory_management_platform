<?php
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header('location: customers.php');
    } else {
        $user = $_SESSION["user"];
        $user_id = $_SESSION["user_id"];
    }

    include('connection.php');
    $sql = "SELECT * FROM `customers` WHERE id = '$user_id'";
    $result_customers = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
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
            <li><a href="/roumen/inventory_management_platform/customers.php">Customers dashboard</a></li> 
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
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Items</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if ($result_customers){
                        while($data=mysqli_fetch_assoc($result_customers)){
                            $_SESSION["customer_id"] = $data['customer_id'];
                            echo'<tr>
                            <td>'.$data['customer_id'].'</td>
                            <td>'.$data['username'].'</td>
                            <td>'.$data['email'].'</td>
                            <td>'.$data['phone'].'</td>
                            <td>'.$data['city'].'</td>
                            <td>
                                <a href="/roumen/inventory_management_platform/items.php" class="button">Items</a>
                            </td>
                            <td>
                                <a href="/roumen/inventory_management_platform/update_customer.php" class="button">Update</a>
                            </td>
                            <td>
                                <a href="/roumen/inventory_management_platform/delete_customer.php" class="button">Delete</a>
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

<?php
    session_start();

    if (!isset($_SESSION["user"])) {
        header('location: login.php');
    }
    $user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>dashboard</title>
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
            <li><a href="/roumen/inventory_management_platform/dashboard.php">dashboard</a></li>
            <li><a href="/roumen/inventory_management_platform/customers.php">Customers</a></li>
            <li><a href="/roumen/inventory_management_platform/update_user.php">Update profile</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    
    <div id="main-content">
        <div class="logout-button">
            <a href="/roumen/inventory_management_platform/logout.php">Logout</a>
        </div>
        <h1>Welcome to my website</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, velit vel aliquet aliquam, elit mi tristique ex, vel lacinia odio augue vel nulla. Donec nec lacus vel velit accumsan dignissim. Sed euismod, velit vel aliquet aliquam, elit mi tristique ex, vel lacinia odio augue vel nulla. Donec nec lacus vel velit accumsan dignissim.</p>
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

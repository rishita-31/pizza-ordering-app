<?php
require("login_php.php");
session_start();
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body{
            font-family: 'Source Sans Pro', sans-serif;
            margin: 0px;
            background-color:black;
        }
        .header{
            font-family: sans-serif;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background-color: #b30000;
            color: whitesmoke;
        }
        .btn{
            width: auto;
            height: auto;
            font-size: 20px;
            padding: 0px;
        }
        .link h4{
            font-family: sans-serif;
            padding: 10px 20px;
            
        }
        .link h4 a{
            color: whitesmoke;
            text-decoration: none;

        }
        .link h4 a:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>
<div class="header">
    <a class="navbar-brand" href="adminPanel.php" style="color:whitesmoke;"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicious</small></a>
    <h2>ADMIN PANEL - <?php echo htmlspecialchars($_SESSION['username']) ?></u></h2>
    <form action="logout_process.php" method="POST">
        <button type="submit" name="logout">LOG OUT</button>
    </form>
</div>
<div class="link"><h4><a href="msg.php">Messages</a></h3></div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
        <table class="table table-dark table-striped text-center" style="border: 2px solid #ccc;">
            <thead>
                <tr>
                <th scope="col" style="border: 2px solid #ccc;">Order ID</th>
                <th scope="col" style="border: 2px solid #ccc;">Customer Name</th>
                <th scope="col" style="border: 2px solid #ccc;">Phone No</th>
                <th scope="col" style="border: 2px solid #ccc;">Address</th>
                <th scope="col" style="border: 2px solid #ccc;">Payment Method</th>
                <th scope="col" style="border: 2px solid #ccc;">Orders</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM `users`";
                    $user_result = mysqli_query($con,$query);
                    while($user_fetch = mysqli_fetch_assoc($user_result))
                    {
                        echo "<tr>
                            <td style='border: 2px solid #ccc;'>$user_fetch[order_id]</td>
                            <td style='border: 2px solid #ccc;'>$user_fetch[fullname]</td>
                            <td style='border: 2px solid #ccc;'>$user_fetch[phonenumber]</td>
                            <td style='border: 2px solid #ccc;'>$user_fetch[youraddress]</td>
                            <td style='border: 2px solid #ccc;'>$user_fetch[pay_mode]</td>
                            <td style='border: 2px solid #ccc;'>
                                <table class='table table-dark table-striped text-center' style='border: 2px solid #ccc;'>
                                    <thead>
                                        <tr>
                                            <th scope='col' style='border: 2px solid #ccc;'>Item Name</th>
                                            <th scope='col' style='border: 2px solid #ccc;'>Price</th>
                                            <th scope='col' style='border: 2px solid #ccc;'>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        ";
                        $order_query = "SELECT * FROM `orders` WHERE order_id = $user_fetch[order_id]";
                        $order_result = mysqli_query($con,$order_query);
                        while($order_fetch = mysqli_fetch_assoc($order_result))
                        {
                            echo "<tr>
                                <td style='border: 2px solid #ccc;'>$order_fetch[pname]</td>
                                <td style='border: 2px solid #ccc;'>$order_fetch[price]</td>
                                <td style='border: 2px solid #ccc;'>$order_fetch[quantity]</td>
                            </tr>";
                        }
                        echo "
                                    </tbody>
                                </table>
                            </td>
                        </tr>";
                    }
                ?>             
            </tbody>
        </table>
        </div>
    </div>
</div>   
<?php
    if(isset($_POST['logout']))
    {
        session_destroy();
        header("location: login.php");
    }
?>
</body>
</html>
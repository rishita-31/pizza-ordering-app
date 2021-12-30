<?php 
session_start();

$con = mysqli_connect("localhost","root","","pizza_app","3307");

if(mysqli_connect_error()){
    echo "<script>
        alert('Cannot connect to database');
        window.location.href='order.php';
    </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
    if(isset($_POST['purchase']))
    {
        $query1 = "INSERT INTO `users`(`fullname`, `phonenumber`, `youraddress`, `pay_mode`) VALUES ('$_POST[fullname]','$_POST[phonenumber]','$_POST[youraddress]','$_POST[pay_mode]')";

        if(mysqli_query($con,$query1))
        {
            $order_id = mysqli_insert_id($con);
            $query2 = "INSERT INTO `orders`(`order_id`, `pname`, `price`, `quantity`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($con,$query2);
            if($stmt){
                mysqli_stmt_bind_param($stmt,"isii",$order_id,$pname,$price,$quantity);
                foreach($_SESSION['cart'] as $key => $values){
                    $pname = $values['pname'];
                    $price = $values['price'];
                    $quantity = $values['quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                    alert('Your order has been placed.');
                    window.location.href='index.html';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('SQL Query Prepare ERROR');
                    window.location.href='order.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
                alert('SQL ERROR');
                window.location.href='order.php';
            </script>";
        }
    }
}
?>
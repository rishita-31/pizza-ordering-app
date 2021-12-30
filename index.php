<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_POST["add_to_cart"])){
        if(isset($_SESSION['cart'])){
            $my_items = array_column($_SESSION['cart'],'pname');
            if(in_array($_POST['pname'],$my_items)){
                echo "<script>
                alert('Item Already Added!');
                window.location.href='index.html';
                </script>";
            }
            else{
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('pname'=>$_POST["pname"],'price'=>$_POST["price"],'quantity'=>1);
            echo "<script>
                alert('Item Added to Cart!');
                window.location.href='index.html';
                </script>";
            }
        }else{
            $_SESSION['cart'][0] = array('pname'=>$_POST["pname"],'price'=>$_POST["price"],'quantity'=>1);
            echo "<script>
                alert('Item Added to Cart!');
                window.location.href='index.html';
                </script>";
        }
    }
    if(isset($_POST['remove_item'])){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['pname']==$_POST['pname']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                alert('Item Removed');
                window.location.href='order.php';
                </script>";
            }
        }
    }
    if(isset($_POST['Mod_Quantity'])){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['pname']==$_POST['pname']){
                $_SESSION['cart'][$key]['quantity']=$_POST['Mod_Quantity'];
                echo "<script>
                window.location.href='order.php';
                </script>";
            }
        }
    }
}
?>
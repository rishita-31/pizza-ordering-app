<?php
function usercontact(){
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pizza_app";
	$db_port = "3307";

	$conn = new mysqli($host, $username, $password, $dbname, $db_port);

	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
	}else{
	$names = $_POST['names'];
	$email = $_POST['email'];
    $subjects = $_POST['subjects'];
	$messages = $_POST['messages'];

	$sql ="INSERT INTO contact (names, email, subjects, messages) VALUES('$names','$email','$subjects','$messages')";

    if(mysqli_query($conn, $sql)){
        echo '<script type="text/javascript">alert("Your message has been recorded successfully.");</script>';
    }else{
        echo "Error: ".$sql.mysqli_error($conn);
    }

	mysqli_close($conn);  
    header('location:contact.html');
}}
if(isset($_POST['submit'])){
    usercontact();
}

?> 
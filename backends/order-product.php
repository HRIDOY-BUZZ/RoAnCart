<?php

session_start();

try {

    if (!file_exists('connection-pdo.php' ))
        throw new Exception();
    else
        require_once('connection-pdo.php' );

} catch (Exception $e) {

	$arr = array ('code'=>"0",'msg'=>"There were some problem in the Server! Try after some time!");

	echo json_encode($arr);

	exit();

}

if (!isset($_SESSION['user']) || !isset($_SESSION['user_id'])) {
	$_SESSION['msg'] = "You must Log In First to Order a Product!";
	header('location: ../products.php');
	exit();
}

if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = "Invalid product item! Please try again!";
	header('location: ../products.php');
	exit();
}

date_default_timezone_set("Asia/Dhaka");

$product_id = $_REQUEST['id'];

$product_name = $_REQUEST['name'];

$price = $_REQUEST['price'];

$user_name = $_SESSION['user'];

$user_id = $_SESSION['user_id'];

$order_id = "TVP" . strval(mt_rand(100000, 999999));

$timest = date("d:m:Y h:i:sa");


$sql = "INSERT INTO orders(order_id,user_id,product_id,product_name,user_name,price, timestamp) VALUES(?,?,?,?,?,?,?)";

$query  = $pdoconn->prepare($sql);

if ($query->execute([$order_id, $user_id, $product_id, $product_name, $user_name, $price, $timest])) {

	$_SESSION['msg'] = 'Order Placed! Your Order ID is : '.$order_id.'. Check Your Cart for more details.';

	header('location: ../products.php');

} else {

	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

	header('location: ../products.php');

}

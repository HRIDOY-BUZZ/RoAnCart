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

if($_GET['id'] == $_SESSION['user_id'])
{
    $user_id = $_GET['id'];

    $sql = 'SELECT * FROM cart WHERE user_id = '.$user_id;

    $query  = $pdoconn->prepare($sql);

    if($query->execute())
    {
        $cart = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($cart as $order)
        {
            $sql = "INSERT INTO orders(order_id,user_id,product_id,product_name,quantity,user_name,price,timestamp) VALUES(?,?,?,?,?,?,?,?)";
            $query  = $pdoconn->prepare($sql);
            $query->execute([$order['order_id'], $order['user_id'], $order['product_id'], $order['product_name'], $order['quantity'], $order['user_name'], $order['price'], $order['timestamp']]);
        }

        $sql = "DELETE FROM cart WHERE user_id = '".$user_id."'";
        $query  = $pdoconn->prepare($sql);
        if($query->execute())
        {
            $_SESSION['msg'] = "Order has been Successfully Placed.<br>Your Delivery Guy will contact you within 24 hour!";
	        header('location: ../orders.php');
        }
    }
    else
    {

    }
}



?>
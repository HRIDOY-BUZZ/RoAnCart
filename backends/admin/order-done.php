<?php

session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: ../../admin/order-list.php');

	exit();
	
}

if (!isset($_REQUEST['id'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: ../../admin/order-list.php');

	exit();
} 

	$id = $_REQUEST['id'];


	$sql = "SELECT * FROM orders WHERE order_id = ? LIMIT 1";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$id])) {
		$orders = $query->fetchAll(PDO::FETCH_ASSOC);
		$order = $orders[0];
		$timest = date("d:m:Y h:i:sa");

		$sql = "INSERT INTO done_orders(order_id,user_id,product_id,product_name,quantity,user_name,price,timestamp) VALUES(?,?,?,?,?,?,?,?)";
        $query  = $pdoconn->prepare($sql);
        $query->execute([$order['order_id'], $order['user_id'], $order['product_id'], $order['product_name'], $order['quantity'], $order['user_name'], $order['price'], $timest]);

		$sql = "DELETE FROM orders WHERE order_id = ?";
		$query  = $pdoconn->prepare($sql);
		if ($query->execute([$id])) {
			$_SESSION['msg'] = 'Order Delivered!';
			header('location: ../../admin/order-list.php');
		}
		else{
			$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';
			header('location: ../../admin/order-list.php');
		}
    } else {
		$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';
		header('location: ../../admin/order-list.php');
    }
?>
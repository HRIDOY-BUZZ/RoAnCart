<?php

session_start();
try {

    if (!file_exists('connection-pdo.php' ))
        throw new Exception();
    else
        require_once('connection-pdo.php' );

} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problems in the Server! Try after some time!';

	header('location: ../../orders.php');

	exit();

}

if (!isset($_REQUEST['id'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: ../orders.php');

	exit();
}

	$id = $_REQUEST['id'];

	//Getting Order Details
	$sql = "SELECT * FROM orders WHERE order_id = ?";
	$query  = $pdoconn->prepare($sql);
    $query->execute([$id]);
	$order = $query->fetchAll(PDO::FETCH_ASSOC);

	$product_id = $order[0]['product_id'];

	//Getting Product Details
	$sql = "SELECT * FROM product WHERE id = ".$product_id;
	$query  = $pdoconn->prepare($sql);
    $query->execute();
	$product = $query->fetchAll(PDO::FETCH_ASSOC);

	$stock = $product[0]['stock'];
	//Updating Stock
	$stock++;
	$sql = 'UPDATE product SET stock= '.$stock.' WHERE id = '.$product_id;
	$query  = $pdoconn->prepare($sql);
	$query->execute();

	//Deleteing Order
	$sql = "DELETE FROM orders WHERE order_id = ?";
    $query  = $pdoconn->prepare($sql);

    if ($query->execute([$id])) {

    	$_SESSION['msg'] = 'Order '.$id.' is Cancelled!';

		header('location: ../orders.php');

    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../orders.php');

    }

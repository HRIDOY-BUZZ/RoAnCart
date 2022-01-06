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
    $type = $_REQUEST['q'];

    //Getting Order Details
	$sql = "SELECT * FROM cart WHERE order_id = ?";
	$query  = $pdoconn->prepare($sql);
    $query->execute([$id]);
	$orders = $query->fetchAll(PDO::FETCH_ASSOC);
    $order = $orders[0];

	$product_id = $order['product_id'];
    $quantity = $order['quantity'];

	//Getting Product Details
	$sql = "SELECT * FROM product WHERE id = ".$product_id;
	$query  = $pdoconn->prepare($sql);
    $query->execute();
	$products = $query->fetchAll(PDO::FETCH_ASSOC);
    $product = $products[0];

	$stock = $product['stock'];

    if($type == "inc")
    {
        if($stock > 0)
        {
            //Decreasing Stock
            $stock--;
            $sql = 'UPDATE product SET stock= '.$stock.' WHERE id = '.$product_id;
            $query  = $pdoconn->prepare($sql);
            $query->execute();

            //Increasing Quantity
            $quantity++;
            $sql = 'UPDATE cart SET quantity = '.$quantity.' WHERE order_id = ?';
            $query  = $pdoconn->prepare($sql);
            if ($query->execute([$id])) {
                $_SESSION['msg'] = 'Quantity Incremented';
                header('location: ../orders.php');
            } else {
                $_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';
                header('location: ../orders.php');
            }
        
        }
        else
        {
            $_SESSION['msg'] = 'Sorry! Stock Not Available!';
            header('location: ../orders.php');
        }
    }
    else if($type == "dec")
    {
        if($quantity > 1)
        {
            //Increasing Stock
            $stock++;
            $sql = 'UPDATE product SET stock= '.$stock.' WHERE id = '.$product_id;
            $query  = $pdoconn->prepare($sql);
            $query->execute();

            //Decreasing Quantity
            $quantity--;
            $sql = 'UPDATE cart SET quantity = '.$quantity.' WHERE order_id = ?';
            $query  = $pdoconn->prepare($sql);
            if ($query->execute([$id])) {
                $_SESSION['msg'] = 'Quantity Decremented';
                header('location: ../orders.php');
            } else {
                $_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';
                header('location: ../orders.php');
            }
        
        }
        else
        {
            $_SESSION['msg'] = 'Quantity Cannot be less than 1!';
            header('location: ../orders.php');
        }
    }
    else
    {
        $_SESSION['msg'] = 'Sorry! Wrong Parameters!';
        header('location: ../orders.php');
    }

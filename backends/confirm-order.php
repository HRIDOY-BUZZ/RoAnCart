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
        var_dump($cart);
    }
    else
    {

    }
}



?>
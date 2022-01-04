<?php


session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' );

} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: ../../admin/product-list.php');

	exit();

}

if (!isset($_POST['name']) || !isset($_POST['desc'])) {

	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';

	header('location: ../../admin/product-list.php');

	exit();
}


if(isset($_POST['id'])) {
    $id = $_POST['id'];
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

	$sql = "UPDATE product SET cat_id=?,pname=?,price=?,stock=?,description=? WHERE id = ".$id;
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$category, $name, $price, $stock, $desc])) {
        $_SESSION['msg'] = 'Product Updated!';
            header('location: ../../admin/product-list.php');

    } else {

        $_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../../admin/product-list.php');

    }


}
?>
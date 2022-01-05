
<?php

require('backends/connection-pdo.php');

$arr_all = array();

if (isset($_SESSION['user_id'])) {

	$sql = 'SELECT * FROM orders WHERE user_id = "'.$_SESSION['user_id'].'"';
	$query  = $pdoconn->prepare($sql);
	$query->execute();
 	$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

}





?>


<section class="fcategories">

	<div class="container">

		<?php

			if (isset($_SESSION['msg'])) {
				echo '<div class="section pink center" style="margin: 10px; padding: 3px 10px; margin-top: 35px; border: 2px solid black; border-radius: 5px; color: white;">
						<p><b>'.$_SESSION['msg'].'</b></p>
					</div>';

				unset($_SESSION['msg']);
			}
		?>

		<div class="section white center">
			<h3 class="header">Previous Orders!</h3>
		</div>

		<?php if (count($arr_all) == 0) {
	echo '<div class="section gray center no-order">
			<p class="header"><b>Hi there! You do not have any orders pending in the Cart!<br>Please make some orders first!</b></p>
		</div>';
} else {  ?>

    <table class="centered responsive-table">
        <thead>
			<tr>
				<th>Order ID</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Order Time</th>
				<th>Status</th>
			</tr>
        </thead>

        <tbody>
        <?php
			$cnt = 0;
			foreach ($arr_all as $key) {

        ?>
        <tr style="background: aliceblue;">
            <td><?php echo $key['order_id']; ?></td>
            <td><?php echo $key['product_name']; ?></td>
			<td><?php echo $key['quantity']; ?> pcs</td>
			<td><?php echo $key['price']*$key['quantity']; ?> BDT</td>
            <td><?php echo $key['timestamp']; ?></td>
            <td><span class="badge" data-badge-caption="">Pending Deliver</span></td>
        </tr>

        <?php
				$cnt++;
			}

			$sql = 'SELECT * FROM done_orders WHERE user_id = "'.$_SESSION['user_id'].'"';
			$query  = $pdoconn->prepare($sql);
			if($query->execute())
			{
				$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

				$cnt = 0;
				foreach ($arr_all as $key) {

		?>
			<tr>
				<td><?php echo $key['order_id']; ?></td>
				<td><?php echo $key['product_name']; ?></td>
				<td><?php echo $key['quantity']; ?> pcs</td>
				<td><?php echo $key['price']*$key['quantity']; ?> BDT</td>
				<td><?php echo $key['timestamp']; ?></td>
				<td><span class="badge" data-badge-caption="">Delivered</span></td>
			</tr>

		<?php
					$cnt++;
				}
			}

		?>
        </tbody>
    </table>
		<?php
			}
		?>
	</div>
</section>

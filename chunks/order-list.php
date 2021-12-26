
<?php

require('backends/connection-pdo.php');

$arr_all = array();

if (isset($_SESSION['user_id'])) {

	$sql = 'SELECT * FROM cart WHERE user_id = "'.$_SESSION['user_id'].'"';
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
			<h3 class="header">My Orders!</h3>
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
				<th>Action</th>
			</tr>
        </thead>

        <tbody>
          <?php
						$cnt = 0;
						$tprice = 0;
            foreach ($arr_all as $key) {

          ?>
          <tr>
            <td><?php echo $key['order_id']; ?></td>
            <td><?php echo $key['product_name']; ?></td>
			<td><?php echo $key['quantity']; ?> pcs</td>
			<td><?php echo $key['price']*$key['quantity']; ?></td>
            <td><?php echo $key['timestamp']; ?></td>
            <td><a href="./backends/order-delete.php?id=<?php echo $key['order_id']; ?>"><span class="new badge" data-badge-caption="">Cancel Order</span></a></td>
          </tr>

          <?php
							$cnt++;
							$tprice += $key['price'];
						}
					?>
					<tr>
						<td colspan="2">
							<h3>Total Products:  <?php echo $cnt; ?></h3>
						</td>
						<td colspan="2">
							<h3>Total Price:  <?php echo $tprice; ?> BDT</h3>
						</td>
					</tr>

        </tbody>
    </table>
			<div style="text-align: center">
				<p><i>**You will get 24 hours to cancel your order starting from Order Time.**</i></p>
			</div>
			<div class="section white center">
				<a href="backends/confirm-order.php?id=<?php echo $_SESSION['user_id']; ?>" 
				style="background: green;" class="btn btn-big waves-effect waves-block waves-light prices">
					Confirm Order
				</a>
			</div>
		<?php
			}
		?>

	</div>

</section>

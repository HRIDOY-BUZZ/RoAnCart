<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

// $sql = 'SELECT orders.order_id, orders.user_name, orders.timestamp, product.pname FROM orders LEFT JOIN product ON orders.product_id = product.id';
$sql = 'SELECT * FROM orders WHERE 1 ORDER BY timestamp DESC';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);



?>


<div class="section white-text" style="background: #4caf50;">

	<div class="section">
		<h3>All Pending Orders</h3>
	</div>

  <?php

    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
    }

    ?>

	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>Order ID</th>
              <th>User Name</th>
              <th>Address</th>
              <th>Contact</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Timestamp</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {
              $sql = 'SELECT * FROM product WHERE id = '.$key['product_id'].' LIMIT 1';

              $query  = $pdoconn->prepare($sql);
              $query->execute();
              $product = $query->fetchAll(PDO::FETCH_ASSOC);

              $sql = 'SELECT * FROM users WHERE id = '.$key['user_id'].' LIMIT 1';

              $query  = $pdoconn->prepare($sql);
              $query->execute();
              $user = $query->fetchAll(PDO::FETCH_ASSOC);
          ?>
          <tr>
            <td><?php echo $key['order_id']; ?></td>
            <td><?php echo $user[0]['name']; ?></td>
            <td><?php echo $user[0]['address']; ?></td>
            <td><?php echo $user[0]['phone']; ?></td>
            <td><?php echo $product[0]['pname']; ?></td>
            <td><?php echo $key['quantity']; ?></td>
            <td><?php echo $product[0]['price']*$key['quantity']; ?></td>
            <td><?php echo $key['timestamp']; ?></td>
            <td>
              <a href="../backends/admin/order-done.php?id=<?php echo $key['order_id']; ?>">
                <span class="new badge" data-badge-caption="" style="margin: 5px 0">DELIVER</span>
              </a>
              <a href="../backends/admin/order-delete.php?id=<?php echo $key['order_id']; ?>">
                <span class="new badge" data-badge-caption="" style="margin: 5px 0">CANCEL</span>
              </a>
            </td>
          </tr>

          <?php } ?>
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>

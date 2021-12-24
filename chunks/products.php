
<?php

require('backends/connection-pdo.php');


if (isset($_REQUEST['id'])) {

	$sql = 'SELECT * FROM product WHERE cat_id = "'.$_REQUEST['id'].'"';

} else {

	$sql = 'SELECT * FROM product';

}

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);



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
			<h3 class="header">Products Area!</h3>
		</div>

		<?php if (count($arr_all) == 0) {
	echo '<div class="section gray center" style="border: 1px solid black; border-radius: 5px;">
			<p class="header">Sorry No Categories to Display!</p>
		</div>';
} else {  ?>

<?php for ($i=1; $i <= count($arr_all); ) { ?>

		<div class="row">

			<?php for ($j=1; $j <= 3; $j++) { ?>


				<?php if ($i+$j-2 == count($arr_all)) {
					break;
				}  ?>

			<div class="col s12 m4">
				<div class="card">
				    <div class="card-image waves-effect waves-block waves-light">
				        <img class="activator" src="images/<?php echo $arr_all[$i+$j-2]['image']; ?>">
				    </div>
				    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
							<a class="black-text" href="">
								<h5>
									<?php echo $arr_all[$i+$j-2]['pname']; ?>
								</h5>
							</a>
							<i class="material-icons right">keyboard_arrow_up</i>
						</span>
				      <div class="card-content">
			          <p>This is a popular Product of RoAnCart. Order Now to Show your Creativity!</p>
			        </div>
			        <div class="card-content center">
					<?php 
						if($arr_all[$i+$j-2]['stock']>0)
						{
					?>
					<a href="backends/order-product.php?id=<?php echo $arr_all[$i+$j-2]['id']; ?>&name=<?php echo $arr_all[$i+$j-2]['pname']; ?>&price=<?php echo $arr_all[$i+$j-2]['price']; ?>" 
						style="background: green;" class="btn waves-effect waves-block waves-light">
							ADD to CART! (<?php echo $arr_all[$i+$j-2]['price']; ?> BDT)
					</a>
					<?php
						}
						else
						{
					?>
					<a href="#" style="background: brown;" class="btn waves-effect waves-block waves-light">
							OUT OF STOCK
					</a>
					<?php
						}
					?>
						
			        </div>
				    </div>
				    <div class="card-reveal">
				      <span class="card-title grey-text text-darken-4"><?php echo $arr_all[$i+$j-2]['pname']; ?><i class="material-icons right">close</i></span>
				      <p><?php echo $arr_all[$i+$j-2]['description']; ?></p>
				    </div>
				  </div>
			</div>

			<?php } ?>

			<?php $i = $i + 3; ?>


		</div>

		<?php
				}
			}
		?>




	</div>

</section>


<?php

require('backends/connection-pdo.php');

$sql = 'SELECT * FROM categories';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="fcategories">

	<div class="container">

		<div class="section white center">
			<h3 class="header">Categories</h3>
		</div>

<?php if (count($arr_all) == 0) {
	echo '<div class="section gray center" style="border: 1px solid black; border-radius: 5px;">
			<p class="header">Sorry No Categories to Display!</p>
		</div>';
} else {  ?>

<?php for ($i=1; $i <= count($arr_all); ) { ?>

		<div class="row">

			<?php for ($j=1; $j <= 3; $j++) { ?>

				<?php
				if ($i+$j-2 == count($arr_all))
				{
					break;
				}
				$ind = $arr_all[$i+$j-2]['id'];
				$sql0 = "SELECT image FROM product WHERE cat_id = '".$ind."' LIMIT 1";
				$query  = $pdoconn->query($sql0);

				$result = $query->fetch();
				if(isset($result[0]) && $result[0] != '')
					$imageId = $result[0];
				else
					$imageId = "0.png";
				?>

			<div class="col s12 m4">
				<div class="card">
				    <div class="card-image waves-effect waves-block waves-light">
				      <img class="activator" src="images/<?php echo $imageId; ?>">
				    </div>
				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4">
								<a class="black-text" href="products.php?id=<?php echo $arr_all[$i+$j-2]['id']; ?>">
									<?php echo $arr_all[$i+$j-2]['name']; ?></a>
									<i class="material-icons right">keyboard_arrow_up</i></span>
				      <div class="card-content">
			          <p><?php echo $arr_all[$i+$j-2]['short_desc']; ?></p>
			        </div>
				    </div>
				    <div class="card-reveal">
				      <span class="card-title grey-text text-darken-4"><?php echo $arr_all[$i+$j-2]['name']; ?><i class="material-icons right">close</i></span>
				      <p><?php echo $arr_all[$i+$j-2]['long_desc']; ?></p>
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

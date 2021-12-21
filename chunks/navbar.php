<section class="fnavbar">
		<div class="navbar-fixed">
		<nav class="green">
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo">RoAnCart</a>
		      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="index.php" class="hvr-grow">Home</a></li>
		        <li><a href="about-RoAnCart.php" class="hvr-grow">About Us</a></li>
		        <li><a href="product-categories.php" class="hvr-grow">Categories</a></li>
		        <li><a href="products.php" class="hvr-grow">All Products</a></li>

		        <?php

		        	if (isset($_SESSION['user'])) {
		        		echo '<li><a href="#" class="hvr-grow">Hi, '.$_SESSION['user'].'</a></li>
                        <li><a href="orders.php" class="hvr-grow">My Cart</a></li>
		        		<li><a href="logout.php" class="hvr-grow">Logout</a></li>';
		        	} else {
		        		echo '<li><a href="#" class="hvr-grow modal-trigger" data-target="modal1">Login</a></li>
		        		<li><a href="#" class="hvr-grow modal-trigger" data-target="modal2">Register</a></li>
                        <li><a href="./admin" class="hvr-grow">Admin</a></li>';
		        	}

		        ?>

		      </ul>
		    </div>
		  </nav>
		</div>

		  <ul class="sidenav" id="mobile-demo">
		    <li><a href="index.php">Home</a></li>
	        <li><a href="about-RoAnCart.php">About Us</a></li>
	        <li><a href="product-categories.php">Categories</a></li>
	        <li><a href="products.php">All Products</a></li>


	        <?php
		        	if (isset($_SESSION['user'])) {
		        		echo '<li><a href="#">Hi, '.$_SESSION['user'].'</a></li>
                        <li><a href="orders.php">My Cart</a></li>
		        		<li><a href="logout.php">Logout</a></li>';
		        	} else {
		        		echo '<li><a href="#" class="modal-trigger" data-target="modal1">Login</a></li>
		        		<li><a href="#" class="modal-trigger" data-target="modal2">Register</a></li>';
		        	}
		        ?>
            <li><a href="/admin" class="hvr-grow">Admin</a></li>
		  </ul>
	</section>

	<section class="msg-modal">
		<div id="modal3" class="modal">
			<div class="modal-content center">

			<h5><small class="center" id="login_error" style="color: red;"></small></h5>
			<form action="">

				<div class="row">
					<h1 id="info-modal-heading"></h1>
					<p id="info-modal-content"></p>
				</div>

				<a href="javascript:void(0)" class="modal-close waves-effect waves-light btn" style="background: green !important;">OK</a>
				<p id="reg_error" style="color:red"></p>
			</form>
			</div>
		</div>
	</section>

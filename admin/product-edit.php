<?php
require('layout/header.php');
require('layout/left-sidebar-long.php');
require('layout/topnav.php');
require('layout/left-sidebar-short.php');
require('../backends/connection-pdo.php');

if(isset($_GET['id']))
{
    $pid = $_GET['id'];
    $sql = 'SELECT * FROM product WHERE id = '.$pid;
    $query  = $pdoconn->prepare($sql);
    $query->execute();
    $product = $query->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT id,name FROM categories';
    $query  = $pdoconn->prepare($sql);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="section white-text" style="background: #4caf50;">

	<div class="section">
		<h3>Edit Product</h3>
	</div>


    <div class="section center" style="padding: 40px;">

        <form action="../backends/admin/pro-edit.php" method="post" enctype="multipart/form-data">

            <?php
                if (isset($_SESSION['msg'])) {
                    echo '<div class="row" style="background: red; color: white;">
                    <div class="col s12">
                        <h6>'.$_SESSION['msg'].'</h6>
                        </div>
                    </div>';
                    unset($_SESSION['msg']);
                }
            ?>

            <div class="row">
                <input type="number" name="id" value="<?php echo $product[0]['id']; ?>" hidden>
                <div class="col s6" style="">
                            <div class="input-field">
                            <input id="name" name="name" type="text" class="validate" style="color: black; width: 70%" value="<?php echo $product[0]['pname']; ?>">
                            <label for="name" style="color: white;"><b>Product Name :</b></label>
                            </div>
                </div>
                <div class="col s6" style="">
                        <div class="input-field" style="color: white !important; width: 90%">
                            <select name='category'>
                                <?php
                                    foreach ($categories as $key) {
                                        if($key['id'] == $product[0]['cat_id'])
                                        {
                                            echo '<option value="'.$key['id'].'" selected>'.$key['name'].'</option>';
                                        }
                                        else
                                        {
                                            echo '<option value="'.$key['id'].'">'.$key['name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <label style="color: white;">Categories</label>
						</div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                    <input id="desc" name="desc" type="text" class="validate" style="color: black; width: 85%" value="<?php echo $product[0]['description']; ?>">
                    <label for="desc" style="color: white;"><b>Description :</b></label>
                    </div>
                </div>
			</div>
			<div class="row">
				<div class="col m6 s12" style="">
                    <div class="input-field">
                        <!-- <input id="image" name="image" type="file" style="color: black; width: 70%; float:right;"> -->
                        <img src="/images/<?php echo $product[0]['image'] ?>" alt="" width="100">
                        <label for="name" style="color: white; float:left;"><b>Product Picture :</b></label>
                    </div>
                </div>
				<div class="col m3 s6" style="">
                    <div class="input-field">
                        <input id="price" name="price" type="number" class="validate" style="color: black; width: 70%" value="<?php echo $product[0]['price']; ?>">
                        <label for="price" style="color: white;"><b>Product Price :</b></label>
                    </div>
                </div>
                <div class="col m3 s6" style="">
                    <div class="input-field">
                        <input id="stock" name="stock" type="number" class="validate" style="color: black; width: 70%" value="<?php echo $product[0]['stock']; ?>">
                        <label for="stock" style="color: white;"><b>Stock :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="product-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Update</button>
                    </div>
                </div>
            </div>

        </form>


    </div>

</div>

<?php
}
else
{

}
    require('layout/about-modal.php');
    require('layout/footer.php');
?>

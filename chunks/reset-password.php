<center>
    <h2 style="color:green">
        <u>Reset Password</u>
    </h2>
</center>

<section class="reset-sec">
        <center>
            <div class="col-40">
                <h6 style="color:red"><?php echo $err; ?></h6>
                <h6 style="color:green"><?php echo $succ; ?></h6>
                <form action="" method="post">

                    <label for="pass1" style="font-size: 20px">Enter Your New Password</label>

                    <input type="text" name="email" value="<?php echo $_GET['mail']; ?>" hidden>

                    <input type="password" name="pass1" class="validate" pattern=".{8,}" title="Try at least 8 Characters" style="margin: 20px auto" placeholder="New Password" required>

                    <input type="password" name="pass2" class="validate" style="margin: 20px auto" placeholder="Confirm Password" required>

                    <input type="submit" name="reset-submit" class="waves-effect waves-light btn" style="margin: 20px auto" value="Reset">

                </form>
            </div>
        </center>
</section>
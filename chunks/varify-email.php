<center>
    <h2 style="color:green">
        <u>Forgot Password</u>
    </h2>
</center>

<section class="email-sec">
        <center>
            <div class="col-40">
                <h6 style="color:red"><?php echo $err; ?></h6>
                <form action="" method="post">
                    <label for="email" style="font-size: 20px">Enter Your Email Address</label>
                    <input type="email" name="email" class="validate" placeholder="example@domain.com" required>
                    <input type="submit" name="email-submit" class="waves-effect waves-light btn" value="Check">
                </form>
            </div>
        </center>
</section>
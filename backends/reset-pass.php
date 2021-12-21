<?php
    require_once('connection-pdo.php' ); 

    $err = "";
    $succ = "";

    if(isset($_POST['email-submit']))
    {
        $email = $_POST['email'];
        if($_GET['u'] == "user")
        {
            $sql = "SELECT * FROM users WHERE email=?";

            $query  = $pdoconn->prepare($sql);
            $query->execute([$email]);
            $arr_email=$query->fetchAll(PDO::FETCH_ASSOC);

            if (count($arr_email) == 0) {
                $err = "This Email has not been Registered yet in this website.<br> Please register first to login.";
            }
            else
            {
                header("Location: password-reset.php?u=user&mail=$email");
            }
        }
        else if($_GET['u'] == "admin")
        {
            $sql = "SELECT * FROM admin WHERE email=?";

            $query  = $pdoconn->prepare($sql);
            $query->execute([$email]);
            $arr_email=$query->fetchAll(PDO::FETCH_ASSOC);

            if (count($arr_email) == 0) {
                $err = "No Admin with this email exist here. Please Try Again";
            }
            else
            {
                header("Location: password-reset.php?u=admin&mail=$email");
            }
        }
        else{
            $err = "Error! No User Type Found!!";
        }
    }

    if(isset($_POST['reset-submit']))
    {
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if($pass1 != $pass2)
        {
            $err = "Passwords do not match. Please Try again carefully!";
        }
        else{
            $sql = "";
            if($_GET['u'] == "user")
            {
                $sql = "UPDATE `users` SET password=? WHERE email=?";
            }
            else if($_GET['u'] == "admin")
            {
                $sql = "UPDATE `admin` SET password=? WHERE email=?";
            }

            $query  = $pdoconn->prepare($sql);
            $query->execute([$pass1, $email]);

            $succ = "Success! Password has been changed successfully.<br> Please Login with your new password.";
        }
    }
?>
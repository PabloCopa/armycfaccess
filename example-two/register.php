<?php include("../admin/includes/controller.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $configs->getConfig('SITE_NAME'); ?> - Register Page</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />

    <?php
    /* checks to see if captcha is enabled and then calls required css */
    $id = isset($_GET['id']) ? $_GET['id'] : 1;
        if ($configs->getConfig('ENABLE_CAPTCHA')){
    ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../admin/plugins/captcha/jquery/QapTcha.jquery.css" type="text/css" />
    <?php 
        } 
    ?>
    
</head>
<body>
<?php

/* The user is already logged in, not allowed to register. */
if($session->logged_in){
    echo "<div class='login'><h1>Registered</h1>";
    echo "<p>We're sorry <b>$session->username</b>, but you've already registered. "
        ."<a href='index.php'>Back to Home Page</a>.</p></div>";
}

/* The user has submitted the registration form and the results have been processed. */
else if ($configs->getConfig('ACCOUNT_ACTIVATION') == 4){
    echo "<div class='login'><h1>Registration Disabled</h1>";
    echo "<p>We're sorry but registration is currently disabled. Please try again at a later time.</p></div>";
} else if(isset($_SESSION['regsuccess'])){
    
    if ($_SESSION['regsuccess']==6){
        echo "<div class='login'><h1>Registration is currently disabled!</h1>";
        echo "<p>We're sorry <b>".$_SESSION['reguname']."</b> but registration to this site is currently disabled. "
            ."Please try again at a later time or contact the website owner.</p></div>";
    }
    /* Registration was successful */
    else if($_SESSION['regsuccess']==0 || $_SESSION['regsuccess']==5){
        echo "<div class='login'><h1>Registered!</h1>";
        echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your information has been added to the database, "
            ."you may now <a href='index.php'>log in</a>.</p></div>";
    }
    else if($_SESSION['regsuccess']==3){
        echo "<div class='login'><h1>Registered!</h1>";
        echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your account has been created. "
            ."However, this board requires account activation. An activation key has been sent to the e-mail address you provided. "
            ."Please check your e-mail for further information.</p></div>";
    }
    else if($_SESSION['regsuccess']==4){
        echo "<div class='login'><h1>Registered!</h1>";
        echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your account has been created. "
            ."However, this board requires account activation by an Admin. An e-mail has been sent to them and you will be informed "
            ."when your account has been activated.</p></div>";
    }
    /* Registration failed */
    else if ($_SESSION['regsuccess']==2){
        echo "<div class='login'><h1>Registration Failed</h1>";
        echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
            ."could not be completed.<br>Please try again at a later time.</p></div>";
    }
    unset($_SESSION['regsuccess']);
    unset($_SESSION['reguname']);    
    
     /* Activation Query String was included in URL - try to activate */
    } else if ((isset($_GET['mode'])) && ($_GET['mode'] == 'activate')) { echo "<div class='login'>".$session->activateUser($_GET['user'], $_GET['activatecode'])."</div>"; 
        
    /** The user has not filled out the registration form yet. Below is the page with the sign-up form, the names of the input fields are important and should not be changed.
    */
    } else {

?>

<div class="login">
    <h1>Register</h1>
<?php
$form = new Form;
if(Form::$num_errors > 0){
   echo "<td style=\"color:#ff0000\">".Form::$num_errors." error(s) found</td>";
}
?>
    <form action="../admin/includes/process.php" method="post">
        <p>
            <input type="text" name="user" placeholder="Username" value="<?php echo Form::value("user"); ?>" />
            <?php echo Form::error("user"); ?>
        </p>
        <p>
            <input type="text" name="firstname" placeholder="First Name" value="<?php echo Form::value("firstname"); ?>" />
            <?php echo Form::error("firstname"); ?>
        </p>
        <p>
            <input type="text" name="lastname" placeholder="Last Name" value="<?php echo Form::value("lastname"); ?>" />
            <?php echo Form::error("lastname"); ?>
        </p>
	<p>
            <input type="password" name="pass" placeholder="Password" value="<?php echo Form::value("pass"); ?>" />
            <?php echo Form::error("pass"); ?>
        </p>
	<p>
            <input type="password" name="conf_pass" placeholder="Confirm Password" value="<?php echo Form::value("conf_pass"); ?>" />
            <?php echo Form::error("pass"); ?>
        </p>
        <p>
            <input type="text" name="email" placeholder="E-mail Address" value="<?php echo Form::value("email"); ?>" />
            <?php echo Form::error("email"); ?>
        </p>
        <p>
            <input type="text" name="conf_email" placeholder="Confirm E-mail Address" value="<?php echo Form::value("conf_email"); ?>" />
            <?php echo Form::error("email"); ?>
        </p>

<?php 
if ($configs->getConfig('ENABLE_CAPTCHA')){
	echo "<p><div class=\"QapTcha\"></div></p>";
}
?>

<p class="submit"><input type="submit" value="Register!" id="submit" /></p>

<!-- The following div tag displays a hidden form field in an attempt at tricking automated bots. -->
<div style='display:none; visibility:hidden;'><input type='text' name='killbill' maxlength='50' /></div>

<input type="hidden" name="form_submission" value="register">
</form>
</div>
    
<div class="form-help">
    <?php echo "<a href='index.php'>Back to Home Page</a>"; ?>
</div>

<?php 
if ($configs->getConfig('ENABLE_CAPTCHA')){
?>
<!-- QapTcha and jQuery files -->
<script type="text/javascript" src="../admin/plugins/captcha/jquery/jquery.js"></script>
<script type="text/javascript" src="../admin/plugins/captcha/jquery/jquery-ui.js"></script>
<script type="text/javascript" src="../admin/plugins/captcha/jquery/jquery.ui.touch.js"></script>
<script type="text/javascript" src="../admin/plugins/captcha/jquery/QapTcha.jquery.js"></script>
<script type="text/javascript">
    $('.QapTcha').QapTcha({});
</script>
<?php
} // captcha
}
?>

</body>
</html>
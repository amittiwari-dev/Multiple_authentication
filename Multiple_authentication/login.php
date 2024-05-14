<?php
require_once __DIR__ . '/Validation.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
</head>

<body>
        <!-- For Message of Invalid User or Password -->
        <?php if(isset($_GET['msg'])): ?>
            <p style="padding:5px;color:red;background:pink;width:20%;">
            <?php echo $_GET['msg']; ?>
        </p>
        <?php endif; ?>
        <!-- For Message of Invalid User or Password -->
 
    <h2>Login Form</h2>
    <form action="loginController.php" method="POST">

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo setValue('email'); ?>">
        <span style="color:red"><?php echo setError('email'); ?></span>
        <br><br>
        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" value="<?php echo setValue('password'); ?>">
        <span style="color:red"><?php echo setError('password'); ?></span>
        <br><br>
        <input type="submit" name="submit" value="Login">
        <a href="register.php">New Member ? create Account</a>
    </form>
    <?php AddJsValidation(); ?>
</body>

</html>
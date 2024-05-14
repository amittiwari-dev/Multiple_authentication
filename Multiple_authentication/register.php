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
    <h2>User Registration Form</h2>
    <form action="registerController.php" method="POST">

        <?php //showAllErrors(); ?>


        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo setValue('name'); ?>">
        <span style="color:red"><?php echo setError('name'); ?></span>
        <br><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo setValue('email'); ?>">
        <span style="color:red"><?php echo setError('email'); ?></span>
        <br><br>

        <label for="mobile">Mobile:</label><br>
        <input type="tel" id="mobile" name="mobile" value="<?php echo setValue('mobile'); ?>">
        <span style="color:red"><?php echo setError('mobile'); ?></span>
        <br><br>

        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" value="<?php echo setValue('password'); ?>">
        <span style="color:red"><?php echo setError('password'); ?></span>
        <br><br>


        <input type="submit" name="submit" value="Submit">
        <a href="login.php">Already Registerd !! Login Here </a>
    </form>
    <?php AddJsValidation(); ?>
</body>

</html>
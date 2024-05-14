<?php
require_once __DIR__ . '/dbconnect.php';
require_once __DIR__ . '/Validation.php';
require_once __DIR__ . '/loginValidation.php';
require_once __DIR__ . '/UserModel.php';

$Validations = [
    'email' => [
        'required' => 'Email is Required',
        'isEmailValid' => 'Email is Not Valid',
    ],
    'password' => [
        'required' => 'Password is Required',
    ],
];

if (isset($_POST['submit']) and !empty($_POST['submit'])) {
    AddValidation($Validations);
    if (validate()) {
        if (checkUser($_POST)) {
           header('Location:dashboard.php?msg=login-success');
        } else {
           header('Location:login.php?msg=Invalid User Name or Password');
        }

    } else {
        require_once __DIR__ . '/login.php';
    }

} else {
    header("Location:login.php");
}
<?php
require_once __DIR__ . '/dbconnect.php';
require_once __DIR__ . '/Validation.php';
require_once __DIR__ . '/registerValidation.php';
require_once __DIR__ . '/UserModel.php';

$Validations = [
    'name' => [
        'required' => 'Name is Required',
        'isNameValid' => 'Name is Not Valid'
    ],
    'email' => [
        'required' => 'Email is Required',
        'isEmailValid' => 'Email is Not Valid',
        'isEmailUnique' => 'Email Already Exist,Try ' . suggestEmail($_POST['email']),
    ],
    'mobile' => [
        'required' => 'Mobile is Required',
        'maxlength' => 'Mobile should be 10 Digits',
        'isValidMobile' => 'Mobile should start from 6,7,8,9',
        'isMobileUnique' => 'Mobile Already is Exist'
    ],
    'password' => [
        'required' => 'Password is Required',
        'strongPassword' => 'Password have 8 min character, 1 Upper case, 1 special letter,1 numeric character',
    ],
];

if (isset($_POST['submit']) and !empty($_POST['submit'])) {
    AddValidation($Validations);
    if (validate()) {
        if (createUser($_POST)) {
            header("Location:login.php?msg=Register-Success");
        } else {
            header("Location:register.php?msg=OOPS-something-went-wrong");
        }

    } else {
        require_once __DIR__ . '/register.php';
    }

} else {
    header("Location:register.php");
}
<?php


function required($key, $value)
{
    if (!empty(trim($value))) {
        return true;
    } else {
        return false;
    }
}
function isNameValid($key, $value)
{
    $namePattern = "/^[a-zA-Z ]+$/";

    if (preg_match($namePattern, $value)) {
        return true;
    } else {
        return false;
    }

}

function isEmailValid($key, $value)
{
    $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    if (preg_match($emailPattern, $value)) {
        return true;
    } else {
        return false;
    }
}

function isEmailUnique($key, $value)
{
    global $conn;
    try {
        $sql = "select email from users where {$key}='{$value}'";
        if ($resultSet = mysqli_query($conn, $sql)) {
            $rowCount = mysqli_num_rows($resultSet);
            if ($rowCount > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            throw new mysqli_sql_exception();
        }
    } catch (mysqli_sql_exception $e) {
        echo 'Query Error,';
        echo $e->getMessage();
    }


}

function maxlength($key, $value)
{
    if (strlen($value) == 10) {
        return true;
    } else {
        return false;
    }

}
function isValidMobile($key, $value)
{
    $mobilePattern = '/^[6-9]{1}[0-9]{9}$/';

    if (preg_match($mobilePattern, $value)) {
        return true;
    } else {
        return false;
    }
}

function isMobileUnique($key, $value)
{

    global $conn;
    try {
        $sql = "select mobile from users where {$key}='{$value}'";
        if ($resultSet = mysqli_query($conn, $sql)) {
            $rowCount = mysqli_num_rows($resultSet);
            if ($rowCount > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            throw new mysqli_sql_exception();
        }
    } catch (mysqli_sql_exception $e) {
        echo 'Query Error,';
        echo $e->getMessage();
    }

}

function strongPassword($key, $value)
{
    $passwordPattern = '/^(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,}$/';
    if (preg_match($passwordPattern, $value)) {
        return true;
    } else {
        return false;
    }

}

function suggestEmail($email)
{
    $usernameArr = explode("@", $email);
    $username = $usernameArr[0];
   @ $domain = $usernameArr[1];

    $random = rand(0, 9) . rand(0, 9) . rand(0, 9);
    $newUsername = $username . "." . $random . '@' . $domain;

    if ($newUsername == $email) {
        $random = rand(0, 9) . rand(0, 9) . rand(0, 9);
        $newUsername = $username . "." . $random . '@' . $domain;
    }

    return $newUsername;


}
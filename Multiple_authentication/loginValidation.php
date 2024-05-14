<?php

function required($key, $value)
{
    if (!empty(trim($value))) {
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
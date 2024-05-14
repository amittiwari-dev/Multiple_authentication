<?php

//Function createUser
function createUser($formData)
{
    $name = $formData['name'];
    $email = $formData['email'];
    $mobile = $formData['mobile'];
    $password = password_hash($formData['password'], PASSWORD_BCRYPT);
    global $conn;
    $sql = "INSERT INTO users(name,email,mobile,password) values('$name','$email','$mobile','$password')";
    try {
        if ($query = mysqli_query($conn, $sql)) {
            $insertedId = mysqli_insert_id($conn);
            if ($insertedId) {
                return true;
            } else {
                return false;
            }
        } else {
            throw new mysqli_sql_exception();
        }
    } catch (mysqli_sql_exception $e) {
        echo 'Query Error,';
        echo $e->getMessage();
    }
}

//Check if user is valid or Not
function checkUser($formData)
{
    $email = $formData['email'];
    $password = $formData['password'];
    global $conn;
    $sql = "select * from users where email='{$email}'";
    try {
        if ($resultSet = mysqli_query($conn, $sql)) {
            $rowCount = mysqli_num_rows($resultSet);
            if ($rowCount > 0) {
                if ($row = mysqli_fetch_assoc($resultSet)) {
                    $dbhash = $row['password'];
                    if (password_verify($password, $dbhash)) {
                        createSession('user_data',$row); // create session
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            throw new mysqli_sql_exception();
        }
    } catch (mysqli_sql_exception $e) {
        echo 'Query Error,';
        echo $e->getMessage();
    }
}

function createSession($key,$data)
{
    session_start();
    $_SESSION[$key]=$data;
}


?>
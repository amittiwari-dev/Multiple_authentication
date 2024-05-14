<?php
$error = [];
function AddValidation($Validations = [])
{
    global $error;
    foreach ($_POST as $vkey => $vvalue) {
        foreach ($Validations as $field => $rules) {
            if ($vkey == $field) {
                if (is_array($rules)) {
                    foreach ($rules as $function => $errorMsg) {
                        if (!call_user_func_array($function, [$field, $vvalue])) {
                            $error[$field] = $errorMsg;
                            break;
                        }
                    }
                }
            }
        }
    }
}

function setValue($key)
{
    if (isset($_POST[$key])):
        return $_POST[$key];
    else:
        return "";
    endif;
}

function showAllErrors()
{
    global $error;
    if (isset($error) and count($error) > 0):
        echo '<ul>';
        foreach ($error as $error):
            echo '<li style="color:red;background-color:pink;padding:5px;width:20%;">' . $error . '</li>';
        endforeach;
        echo '</ul>';
    endif;
}

function setError($key)
{
    global $error;
    if (isset($error[$key]) and count($error) > 0):
        return $error[$key];
    else:
        return "";
    endif;
}

function validate()
{
    global $error;
    if (count($error) == 0) {
        return true; //form is valid
    } else {
        return false; //form is not valid.
    }
}

function AddJsValidation($idsArr = [])
{
    global $error;
    $idList = [];
    if (count($idsArr) == 0) {
        $idList = array_keys($error);
        $preSelector = "#";
    } else {
        $idList = array_values($idsArr);
        $preSelector = "";
    }

    echo "<script>\n";
    foreach ($idList as $index => $selector) {
        echo "document.querySelector('{$preSelector}$selector').style = 'border:2px solid red;';\n";
    }
    echo "</script>\n";

}
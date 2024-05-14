<?php
define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo_db');
define('DEBUG', false);

try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if ($conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)) {
        if (DEBUG) {
            echo 'Connected Created';
            exit;
        }
    } else {
        throw new mysqli_sql_exception();
    }
} catch (mysqli_sql_exception $e) {
    echo 'Connection Error,';
    echo $e->getMessage();
    exit();
}
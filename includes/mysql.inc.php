<?php
    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASSWORD','');
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_NAME', 'e_commerce_shop_1');

    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    mysqli_set_charset($db_connection, 'utf8');

    function escape_data($data)//function for making data safe to use in queries
    {
        global $db_connection;
        return mysqli_real_escape_string ($db_connection, trim($data));
    }

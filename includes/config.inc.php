<?php
    $live = false;
    $contact_email = 'pierrekahumuza@gmail.com';
    define('BASE_URI', 'C:/xampp/htdocs/tshirtshop/');
    define('BASE_URL', 'www.ecommerce.com');
    define('MYSQL', 'C:/xampp/htdocs/tshirtshop/includes/');

    session_start();

    function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
    {
        global $live, $contact_email;
        $message = "An error occured in script '$e_file' on line $e_line: \n$e_message\n";
        $message .= "<pre>".print_r(debug_backtrace(), 1)."</pre>\n";
        if(!$live)
        {
            echo'<div class = "error">'.nl2br($message).'</div>';
        }
        else
        {
            error_log($message, 1, $contact_email, 'From:admin@examples.com');//the default of zero would send the message to the operating system’s log).
            if($e_number!=E_NOTICE)
            {
                echo '<div class="error">A system error occurred.We apologize for the inconvience.</div>';
            }
        }
    }
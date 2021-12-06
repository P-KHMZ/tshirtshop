<?
    // SITE_ROOT contains the full path to the tshirtshop folder
    define('SITE_ROOT', dirname(dirname(__FILE__)));
    // Application directories
    define('PRESENTATION_DIR', SITE_ROOT.'/presentation/');
    define('BUSINESS_DIR', SITE_ROOT.'/business/');
    // Settings needed to configure the Smarty template engine
    define('SMARTY_DIR', SITE_ROOT .'/libs/smarty/');
    define('TEMPLATE_DIR', PRESENTATION_DIR .'templates');
    define('COMPILE_DIR', PRESENTATION_DIR .'templates_c');
    define('CONFIG_DIR', SITE_ROOT .'/include/configs');

    define('IS_WARNING_FATAL', true);
    define('DEBUGGING', true);
    //the error types to be reported
    define('ERROR_TYPES', E_ALL);
    //settings about mailing the error messages to admin
    define('SEND_ERROR_MAIL', false);
    define('ADMIN_ERROR_MAIL', 'pierrekahumza@gmail.com');
    define('SENDMAIL_FROM', 'petermayele53@gmail.com');
    ini_set('sendmail_from', SENDMAIL_FROM);
    //by default we don't log errors to a file
    define('LOG_ERRORS', false);
    define('LOG_ERRORS_FILE', 'c:\\xampp\\htdocs\\tshirshop\\errors_log.txt');
    /**Generic error message to be displayed instead of debug info
     * when DEBUGGING is false
     */
    define('SITE_GENERIC_ERROR_MESSAGE', '<h1>T-shirt shop errors</h1>');
?>
<?php
    include_once "libs/smarty/Smarty.class.php";
    // include_once "presentation/application.php";
    $smarty  = new Smarty();
    $smarty->testInstall();
    // Include utility files
    require_once 'include/config.php';
    // Load the application page template
    require_once PRESENTATION_DIR . 'application.php';
    // $smarty->setTemplateDir(TEMPLATE_DIR);
    // $smarty->setCompileDir(COMPILE_DIR);
    // $smarty->setConfigDir(CONFIG_DIR);
    $application = new Application();

    // $application->setTemplateDir(TEMPLATE_DIR);
    // $application->setCompileDir(COMPILE_DIR);
    // $application->setConfigDir(CONFIG_DIR);
    //$application->setCacheDir(CACHE_DIR);
            
    // Load Smarty template file
    // Display the page
    $application->display('store_front.tpl');
?>


<?php
    // Reference Smarty library
    require_once SMARTY_DIR . 'Smarty.class.php';
    /* Class that extends Smarty, used to process and display Smarty
    files */
    class Application extends Smarty
    {
        // Class constructor
        public function __construct()
        {
            // Call Smarty's constructor
            parent::Smarty();
            //Change the default template directories
            // $this -> template_dir = TEMPLATE_DIR;
            // $this -> compile_dir  = COMPILE_DIR;
            // $this -> config_dir   = CONFIG_DIR;
            $this->setTemplateDir(TEMPLATE_DIR);
            $this->setCompileDir(COMPILE_DIR);
            $this->setConfigDir(CONFIG_DIR);
            

        // $application = new Application();
        // $application->setTemplateDir(TEMPLATE_DIR);
        // $application->setCompileDir(COMPILE_DIR);
        // $application->setConfigDir(CONFIG_DIR);
        // $application->setCacheDir(CACHE_DIR);
        }
    }
?>
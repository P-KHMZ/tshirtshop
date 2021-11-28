<?php
    require_once SMARTY_DIR . 'Smarty.class.php';
    //this class is used to process the files
    class Application extends Smarty
    {
        //class constructor
        public function __construct()
        {
            //call smarty's constructor
            parent::Smarty();
            // change the default template directories
            $this->template_dir = TEMPLATE_DIR;
            $this->compile_dir  = COMPILE_DIR;
            $this->config_dir   = CONFIG_DIR; 
        }
    }
?>
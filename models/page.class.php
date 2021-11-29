<?php
    class Site_Data
    {
        public $title   = "";
        public $content = "";
        public $style   = "";
        public $script  = "";

        public function add_Css($href)
        {
            $this->style .="<link rel='stylesheet' href='$href' type='text/css'>"; 
        }
    }
?>
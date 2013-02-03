<?php
class View{
    private $template;
    
    public function __construct($template) {
        $this->template = $template;
    }
    
    public function render($data) {
        if (file_exists("templates/".$this->template.".php")){
            include "templates/".$this->template.".php";
        }
    }
}
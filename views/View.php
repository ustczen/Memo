<?php
class View{
    private $template;
    
    public function __construct($template) {
        $this->template = $template;
    }
    
    public function render($data) {
        include "templates/".$template;
    }
}
<?php
class Controller{
    public $db;
    public $view;
    public $request;
    public $data;
    
    public function __construct($view, $request, $db) {
        $this->view = $view;
        $this->request = $request;
        $this->db = $db;
        
        $this->init();
    }
    
    public function init(){      
        $this->render();
    }
    
    public function render(){
        $html = $this->view->render($this->data);
        
    }
}
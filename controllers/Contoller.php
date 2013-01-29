<?php
class Controller{
    private $view;
    private $model;
    private $request;
    private $data;
    
    public function __construct($model, $view, $request) {
        $this->model = $model;
        $this->view = $view;
        $this->request = $request;
        
        $this->init();
    }
    
    public function init(){
        $this->render();
    }
    
    public function render(){
        $html = $this->view->render($this->data);
        
    }
}
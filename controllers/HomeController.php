<?php
class HomeController extends Controller{
    public function init(){
        //create a dbEntry for the memos
        $memos = new dbEntry('Memo', $this->db);
        
        $this->data = $memos->getRows();
        
        parent::init();
    }
}
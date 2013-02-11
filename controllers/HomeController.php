<?php
class HomeController extends Controller{
    public function init(){
        global $user;
        
        //create a dbEntry for the memos
        $memos = new dbEntry('Memo', $this->db);
        
        if ($user) $this->data['memos'] = $memos->getManyWhere('ownerId', $user->id);
        
        parent::init();
    }
}
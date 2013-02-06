<?php
class RegisterController extends Controller{
    public function init(){
        
        $this->data["registered"] = false;
        //if the request contains name and pw, create a new user
        if (!empty($this->request["name"]) && !empty($this->request["password"])){
            //create a new user
            $user = new User($this->db);
            $user->name = $this->request["name"];
            $user->setPassword($this->request["password"]);
            //save the db record
            $user->create();
            
            $this->data["registered"] = true;
        }
        
        parent::init();
    }
}
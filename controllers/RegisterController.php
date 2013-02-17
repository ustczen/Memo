<?php
class RegisterController extends Controller{
    public function init(){
        
        $this->data["registered"] = false;
        //if the request contains name and pw, create a new user
        if (!empty($this->request["name"]) && !empty($this->request["password"])){
            
            //check if user already exists
            $u = new DbEntry('UserTable', $this->db);
            $u = $u->getWhere('name', $this->request["name"]);
            
            if ($u){
                if (!isset($this->data['errors']) || !is_array($this->data['errors'])) $this->data['errors'] = array();
                array_push($this->data['errors'], 'The username you entered is already taken :(');
            }
            else{
                //create a new user
                $user = new UserTable($this->db);
                $user->name = $this->request["name"];
                $user->setPassword($this->request["password"]);
                //save the db record
                $user->create();

                $this->data["registered"] = true;
            }
        }
        
        parent::init();
    }
}
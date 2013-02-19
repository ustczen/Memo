<?php
class UsersController extends Controller{
    public function init(){
        global $user;
        
        if ($user && $user->admin){
            //Promote the user if the star-button has been pressed
            if (!empty($this->request['promote_user'])){
                    //fetch the user
                    $db = new DbEntry('UserTable', $this->db);
                    $usr = $db->getRow($this->request['promote_user']);
                    
                    //set the new value and save
                    $usr->admin = 1;
                    $usr->save();
            }

            //Promote the user if the star-button has been pressed
            if (!empty($this->request['promote_user'])){
                //fetch the user
                $db = new DbEntry('UserTable', $this->db);
                $usr = $db->getRow($this->request['promote_user']);

                //set the new value and save
                $usr->admin = 1;
                $usr->save();
            }
            
            //Demote the user if the star-button has been pressed again
            if (!empty($this->request['demote_user'])){
                //fetch the user
                $db = new DbEntry('UserTable', $this->db);
                $usr = $db->getRow($this->request['demote_user']);

                //set the new value and save
                $usr->admin = 0;
                $usr->save();
            }
            
            //if delete was pressed
            if (!empty($this->request['delete_user'])){
                //fetch the user
                $db = new DbEntry('UserTable', $this->db);
                //TODO: this should be done in one request: $db->deleteRow(id)
                $usr = $db->getRow($this->request['delete_user']);
                $usr->delete();
            }
            
            //fetch the users from the db
            $users = new dbEntry('UserTable', $this->db);
            $this->data['users'] = $users->getRows();
        }
        
        parent::init();
    }
}
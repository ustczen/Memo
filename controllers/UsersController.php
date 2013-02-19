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

                //admin can't demote herself
                if ($usr->id == $user->id){
                    if (!isset($this->data['errors']) || !is_array($this->data['errors'])) $this->data['errors'] = array();
                    array_push($this->data['errors'], "You can't demote yourself.");
                } else {
                    //set the new value and save
                    $usr->admin = 0;
                    $usr->save();
                }
            }
            
            //if delete was pressed
            if (!empty($this->request['delete_user'])){
                //fetch the user
                $db = new DbEntry('UserTable', $this->db);
                $usr = $db->getRow($this->request['delete_user']);
                
                //admin can't remove herself
                if ($usr->id == $user->id){
                    if (!isset($this->data['errors']) || !is_array($this->data['errors'])) $this->data['errors'] = array();
                    array_push($this->data['errors'], "You can't remove yourself.");
                } else {
                    $usr->delete();
                }
            }
            
            //fetch the users from the db
            $users = new dbEntry('UserTable', $this->db);
            $this->data['users'] = $users->getRows();
        }
        
        parent::init();
    }
}
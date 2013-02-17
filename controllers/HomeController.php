<?php
class HomeController extends Controller{
    public function init(){
        global $user;
        
        if ($user){
            //if a new memo has been posted, try to insert it into the db
            if (!empty($this->request['name']) && !empty($this->request['content'])){
                //if an id is defined, modify the memo with this id
                if (!empty($this->request['id'])){
                    //edit an existing memo
                    //fetch the memo
                    $db = new DbEntry('Memo', $this->db);

                    $memo = $db->getRow($this->request['id']);
                    if ($memo->ownerid == $user->id){
                        $memo->name = $this->request['name'];
                        $memo->content = $this->request['content'];
                        $memo->save();
                    }
                }else{
                    //create a new memo
                    $memo = new Memo($this->db);
                    $memo->name = $this->request['name'];
                    $memo->content = $this->request['content'];
                    if (isset($this->request['category'])) $memo->parentid = $this->request['category'];
                    $memo->ownerid = $user->id;
                    $memo->create();
                }
            }
            
            //if a new category has been posted, try to insert it into the db
            if (!empty($this->request['category_name'])){
                //if an id is defined, modify the memo with this id
                if (!empty($this->request['id'])){
                    //edit an existing category
                    //fetch the category
                    $db = new DbEntry('Category', $this->db);

                    $cat = $db->getRow($this->request['id']);
                    if ($cat->ownerid == $user->id){
                        $cat->name = $this->request['category_name'];
                        $cat->save();
                    }
                }else{
                    //create a new category
                    $cat = new Category($this->db);
                    $cat->name = $this->request['category_name'];
                    $cat->ownerid = $user->id;
                    if (isset($this->request['category'])) $cat->parentid = $this->request['category'];
                    $cat->create();
                }
            }

            //if the user pressed delete
            if ( !empty($this->request['delete'])){
                //fetch the memo
                $db = new DbEntry('Memo', $this->db);
                $memo = $db->getRow($this->request['delete']);
                //if the current user is the owner, delete the memo
                if ($memo && $memo->ownerid == $user->id) $memo->delete();
            }
        
            //if the user pressed delete (category)
            if ( !empty($this->request['delete_category'])){
                //fetch the category
                $db = new DbEntry('Category', $this->db);
                $cat = $db->getRow($this->request['delete_category']);
                //if the current user is the owner, delete the memo
                if ($cat && $cat->ownerid == $user->id) $cat->delete();
            }
            
            //fetch the categories from the db
            $categories = new dbEntry('Category', $this->db);
            $this->data['categories'] = $categories->getManyWhere('ownerid', $user->id);
            
            //fetch the memos from the db
            $memos = new dbEntry('Memo', $this->db);
            if (empty($this->request['category'])) $this->data['memos'] = $memos->getManyWhere('ownerid', $user->id);
            else $this->data['memos'] = $memos->getManyWhere(array(
                'ownerid' => $user->id,
                'parentid' => (int)$this->request['category']
                ));
        }
        
        parent::init();
    }
}
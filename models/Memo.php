<?php
class Memo{
    private $db;
    public $parentId;
    public $name;
    public $content;
     
    public function __construct($db) {
        $this->db = $urlSegment;
        $this->memos = new DbEntry('memo', $db);
    }
    
    public function populate($data){
        foreach($data as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function save(){
        
    }
    
    
}
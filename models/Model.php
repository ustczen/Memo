<?php
class Model{
    private $table;
    public $id;
     
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function populate($data){
        foreach($data as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function save(){
        
    }
    
    
}
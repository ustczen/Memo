<?php
class Model{
    public $table;
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
        //build array of key=value statements
        $keyval = array();
        
        //loop through variables in current object
        foreach($this as $key => $value){
            if ($key == 'db' || $key == 'table' || $key == 'id') continue;
            //bobby tables :D
            $key = mysql_real_escape_string($key);
            $value = "'".mysql_real_escape_string($value)."'";
            array_push($keyval, $key."=".$value);
        }
        
        $q = $this->db->prepare("UPDATE ".$this->table." SET ".implode(",", $keyval)." WHERE id=".(int)$this->id." LIMIT 1");
        $q->execute();
    }
    
    public function create(){
        //build keys and values arrays
        $keys = array();
        $values = array();
        
        //loop through variables in current object
        foreach($this as $key => $value){
            if ($key == 'db' || $key == 'table' || $key == 'id') continue;
            //bobby tables
            $key = mysql_real_escape_string($key);
            $value = mysql_real_escape_string($value);
            array_push($keys, $key);
            array_push($values, "'".$value."'");
        }
        
        $q = $this->db->prepare("INSERT INTO ".$this->table." (".implode(",", $keys).") VALUES(".implode(",", $values).")");
        $q->execute();
    }
}
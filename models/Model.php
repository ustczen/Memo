<?php
class Model{
    public $table;
    public $id;
     
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function populate($data){
        if (!is_array($data)) return;
        foreach($data as $key => $value){
            if (is_numeric($key)) continue;
            $this->$key = $value;
        }
    }
    
    public function save(){
        //build array of key=value statements
        $keyval = array();
        $values = array();
        
        //loop through variables in current object
        foreach($this as $key => $value){
            if ($key == 'db' || $key == 'table' || $key == 'id' || $key == 'created' || $key == 'modified') continue;
            array_push($keyval, $key."=?");
            array_push($values, $value);
        }
        
        $q = $this->db->prepare("UPDATE ".$this->table." SET ".implode(",", $keyval)." WHERE id=".(int)$this->id);
        $q->execute($values);
    }
    
    public function create(){
        //build keys and values arrays
        $keys = array();
        $values = array();
        $values_q = array();
        
        //loop through variables in current object
        foreach($this as $key => $value){
            if ($key == 'db' || $key == 'table' || $key == 'id') continue;
            array_push($keys, $key);
            array_push($values, $value);
            array_push($values_q, '?');
        }
        
        $q = $this->db->prepare("INSERT INTO ".$this->table." (".implode(",", $keys).") VALUES(".implode(",", $values_q).")");
        $q->execute($values);
    }
    
    public function delete(){
        $q = $this->db->prepare("DELETE FROM ".$this->table." WHERE id=".(int)$this->id);
        $q->execute();
    }
}
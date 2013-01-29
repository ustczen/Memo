<?php
class DbEntry{
    public $table; 
    private $db;
     
    public function __construct($table, $db) {
        //define the table
        $this->table = $table;
        $this->db = $db;
    }
    
    //get the rows in the table
    public function getRows($limit = 512, $class){
        //make a query
        $q = $this->db->prepare("SELECT * FROM ".$this->table." LIMIT ".$limit);
        $q->execute();
        
        //put the results in an array
        $rows = array();
        while($f = $q->fetch()){
            $obj = new $class;
            $obj->populate($f);
            array_push($rows, $obj);
        }
        
        return $rows;
    }
}
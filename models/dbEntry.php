<?php
class dbEntry{
    public $table; 
     
    public function __construct($table) {
        //define the table
        $this->table = $table;
    }
    
    //get the rows in the table
    public function getRows($limit = 512){
        global $db;
        
        //make a query
        $q = $db->prepare("SELECT * FROM ".$this->table." LIMIT ".$limit);
        $q->execute();
        
        //put the results in an array
        $rows = array();
        while($f = $q->fetch()) array_push($rows, $f);
        
        return $rows;
    }
}
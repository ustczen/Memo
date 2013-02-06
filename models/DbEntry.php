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
    public function getRows($limit = 512){
        //make a query
        $q = $this->db->prepare("SELECT * FROM ".$this->table." LIMIT ".$limit);
        $q->execute();
        
        //put the results in an array
        $rows = array();
        while($f = $q->fetch()){
            $obj = new $this->table($this->db);
            $obj->populate($f);
            array_push($rows, $obj);
        }
        
        return $rows;
    }
    
    public function getRow($id){
        //make a query
        $q = $this->db->prepare("SELECT * FROM ".$this->table." WHERE id=".(int)$id." LIMIT 1");
        $q->execute();
        
        $f = $q->fetch();
        $obj = new $this->table($this->db);
        $obj->populate($f);
        
        return $obj;
    }
}
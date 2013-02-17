<?php
class UserTable extends Model{
    public $name;
    public $password;
     
    public function __construct($db) {
        $this->table = "UserTable";
        parent::__construct($db);
    }
    
    public function setPassword($pw){
        $this->password = sha1($pw.SALT);
    }
    
    public function checkPassword($pw){
        return sha1($pw.SALT)==$this->password;
    }
}
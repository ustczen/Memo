<?php
class Memo extends Model{
    public $parentid;
    public $name;
    public $content;
     
    public function __construct($db) {
        $this->table = 'Memo';
        parent::__construct($db);
    }
}
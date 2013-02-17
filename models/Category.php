<?php
class Category extends Model{
    public $parentid;
    public $name;
     
    public function __construct($db) {
        $this->table = 'Category';
        parent::__construct($db);
    }
}
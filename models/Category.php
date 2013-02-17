<?php
class Category extends Model{
    public $parentId;
    public $name;
     
    public function __construct($db) {
        $this->table = 'Category';
        parent::__construct($db);
    }
}
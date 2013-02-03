<?php
class Memo extends Model{
    public $parentId;
    public $name;
    public $content;
     
    public function __construct() {
        $this->table = 'Memo';
    }
}
<?php
require_once 'conf.php';

require_once 'models/dbEntry.php';

$t = new dbEntry('memo');

var_dump($t->getRows());
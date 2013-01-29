<?php
require_once 'conf.php';

require_once 'models/DbEntry.php';
require_once 'models/Page.php';

$t = new dbEntry('memo', $db);

var_dump($t->getRows());
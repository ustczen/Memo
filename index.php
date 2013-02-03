<?php
require_once 'conf.php';

//models
require_once 'models/DbEntry.php';
require_once 'models/Model.php';
require_once 'models/Memo.php';
//views
require_once 'views/View.php';
//controllers
require_once 'controllers/Controller.php';
require_once 'controllers/HomeController.php';

$t = new dbEntry('Memo', $db);

var_dump($t->getRows());
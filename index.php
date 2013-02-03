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

//create a view and a controller
$view       = new View('Home');
$controller = new HomeController($view, $_REQUEST, $db);

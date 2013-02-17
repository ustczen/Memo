<?php
require_once "conf.php";

//models
require_once "models/DbEntry.php";
require_once "models/Model.php";
require_once "models/Memo.php";
require_once "models/User.php";
require_once "models/Category.php";
//views
require_once "views/View.php";
//controllers
require_once "controllers/Controller.php";
require_once "controllers/HomeController.php";
require_once "controllers/RegisterController.php";

$printed = array();

//login logic
if (isset($_POST['name']) && isset($_POST['password'])){
    setCookie('user', $_POST['name']);
    $_COOKIE['user'] = $_POST['name'];
    setCookie('pw', $_POST['password']);
    $_COOKIE['pw'] = $_POST['password'];
}

if (isset($_COOKIE['user']) && isset($_COOKIE['pw'])){
    $user = new DbEntry('User', $db);
    $user = $user->getWhere('name', $_COOKIE['user']);
    if (!$user || !$user->checkPassword($_COOKIE['pw'])){
        $user = null;
    }
}

//Routing:

// if the page url-parameter is not set
if (!isset($_GET["page"])) $_GET["page"] = '';

//register page
if ($_GET["page"] == "register"){
    //create a view and a controller for the register page
    $view       = new View("Register");
    $controller = new RegisterController($view, $_REQUEST, $db);
} else {
    //create a view and a controller for the home page
    $view       = new View("Home");
    $controller = new HomeController($view, $_REQUEST, $db);
}
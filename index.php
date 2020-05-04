<?php
session_start();

/**************
 * ROUTER 
 *************/

// on récupère l'url
$url = $_SERVER["REQUEST_URI"];
// on récupère le path
$path = parse_url($url, PHP_URL_PATH);

$path = str_replace("fitbody", "", $path);
@list($null, $controller, $action) = explode("/", $path);

$controller = !empty($controller) ? $controller : "main";
$action = !empty($action) ? $action : "index";
// on récupère les paramètres
$parameters = $_GET;

require_once("config/secret.php");

$pdo = new PDO('mysql:dbname='.$secret["db"]["dbname"].';host='.$secret["db"]["host"], $secret["db"]["username"], $secret["db"]['password']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// on va décider du controller qui va gérer
if($controller == "main"){
  require_once("controllers/mainController.php");
}else if($controller == "admin"){
  require_once("controllers/adminControllers/adminController.php");
}
else{
  require_once("controllers/404Controller.php");
}
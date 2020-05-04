<?php
require_once("./factories/adminFactories.php");
$admin = new adminLogin($pdo);
if($action == "connect"){
    $adminConnect = $admin->adminConnect($_POST["email"], $_POST["password"]);
}
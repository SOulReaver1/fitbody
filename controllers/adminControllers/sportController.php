<?php

require_once("./factories/sportFactory.php");

$sports = new sports($pdo);
$sportlist = $sports->sportlist();
if($action == "sports"){
    if($_POST){
        $addSport = $sports->addSport($_POST["sport"]);
    }
}
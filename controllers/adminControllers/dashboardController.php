<?php


if($action == "adherents"){
    require_once("./views/admin/views/adherents.php");
}else if($action == "sports"){
    require_once("./views/admin/views/sports.php");
}else if($action == "coachs"){
    require_once("./views/admin/views/coachs.php");
}else if($action == "contact"){
    require_once("./views/admin/views/contact.php");
}
else{
    require_once("./views/admin/views/dashboard.php");
}
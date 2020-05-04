<?php
if($action == "logout"){
    var_dump("aaaa");
    session_destroy();
    header("Location: /admin");
}

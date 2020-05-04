<?php
if($controller == "admin"){
    require_once("./controllers/adminControllers/login.php");
    require_once("./controllers/adminControllers/logout.php");
    require_once("./controllers/timout.php");
    require_once("./controllers/adminControllers/contactController.php");
    require_once("./controllers/adminControllers/adherentController.php");
    require_once("./controllers/adminControllers/coachController.php");
    require_once("./controllers/adminControllers/sportController.php");
    require_once("./factories/adminFactories.php");
    $nbrAdmin = $admin->nbrAdmin();
    if(!isset($_SESSION["login"])){
        require_once("./views/admin/login.php");
    }else{
        require_once("./views/admin/adminConnect.php");
    }

    
}else{
    require_once("./controller/404Controller.php");
}
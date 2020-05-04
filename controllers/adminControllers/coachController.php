<?php 

require_once("./factories/coachFactory.php");
$coachs = new coachs($pdo);
$coachList = $coachs->coachList();
$nbrCoach = $coachs->nbrCoach();

if($action == "coachs"){
    if($_POST){
        $addCoach = $coachs->checkCoach($_POST['firstname'], $_POST['lastname'], $_POST['birthdate'], $_POST["sexe"], $_POST["pwd"], $_POST["img"], $_POST["img"], $_POST["birthplace"]);
    }
}
    



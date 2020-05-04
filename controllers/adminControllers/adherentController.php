<?php 
require_once("./factories/adherentFactory.php");
$adherents = new adherents($pdo);
$adherentList = $adherents->adherentList();
$nbrAdherent = $adherents->nbrAdherent();
if($action == "adherents"){
    if($_POST){
        $addAdherent = $adherents->addAdherent($_POST["sexe"], $_POST["firstname"], $_POST['lastname'], $_POST["birthdate"], $_POST['birthplace'], $_POST["sub"], $_POST["email"], $_POST["pwd"], $_POST["img"]);
    }
}

<?php
require_once("./factories/abstractedFactory.php");

class sports extends abstractFactory{
    function sportlist(){
        $q = "SELECT name FROM sports";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    function addSport($sport){
        $q = "INSERT INTO sports (name)
        VALUE (:name)";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([':name' => $sport]);
        return "<span class='text-success'>Le sport à bien été ajouter</span>";
    }
}
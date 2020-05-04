<?php
require_once("./factories/abstractedFactory.php");

class newContact extends abstractFactory{
    function getContact(){
        try{
            $q = "SELECT * FROM `contact`";
            $stmt = $this->pdo->prepare($q);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);        
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }
    function contactCount(){
        try{
            $q = "SELECT count(*) AS 'result' FROM `contact` WHERE statut = 'false'";
            $stmt = $this->pdo->prepare($q);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }
}

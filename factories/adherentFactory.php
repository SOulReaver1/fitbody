<?php

require_once("./factories/abstractedFactory.php");

class adherents extends abstractFactory{
    function adherentList(){
        try{
            $q = "SELECT users.*, subscribe.name AS sub_name FROM `users`
            INNER JOIN users_has_groups ON users_has_groups.id_users = users.id_users
            INNER JOIN groups ON groups.idgroups = users_has_groups.idgroups
            INNER JOIN subscribe ON subscribe.id = users_has_groups.id_sub
            WHERE groups.name = :groupname";
            $stmt = $this->pdo->prepare($q);
            $stmt->execute(["groupname" => "adhérent"]);
            return $stmt->fetchAll(PDO::FETCH_CLASS);        
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }
    function nbrAdherent(){
        $q = "SELECT count(*) AS result FROM users_has_groups
        WHERE idgroups = :group";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([":group" => 1]);
        return $stmt->fetchAll(PDO::FETCH_CLASS); 
    }
    function calculAge($age){
        $dateOfBirth = $age;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y')." ans";
    }
    function addAdherent($sexe, $firstname, $lastname, $birthdate, $birthplace, $sub, $email, $pwd, $img){
        try{
            $q = "SELECT users.* FROM users
            WHERE users.firstname = :firstname AND users.lastname = :lastname AND users.birth_date = :birthdate";
            $stmt = $this->pdo->prepare($q);
            $stmt->execute([":firstname" => $firstname, ":lastname" => $lastname, ":birthdate" => $birthdate]);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(!empty($result)){
                return "<span class='text-danger'>L'adhérent existé déjà !</span>
                    ";
            }else{
                $q2 = "INSERT INTO users (sexe, firstname, lastname, birth_date, birth_place, profil_picture)
                VALUES (:sexe, :firstname, :lastname, :birthdate, :birthplace, :img);
                INSERT INTO users_has_groups (id_users, id_sub, idgroups, email, `password`)
                VALUES (LAST_INSERT_ID(), (SELECT id FROM subscribe WHERE name = :lastsub), :group, :email, :pwd)";
                $stmt2 = $this->pdo->prepare($q2);
                $stmt2->execute([":sexe" => $sexe, ":firstname" => $firstname, ":lastname" => $lastname, ":birthdate" => $birthdate, ":birthplace" => $birthplace, ":lastsub" => $sub, ":group" => 1, ":email" => $email, ":pwd" => $pwd, ":img" => $img]);
                return "<span class='text-success'>L'adhérent à été ajouter avec succès</span>";
            }
            
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }
}

<?php


require_once("./factories/abstractedFactory.php");

class coachs extends abstractFactory{
    function coachList(){
        try{
            $q = "SELECT users.* FROM `users`
            INNER JOIN users_has_groups ON users_has_groups.id_users = users.id_users
            INNER JOIN groups ON groups.idgroups = users_has_groups.idgroups
            WHERE groups.name = :groupname";
            $stmt = $this->pdo->prepare($q);
            $stmt->execute(["groupname" => "coach"]);
            return $stmt->fetchAll(PDO::FETCH_CLASS);        
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }

    function nbrCoach(){
        $q = "SELECT count(*) AS result FROM users_has_groups
        WHERE idgroups = :group";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([":group" => 2]);
        return $stmt->fetchAll(PDO::FETCH_CLASS); 
    }

    function checkCoach($firstname, $lastname, $birthdate, $sexe, $pwd, $email, $img, $birthplace){
        try{
            $q = "SELECT users.*, groups.name AS groups FROM `users`
            INNER JOIN users_has_groups ON users_has_groups.id_users = users.id_users
            INNER JOIN groups ON groups.idgroups = users_has_groups.idgroups
            WHERE groups.name = :group AND users.firstname = :firstname AND users.lastname = :lastname AND users.birth_date = :birthdate";
            $stmt = $this->pdo->prepare($q);
            $stmt->execute([":group" => "coach", ":firstname" => $firstname, ":lastname" => $lastname, ":birthdate" => $birthdate]);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS); 
            if(!empty($result)){
                return "<span class='text-danger'>Le coach existé déjà !</span>
                    ";
            }else{
                $q2 = "SELECT users.*, users_has_groups.* FROM `users`
                INNER JOIN users_has_groups ON users_has_groups.id_users = users.id_users
                INNER JOIN groups ON groups.idgroups = users_has_groups.idgroups
                WHERE groups.name != :group AND users.firstname = :firstname AND users.lastname = :lastname AND users.birth_date = :birthdate";
                $stmt2 = $this->pdo->prepare($q2);
                $stmt2->execute([":group" => "coach", ":firstname" => $firstname, ":lastname" => $lastname, ":birthdate" => $birthdate]);
                $result2 = $stmt2->fetchAll(PDO::FETCH_CLASS);
                if(!empty($result2)){
                    $q3 = "INSERT INTO users_has_groups (id_users, id_sub, idgroups, email, password)
                    VALUES (:iduser, :idsub, :idgroup, :email, :pwd)";
                    $stmt3 = $this->pdo->prepare($q3);
                    $stmt3->execute([":iduser" => $result2[0]->id_users, ":idsub" => 3, ":idgroup" => 2, ":email" => $result2[0]->email, ":pwd" => $result2[0]->password]);
                    return "<span class='text-success'>Le coach à été ajouter avec succès</span>
                    ";
                }else{
                    $q4 = "INSERT INTO users (sexe, firstname, lastname, birth_date, birth_place, profil_picture)
                    VALUES (:sexe, :firstname, :lastname, :birthdate, :birthplace, :img);
                    INSERT INTO users_has_groups (id_users, id_sub, idgroups, email, `password`)
                    VALUES (LAST_INSERT_ID(), :sub, :group, :email, :pwd)";
                    $stmt4 = $this->pdo->prepare($q4);
                    $stmt4->execute([":sexe" => $sexe, ":firstname" => $firstname, ":lastname" => $lastname, ":birthdate" => $birthdate, ":birthplace" => $birthplace, ":sub" => 3, ":group" => 2, ":email" => $email, ":pwd" => $pwd, ":img" => $img]);
                    return "<span class='text-success'>Le coach à été ajouter avec succès</span>
                    ";
                }
            }
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }
}

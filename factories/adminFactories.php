<?php
require_once("./factories/abstractedFactory.php");

    class adminLogin extends abstractFactory{
        
        function adminConnect($email, $password){
            try{
                $q = "SELECT users.*, users_has_groups.email, users_has_groups.password FROM `users`
                INNER JOIN users_has_groups ON users_has_groups.id_users = users.id_users
                INNER JOIN groups ON groups.idgroups = users_has_groups.idgroups
                WHERE groups.name = 'admin' AND users_has_groups.email = :email AND users_has_groups.password = :password";
                $stmt = $this->pdo->prepare($q);
                $stmt->execute(["email" => $email, "password" => $password]);
                $result = $stmt->fetchAll(PDO::FETCH_CLASS);
                if(!empty($result)){
                    $_SESSION["login"] = $result;
                    header("Location: /admin");
                }else{
                    return "<span class='text-danger'>Identifiant incorrect !</span>
                    ";
                }
                
            }catch (Exception $e) {
                echo 'Exception reçue : ',  $e->getMessage(), "\n";
            }
        }
        function nbrAdmin(){
            $q = "SELECT count(*) AS result FROM users_has_groups
            WHERE idgroups = :group";
            $stmt = $this->pdo->prepare($q);
            $stmt->execute([":group" => 3]);
            return $stmt->fetchAll(PDO::FETCH_CLASS); 
        }
    }
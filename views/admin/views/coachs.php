<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Coachs
            </h1>
            <?php if($_POST){
                echo $addCoach;
            }?>
            <span class="text-success"></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Ajouter un coach
            </a>
        </div>
        <div class="row">
            <?php foreach ($coachList as $value):?>
                <div class="col-sm-2 text-center">
                    <div class="card ">
                        <?php if(!empty($value->profil_picture)):?>
                                <img src="<?php echo $value->profil_picture;?>" alt="Profil picture of adhérents" width="50%" class="rounded m-auto">
                        <?php endif;?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $value->firstname." ".$value->lastname;?>
                                <i class="fas fa-check-square text-warning"></i>
                            </h5>
                            <p class="card-text">
                                <?php echo $value->sexe;?> 
                                - 
                                <?php echo $adherents->calculAge($value->birth_date);?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un adhérent</h5><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <span class="text-danger my-3">Si le coach existe déjà en tant que adhérent ou admin, remplir seulement Prénom, Nom et Date de naissance</span>
                       
                        <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="sexe" id="HommeAdherent" value="Homme" checked>
                            <label class="form-check-label" for="HommeAdherent">
                                Homme
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="sexe" id="FemmeAdherent" value="Femme">
                            <label class="form-check-label" for="FemmeAdherent">
                                Femme
                            </label>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addAdherentFirstname">Prénom</span>
                            </div>
                            <input type="text" name="firstname" class="form-control" aria-describedby="addAdherentFirstname">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addAdherentLastname">Nom</span>
                            </div>
                            <input type="text" name="lastname" class="form-control" aria-describedby="addAdherentLastname">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addAdherentBirthdate">Date de naissance (JJ-MM-AAAA) :</span>
                            </div>
                            <input type="text" name="birthdate" class="form-control" aria-describedby="addAdherentBirthdate">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addAdherentBirthplace">Lieu de naissance :</span>
                            </div>
                            <input type="text" name="birthplace" class="form-control" aria-describedby="addAdherentBirthplace">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addAdherentEmail">Email</span>
                            </div>
                            <input type="text" name="email" class="form-control" aria-describedby="addAdherentEmail">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addAdherentPwd">Mot de passe</span>
                            </div>
                            <input type="text" name="pwd" class="form-control" aria-describedby="addAdherentPwd">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addAdherentImg">Image de profil</span>
                            </div>
                            <input type="text" name="img" class="form-control" aria-describedby="addAdherentImg">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
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
                Adhérents
            </h1>
            <?php if($_POST){
                echo $addAdherent;
            }?>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Ajouter un adhérent
            </a>
        </div>
        <div class="row">
            <?php foreach ($adherentList as $value):?>
                <div class="col-sm-2 text-center">
                    <div class="card ">
                        <?php if(!empty($value->profil_picture)):?>
                                <img src="<?php echo $value->profil_picture;?>" alt="Profil picture of adhérents" width="50%" class="rounded m-auto">
                        <?php endif;?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $value->firstname." ".$value->lastname;?>
                            </h5>
                            <p class="card-text">
                                <?php echo $value->sexe;?> 
                                - 
                                <?php echo $adherents->calculAge($value->birth_date);?>
                            </p>
                            <p class="card-text"><?php echo $value->description;?></p>
                            <a href="#" class="btn btn-primary">Abonnement <?php echo $value->sub_name;?></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un adhérent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <h4>Sexe : </h4>
                        <div class="form-check mb-3">
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
                        <h4>Subscribe : </h4>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="sub" id="AdherentsubS" value="Standard" checked>
                            <label class="form-check-label" for="AdherentsubS">
                                Standard
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="sub" id="AdherentsubA" value="Advanced">
                            <label class="form-check-label" for="AdherentsubA">
                                Advanced
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="sub" id="AdherentsubP" value="Prenium">
                            <label class="form-check-label" for="AdherentsubP">
                                Prenium
                            </label>
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
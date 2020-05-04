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
                Sports
            </h1>
            <?php if($_POST){
                echo $addSport;
            }?>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Ajouter un sport
            </a>
        </div>
        <div class="row">
            <?php foreach ($sportlist as $value):?>
                <div class="col-sm-2 text-center m-3">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $value->name;?>
                            </h5>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un sport</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/sports" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="sportname">Nom</span>
                            </div>
                            <input type="text" name="sport" class="form-control" aria-describedby="sportname">
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
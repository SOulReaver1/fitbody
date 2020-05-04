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
                Contact
            </h1>
        </div>

        <div class="list-group ">
            <?php foreach ($getContact as $key => $value):?>
                <div class="list-group-item  bg-dark text-white mb-3">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">
                        <?php echo $value->firstname." ".$value->lastname;?>
                    </h5>
                    <small>
                        <?php echo $value->created_at;?>
                    </small>
                    </div>
                    <p class="mb-1">
                        <?php echo $value->message;?>
                    </p>
                    <small>
                        <?php echo $value->email;?>
                    </small>
                </div>
            <?php endforeach;?>
        </div>
</body>
</html>
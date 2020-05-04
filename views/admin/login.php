<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="/views/assets/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' href="/views/admin/assets/css/login.css">
    
    <title>FitBody | Panel Admin</title>
</head>
<body>
    <form action="/admin/connect" method="post" class="login-form">
        <img src="./views/admin/assets/img/Groupe 99.png" alt="">
        <h2>Admin panel</h2>
        <?php if($_POST){
            echo $adminConnect;
        }?>
        <div class="form__group field">
            <input type="email" class="form__field" placeholder="Your Email*" name="email" id='email' required />
            <label for="email" class="form__label">Your Email*</label>
        </div>
        <div class="form__group field">
            <input type="password" class="form__field" placeholder="Your Password*" name="password" id='password' required />
            <label for="password" class="form__label">Your Password*</label>
        </div>
        <button type="submit" class="btn btn-login">Se connecter</button>
    </form>
</body>
</html>
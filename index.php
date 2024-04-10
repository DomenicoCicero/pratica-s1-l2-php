<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email non valida';
    }

    if(strlen($password) < 8) {
        $errors['password'] = 'Password troppo corta';
    }

    if(strlen($username) <= 1) {
        $errors['username'] = 'Username troppo corto';
    }

    if($errors == []) {
        header('Location: /pratica-s1-l2-php/success.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">FORM</h1>
        <div class="row text-center">
            <div class="col">
                    <form action="" method="post" novalidate>
        <label for="username" class="d-block">Username</label>
        <input type="text" name="username" id="username" placeholder="Username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" value="<?= !empty($errors)  ? $username : ''  ?>">
        <div class="error"><?= $errors['username'] ?? '' ?></div>
        <br>

        <label for="email" class="d-block">Email</label>
        <input type="email" name="email" id="email" placeholder="example@email.com" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= !empty($errors)  ? $email : ''  ?>">
        <div class="error"><?= $errors['email'] ?? '' ?></div>
        <br>

        <label for="password" class="d-block">Password</label>
        <input type="password" name="password" id="password" placeholder="A secure password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" value="<?= !empty($errors)  ? $password : ''  ?>">
        <div class="error"><?= $errors['password'] ?? '' ?></div>
        <br>

        <button type="submit" class="btn btn-primary mt-3">Invia</button>
    </form>
            </div>
        </div>
    </div>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
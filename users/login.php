<?php

require_once '../bootstrap.php';

use App\Entity\User;

function login(PDO $db, $data)
{
    $stmt = $db->prepare('SELECT * FROM users WHERE (`username` = :login OR `email` = :login)');
    $stmt->bindParam(':login', $data['username']);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_CLASS, User::class);

    $user = array_filter($users, function (User $user) use ($data) {
        return password_verify($data['password'], $user->getPassword());
    });

    if (isset($user[0])) {
        $_SESSION['user'] = $user[0];

        header('Location: ../index.php');
        exit();
    } else {
        return 'Identifiants incorrect';
    }
}

if (isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $result = login($db, $_POST);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body class="bg-light vh-100">
    <main role="main" class="h-100">
        <div class="container h-100">
            <div class="d-flex flex-column p-2 align-items-center justify-content-center h-100">
                <div class="card w-100" style="max-width: 400px;">
                    <div class="card-header">Connexion</div>
                    <div class="card-body">
                        <?php if (isset($result)) : ?>
                            <div class="alert alert-danger">
                                <?= $result ?>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username">
                                <label for="username">Nom d'utilisateur ou email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password">
                                <label for="password">Mot de passe</label>
                            </div>
                            <span>Pas de compte ? <a href="register.php" class="text-decoration-none">S'inscrire</a></span>
                            <button type="submit" class="btn btn-dark float-end">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>
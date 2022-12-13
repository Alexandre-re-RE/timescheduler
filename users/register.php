<?php

require_once('../bootstrap.php');

use App\Entity\User;

function register(PDO $db, array $data)
{
    if ($data['password'] !== $data['password_confirm']) {
        return [
            'status' => false,
            'message' => 'Les mots de passes ne correspondent pas.'
        ];
    }

    if (
        (!isset($data['username']) || empty($data['username'])) ||
        (!isset($data['firstname']) || empty($data['firstname'])) ||
        (!isset($data['lastname']) || empty($data['lastname'])) ||
        (!isset($data['email']) || empty($data['email']))
    ) {
        return [
            'status' => false,
            'message' => 'Vous devez renseigner tous les champs'
        ];
    }

    $user = new User();

    $user
        ->setUsername(htmlspecialchars($data['username']))
        ->setFirstname(htmlspecialchars($data['firstname']))
        ->setLastname(htmlspecialchars($data['lastname']))
        ->setEmail(htmlspecialchars($data['email']))
        ->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));

    $stmt = $db
        ->prepare('INSERT INTO users(`firstname`, `lastname`, `email`, `username`, `password`, `created_at`, `updated_at`, `role_id`) VALUES(:firstname, :lastname, :email, :username, :password, :created_at, :updated_at, (SELECT id FROM roles WHERE code = "DEV"))');

    try {
        $stmt->execute($user->toArray());

        return [
            'status' => true,
            'message' => 'Votre compte à bien été enregistré'
        ];
    } catch (\PDOException $ex) {
        var_dump($ex->getMessage());
        die;
        return [
            'status' => false,
            'message' => 'Erreur lors de l\'ajout de votre compte, veuillez réessayer.'
        ];
    }
}

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = register($db, $_POST);

    if ($result['status'] === true) {
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body class="bg-light vh-100">
    <main role="main" class="h-100">
        <div class="container h-100">
            <div class="d-flex flex-column align-items-center justify-content-center h-100">
                <div class="card w-100" style="max-width: 600px;">
                    <div class="card-header">Inscription</div>
                    <div class="card-body">
                        <?php if ($result !== null) : ?>
                            <div class="alert alert-danger">
                                <?= $result['message'] ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" id="register-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="firstname" name="firstname">
                                        <label for="firstname">Nom</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lastname" name="lastname">
                                        <label for="lastname">Prénom</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username">
                                <label for="username">Nom d'utilisateur</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password">
                                <label for="password">Mot de passe</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password-confirm" name="password_confirm">
                                <label for="password-confirm">Confirmer le mot de passe</label>
                            </div>
                            <span>Déjà un compte ? <a href="login.php" class="text-decoration-none">Se connecter</a></span>
                            <button type="submit" class="btn btn-dark float-end">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="./public/js/register-validation.js"></script>
</body>

</html>
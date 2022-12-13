<?php
require_once './bootstrap.php';

session_start();

/** @var \App\Entity\User|null $user */
$user = $_SESSION['user'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time schedule</title>
</head>

<body>
    <?php if (!is_null($user)) : ?>
        <ul>
            <li>Firstname: <?= $user->getFirstname() ?></li>
            <li>Lastname: <?= $user->getLastname() ?></li>
            <li>Username: <?= $user->getUsername() ?></li>
            <li>Email: <?= $user->getEmail() ?></li>
            <li>Password: <?= $user->getPassword() ?></li>
            <li>Date de création: <?= $user->getCreatedAt()->format('d/m/Y H:i:s') ?></li>
            <li>Date de modification: <?= $user->getUpdatedAt()->format('d/m/Y H:i:s') ?></li>
        </ul>
    <?php else : ?>
        <p>Vous êtes pas connecté !</p>
    <?php endif; ?>
</body>

</html>
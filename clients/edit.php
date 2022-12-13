<?php
require_once '../bootstrap.php';

use App\Entity\Client;
use App\Repository\ClientRepository;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

function edit(PDO $db, Client $entity, $data)
{
    if (!isset($data['name']) || empty($data['name'])) {
        return [
            'status' => false,
            'message' => 'Vous devez préciser le nom'
        ];
    }

    $entity
        ->setName(htmlspecialchars($data['name']))
        ->setUpdatedAt(new DateTime());

    (new ClientRepository)->save($entity);

    return [
        'status' => true,
        'message' => 'Client mis à jour !'
    ];
}

$client = (new ClientRepository)->find($_GET['id']);

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = edit($db, $client, $_POST);

    if ($result['status'] === true) {
        header('Location: index.php');
        exit;
    }
}

ob_start();
?>
<?php if ($client instanceof Client) : ?>
    <div class="card mt-4">
        <div class="card-header">Modifier le client n°<?= $client->getId() ?></div>
        <div class="card-body">
            <?php if ($result !== null) : ?>
                <div class="alert alert-danger">
                    <?= $result['message'] ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $client->getName() ?>">
                    <label for="name">Nom du client</label>
                </div>
                <button type="submit" class="btn btn-dark float-end">Valider</button>
            </form>
        </div>
    </div>
<?php else : ?>
    <div class="mt-4">
        <div class="alert alert-danger">
            Le client n°<?= $_GET['id'] ?> n'existe pas.
        </div>
    </div>
<?php endif; ?>
<?php $content = ob_get_clean() ?>

<?php require_once TEMPLATES . 'Layout/default.php'; ?>
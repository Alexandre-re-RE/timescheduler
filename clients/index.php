<?php
require_once('../bootstrap.php');

use App\Repository\ClientRepository;

$clients = (new ClientRepository)->findAll();

?>

<?php ob_start(); ?>
<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <span>Clients</span>
            <a href="./add.php" class="btn btn-dark">Ajouter</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Date de création</th>
                    <th>Date de modification</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $client->getId() ?></td>
                        <td><?= $client->getName() ?></td>
                        <td><?= $client->getCreatedAt()->format('d/m/Y H:i:s') ?></td>
                        <td><?= $client->getUpdatedAt()->format('d/m/Y H:i:s') ?></td>
                        <td>
                            <a href="show.php?id=<?= $client->getId() ?>" class="text-black"><i class="fas fa-eye"></i></a>
                            <a href="edit.php?id=<?= $client->getId() ?>" class="text-black"><i class="fas fa-edit"></i></a>
                            <form action="delete.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?= $client->getId() ?>">
                                <a href="#" onclick="if(confirm('Êtes-vous sûr de votre action ?')) {this.parentNode.submit()}" class="text-black"><i class="fas fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean() ?>

<?php require_once('../templates/layout.php') ?>
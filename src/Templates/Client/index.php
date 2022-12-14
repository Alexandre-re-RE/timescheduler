<?php
require_once('./bootstrap.php');

/**
 * @var \App\Entity\Client $client
 */
?>

<?php ob_start(); ?>
<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <span>Clients</span>
            <a href="<?= APP_DIR ?>clients/add" class="btn btn-dark">Ajouter</a>
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
                            <a href="<?= APP_DIR . 'clients/view/' . $client->getId() ?>" class="text-black"><i class="fas fa-eye"></i></a>
                            <a href="<?= APP_DIR . 'clients/update/' . $client->getId() ?>" class="text-black"><i class="fas fa-edit"></i></a>
                            <form action="<?= APP_DIR . 'clients/delete/' . $client->getId() ?>" method="post" style="display: inline-block;">
                                <input type="hidden" name="method" value="DELETE">
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

<?php require_once(TEMPLATES . 'Layout/default.php') ?>

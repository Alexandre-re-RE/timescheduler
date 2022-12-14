<?php ob_start(); ?>
<?php if (!is_object($client)) : ?>
    <div class="mt-4">
        <div class="alert alert-danger">
            Le client avec l'id <?= $id ?> n'existe pas.
        </div>
    </div>
<?php else : ?>
    <div class="card mt-4">
        <div class="card-header">
            Client n°<?= $client->getId() ?>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nom: </strong><?= $client->getName() ?></li>
                <li class="list-group-item"><strong>Date de création: </strong> <?= $client->getCreatedAt()->format('d/m/Y H:i:s') ?></li>
                <li class="list-group-item"><strong>Date de modification: </strong> <?= $client->getCreatedAt()->format('d/m/Y H:i:s') ?></li>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php $content = ob_get_clean() ?>

<?php require_once TEMPLATES . 'Layout/default.php'; ?>
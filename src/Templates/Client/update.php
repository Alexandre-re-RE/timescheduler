<?php ob_start(); ?>
<?php if (is_object($client)) : ?>
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
                    <input type="hidden" name="method" value="UPDATE">
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
            Le client n°<?= $id ?> n'existe pas.
        </div>
    </div>
<?php endif; ?>
<?php $content = ob_get_clean() ?>

<?php require_once TEMPLATES . 'Layout/default.php'; ?>
<?php ob_start(); ?>
<div class="card mt-4">
    <div class="card-header">Ajout d'un client</div>
    <div class="card-body">
        <?php if ($result !== null) : ?>
            <div class="alert alert-danger">
                <?= $result['message'] ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name">
                <label for="name">Nom du client</label>
            </div>
            <button type="submit" class="btn btn-dark float-end">Valider</button>
        </form>
    </div>
</div>
<?php $content = ob_get_clean() ?>

<?php require_once TEMPLATES . 'Layout/default.php'; ?>
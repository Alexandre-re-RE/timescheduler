<?php
require_once('./bootstrap.php');

/**
 * @var \App\Entity\Status $status
 * @var \App\Entity\Status $statu
 */
?>

<?php ob_start(); ?>
<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <span>Status</span>
            <a href="<?= APP_DIR ?>/status/add" class="btn btn-dark">Ajouter</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>code</th>
                <th>name</th>
                <th>date de création</th>
                <th>date de mise à jour</th>
                
            </tr>
            </thead>
            <tbody>
            <?php foreach ($status as $statu) : ?>
                <tr>
                    <td><?= $statu->getId() ?></td>
                    <td><?= $statu->getCode() ?></td>
                    <td><?= $statu->getName() ?></td>
                    <td><?= $statu->getCreatedAt()->format('Y-m-d H:i:s') ?></td>
                    <td><?= $statu->getUpdatedAt()->format('Y-m-d H:i:s') ?></td>
                    <td>
                        <a href="/status/view/<?= $statu->getId() ?>" class="text-black"><i class="fas fa-eye"></i></a>
                        <a href="/status/update/<?= $statu->getId() ?>" class="text-black"><i class="fas fa-edit"></i></a>
                        <form action="/status/<?= $statu->getId() ?>" method="post" style="display: inline-block;">
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

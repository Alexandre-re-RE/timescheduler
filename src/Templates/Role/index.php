<?php
require_once('./bootstrap.php');

/**
 * @var \App\Entity\Role $role
 * @var \App\Entity\Role[] $roles
 */
?>

<?php ob_start(); ?>
<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <span>Roles</span>
            <a href="/roles/add" class="btn btn-dark">Ajouter</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>code</th>

                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($roles as $role) : ?>
                <tr>
                    <td><?= $role->getId() ?></td>
                    <td><?= $role->getName() ?></td>
                    <td><?= $role->getCode() ?></td>

                    <td>
                        <a href="/roles/view/<?= $role->getId() ?>" class="text-black"><i class="fas fa-eye"></i></a>
                        <a href="/roles/update/<?= $role->getId() ?>" class="text-black"><i class="fas fa-edit"></i></a>
                        <form action="/roles/<?= $role->getId() ?>" method="post" style="display: inline-block;">
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

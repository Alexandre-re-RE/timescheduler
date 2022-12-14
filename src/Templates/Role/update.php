<?php
/**
 * @var \App\Entity\Role $role
 */
?>




<?php ob_start(); ?>
    <form action="/roles/<?= $role->getId() ?>" method="POST">
        <input type="hidden" name="method" value="UPDATE" />
        <label>
            Code
            <input type="text" name="code" value="<?= $role->getCode() ?>" />
        </label>

        <label>
            Name
            <input type="text" name="name" value="<?= $role->getName() ?>" />
        </label>

        <button type="submit">Créer</button>
    </form>
<?php $content = ob_get_clean() ?>

<?php require_once(TEMPLATES . 'Layout/default.php') ?>

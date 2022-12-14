<?php
/**
 * @var \App\Entity\Role $role
 */
?>




<?php ob_start(); ?>
    <p>Role view</p>
    <p> # : <?= $role->getId() ?> </p>
    <p> Code : <?= $role->getCode() ?> </p>
    <p> Name : <?= $role->getName() ?> </p>
    <p> Created At : <?= $role->getCreatedAt() ?> </p>
    <p> Updated At : <?= $role->getUpdatedAt() ?> </p>
<?php $content = ob_get_clean() ?>

<?php require_once(TEMPLATES . 'Layout/default.php') ?>

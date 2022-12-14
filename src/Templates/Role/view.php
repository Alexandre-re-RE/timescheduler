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
    <p> Created At : <?= $role->getCreatedAt()->format('d M Y H:i:s') ?> </p>
    <p> Updated At : <?= $role->getUpdatedAt()->format('d M Y H:i:s') ?> </p>
<?php $content = ob_get_clean() ?>

<?php require_once(TEMPLATES . 'Layout/default.php') ?>

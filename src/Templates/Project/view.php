<?php
/**
 * @var \App\Entity\Project $project
 * @var \App\Entity\Client $client
 * @var \App\Entity\Status $status
 */
?>

<?php ob_start(); ?>
    <p>View project</p>
    <p> name : <?= $project->getName() ?></p>
    <p> description : <?= $project->getDescription() ?></p>
    <p> date de début : <?= $project->getStartDate() ?></p>
    <p> date de fin : <?= $project->getEndDate() ?></p>
    <p> date de debut réel : <?= $project->getRealStartDate() ?></p>
    <p> date de fin réel : <?= $project->getRealEndDate() ?></p>
    <p> status : <?= $status->getName() ?></p>
    <p> client : <?= $client->getName() ?></p>
<?php $content = ob_get_clean() ?>

<?php require_once(TEMPLATES . 'Layout/default.php') ?>

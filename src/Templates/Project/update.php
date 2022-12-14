<?php
/**
 * @var \App\Entity\Client $client
 * @var \App\Entity\Client[] $clients
 * @var \App\Entity\Project $project
 */

var_dump($project->getId());
?>

<?php ob_start(); ?>
    <form method="post" action="<?= APP_DIR ?>projects/update/<?= $project->getId() ?>">
        <input type="hidden" name="method" value="UPDATE">

        <input type="text" name="name" value="<?= $project->getName() ?>" />
        <input type="text" name="description" value="<?= $project->getDescription() ?>" />
        <input type="date" name="start_date" value="<?= (new DateTime($project->getStartDate()))->format('Y-m-d') ?>" />
        <input type="date" name="end_date" value="<?= (new DateTime($project->getEndDate()))->format('Y-m-d') ?>" />

        <select name="client_id">
            <?php foreach ($clients as $client): ?>
                <option <?php if($client->getId() === $project->getClientId()): ?> selected <?php endif; ?>  value="<?= $client->getId() ?>"><?= $client->getName() ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">update</button>
    </form>
<?php $content = ob_get_clean() ?>

<?php require_once(TEMPLATES . 'Layout/default.php') ?>

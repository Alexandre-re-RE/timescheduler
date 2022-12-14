<?php
/**
 * @var \App\Entity\Client $client
 * @var \App\Entity\Client[] $clients
 * @var \App\Entity\Project $project
 */
?>

<form method="post" action="/projects">
    <input type="hidden" name="method" value="UPDATE">

    <input type="text" name="name" value="<?= $project->getName() ?>" />
    <input type="text" name="description" value="<?= $project->getDescription() ?>" />
    <input type="date" name="start_date" value="<?= $project->getStartDate() ?>" />
    <input type="date" name="end_date" value="<?= $project->getEndDate() ?>" />

    <select name="client_id">
        <?php foreach ($clients as $client): ?>
            <option <?php if($client === $project->getClientId()): ?> selected <?php endif; ?>  value="<?= $client->getId() ?>"><?= $client->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">update</button>
</form>

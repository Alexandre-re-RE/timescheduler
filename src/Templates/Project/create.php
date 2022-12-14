<?php
/**
 * @var \App\Entity\Client $client
 * @var \App\Entity\Client[] $clients
 */
?>

<form method="post" action="/projects">
    <input type="text" name="name" />
    <input type="text" name="description" />
    <input type="date" name="start_date" />
    <input type="date" name="end_date" />

    <select name="client_id">
        <option value="">--Sélectionner un client--
        <?php foreach ($clients as $client): ?>
            <option value="<?= $client->getId() ?>"><?= $client->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">créer</button>
</form>

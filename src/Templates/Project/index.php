<?php
require_once('./bootstrap.php');

/**
 * @var \App\Entity\Project $projet
 * @var $statusRepository \App\Repository\StatusRepository
 * @var $clientRepository \App\Repository\ClientRepository
 */
?>

<?php ob_start(); ?>
<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <span>Projects</span>
            <a href="/projects/add" class="btn btn-dark">Ajouter</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>description</th>
                <th>date de début</th>
                <th>date de fin</th>
                <th>date réel de début</th>
                <th>date réel de fin</th>
                <th>status</th>
                <th>client</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($projects as $project) : ?>
                <tr>
                    <td><?= $project->getId() ?></td>
                    <td><?= $project->getName() ?></td>
                    <td><?= $project->getDescription() ?></td>
                    <td><?= $project->getStartDate() ?></td>
                    <td><?= $project->getEndDate() ?></td>
                    <td><?= $project->getRealStartDate() ?></td>
                    <td><?= $project->getRealEndDate() ?></td>
                    <td><?= $clientRepository->find($project->getClientId())->getName() ?></td>
                    <td><?= $statusRepository->find($project->getStatusId())->getName() ?></td>
                    <td>
                        <a href="/projects/view/<?= $project->getId() ?>" class="text-black"><i class="fas fa-eye"></i></a>
                        <a href="/projects/update/<?= $project->getId() ?>" class="text-black"><i class="fas fa-edit"></i></a>
                        <form action="/projects/<?= $project->getId() ?>" method="post" style="display: inline-block;">
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

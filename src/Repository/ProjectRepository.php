<?php

namespace App\Repository;

use App\Entity\Project;
use App\Repository\AbstractRepository;

/**
 * Project repository
 *
 * @method \App\Entity\Project[]|null findAll()
 * @method \App\Entity\Project|bool find($id)
 */
class ProjectRepository extends AbstractRepository
{

    public function getEntityClass()
    {
        return Project::class;
    }

    public function getTable()
    {
        return 'projects';
    }
}

<?php

namespace App\Repository;

use App\Entity\Task;
use App\Repository\AbstractRepository;

/**
 * Project repository
 *
 * @method \App\Entity\Task[]|null findAll()
 * @method \App\Entity\Task|bool find($id)
 */
class TaskRepository extends AbstractRepository
{

    public function getEntityClass()
    {
        return Task::class;
    }

    public function getTable()
    {
        return 'tasks';
    }
}

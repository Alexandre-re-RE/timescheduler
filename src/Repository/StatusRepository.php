<?php

namespace App\Repository;

use App\Entity\Status;
use App\Repository\AbstractRepository;


/**
 * Project repository
 *
 * @method \App\Entity\Status[]|null findAll()
 * @method \App\Entity\Status|bool find($id)
 */
class StatusRepository extends AbstractRepository
{

    public function getEntityClass()
    {
        return Status::class;
    }

    public function getTable()
    {
        return 'status';
    }
}

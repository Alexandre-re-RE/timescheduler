<?php

namespace App\Repository;

use App\Entity\Role;
use App\Repository\AbstractRepository;


/**
 * Project repository
 *
 * @method \App\Entity\Role[]|null findAll()
 * @method \App\Entity\Role|bool find($id)
 */
class RoleRepository extends AbstractRepository
{

    public function getEntityClass()
    {
        return Role::class;
    }

    public function getTable()
    {
        return 'roles';
    }
}

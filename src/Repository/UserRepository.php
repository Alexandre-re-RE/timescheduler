<?php

namespace App\Repository;

use App\Entity\User;
use App\Repository\AbstractRepository;


/**
 * Project repository
 *
 * @method \App\Entity\User[]|null findAll()
 * @method \App\Entity\User|bool find($id)
 */
class UserRepository extends AbstractRepository
{

    public function getEntityClass()
    {
        return User::class;
    }

    public function getTable()
    {
        return 'users';
    }
}

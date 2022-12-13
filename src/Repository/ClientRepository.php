<?php

namespace App\Repository;

use App\Entity\Client;
use App\Repository\AbstractRepository;

/**
 * Client repository
 * 
 * @method \App\Entity\Client[]|null findAll()
 * @method \App\Entity\Client|bool find($id)
 */
class ClientRepository extends AbstractRepository
{

    public function getEntityClass()
    {
        return Client::class;
    }

    public function getTable()
    {
        return 'clients';
    }
}

<?php

namespace App\Controller;

use App\Repository\ClientRepository;

class ClientController {

    public function index()
    {
        $clients = (new ClientRepository)->findAll();
        require 'src/Templates/Client/index.php';
    }
    public function view($id)
    {

    }
    public function create()
    {

    }
    public function update($id)
    {

    }
    public function delete($id)
    {

    }
}

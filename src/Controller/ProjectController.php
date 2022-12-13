<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Repository\ProjectRepository;
use App\Repository\StatusRepository;

class ProjectController {

    public function index()
    {
        //instaciatio des repository pour ensuite récupérer les relations
        $statusRepository = new StatusRepository();
        $clientRepository = new ClientRepository();

        //récupération de la liste de projet
        $projects = (new ProjectRepository())->findAll();

        //rendu du template
        require 'src/Templates/Project/index.php';
    }
    public function view($id)
    {
        require 'src/Templates/Project/view.php';
    }
    public function create()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === "GET") {
            require 'src/Templates/Project/create.php';
            exit;
        }

        var_dump('je doit pas attrir ici');
    }
    public function update($id)
    {
        require 'src/Templates/Project/update.php';
    }
    public function delete($id)
    {
        require 'src/Templates/Project/delete.php';
    }
}

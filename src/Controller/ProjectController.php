<?php

namespace App\Controller;

use App\Repository\ProjectRepository;

class ProjectController {

    public function index()
    {
        $projectRepository = new ProjectRepository();
        $statusRepository = new ProjectRepository();
        $clientRepository = new ProjectRepository();

        $projects = $projectRepository->findAll();

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

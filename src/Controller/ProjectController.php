<?php

namespace App\Controller;

use App\Entity\Project;
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
        $project = (new ProjectRepository())->find($id);
        $client = (new ClientRepository())->find($project->getClientId());
        $status = (new StatusRepository())->find($project->getStatusId());

        require 'src/Templates/Project/view.php';
    }
    public function create()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === "GET") {
            $clients = (new ClientRepository())->findAll();
            require 'src/Templates/Project/create.php';
            exit;
        }

        foreach ($_POST as $key => $value) {
            ${$key} = $value;
        }

        $project = (new Project())
            ->setName($name)
            ->setDescription($description)
            ->setStartDate(date_create_from_format('YYYY-MM-DD', $start_date))
            ->setEndDate(date_create_from_format('YYYY-MM-DD', $end_date))
            ->setClientId((new ClientRepository())->find($client_id))
        ;
        //save le project
    }
    public function update($id)
    {

        $method = $_SERVER['REQUEST_METHOD'];

        if($method === "GET") {
            $clients = (new ClientRepository())->findAll();
            $project = (new ProjectRepository())->find($id);
            require 'src/Templates/Project/update.php';
            exit;
        }


    }
    public function delete($id)
    {
        $delete = (new ProjectRepository)->delete($id);
        header('Location: /projects');
    }
}

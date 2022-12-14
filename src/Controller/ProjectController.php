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

        //TODO : caca a changer apres fait vite fait
        $statusFind;
        $status = (new StatusRepository())->findAll();
        foreach ($status as $statut) {
            if($statut->getCode() === "WAITING") {
                $statusFind = $statut;
            }
        }

        $project = (new Project())
            ->setName($name)
            ->setDescription($description)
            ->setStartDate(new \DateTime($start_date))
            ->setEndDate(new \DateTime($end_date))
            ->setClientId((new ClientRepository())->find($client_id)->getId())
            ->setStatusId($statusFind->getId())
        ;

        (new ProjectRepository())->save($project);

        header('Location: ' . APP_DIR . 'projects');
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

        $project = (new ProjectRepository())->find($id);

        foreach ($_POST as $key => $value) {
            ${$key} = $value;
        }

        $project
            ->setName($name)
            ->setDescription($description)
            ->setStartDate(new \DateTime($start_date))
            ->setEndDate(new \DateTime($end_date))
            ->setClientId((new ClientRepository())->find($client_id)->getId())
        ;

        (new ProjectRepository())->save($project);

        header('Location: ' . APP_DIR . 'projects');
    }
    public function delete($id)
    {
        $delete = (new ProjectRepository)->delete($id);
        header('Location: ' . APP_DIR . 'projects');
    }
}

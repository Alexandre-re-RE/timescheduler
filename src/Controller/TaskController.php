<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\StatusRepository;
use App\Repository\TaskRepository;
use DateTime;

class TaskController
{

    public function index()
    {
        $task = new TaskRepository();
        require 'src/Templates/Task/index.php';
    }
    public function view($id)
    {
        $task = (new TaskRepository())->find($id);
        require 'src/Templates/Task/view.php';
    }
    public function create()
    {
        $statusCollection = (new StatusRepository())->findAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //faire la boucle grave styler car la🤢

            $title = $_POST["title"];
            $description = $_POST["description"];
            $priority = 1;
            $startDate = $_POST["start_date"];
            $realStartDate = $_POST["start_date"];
            $endDate = $_POST["end_date"];

            $realEndDate = $_POST["end_date"];
            $task = new Task();
            $task
                ->setTitle($title)
                ->setDescription($description)
                ->setPriority($priority)
                ->setStartDate(new DateTime($startDate))
                ->setRealStartDate(new DateTime($realStartDate))
                ->setEndDate(new DateTime($endDate))

                ->setRealEndDate(new DateTime($realEndDate));
            (new TaskRepository())->save($task);
            exit;
        }

        //créations de l'objet
        require 'src/Templates/Task/create.php';
    }
    public function update($id)
    {
        require 'src/Templates/Task/update.php';
    }
    public function delete($id)
    {
        require 'src/Templates/Task/delete.php';
    }
}

<?php

use App\Entity\Task;

include_once("../src/Entity/Task.php");


function ajouter($title, $description, $priority, $startDate, $realStartDate, $endDate, $realEndDate)
{


    $task = new Task();

    $task->title  = $title;
    $task->description = $description;
    $task->priority = $priority;
    $task->start_date = $startDate;
    $task->end_date = $endDate;
    $task->real_start_date = $realStartDate;
    $task->real_end_date = $realEndDate;
    $task->create = date('d-m-y h:i:s');
    $task->updated_at =  date('d-m-y h:i:s');
}

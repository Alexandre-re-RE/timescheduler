<?php

use App\Entity\Task;

include_once("../src/Entity/Task.php");
require("../bootstrap.php");

function ajouter($title, $description, $priority, $startDate, $realStartDate, $endDate, $realEndDate, PDO $db)
{
    session_start();
    //créations de l'objet
    $task = new Task();
    //add dans l'objet
    $task->title  = $title;
    $task->description = $description;
    $task->priority = $priority;
    $task->start_date = $startDate;
    $task->end_date = $endDate;
    $task->real_start_date = $realStartDate;
    $task->real_end_date = $realEndDate;
    $task->create = date("Y/m/d");
    $task->updated_at =  date("Y/m/d");

    //créations d'une requetes pour récup l'id du project 
    $reqProject = $db->query("Select id from projects where client_id=:clientId");
    $reqProject->bindParam("clientId", $_SESSION["user"]);
    $reqProject->execute();
    $reqProject->setFetchMode(PDO::FETCH_ASSOC);
    $reqProject = $reqProject->fetchAll();
    //persitence des données 
    $status = 1;
    $date = date("Y/m/d");
    $req = $db->prepare("INSERT INTO `task`(`title`, `description`, `priority`, `start_date`, `end_date`, `real_start_date`, `status_id`,'user_id','project_id','created_at','updated_at') VALUES (:title,:descrip,:priority,:startDate,:endDate,:realStartDate,:statusID,:userID,:projectId,:createdAt,:updatedAt)");
    $req->bindParam("tiltle", $_POST['inputTitle']);
    $req->bindParam("descrip", $_POST['inputDescription']);
    $req->bindParam("priority", $_POST['inputPriority']);
    $req->bindParam("startDate", $_POST['inputStartDate']);
    $req->bindParam("endDate", $_POST['inputEndDate']);
    $req->bindParam("realStartDate", $_POST['inputRealStartDate']);
    $req->bindParam("statusId", $status);
    $req->bindParam("userId", $_SESSION["user"]);
    $req->bindParam("projectID", $reqProject);
    $req->bindParam("createdAt", $date);
    $req->bindParam("updatedAt", $date);
    $req->execute();
    //on récup cmt  par session user ,   je réalise une requete project ,status par défaut == en cours 
}

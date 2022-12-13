<?php

use App\Entity\Task;

include_once("../src/Entity/Task.php");
require("../bootstrap.php");

function ajouter($title, $description, $priority, $startDate, $realStartDate, $endDate, $db)
{
    session_start();
    //créations de l'objet
    $task = new Task();
    $task
        ->setTitle($title)
        ->setDescription($description)
        ->setPriority($priority)
        ->setStartDate($startDate)
        ->setRealStartDate($realStartDate)
        ->setEndDate($endDate);

    //créations d'une requetes pour récup l'id du project mais ne brute
    $client = 1;
    $user = 1;
    $priority = 1;
    $reqProject = $db->prepare("Select id from projects where client_id=:clientId");
    // $reqProject->bindParam("clientId", $_SESSION["client"]);
    $reqProject->bindParam(":clientId", $client);
    $reqProject->fetch(\PDO::FETCH_ASSOC);
    // $res =  $reqProject->execute();
    $res = 1;
    //persitence des données 
    $status = 1;
    $date = date("Y-m-d");
    // $req = $db->prepare("INSERT INTO tasks (title, description,priority,start_date,end_date,real_start_date,status_id,user_id,project_id,created_at,updated_at) VALUES (:title,':description,:priority,:startDate,:endDate,:realStartDate,:statusId,:userId,:projectId,:createdAt,:updatedAt)");

    $req = $db->prepare("INSERT INTO tasks (title, description) VALUES (:title,:description)");

    /*$req->bindParam(":title", $_POST['inputTitle']);
    $req->bindParam(":descrip", $_POST['inputDescription']);
    $req->bindParam(":priority", $priority);
    $req->bindParam(":startDate", $date);
    $req->bindParam(":endDate", $date);
    $req->bindParam(":realStartDate", $date);
    $req->bindParam(":statusId", $status);
    $req->bindParam(":userId", $user);
    $req->bindParam(":projectId", $res);
    $req->bindParam(":createdAt", $date);
    $req->bindParam(":updatedAt", $date);*/
    $req->execute(array(
        ':title' => $title,
        ':description' => $description
    ));
}

// foreach ($_POST as $key => $value) {
//     echo "<br> $key=>$value";
//     ${$key} = $value;
// }

$title = $_POST["inputTitle"];
$description = $_POST["inputDescription"];
$priority = $_POST["inputPriority"];
$startDate = $_POST["inputStartDate"];
$realStartDate = $_POST["inputStartDate"];
$endDate = $_POST["inputEndDate"];
ajouter($title, $description, $priority, $startDate, $realStartDate, $endDate, $db);
header("location:form.php");

<?php 

require_once('../bootstrap.php');

use App\Repository\ClientRepository;


if(!empty($_POST["id"])){

    $result = (new ClientRepository)->delete($_POST["id"]);

    if($result){
        header("Location: index.php");
        exit;
    }
}

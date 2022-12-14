<?php

namespace App\Controller;

use DateTime;
use App\Entity\Status;
use App\Repository\StatusRepository;

class StatusController {

    public function index()
    {

        $status = (new StatusRepository())->findAll();

        require 'src/Templates/Status/index.php';
    }
    public function view($id){

    }
    public function create(){
        $method = $_SERVER['REQUEST_METHOD'];

        
        if($method === "GET") {
            require 'src/Templates/Status/create.php';
            exit;
        }

        foreach ($_POST as $key => $value) {
            ${$key} = $value;
        }

        if($method === "POST"){
            $statu = (new Status())
            ->setCode($code)
            ->setName($name)
            ->setCreatedAt(new DateTime($created_at))
            ->setUpdatedAt(new DateTime($updated_at))
            ;
        }
            
            

        (new StatusRepository())->save($statu);

        require 'src/Templates/Status/create.php';
    }
    public function update($id){

    }
    public function delete($id){

    }
}

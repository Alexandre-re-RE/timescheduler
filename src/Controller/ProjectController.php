<?php

namespace App\Controller;

class ProjectController {

    public function index()
    {
        require 'src/Templates/Client/index.php';
    }
    public function view($id)
    {
        require 'src/Templates/Client/view.php';
    }
    public function create()
    {
        require 'src/Templates/Client/create.php';
    }
    public function update($id)
    {
        require 'src/Templates/Client/update.php';
    }
    public function delete($id)
    {
        require 'src/Templates/Client/delete.php';
    }
}

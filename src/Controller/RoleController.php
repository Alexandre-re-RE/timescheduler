<?php

namespace App\Controller;

class RoleController {

    public function index()
    {
        require 'src/Templates/Role/index.php';
    }
    public function view($id)
    {
        require 'src/Templates/Role/view.php';
    }
    public function create()
    {
        require 'src/Templates/Role/create.php';
    }
    public function update($id)
    {
        require 'src/Templates/Role/update.php';
    }
    public function delete($id)
    {
        require 'src/Templates/Role/delete.php';
    }
}

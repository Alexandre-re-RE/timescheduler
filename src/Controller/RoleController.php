<?php

namespace App\Controller;

use App\Entity\Role;
use App\Repository\RoleRepository;
use App\Tools\ControllerTools;

class RoleController {

    public function index()
    {
        $roles = (new RoleRepository())->findAll();
        require 'src/Templates/Role/index.php';
    }
    public function view($id)
    {
        $role = (new RoleRepository())->find($id);
        require 'src/Templates/Role/view.php';
    }
    public function create()
    {
        if(ControllerTools::doesShouldRenderViewOrMakeAction()) {
            require 'src/Templates/Role/create.php';
            exit();
        }

        foreach ($_POST as $key => $value) {
            ${$key} = $value;
        }

        $role = (new Role())
            ->setCode($code)
            ->setName($name)
        ;

        $save = (new RoleRepository())->save($role);
        header('Location: /roles');
    }
    public function update($id)
    {
        $role = (new RoleRepository())->find($id);

        if(ControllerTools::doesShouldRenderViewOrMakeAction()) {
            require 'src/Templates/Role/update.php';
            exit();
        }

        foreach ($_POST as $key => $value) {
            ${$key} = $value;
        }

        $role
            ->setCode($code)
            ->setName($name)
        ;

        $save = (new RoleRepository())->save($role);
        header('Location: /roles');
    }

    public function delete($id)
    {
        $role = (new RoleRepository())->delete($id);
        header('Location: /roles');
    }
}

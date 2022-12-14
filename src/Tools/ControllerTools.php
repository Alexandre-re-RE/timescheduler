<?php
namespace App\Tools;

class ControllerTools {

    public static function doesShouldRenderViewOrMakeAction()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'GET')
            return true;

        return false;
    }
}

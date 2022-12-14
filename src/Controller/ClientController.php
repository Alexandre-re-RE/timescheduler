<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;

class ClientController
{

    private $clientRepository = null;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository;
    }

    public function index()
    {
        $clients = (new ClientRepository)->findAll();

        require TEMPLATES . 'Client/index.php';
    }

    public function view($id)
    {
        if (!isset($id) || empty($id)) {
            header('Location: ../index.php');
            exit;
        }

        $client = $this->clientRepository->find($id);

        require_once TEMPLATES . 'Client/view.php';
    }
    public function create()
    {

        $result = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $result = [
                    'status' => false,
                    'message' => 'Vous devez préciser le nom'
                ];
            }

            $client = new Client();

            $client->setName(htmlspecialchars($_POST['name']));

            if ($this->clientRepository->save($client)) {
                $result =  [
                    'status' => true,
                    'message' => 'Client enregistré !'
                ];

                header('Location: index.php');
                exit;
            }
        }

        require_once TEMPLATES . 'Client/create.php';
    }

    public function update($id)
    {
        $result = null;

        $client = $this->clientRepository->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $result = [
                    'status' => false,
                    'message' => 'Vous devez préciser le nom'
                ];
            }

            $client->setName(htmlspecialchars($_POST['name']));

            if ($this->clientRepository->save($client)) {
                $result =  [
                    'status' => true,
                    'message' => 'Client mis à jour !'
                ];

                header('Location: ../index.php');
                exit;
            }
        }

        require_once TEMPLATES . 'Client/update.php';
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($id)) {
            $this->clientRepository->delete($id);
        }

        header("Location: ../index.php");
        exit;
    }
}

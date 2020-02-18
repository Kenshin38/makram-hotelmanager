<?php

namespace App\Controller;

class RoomsController extends AbstractController
{

    /**
     * Afficher la page de 1 room
     * Route: GET /rooms/:id
     */
    public function show(int $id)
    {
        // 1. Récupérer le car par son id
        $room = $this->container->getRoomManager()->findOneById($id);
        $clients = $this->container->getClientManager()->findAll();

        //2. Afficher la room
        echo $this->container->getTwig()->render('rooms/show.html.twig', [
            'room' => $room,
            'clients' => $clients
        ]);
    }
    public function new()
    {
        echo $this->container->getTwig()->render('rooms/new.html.twig');
    }
    public function create()
    {
        $this->container->getRoomManager()->create($_POST);
        header('location: ' . $this->configuration['env']['base_path'] . '/rooms');
    }
    public function delete(int $id)
    {
        $this->container->getRoomManager()->remove($id);
        header('location: ' . $this->configuration['env']['base_path'] . '/rooms');
    }
    public function index()
    {
        $rooms = $this->container->getRoomManager()->findAll();
        echo $this->container->getTwig()->render('pages/index.html.twig', [
            'rooms' => $rooms
        ]);
    }
    public function renseignClient(int $id)
    {

        $this->container->getRoomManager()->renseignClient($id, $_POST['client_id']);
        header('location: ' . $this->configuration['env']['base_path'] . '/rooms');
      
    }
}

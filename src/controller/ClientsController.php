<?php

namespace App\Controller;

class ClientsController extends AbstractController
{

    /**
     * Afficher la page de 1 client
     * Route: GET /clients/:id
     */
    public function show(int $id)
    {
        // 1. Récupérer le client par son id
        $client = $this->container->getClientManager()->findOneById($id);

        //2. Afficher le client
        echo $this->container->getTwig()->render('clients/show.html.twig', [
            'client' => $client
        ]);
    }
    //afficher formulaire client
    public function new()
    {
        echo $this->container->getTwig()->render('clients/new.html.twig');
    }
    public function create()
    {
        $this->container->getClientManager()->create($_POST);
        header('location: ' . $this->config['env']['base_path'] . '/makram-hotelmanager/clients');
    }
    public function index()
    {
        $clients = $this->container->getClientManager()->findAll();
        echo $this->container->getTwig()->render('clients/index.html.twig', [
            'clients' => $clients
        ]);
    }

    public function delete(int $id)
    {
        $this->container->getClientManager()->remove($id);
        header('location: ' . $this->config['env']['base_path'] . '/makram-hotelmanager/clients');
    }
    public function edit(int $id)
    {
        $client = $this->container->getClientManager()->findOneById($id);
        echo $this->container->getTwig()->render('clients/edit.html.twig', ['client' => $client]);
    }
    public function update(int $id)
    {
        $this->container->getClientManager()->update($id, $_POST);

        $this->index();
    }
}

<?php

$router = $container->getRouter();
$router->setNamespace('App\Controller');

/**
 * Routes de base
 */
$router->get('', 'PagesController@index'); // Page d'accueil contenant entre autres la liste des rooms

/**
 * Routes ROOM
 */
$router->get('/rooms/(\d+)', 'RoomsController@show'); // Affichage de 1 room
$router->post('/rooms/(\d+)/renseign_client', 'RoomsController@renseignClient'); // Affichage de 1 room
$router->get('/rooms/new', 'RoomsController@new'); //création d'un client
$router->post('/rooms', 'RoomsController@create');
$router->post('/rooms/delete/(\d+)', 'RoomsController@remove');
$router->get('/rooms/delete/(\d+)', 'RoomsController@delete');
$router->get('/rooms', 'RoomsController@index');


/**
 * Routes CLIENT
 */
$router->get('/clients/(\d+)', 'ClientsController@show'); // Affichage de 1 room
$router->get('/clients/new', 'ClientsController@new'); //création d'un client
$router->post('/clients', 'ClientsController@create');
$router->get('/clients', 'ClientsController@index');

$router->post('/clients/delete/(\d+)', 'ClientsController@remove');
$router->get('/clients/delete/(\d+)', 'ClientsController@delete');

$router->post('/clients/edit/(\d+)', 'ClientsController@update');
$router->get('/clients/edit/(\d+)', 'ClientsController@edit');


$router->run();

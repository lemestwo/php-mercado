<?php

use Bramus\Router\Router;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$router = new Router();

$router->setNamespace('\App\Controllers');
$router->get('/', 'DashboardController@index');

$router->get('/products', 'ProductController@index');
$router->post('/products', 'ProductController@store');
$router->get('/products/create', 'ProductController@create');
$router->post('/products/{id}/delete', 'ProductController@delete');
$router->post('/products/{id}', 'ProductController@patch');
$router->get('/products/{id}/edit', 'ProductController@edit');

$router->get('/taxes', 'TaxesController@index');
$router->post('/taxes', 'TaxesController@store');
$router->get('/taxes/create', 'TaxesController@create');
$router->post('/taxes/{id}/delete', 'TaxesController@delete');

$router->run();
<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('login', 'LoginController@login');

$router->group(['middleware' => 'auth'], function () use ($router) {

    $router->get('customers', 'CustomerController@listar_customers');

    $router->get('customers/{customer_id}', 'CustomerController@listar_customer');

    $router->post('customers', 'CustomerController@criar_customer');

    $router->put('customers', 'CustomerController@atualizar_customer');

    $router->delete('customers/{customer_id}', 'CustomerController@excluir_customer');
});
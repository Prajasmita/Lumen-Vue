<?php

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
    return response()->json(['version' => $router->app->version()], 200);        

    // return $router->app->version();
});

$router->post('register', 'UserController@register');
// $router->get('api/login','LoginController@login');

$router->group(['prefix' => 'api/'], function ($router) {
    $router->get('login/','UserController@authenticate');
    $router->post('todo/','TodoController@store');
    $router->get('todo/', 'TodoController@index');
    $router->get('todo/{id}/', 'TodoController@show');
    $router->put('todo/{id}/', 'TodoController@update');
    $router->delete('todo/{id}/', 'TodoController@destroy');
});

// $app->group(['prefix' => 'api/'], function ($app) {
//     $app->get('login/','UsersController@authenticate');
//     $app->post('todo/','TodoController@store');
//     $app->get('todo/', 'TodoController@index');
//     $app->get('todo/{id}/', 'TodoController@show');
//     $app->put('todo/{id}/', 'TodoController@update');
//     $app->delete('todo/{id}/', 'TodoController@destroy');
//     });

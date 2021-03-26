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
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('register', ['uses' => 'AuthController@register']);
    $router->post('login', 'AuthController@login');

    $router->get('profile', 'UserController@profile');
    $router->get('users/{id}', 'UserController@singleUser');
    $router->get('users', 'UserController@allUsers');

    $router->get('authors', ['uses' => 'AuthorController@showAllAuthors']);
    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('authors', ['uses' => 'AuthorController@create']);
    $router->delete('authors/{id}', ['uses', 'AuthorController@delete']);
    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});

<?php

//All defined routes for this project

$router->get('', 'PagesController@home');

$router->get('search', 'SearchController@search');

$router->get('register', 'UsersController@create');
$router->post('register', 'UsersController@store');

$router->get('login', 'SessionsController@create');
$router->post('login', 'SessionsController@store');
$router->get('logout', 'SessionsController@destroy');

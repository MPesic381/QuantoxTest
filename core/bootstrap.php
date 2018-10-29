<?php

use App\Core\App;

session_start();

//Binding the configuration to App DI container
App::bind('config', require 'config.php');

//Binding the connection to App DI container
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));


//Helper functions
function view($name, $data = []) {
    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($path) {
    return header("Location: /{$path}");
}

function authCheck() {
    if(!isset($_SESSION['user'])) {
        return redirect('login');
    }
    return true;
}

function getError() {
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
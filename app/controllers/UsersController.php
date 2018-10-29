<?php


namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function create() {
        return view('register');
    }

    public function store() {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
        ];

        if($parameters['password'] != md5($_POST['passwordConfirmed'])) {
            $_SESSION['message'] = 'Password and password confirmation do not match!';
            return redirect('register');
        }

        if (!filter_var($parameters['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = 'This is not a valid email adress';
            return redirect('register');
        }

        App::get('database')->register($parameters);
        $_SESSION['message'] = 'You have been successfully registered. You can now login';
        return redirect('login');
    }

}
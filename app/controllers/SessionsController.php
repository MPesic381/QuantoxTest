<?php


namespace App\Controllers;

use App\Core\App;

class SessionsController
{
    public function create() {
        return view('login');
    }

    public function store() {
        $parameters = [
            'email' => $_POST['email'],
            'password' => md5($_POST['password'])
        ];


        if($user = App::get('database')->auth($parameters)) {
            $_SESSION['user'] = $user;
            return redirect('');
        }

        $_SESSION['message'] = 'Email or password do not match!';

        return redirect('login');
    }

    public function destroy() {
        unset($_SESSION['user']);
        return redirect('login');
    }
}
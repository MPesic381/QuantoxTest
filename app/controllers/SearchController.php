<?php


namespace App\Controllers;


use App\Core\App;

class SearchController
{
    public function search() {
        $parameters = [
            'q' => $_GET['q'] ?? '',
        ];

        if(authCheck()) {
            $users = App::get('database')->searchUser($parameters);
            return view('search', compact('users'));
        }

        $_SESSION['message'] = 'Please login so can see the results';
        return view('search', compact('users'));
    }
}
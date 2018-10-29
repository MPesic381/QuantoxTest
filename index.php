<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\{Router, Request};

//Loading routes file and directing to right controller
Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());

//unset($_SESSION['message']);